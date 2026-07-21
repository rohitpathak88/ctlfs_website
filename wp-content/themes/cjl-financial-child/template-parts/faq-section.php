<?php
/**
 * Home FAQ.
 *
 * @package CTL_Financial_Child
 */

$faqs = ctl_financial_home_content()['faq'];
?>

<section id="faq" class="faq-section">
	<div class="container custom_container">
		<div class="faq-heading-wrap position-relative">
			<h2 class="text-center back_white_text_gradient title fw-light mb-5"><?php esc_html_e( 'Got Questions? We’ve Got Answers.', 'cjl-financial-child' ); ?></h2>
			<img class="faq-checker d-none d-lg-block" src="<?php echo esc_url( cjl_get_image_url( 'service_box_top.png' ) ); ?>" alt="" width="354" height="10" loading="lazy" decoding="async">
		</div>
		<div class="accordion accordion-flush" id="faqAccordion">
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php $is_first = 0 === $index; ?>
				<article class="accordion-item bg-transparent border-secondary pb-3">
					<h3 class="accordion-header align-items-center d-flex m-0" id="faqHeading<?php echo esc_attr( $index + 1 ); ?>">
						<span class="faq-number fw-bold" aria-hidden="true"><?php echo esc_html( $index + 1 ); ?>-</span>
						<button class="text-break accordion-button bg-transparent text-white shadow-none<?php echo $is_first ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo esc_attr( $index + 1 ); ?>" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="faq<?php echo esc_attr( $index + 1 ); ?>">
							<?php echo esc_html( $faq[0] ); ?>
						</button>
					</h3>
					<div id="faq<?php echo esc_attr( $index + 1 ); ?>" class="accordion-collapse collapse<?php echo $is_first ? ' show' : ''; ?>" data-bs-parent="#faqAccordion" aria-labelledby="faqHeading<?php echo esc_attr( $index + 1 ); ?>">
						<div class="accordion-body lead">
							<p class="ps-4 text-break"><?php echo esc_html( $faq[1] ); ?></p>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
