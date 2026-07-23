#!/usr/bin/env bash
#
# deploy.sh — CTL Fund Services WordPress deploy for Ubuntu 24.04
#             (Git deploy + Let's Encrypt SSL)
#
# Deploys tracked theme/plugin code from Git while preserving:
#   - wp-config.php
#   - wp-content/uploads/
#   - .htaccess
#   - WordPress core (installed separately / already on server)
#
# Usage:
#   chmod +x deploy.sh
#   ./deploy.sh                 # pull current DEPLOY_BRANCH
#   ./deploy.sh --branch main   # deploy a specific branch
#   ./deploy.sh --setup         # first-time clone into DEPLOY_PATH
#   ./deploy.sh --ssl           # issue/renew Let's Encrypt SSL + HTTPS
#   ./deploy.sh --setup --ssl   # clone then enable SSL
#   ./deploy.sh --status        # show git + SSL info
#
# Optional config file (same directory):
#   cp deploy.env.example deploy.env  # then edit values
#
set -euo pipefail

# ---------------------------------------------------------------------------
# Defaults (override via deploy.env or environment)
# ---------------------------------------------------------------------------
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
DEPLOY_PATH="${DEPLOY_PATH:-/var/www/ctlfs}"
REPO_URL="${REPO_URL:-https://github.com/rohitpathak88/ctlfs_website.git}"
DEPLOY_BRANCH="${DEPLOY_BRANCH:-main}"
WEB_USER="${WEB_USER:-www-data}"
WEB_GROUP="${WEB_GROUP:-www-data}"
KEEP_RELEASES="${KEEP_RELEASES:-5}"
USE_RELEASES="${USE_RELEASES:-0}" # 1 = atomic releases under releases/, 0 = deploy in place
GIT_SSH_KEY="${GIT_SSH_KEY:-}"    # e.g. /home/deploy/.ssh/ctlfs_deploy
LOG_FILE="${LOG_FILE:-/var/log/ctlfs-deploy.log}"

# SSL / HTTPS (Let's Encrypt)
DOMAIN="${DOMAIN:-}"
WWW_DOMAIN="${WWW_DOMAIN:-}"          # optional www alias, e.g. www.example.com
SSL_EMAIL="${SSL_EMAIL:-}"
WEB_SERVER="${WEB_SERVER:-nginx}"     # nginx | apache
SSL_FORCE_HTTPS="${SSL_FORCE_HTTPS:-1}"
SSL_STAGING="${SSL_STAGING:-0}"       # 1 = Let's Encrypt staging (testing)

# Load optional local config
if [[ -f "${SCRIPT_DIR}/deploy.env" ]]; then
  # shellcheck disable=SC1091
  source "${SCRIPT_DIR}/deploy.env"
fi

# ---------------------------------------------------------------------------
# Helpers
# ---------------------------------------------------------------------------
ts() { date '+%Y-%m-%d %H:%M:%S'; }

log() {
  local msg="[$(ts)] $*"
  echo "$msg"
  if [[ -w "$(dirname "$LOG_FILE")" ]] || [[ -w "$LOG_FILE" ]]; then
    echo "$msg" >>"$LOG_FILE" 2>/dev/null || true
  fi
}

die() {
  log "ERROR: $*"
  exit 1
}

need_cmd() {
  command -v "$1" >/dev/null 2>&1 || die "Required command not found: $1"
}

need_root() {
  [[ "$(id -u)" -eq 0 ]] || die "SSL / web-server changes require root (sudo ./deploy.sh --ssl)"
}

git_ssh_env() {
  if [[ -n "$GIT_SSH_KEY" ]]; then
    [[ -f "$GIT_SSH_KEY" ]] || die "GIT_SSH_KEY not found: $GIT_SSH_KEY"
    export GIT_SSH_COMMAND="ssh -i ${GIT_SSH_KEY} -o IdentitiesOnly=yes -o StrictHostKeyChecking=accept-new"
  fi
}

wp_cli() {
  if command -v wp >/dev/null 2>&1; then
    if [[ "$(id -u)" -eq 0 ]]; then
      sudo -u "$WEB_USER" -- wp --path="$DEPLOY_PATH" "$@"
    else
      wp --path="$DEPLOY_PATH" "$@"
    fi
  else
    return 1
  fi
}

maintenance_on() {
  if wp_cli maintenance-mode activate --quiet 2>/dev/null; then
    log "Maintenance mode ON"
  fi
}

