<?php
/**
 * Child theme footer — required links only.
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$home_url     = trailingslashit( home_url( '/' ) );
$privacy_url  = get_privacy_policy_url();
if ( ! $privacy_url ) {
	$privacy_url = home_url( '/privacy-policy/' );
}

$footer_links = array(
	array( 'label' => __( 'Home', 'cjl-financial-child' ), 'href' => $home_url . '#home' ),
	array( 'label' => __( 'About Us', 'cjl-financial-child' ), 'href' => home_url( '/about-us/' ) ),
	array( 'label' => __( 'Services', 'cjl-financial-child' ), 'href' => $home_url . '#services' ),
	array( 'label' => __( 'Why Choose Us', 'cjl-financial-child' ), 'href' => $home_url . '#why-choose-us' ),
	array( 'label' => __( 'Our Team', 'cjl-financial-child' ), 'href' => home_url( '/teams/' ) ),
	array( 'label' => __( 'Privacy Policy', 'cjl-financial-child' ), 'href' => $privacy_url ),
);
?>
	</main>

	<?php if ( ! is_page_template( 'template-service-detail.php' ) && ! is_page_template( 'template-privacy-policy.php' ) && ! is_page_template( 'template-about-us.php' ) ) : ?>
	<section class="newsletter-section">
		<div class="container custom_container">
			<div class="row align-items-center">
				<div class="col-lg-6 m-auto text-center">
					<form id="newsletterForm" class="input-group">
						<label for="newsletter-email" class="visually-hidden"><?php esc_html_e( 'Email address', 'cjl-financial-child' ); ?></label>
						<input type="email" id="newsletter-email" name="email" class="bg-transparent border-0 form-control" placeholder="<?php esc_attr_e( 'Enter your email address', 'cjl-financial-child' ); ?>" autocomplete="email" required>
						<button class="btn btn-danger rounded-0 fw-light" type="submit"><?php esc_html_e( 'Subscribe', 'cjl-financial-child' ); ?></button>
					</form>
					<p class="mb-0 mt-3 newsletter-note"><?php esc_html_e( 'Enter your email to get newsletter.', 'cjl-financial-child' ); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<footer class="ctl-site-footer" style="background-image:url(<?php echo esc_url( cjl_get_image_url( 'home_banner_top_color_gradient.png' ) ); ?>);background-position: top; background-repeat: no-repeat;">
		<div class="container custom_container">
			<div class="row align-items-start">
				<div class="col-sm-6 col-md-4 col-lg-3 mb-4 mb-lg-0">
					<a href="<?php echo esc_url( $home_url ); ?>">
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
					<p class="lead mt-4">© <?php echo esc_html( gmdate( 'Y' ) ); ?>. CTLFS. All Rights Reserved.</p>
				</div>
				<div class="col-sm-6 col-md-8 col-lg-6 mb-4 mb-lg-0">
					<nav aria-label="<?php esc_attr_e( 'Footer', 'cjl-financial-child' ); ?>">
						<ul class="list-unstyled ctl-footer-menu row row-cols-2 row-cols-md-3 g-2 mb-0">
							<?php foreach ( $footer_links as $link ) : ?>
								<li class="col">
									<a href="<?php echo esc_url( $link['href'] ); ?>" class="text-white text-decoration-none"><?php echo esc_html( $link['label'] ); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<h6 class="text-uppercase"><?php esc_html_e( 'Follow Us On', 'cjl-financial-child' ); ?></h6>
					<div class="social-links">
						<?php
						$facebook = get_theme_mod( 'cjl_facebook', '' );
						$linkedin = get_theme_mod( 'cjl_linkedin', '' );
						$twitter  = get_theme_mod( 'cjl_twitter', '' );

						if ( $facebook ) {
							echo '<a href="' . esc_url( $facebook ) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr__( 'Facebook', 'cjl-financial-child' ) . '"><img src="' . esc_url( cjl_get_image_url( 'fb.png' ) ) . '" alt="" loading="lazy" decoding="async"></a>';
						}
						if ( $linkedin ) {
							echo '<a href="' . esc_url( $linkedin ) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr__( 'LinkedIn', 'cjl-financial-child' ) . '"><img src="' . esc_url( cjl_get_image_url( 'in.png' ) ) . '" alt="" loading="lazy" decoding="async"></a>';
						}
						if ( $twitter ) {
							echo '<a href="' . esc_url( $twitter ) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr__( 'X (Twitter)', 'cjl-financial-child' ) . '"><img src="' . esc_url( cjl_get_image_url( 'x.png' ) ) . '" alt="" loading="lazy" decoding="async"></a>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
