<?php
/**
 * Child theme header — homepage section anchors only.
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$home_url = trailingslashit( home_url( '/' ) );
$nav_items = array(
	array( 'label' => __( 'Home', 'cjl-financial-child' ), 'href' => $home_url . '#home', 'id' => 'home' ),
	array( 'label' => __( 'About Us', 'cjl-financial-child' ), 'href' => $home_url . '#about', 'id' => 'about' ),
	array( 'label' => __( 'Services', 'cjl-financial-child' ), 'href' => $home_url . '#services', 'id' => 'services' ),
	array( 'label' => __( 'Why Choose Us', 'cjl-financial-child' ), 'href' => $home_url . '#why-choose-us', 'id' => 'why-choose-us' ),
	array( 'label' => __( 'Our Team', 'cjl-financial-child' ), 'href' => $home_url . '#our-team', 'id' => 'our-team' ),
	array( 'label' => __( 'Contact', 'cjl-financial-child' ), 'href' => $home_url . '#contact', 'id' => 'contact' ),
);
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
				<ul class="navbar-nav ms-auto">
					<?php foreach ( $nav_items as $item ) : ?>
						<?php
						$is_active = is_front_page() && 'home' === $item['id'];
						?>
						<li class="nav-item">
							<a class="nav-link<?php echo $is_active ? ' active' : ''; ?>" href="<?php echo esc_url( $item['href'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</nav>

	<main id="site-content">