maintenance_off() {
  if wp_cli maintenance-mode deactivate --quiet 2>/dev/null; then
    log "Maintenance mode OFF"
  fi
}

fix_permissions() {
  local target="$1"
  log "Fixing ownership/permissions on ${target}"

  if [[ "$(id -u)" -eq 0 ]]; then
    chown -R "${WEB_USER}:${WEB_GROUP}" "$target"
  fi

  find "$target" -type d -exec chmod 755 {} +
  find "$target" -type f -exec chmod 644 {} +

  if [[ -d "${DEPLOY_PATH}/wp-content/uploads" ]]; then
    find "${DEPLOY_PATH}/wp-content/uploads" -type d -exec chmod 775 {} +
    find "${DEPLOY_PATH}/wp-content/uploads" -type f -exec chmod 664 {} +
  fi

  if [[ -f "${DEPLOY_PATH}/deploy.sh" ]]; then
    chmod 750 "${DEPLOY_PATH}/deploy.sh"
  fi
}

flush_caches() {
  if wp_cli cache flush --quiet 2>/dev/null; then
    log "Object cache flushed"
  fi
  if wp_cli rewrite flush --quiet 2>/dev/null; then
    log "Rewrite rules flushed"
  fi
  if command -v redis-cli >/dev/null 2>&1; then
    redis-cli ping >/dev/null 2>&1 && redis-cli FLUSHDB >/dev/null 2>&1 && log "Redis FLUSHDB done" || true
  fi
  if command -v php >/dev/null 2>&1; then
    php -r 'if (function_exists("opcache_reset")) { opcache_reset(); echo "opcache reset\n"; }' 2>/dev/null || true
  fi
}

detect_web_server() {
  if [[ -n "${WEB_SERVER}" ]]; then
    echo "$WEB_SERVER"
    return
  fi
  if systemctl is-active --quiet nginx 2>/dev/null; then
    echo "nginx"
  elif systemctl is-active --quiet apache2 2>/dev/null; then
    echo "apache"
  else
    echo "nginx"
  fi
}

# ---------------------------------------------------------------------------
# SSL — Let's Encrypt (Certbot) on Ubuntu 24
# ---------------------------------------------------------------------------
install_certbot() {
  need_root
  local server
  server="$(detect_web_server)"

  if command -v certbot >/dev/null 2>&1; then
    log "Certbot already installed: $(certbot --version 2>&1 | head -n1)"
    return 0
  fi

  log "Installing Certbot for ${server} (Ubuntu 24)..."
  apt-get update -y
  if [[ "$server" == "apache" ]]; then
    apt-get install -y certbot python3-certbot-apache
  else
    apt-get install -y certbot python3-certbot-nginx
  fi
}

ensure_http_vhost() {
  need_root
  local server domain docroot
  server="$(detect_web_server)"
  domain="$DOMAIN"
  docroot="$DEPLOY_PATH"

  [[ -n "$domain" ]] || die "DOMAIN is required for SSL (set in deploy.env)"

  if [[ "$server" == "nginx" ]]; then
    local conf="/etc/nginx/sites-available/${domain}.conf"
    if [[ ! -f "$conf" ]]; then
      log "Creating Nginx HTTP vhost: ${conf}"
      cat >"$conf" <<EOF
server {
    listen 80;
    listen [::]:80;
    server_name ${domain}${WWW_DOMAIN:+ $WWW_DOMAIN};

    root ${docroot};
    index index.php index.html;

    client_max_body_size 64M;

    location / {
        try_files \$uri \$uri/ /index.php?\$args;
    }

    location ~ \.php\$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
    }

    location ~* /\. {
        deny all;
    }
}
EOF
      ln -sfn "$conf" "/etc/nginx/sites-enabled/${domain}.conf"
      # Prefer this site over default
      rm -f /etc/nginx/sites-enabled/default 2>/dev/null || true
      nginx -t
      systemctl reload nginx
    else
      log "Nginx vhost already exists: ${conf}"
      nginx -t
      systemctl reload nginx
    fi
  else
    local conf="/etc/apache2/sites-available/${domain}.conf"
    if [[ ! -f "$conf" ]]; then
      log "Creating Apache HTTP vhost: ${conf}"
      cat >"$conf" <<EOF
<VirtualHost *:80>
    ServerName ${domain}
${WWW_DOMAIN:+    ServerAlias ${WWW_DOMAIN}}
    DocumentRoot ${docroot}

    <Directory ${docroot}>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/${domain}-error.log
    CustomLog \${APACHE_LOG_DIR}/${domain}-access.log combined
