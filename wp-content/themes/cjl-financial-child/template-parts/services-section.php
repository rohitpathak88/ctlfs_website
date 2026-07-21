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
			<div class="row justify-content-center">
				<?php foreach ( $services as $service ) : ?>
					<div class="col-md-6 col-lg-6 col-xxl-4 mb-4">
						<article class="position-relative pt-1 service-card h-100">
							<div class="text-center">
								<img src="<?php echo esc_url( cjl_get_image_url( 'service_box_top.png' ) ); ?>" class="img-fluid" alt="" width="354" height="10" loading="lazy" decoding="async">
							</div>
							<div class="card-body p-5 pt-4">
								<span class="bg-secondary-accent d-block mb-5 rounded-5 text-center">
									<img src="<?php echo esc_url( cjl_get_image_url( $service['icon'] ) ); ?>" alt="" width="30" height="30" loading="lazy" decoding="async">
								</span>
								<h3 class="back_white_text_gradient title fw-light h5"><?php echo esc_html( $service['title'] ); ?></h3>
								<p class="lead mt-3"><?php echo esc_html( $service['description'] ); ?></p>
								<a href="<?php echo esc_url( $service['url'] ); ?>" class="d-inline-flex align-items-center gap-2 mb-3 mt-3 text-accent-color text-decoration-none" aria-label="<?php echo esc_attr( sprintf( __( 'Explore %s', 'cjl-financial-child' ), $service['title'] ) ); ?>">
									<span><?php esc_html_e( 'Explore service', 'cjl-financial-child' ); ?></span>
									<img src="<?php echo esc_url( cjl_get_image_url( 'arrow.png' ) ); ?>" alt="" width="14" height="14" loading="lazy" decoding="async">
								</a>
							</div>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<div id="about" class="container custom_container mt-5 pt-5 about-us ctl-about-us">
		<div class="row align-items-center">
			<div class="col-md-12 col-xl-6 col-xxl-5">
				<img
					class="img-fluid w-100"
					src="<?php echo esc_url( cjl_get_image_url( 'about_us_img.png' ) ); ?>"
					alt="<?php esc_attr_e( 'CTL Financial team discussing institutional fund services', 'cjl-financial-child' ); ?>"
					loading="lazy"
					decoding="async"
					width="600"
					height="610"
				>
			</div>
			<div class="col-md-12 col-xl-6 col-xxl-7">
				<div class="ps-md-5">
					<h2 class="back_white_text_gradient title fw-light mb-3"><?php echo esc_html( $about['title'] ); ?></h2>
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
	</div>
</section>
