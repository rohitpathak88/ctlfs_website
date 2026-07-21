<?php
/**
 * Template Name: Service Detail
 *
 * Reusable service detail layout: hero, description, features, benefits,
 * process, FAQ, CTA, and contact.
 *
 * @package CTL_Financial_Child
 */

get_header();

$service = ctl_financial_get_service_content();

if ( ! $service ) {
	$service = array(
		'title'         => get_the_title(),
		'subtitle'      => has_excerpt() ? get_the_excerpt() : '',
		'intro_title'   => get_the_title(),
		'intro'         => array( get_the_content() ? wp_strip_all_tags( get_the_content() ) : '' ),
		'approach'      => array( 'intro' => '', 'items' => array() ),
		'expertise'     => array(),
		'benefits'      => array(),
		'benefits_note' => '',
		'process'       => array(),
		'faq'           => array(),
		'cta_title'     => __( 'Schedule a Consultation', 'cjl-financial-child' ),
		'cta_text'      => '',
		'cta_label'     => __( 'Schedule a Consultation', 'cjl-financial-child' ),
	);
}

$contact_url = trailingslashit( home_url( '/' ) ) . '#contact';
$icons       = array(
	'approach_icon_1.svg',
	'approach_icon_2.svg',
	'approach_icon_3.svg',
	'approach_icon_4.svg',
);
?>

<div class="service-detail-page">
	<section class="service-detail-hero">
		<div class="container custom_container">
			<h1 class="accent-gradient fw-light"><?php echo esc_html( $service['title'] ); ?></h1>
			<?php if ( ! empty( $service['subtitle'] ) ) : ?>
				<p class="subtitle fw-medium mb-0"><?php echo esc_html( $service['subtitle'] ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="service-intro-band">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title mb-4"><?php echo esc_html( $service['intro_title'] ); ?></h2>
			<?php foreach ( $service['intro'] as $index => $paragraph ) : ?>
				<p class="lead<?php echo ( count( $service['intro'] ) - 1 ) === $index ? ' mb-0' : ' mb-3'; ?>"><?php echo esc_html( $paragraph ); ?></p>
			<?php endforeach; ?>
		</div>
	</section>

	<?php if ( ! empty( $service['approach']['items'] ) ) : ?>
	<section class="service-approach" style="background-image:url(<?php echo esc_url( cjl_get_image_url( 'service_gradient_band.svg' ) ); ?>);">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title text-capitalize mb-3"><?php esc_html_e( 'Our Approach', 'cjl-financial-child' ); ?></h2>
			<?php if ( ! empty( $service['approach']['intro'] ) ) : ?>
				<p class="lead mb-5"><?php echo esc_html( $service['approach']['intro'] ); ?></p>
			<?php endif; ?>
			<div class="row g-4">
				<?php foreach ( $service['approach']['items'] as $index => $item ) : ?>
					<div class="col-sm-6 col-lg-3">
						<span class="approach-icon mb-4">
							<img src="<?php echo esc_url( cjl_get_image_url( $icons[ $index % count( $icons ) ] ) ); ?>" alt="" loading="lazy" decoding="async">
						</span>
						<h3 class="approach-title text-white fw-normal"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="lead mb-0"><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $service['expertise'] ) ) : ?>
	<section class="core-expertise">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title text-capitalize mb-5"><?php esc_html_e( 'Core Expertise', 'cjl-financial-child' ); ?></h2>
			<div class="row g-4">
				<?php foreach ( $service['expertise'] as $index => $card ) : ?>
					<div class="col-lg-6">
						<div class="expertise-card">
							<div class="number back_white_text_gradient"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>.</div>
							<h3 class="card-title back_white_text_gradient fw-light"><?php echo esc_html( $card['title'] ); ?></h3>
							<p class="lead mb-0"><?php echo esc_html( $card['text'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $service['benefits'] ) ) : ?>
	<section class="why-matters">
		<div class="container custom_container text-center">
			<h2 class="back_white_text_gradient fw-light title text-capitalize mb-5"><?php esc_html_e( 'Why It Matters?', 'cjl-financial-child' ); ?></h2>
			<div class="benefit-pills mb-5">
				<?php foreach ( $service['benefits'] as $pill ) : ?>
					<span class="benefit-pill back_white_text_gradient"><?php echo esc_html( $pill ); ?></span>
				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $service['benefits_note'] ) ) : ?>
				<p class="lead mx-auto why-matters-note mb-0"><?php echo esc_html( $service['benefits_note'] ); ?></p>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $service['process'] ) ) : ?>
	<section class="service-process py-5">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title text-capitalize mb-5 text-center"><?php esc_html_e( 'Our Process', 'cjl-financial-child' ); ?></h2>
			<div class="row g-4">
				<?php foreach ( $service['process'] as $index => $step ) : ?>
					<div class="col-sm-6 col-lg-3">
						<article class="ctl-service-process-step">
							<div class="number back_white_text_gradient mb-3"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></div>
							<h3 class="text-white fw-normal h5"><?php echo esc_html( $step['title'] ); ?></h3>
							<p class="lead mb-0"><?php echo esc_html( $step['text'] ); ?></p>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! empty( $service['faq'] ) ) : ?>
	<section class="faq-section py-5">
		<div class="container custom_container">
			<h2 class="text-center back_white_text_gradient title fw-light mb-5"><?php esc_html_e( 'Got Questions? We’ve Got Answers.', 'cjl-financial-child' ); ?></h2>
			<div class="accordion accordion-flush" id="serviceFaqAccordion">
				<?php foreach ( $service['faq'] as $index => $faq ) : ?>
					<?php $is_first = 0 === $index; ?>
					<article class="accordion-item bg-transparent border-secondary pb-3">
						<h3 class="accordion-header align-items-center d-flex m-0" id="serviceFaqHeading<?php echo esc_attr( $index + 1 ); ?>">
							<span class="faq-number fw-bold" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>-</span>
							<button class="text-break accordion-button bg-transparent text-white shadow-none<?php echo $is_first ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#serviceFaq<?php echo esc_attr( $index + 1 ); ?>" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="serviceFaq<?php echo esc_attr( $index + 1 ); ?>">
								<?php echo esc_html( $faq[0] ); ?>
							</button>
						</h3>
						<div id="serviceFaq<?php echo esc_attr( $index + 1 ); ?>" class="accordion-collapse collapse<?php echo $is_first ? ' show' : ''; ?>" data-bs-parent="#serviceFaqAccordion" aria-labelledby="serviceFaqHeading<?php echo esc_attr( $index + 1 ); ?>">
							<div class="accordion-body lead">
								<p class="ps-4 text-break"><?php echo esc_html( $faq[1] ); ?></p>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="cta-band text-center">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title mb-3"><?php echo esc_html( $service['cta_title'] ); ?></h2>
			<?php if ( ! empty( $service['cta_text'] ) ) : ?>
				<p class="lead mb-5"><?php echo esc_html( $service['cta_text'] ); ?></p>
			<?php endif; ?>
			<a href="<?php echo esc_url( $contact_url ); ?>" class="btn-explore btn-explore-white"><?php echo esc_html( $service['cta_label'] ); ?></a>
		</div>
	</section>

	<?php get_template_part( 'template-parts/contact-section' ); ?>
</div>

<?php
get_footer();