</VirtualHost>
EOF
      a2enmod rewrite headers ssl >/dev/null
      a2ensite "${domain}.conf" >/dev/null
      a2dissite 000-default.conf >/dev/null 2>&1 || true
      apache2ctl configtest
      systemctl reload apache2
    else
      log "Apache vhost already exists: ${conf}"
      apache2ctl configtest
      systemctl reload apache2
    fi
  fi
}

issue_ssl_certificate() {
  need_root
  need_cmd certbot

  local server domain email_args domain_args staging_args
  server="$(detect_web_server)"
  domain="$DOMAIN"

  [[ -n "$domain" ]] || die "DOMAIN is required (e.g. DOMAIN=example.com in deploy.env)"
  [[ -n "$SSL_EMAIL" ]] || die "SSL_EMAIL is required for Let's Encrypt registration"

  domain_args=(-d "$domain")
  if [[ -n "$WWW_DOMAIN" ]]; then
    domain_args+=(-d "$WWW_DOMAIN")
  fi

  email_args=(--email "$SSL_EMAIL" --agree-tos --no-eff-email)
  staging_args=()
  if [[ "$SSL_STAGING" == "1" ]]; then
    staging_args=(--staging)
    log "Using Let's Encrypt STAGING (test certificates)"
  fi

  log "Requesting SSL certificate for ${domain}${WWW_DOMAIN:+ / $WWW_DOMAIN} via ${server}..."

  if [[ "$server" == "apache" ]]; then
    certbot --apache \
      "${domain_args[@]}" \
      "${email_args[@]}" \
      "${staging_args[@]}" \
      --redirect \
      --non-interactive
  else
    certbot --nginx \
      "${domain_args[@]}" \
      "${email_args[@]}" \
      "${staging_args[@]}" \
      --redirect \
      --non-interactive
  fi

  log "Certificate issued/renewed."
}

force_wp_https() {
  [[ "$SSL_FORCE_HTTPS" == "1" ]] || return 0
  [[ -n "$DOMAIN" ]] || return 0

  local https_url="https://${DOMAIN}"
  if wp_cli option update home "$https_url" --quiet 2>/dev/null \
    && wp_cli option update siteurl "$https_url" --quiet 2>/dev/null; then
    log "WordPress home/siteurl set to ${https_url}"
  else
    log "NOTE: Could not update WP URLs via WP-CLI. Set home/siteurl to ${https_url} manually."
  fi
}

enable_ssl_renewal() {
  need_root
  if systemctl list-unit-files | grep -q '^certbot.timer'; then
    systemctl enable --now certbot.timer
    log "Certbot auto-renew timer enabled"
    systemctl status certbot.timer --no-pager -l | head -n 8 || true
  else
    # Fallback cron hint
    if [[ ! -f /etc/cron.d/certbot ]]; then
      log "NOTE: Enable renewal with: systemctl enable --now certbot.timer"
    else
      log "Certbot cron already present"
    fi
  fi

  # Dry-run renew to validate
  if certbot renew --dry-run >/dev/null 2>&1; then
    log "Certbot renew dry-run OK"
  else
    log "WARNING: certbot renew --dry-run reported issues (check DNS / ports 80+443)"
  fi
}

ssl_status() {
  echo "DOMAIN      : ${DOMAIN:-"(not set)"}"
  echo "WWW_DOMAIN  : ${WWW_DOMAIN:-"(not set)"}"
  echo "SSL_EMAIL   : ${SSL_EMAIL:-"(not set)"}"
  echo "WEB_SERVER  : $(detect_web_server)"
  echo "FORCE_HTTPS : $SSL_FORCE_HTTPS"

  if [[ -n "$DOMAIN" ]] && [[ -d "/etc/letsencrypt/live/${DOMAIN}" ]]; then
    echo "--- certificate ---"
    openssl x509 -in "/etc/letsencrypt/live/${DOMAIN}/fullchain.pem" -noout -subject -dates 2>/dev/null || true
  else
    echo "Certificate : not found (run: sudo ./deploy.sh --ssl)"
  fi

  if command -v curl >/dev/null 2>&1 && [[ -n "$DOMAIN" ]]; then
    echo "--- https check ---"
    curl -sI "https://${DOMAIN}" 2>/dev/null | head -n 5 || echo "HTTPS not reachable yet"
  fi
}

