<?php
/**
 * Home differentiators.
 *
 * @package CTL_Financial_Child
 */

$content         = ctl_financial_home_content();
$differentiators = $content['differentiators'];
$items           = array_slice( $differentiators['items'], 0, 4 );
?>

<section class="why-choose-section ctl-differentiators">
	<div class="container custom_container">
		<div class="row">
			<div class="col-sm-12 col-md-10 col-lg-10 col-xl-8 m-auto">
				<div class="row align-items-center">
					<div class="col-md-12 col-lg-4">
						<div class="row">
							<?php foreach ( array_slice( $items, 0, 2 ) as $index => $item ) : ?>
								<div class="col-sm-6 col-md-6 col-lg-12<?php echo 0 === $index ? ' mb-5 mb-lg-5 pe-lg-0 mb-sm-0' : ' pe-lg-0'; ?>">
									<article class="why-choose-card">
										<div class="number" aria-hidden="true"><?php echo esc_html( $index + 1 ); ?></div>
										<h3 class="back_white_text_gradient title fw-light h5"><?php echo esc_html( $item ); ?></h3>
									</article>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="col-md-12 col-lg-4 p-lg-0">
						<div class="text-center ctl-differentiators__center">
							<img src="<?php echo esc_url( cjl_get_image_url( 'why_choose_us_dotted_img.png' ) ); ?>" alt="" class="img-fluid" loading="lazy" decoding="async">
							<h2 class="back_white_text_gradient title fw-light"><?php echo esc_html( $differentiators['title'] ); ?></h2>
							<p class="lead"><?php echo esc_html( $differentiators['description'] . ' ' . $differentiators['items'][4] . '.' ); ?></p>
						</div>
					</div>
					<div class="col-md-12 col-lg-4">
						<div class="row">
							<?php foreach ( array_slice( $items, 2, 2 ) as $index => $item ) : ?>
								<div class="col-sm-6 col-md-6 col-lg-12<?php echo 0 === $index ? ' mb-5 ps-lg-0' : ' ps-lg-0'; ?>">
									<article class="why-choose-card">
										<div class="number" aria-hidden="true"><?php echo esc_html( $index + 3 ); ?></div>
										<h3 class="back_white_text_gradient title fw-light h5"><?php echo esc_html( $item ); ?></h3>
									</article>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
