<?php
/**
 * Child theme header with About Us dropdown (About Us + Teams).
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$home_url   = trailingslashit( home_url( '/' ) );
$about_url  = home_url( '/about-us/' );
$teams_url  = home_url( '/teams/' );
$is_about   = is_page( 'about-us' );
$is_teams   = is_page( 'teams' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<a class="visually-hidden-focusable skip-link" href="#site-content"><?php esc_html_e( 'Skip to content', 'cjl-financial-child' ); ?></a>

	<nav class="navbar navbar-expand-lg navbar-dark bg-transparent" aria-label="<?php esc_attr_e( 'Primary', 'cjl-financial-child' ); ?>">
		<div class="container custom_container">
			<a class="navbar-brand fs-4" href="<?php echo esc_url( $home_url ); ?>">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<img src="<?php echo esc_url( cjl_get_image_url( 'ctl_header_logo.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php
				}
				?>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'cjl-financial-child' ); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto align-items-lg-center">
					<li class="nav-item">
						<a class="nav-link<?php echo is_front_page() ? ' active' : ''; ?>" href="<?php echo esc_url( $home_url . '#home' ); ?>"><?php esc_html_e( 'Home', 'cjl-financial-child' ); ?></a>
					</li>
					<li class="nav-item dropdown">
						<a
							class="nav-link dropdown-toggle<?php echo ( $is_about || $is_teams ) ? ' active' : ''; ?>"
							href="<?php echo esc_url( $about_url ); ?>"
							id="aboutDropdown"
							role="button"
							data-bs-toggle="dropdown"
							aria-expanded="false"
						>
							<?php esc_html_e( 'About Us', 'cjl-financial-child' ); ?>
						</a>
						<ul class="dropdown-menu dropdown-menu-dark ctl-nav-dropdown" aria-labelledby="aboutDropdown">
							<li>
								<a class="dropdown-item<?php echo $is_about ? ' active' : ''; ?>" href="<?php echo esc_url( $about_url ); ?>"><?php esc_html_e( 'About Us', 'cjl-financial-child' ); ?></a>
							</li>
							<li>
								<a class="dropdown-item<?php echo $is_teams ? ' active' : ''; ?>" href="<?php echo esc_url( $teams_url ); ?>"><?php esc_html_e( 'Teams', 'cjl-financial-child' ); ?></a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_url( $home_url . '#services' ); ?>"><?php esc_html_e( 'Services', 'cjl-financial-child' ); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_url( $home_url . '#why-choose-us' ); ?>"><?php esc_html_e( 'Why Choose Us', 'cjl-financial-child' ); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_url( $home_url . '#contact' ); ?>"><?php esc_html_e( 'Contact', 'cjl-financial-child' ); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<main id="site-content">