setup_ssl() {
  need_root
  [[ -n "$DOMAIN" ]] || die "Set DOMAIN in deploy.env before --ssl"
  [[ -n "$SSL_EMAIL" ]] || die "Set SSL_EMAIL in deploy.env before --ssl"

  # DNS must already point here; open firewall ports
  if command -v ufw >/dev/null 2>&1 && ufw status 2>/dev/null | grep -q 'Status: active'; then
    log "Allowing OpenSSH, HTTP, HTTPS in UFW"
    ufw allow OpenSSH >/dev/null || true
    ufw allow 'Nginx Full' >/dev/null 2>&1 || ufw allow 'Apache Full' >/dev/null 2>&1 || {
      ufw allow 80/tcp >/dev/null || true
      ufw allow 443/tcp >/dev/null || true
    }
  fi

  install_certbot
  ensure_http_vhost
  issue_ssl_certificate
  enable_ssl_renewal
  force_wp_https
  log "SSL setup complete for https://${DOMAIN}"
}

show_status() {
  echo "DEPLOY_PATH : $DEPLOY_PATH"
  echo "REPO_URL    : $REPO_URL"
  echo "BRANCH      : $DEPLOY_BRANCH"
  echo "WEB_USER    : $WEB_USER"
  echo "USE_RELEASES: $USE_RELEASES"
  if [[ -d "${DEPLOY_PATH}/.git" ]]; then
    echo "--- git ---"
    git -C "$DEPLOY_PATH" rev-parse --abbrev-ref HEAD 2>/dev/null || true
    git -C "$DEPLOY_PATH" log -1 --oneline 2>/dev/null || true
    git -C "$DEPLOY_PATH" status -sb 2>/dev/null || true
  else
    echo "Git repo not found at $DEPLOY_PATH (run: ./deploy.sh --setup)"
  fi
  echo "--- ssl ---"
  ssl_status
}

# ---------------------------------------------------------------------------
# First-time setup (clone)
# ---------------------------------------------------------------------------
setup_repo() {
  need_cmd git
  git_ssh_env

  if [[ -d "${DEPLOY_PATH}/.git" ]]; then
    log "Repo already exists at ${DEPLOY_PATH}"
    return 0
  fi

  if [[ -d "$DEPLOY_PATH" ]] && [[ -n "$(ls -A "$DEPLOY_PATH" 2>/dev/null || true)" ]]; then
    die "${DEPLOY_PATH} exists and is not empty, and has no .git. Back up / empty it, or set DEPLOY_PATH."
  fi

  log "Creating ${DEPLOY_PATH}"
  mkdir -p "$DEPLOY_PATH"

  log "Cloning ${REPO_URL} (branch: ${DEPLOY_BRANCH})"
  git clone --branch "$DEPLOY_BRANCH" --single-branch "$REPO_URL" "$DEPLOY_PATH"

  mkdir -p "${DEPLOY_PATH}/wp-content/uploads"
  if [[ ! -f "${DEPLOY_PATH}/wp-config.php" ]]; then
    log "NOTE: Create wp-config.php on the server (not tracked in git)."
  fi

  fix_permissions "$DEPLOY_PATH"
  log "Setup complete."
}

# ---------------------------------------------------------------------------
# In-place git deploy (default)
# ---------------------------------------------------------------------------
deploy_inplace() {
  need_cmd git
  git_ssh_env

  [[ -d "${DEPLOY_PATH}/.git" ]] || die "No git repo at ${DEPLOY_PATH}. Run: ./deploy.sh --setup"

  cd "$DEPLOY_PATH"

  log "Fetching origin..."
  git fetch --prune origin

  local current
  current="$(git rev-parse --abbrev-ref HEAD)"
  if [[ "$current" != "$DEPLOY_BRANCH" ]]; then
    log "Switching branch ${current} → ${DEPLOY_BRANCH}"
    git checkout "$DEPLOY_BRANCH"
  fi

  log "Resetting tracked files to origin/${DEPLOY_BRANCH}"
  maintenance_on
  git reset --hard "origin/${DEPLOY_BRANCH}"
  git clean -fd --exclude=wp-config.php --exclude=wp-content/uploads --exclude=.htaccess --exclude=deploy.env --exclude=deploy.sh

  local sha
  sha="$(git rev-parse --short HEAD)"
  log "Deployed ${DEPLOY_BRANCH}@${sha}"

  fix_permissions "$DEPLOY_PATH"
  flush_caches
  maintenance_off
  log "Deploy finished successfully."
}

