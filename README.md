# CTL Fund Services — live WordPress site

Public site: **https://ctlfs.in/**

This document covers **requirements to deploy** and **deployment steps** for the live WordPress site (not the PulseDesk CRM in this repository).

The live stack is WordPress **6.9.1**, theme **`cjl-financial`** (shown as CTL Fund Services / CTL Finance). Theme PHP files on the host are not writable from wp-admin (`DISALLOW_FILE_EDIT` / theme editor 403). Site copy, header/footer, service pages, Teams cards, and Figma layout overrides live in a **Custom HTML** widget in the footer, not in git.

---

## Requirements for deploy

### Hosting

| Item | Requirement |
|------|-------------|
| Domain | `ctlfs.in` (www should redirect to https://ctlfs.in/) |
| TLS | Valid HTTPS certificate (Let’s Encrypt or host SSL) |
| PHP | 8.1+ recommended (WordPress 6.9) |
| Database | MySQL 8 or MariaDB 10.5+ |
| Web server | Apache or nginx with WordPress permalinks (`mod_rewrite` / try_files) |
| Disk | Enough for `wp-content/uploads`, theme assets, backups |
| PHP limits | `memory_limit` ≥ 256M, `upload_max_filesize` ≥ 64M, `max_execution_time` ≥ 120 |
| Outbound HTTPS | Required for CARTO/Leaflet tiles and any CDN |

### WordPress

- WordPress 6.9.x
- Pretty permalinks (Post name)
- REST API enabled (`https://ctlfs.in/wp-json/`)
- Widgets / Customizer available to an Administrator
- Application Passwords or cookie nonce if you update widgets via REST

### Theme and assets

- Active theme: `wp-content/themes/cjl-financial`
- Theme templates in use include homepage sections, `template-service-detail.php` (service inner pages), Teams template
- Theme images: `wp-content/themes/cjl-financial/assets/img/`
- Favicon uploaded in **Appearance → Customize → Site Identity** (or equivalent)

### Overlay (required for current live UI)

Because theme files cannot be edited from admin, live UI/copy is applied by widget **`custom_html-2`** in sidebar **`footer-1`**. That widget must contain:

- `<style id="ctlfs-footer-figma">` — layout/CSS (hero, services grid, Teams cards, privacy, etc.)
- JSON + `<script>` `paint()` — nav, footer, homepage copy, five services, Teams, contact, emails, map key

If this widget is removed or emptied, the theme’s original CJL/WordPress copy and menus return.

### Integrations / keys (live)

| Purpose | Where it is used |
|---------|------------------|
| CARTO basemap | Leaflet `dark_all` tiles with query param `?key=` (not `api_key`) |
| Contact email | `info@ctlfs.in` |
| Phone | `+91 22 4922 0555` |
| LinkedIn | `https://www.linkedin.com/company/ctl-fund-services/` |
| Office on Contact | Mumbai only: Unit No-901, 9th Floor, Tower-B, Peninsula Business Park, Senapati Bapat Marg, Lower Parel (W), Mumbai-400013 |

Do not commit wp-admin passwords, REST cookies, or API keys into this repository.

### Pages that must exist (live IDs)

| Page | URL | WP ID (live) |
|------|-----|----------------|
| Home | `/` | front page |
| Fund Accounting & NAV Calculation | `/fund-accounting-nav-calculation/` | 7 |
| Investor Services & Reporting | `/investor-services-reporting/` | 20 |
| Regulatory Compliance & Filing | `/regulatory-compliance-filing/` | 21 |
| Transfer Agency Services | `/transfer-agency-services/` | 22 |
| Fund Setup & Operational Launch Support | `/fund-setup-operational-launch-support/` | 23 |
| Teams | `/teams/` | 29 |
| Privacy Policy | `/privacy-policy/` | 3 |
| About (homepage section) | `https://ctlfs.in/#about_us` | not a separate About menu URL |

Service pages are **top-level** (not under `/services/...`). Nested `/services/child` URLs 404.

### Header and footer (expected live)

**Header:** Home · Services (5 children) · About Us (`/#about_us`) · Teams · Contact Us  

**Footer:** brand · Services + Teams · About Us + FAQ · Privacy Policy + Contact Us · LinkedIn only (no Blog, Policy/Terms/Help/Open Positions/Sitemap)

---

## Deployment steps

### 1. DNS and SSL

1. Point `ctlfs.in` (and `www` if used) to the hosting IP.
2. Enable HTTPS; force HTTP → HTTPS.
3. Confirm `https://ctlfs.in/` loads without certificate warnings.

### 2. Install WordPress

1. Create MySQL database and user; grant ALL on that database.
2. Upload WordPress 6.9.x (or use the host installer).
3. Complete `wp-admin/install.php` (site title: CTL / CTL Fund Services).
4. In `wp-config.php` keep `DISALLOW_FILE_EDIT` true if the host requires it (matches live).

### 3. Theme

1. Upload `cjl-financial` to `wp-content/themes/`.
2. **Appearance → Themes → Activate**.
3. Confirm assets load:  
   `https://ctlfs.in/wp-content/themes/cjl-financial/assets/img/`

### 4. Permalinks and pages

1. **Settings → Permalinks → Post name → Save**.
2. Create or import the pages in the table above.
3. Assign each service page the **service detail** template (`template-service-detail.php`) if the theme exposes it.
4. **Settings → Reading:** homepage = static Home page.
5. Do not nest service pages under a `/services/` parent.

### 5. Menus (wp-admin)

**Appearance → Menus** (primary):

1. Home → `/`
2. Services (parent, no destination or `#services`) with five child links to the service URLs
3. About Us → `https://ctlfs.in/#about_us`
4. Teams → `/teams/`
5. Contact Us → `/#contact` or the contact page used on live

The overlay script also normalizes labels/hrefs on paint; keep the menu in sync so a missing widget still has a usable nav.

### 6. Overlay widget (live UI)

1. **Appearance → Widgets** (or **Customize → Widgets**).
2. Sidebar **Footer** (`footer-1`): Custom HTML widget (`custom_html-2`).
3. Paste the full overlay (style + JSON + `paint()` script).
4. Save.

To update via REST (Administrator session):

```http
PUT https://ctlfs.in/wp-json/wp/v2/widgets/custom_html-2
```

Body shape:

```json
{
  "sidebar": "footer-1",
  "instance": {
    "raw": {
      "content": "<style id=\"ctlfs-footer-figma\">…</style><script>…paint()…</script>"
    }
  }
}
```

Header: `X-WP-Nonce` from wp-admin (`wpApiSettings.nonce`) plus authenticated cookies. A stale nonce returns `rest_cookie_invalid_nonce`.

After save, hard-refresh the public URL (`?v=` cache-bust if a CDN caches HTML).

### 7. Site identity and contact

1. Upload favicon.
2. Confirm footer/contact email `info@ctlfs.in` (overlay overwrites leftover `contactinformation@ctls.com` / `info@ctls.com`).
3. Contact block: Mumbai address only.
4. Map: CARTO key on Leaflet `dark_all` as `?key=YOUR_KEY`.

### 8. Teams

Page `/teams/` uses theme cards; overlay sets:

- Dilip Dixit — Founder At CTL  
- Umesh Salvi — Managing Director At CTL  
- Jayesh Khaitan — Managing Director  
- Yogesh Darji — Head of Business Development (single line; equal-height white name boxes)

Display name is **Yogesh** (not Yogeshh). Personal LinkedIn slug may still use the old URL; company footer link is the company page.

### 9. Go-live checklist

Visit and confirm:

- [ ] https://ctlfs.in/ — hero tagline one line; About Us heading; five services (3 + 2 equal-width); FAQ first 5; Why Choose Us text fully visible
- [ ] Header About Us → `#about_us` (not clipped under the fixed nav)
- [ ] All five service URLs use Figma-style inner layout
- [ ] https://ctlfs.in/teams/ — names, one-line Yogesh title, equal white boxes
- [ ] Privacy Policy layout
- [ ] Footer menus and LinkedIn only
- [ ] Contact email and Mumbai address
- [ ] Map tiles (no CARTO watermark from a wrong key param)
- [ ] Overlay still present in page source: `id="ctlfs-footer-figma"` and `function paint`

### 10. Backup and updates

1. Backup database + `wp-content` before WordPress/theme/plugin updates.
2. Update WordPress/plugins from wp-admin; re-check the overlay widget after updates (theme/footer changes can drop widgets).
3. Do not rely on theme file editor. Re-apply overlay if a deploy overwrites widgets.
4. Keep a copy of the Custom HTML widget content off-server (export from REST `GET .../widgets/custom_html-2?context=edit`).

---

## How live changes are made today

Theme PHP is locked. Production changes are:

1. Edit overlay CSS/JS (nav, copy, Teams, services JSON).
2. PUT widget `custom_html-2` (or paste in **Appearance → Widgets**).
3. Hard-refresh https://ctlfs.in/ and the affected route.

Figma reference (design, not hosting): [code19 prototype](https://www.figma.com/proto/baQC4Ay2Krsr1bGRHyHeER/code19).

Admin: https://ctlfs.in/wp-admin/ — credentials stay in the host password manager, not in this file.
