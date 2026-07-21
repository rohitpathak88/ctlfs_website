<?php
/**
 * Home services and About Us sections.
 *
 * @package CTL_Financial_Child
 */

$content  = ctl_financial_home_content();
$services = $content['services'];
$about    = $content['about'];
?>

<section id="services" class="services-section ctl-services-section">
	<div class="container custom_container">
		<h2 class="visually-hidden"><?php esc_html_e( 'Our Services', 'cjl-financial-child' ); ?></h2>
		<div class="services-grid position-relative">
			<span class="text-uppercase corner-label top_corner_text" aria-hidden="true">Services</span>
			<span class="text-uppercase corner-label left_corner_text" aria-hidden="true">Services</span>
			<span class="text-uppercase corner-label bottom_corner_text" aria-hidden="true">Services</span>
			<span class="text-uppercase corner-label right_corner_text" aria-hidden="true">Services</span>
			<div class="ctl-services-grid__row ctl-services-grid__row--three">
				<?php foreach ( array_slice( $services, 0, 3 ) as $service ) : ?>
					<?php get_template_part( 'template-parts/service-card', null, array( 'service' => $service ) ); ?>
				<?php endforeach; ?>
			</div>
			<div class="ctl-services-grid__row ctl-services-grid__row--two">
				<?php foreach ( array_slice( $services, 3, 2 ) as $service ) : ?>
					<?php get_template_part( 'template-parts/service-card', null, array( 'service' => $service ) ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div id="about" class="container custom_container mt-5 pt-5 about-us ctl-about-us">
		<div class="ctl-about-us__layout">
			<div class="ctl-about-us__visual">
				<img
					class="ctl-about-us__image"
					src="<?php echo esc_url( cjl_get_image_url( 'about_us_img.png' ) ); ?>"
					alt="<?php esc_attr_e( 'CTL Financial team discussing institutional fund services', 'cjl-financial-child' ); ?>"
					loading="lazy"
					decoding="async"
					width="600"
					height="610"
				>
			</div>
			<div class="ctl-about-us__content">
				<h2 class="back_white_text_gradient title fw-light mb-3"><?php esc_html_e( 'About Us', 'cjl-financial-child' ); ?></h2>
				<p class="lead"><?php echo esc_html( $about['description'] ); ?></p>
				<div class="about-content position-relative">
					<div class="top-dot" aria-hidden="true"></div>
					<div class="bottom-dot" aria-hidden="true"></div>
					<section class="about-block">
						<h3 class="back_white_text_gradient fw-light mb-3"><?php echo esc_html( $about['vision']['title'] ); ?></h3>
						<p class="lead"><?php echo esc_html( $about['vision']['text'] ); ?></p>
					</section>
					<section class="about-block">
						<h3 class="back_white_text_gradient fw-light mb-3"><?php echo esc_html( $about['mission']['title'] ); ?></h3>
						<p class="lead"><?php echo esc_html( $about['mission']['text'] ); ?></p>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>