# ---------------------------------------------------------------------------
# Atomic releases (optional): releases/<timestamp> + current symlink
# ---------------------------------------------------------------------------
deploy_releases() {
  need_cmd git
  git_ssh_env

  local releases_dir="${DEPLOY_PATH}/releases"
  local shared_dir="${DEPLOY_PATH}/shared"
  local current_link="${DEPLOY_PATH}/current"
  local stamp release_dir

  stamp="$(date +%Y%m%d%H%M%S)"
  release_dir="${releases_dir}/${stamp}"

  mkdir -p "$releases_dir" "$shared_dir/wp-content/uploads"
  [[ -f "${shared_dir}/wp-config.php" ]] || log "NOTE: Place production wp-config.php at ${shared_dir}/wp-config.php"

  if [[ ! -d "${DEPLOY_PATH}/repo/.git" ]]; then
    log "Cloning bare working copy into ${DEPLOY_PATH}/repo"
    mkdir -p "${DEPLOY_PATH}/repo"
    git clone --branch "$DEPLOY_BRANCH" "$REPO_URL" "${DEPLOY_PATH}/repo"
  fi

  cd "${DEPLOY_PATH}/repo"
  git fetch --prune origin
  git checkout "$DEPLOY_BRANCH"
  git reset --hard "origin/${DEPLOY_BRANCH}"

  log "Creating release ${release_dir}"
  mkdir -p "$release_dir"
  if command -v rsync >/dev/null 2>&1; then
    rsync -a --delete \
      --exclude='.git' \
      --exclude='wp-config.php' \
      --exclude='wp-content/uploads' \
      --exclude='.htaccess' \
      ./ "$release_dir/"
  else
    need_cmd rsync
  fi

  ln -sfn "${shared_dir}/wp-content/uploads" "${release_dir}/wp-content/uploads"
  if [[ -f "${shared_dir}/wp-config.php" ]]; then
    ln -sfn "${shared_dir}/wp-config.php" "${release_dir}/wp-config.php"
  fi
  if [[ -f "${shared_dir}/.htaccess" ]]; then
    ln -sfn "${shared_dir}/.htaccess" "${release_dir}/.htaccess"
  fi

  fix_permissions "$release_dir"
  log "Switching current → ${release_dir}"
  ln -sfn "$release_dir" "$current_link"

  if [[ "$KEEP_RELEASES" =~ ^[0-9]+$ ]] && [[ "$KEEP_RELEASES" -gt 0 ]]; then
    mapfile -t old < <(ls -1dt "${releases_dir}"/* 2>/dev/null | tail -n +"$((KEEP_RELEASES + 1))" || true)
    for d in "${old[@]:-}"; do
      [[ -n "$d" ]] || continue
      log "Removing old release: $d"
      rm -rf "$d"
    done
  fi

  flush_caches
  log "Atomic deploy finished: ${stamp}"
}

# ---------------------------------------------------------------------------
# CLI
# ---------------------------------------------------------------------------
ACTION="deploy"
DO_SSL=0
while [[ $# -gt 0 ]]; do
  case "$1" in
    --setup)
      ACTION="setup"
      shift
      ;;
    --ssl)
      DO_SSL=1
      if [[ "$ACTION" == "deploy" ]]; then
        ACTION="ssl"
      fi
      shift
      ;;
    --status)
      ACTION="status"
      shift
      ;;
    --branch)
      DEPLOY_BRANCH="${2:-}"
      [[ -n "$DEPLOY_BRANCH" ]] || die "--branch requires a value"
      shift 2
      ;;
    --releases)
      USE_RELEASES=1
      shift
      ;;
    -h|--help)
      sed -n '2,28p' "$0"
      exit 0
      ;;
    *)
      die "Unknown argument: $1 (try --help)"
      ;;
  esac
done

log "=== CTLFS deploy start (Ubuntu) ==="
log "Action=${ACTION} Branch=${DEPLOY_BRANCH} Path=${DEPLOY_PATH} SSL=${DO_SSL}"

case "$ACTION" in
  setup)
    setup_repo
    if [[ "$DO_SSL" == "1" ]]; then
      setup_ssl
    fi
    ;;
  ssl)
    setup_ssl
    ;;
  status)
    show_status
    ;;
  deploy)
    if [[ "$USE_RELEASES" == "1" ]]; then
      deploy_releases
    else
      deploy_inplace
    fi
    if [[ "$DO_SSL" == "1" ]]; then
      setup_ssl
    fi
    ;;
esac

log "=== CTLFS deploy end ==="
