<?php
/**
 * Home hero.
 *
 * @package CTL_Financial_Child
 */

$content = ctl_financial_home_content();
$hero    = $content['hero'];
?>

<section id="home" class="hero-section ctl-home-hero">
	<div class="ctl-home-hero__left-shape" aria-hidden="true"></div>
	<div class="container custom_container">
		<div class="row align-items-center">
			<div class="col-lg-7">
				<p class="hero-eyebrow text-uppercase mb-3"><?php echo esc_html( $hero['eyebrow'] ); ?></p>
				<h1 class="accent-gradient display-4 fw-light mb-3"><?php echo esc_html( $hero['title'] ); ?></h1>
				<p class="lead mb-4"><?php echo esc_html( $hero['description'] ); ?></p>
				<div class="hero-actions d-flex flex-wrap gap-4 mt-4">
					<a href="<?php echo esc_url( trailingslashit( home_url( '/' ) ) . '#contact' ); ?>" class="btn-explore"><?php echo esc_html( $hero['primary_cta'] ); ?></a>
					<a href="<?php echo esc_url( trailingslashit( home_url( '/' ) ) . '#services' ); ?>" class="btn-explore btn-explore-secondary"><?php echo esc_html( $hero['second_cta'] ); ?></a>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="hero-image text-center">
					<img
						src="<?php echo esc_url( cjl_get_image_url( 'banner_men.png' ) ); ?>"
						alt="<?php esc_attr_e( 'Financial services professional', 'cjl-financial-child' ); ?>"
						class="img-fluid banner-men-image"
						fetchpriority="high"
						decoding="async"
						width="685"
						height="784"
					>
				</div>
			</div>
		</div>
	</div>
	<div class="ctl-home-hero__right-shape" aria-hidden="true"></div>
</section>
