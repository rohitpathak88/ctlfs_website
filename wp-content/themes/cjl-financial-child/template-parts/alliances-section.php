<?php
/**
 * Home partner/alliance logos.
 *
 * This child override intentionally renders the Figma fallback set when no
 * alliance CPT entries are published, rather than hiding the entire section.
 *
 * @package CTL_Financial_Child
 */

$defaults = array(
	array( 'image' => 'eit_health_logo.png', 'alt' => 'EIT Health', 'offset' => '' ),
	array( 'image' => 'Sony-Logo.png', 'alt' => 'Sony', 'offset' => 'alliance-logo-top-80' ),
	array( 'image' => 'Horizon-2020-logo.png', 'alt' => 'Horizon 2020', 'offset' => 'alliance-logo-top-170' ),
	array( 'image' => 'Venturecup.png', 'alt' => 'Venture Cup', 'offset' => 'alliance-logo-top-80' ),
	array( 'image' => 'almi_logo.png', 'alt' => 'ALMI', 'offset' => '' ),
);
?>

<section id="investors" class="alliances-section ctl-alliances-section">
	<div class="container custom_container">
		<h2 class="text-center back_white_text_gradient title fw-light mb-5 mb-md-0"><?php esc_html_e( 'Our Trusted Alliances', 'cjl-financial-child' ); ?></h2>
		<div class="row">
			<div class="col-md-5">
				<div class="row">
					<?php foreach ( array_slice( $defaults, 0, 2 ) as $alliance ) : ?>
						<div class="col-sm-12 col-md-6 mb-4">
							<div class="alliance-logo p-4 <?php echo esc_attr( $alliance['offset'] ); ?>">
								<img class="img-fluid" src="<?php echo esc_url( cjl_get_image_url( $alliance['image'] ) ); ?>" alt="<?php echo esc_attr( $alliance['alt'] ); ?>" loading="lazy" decoding="async">
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-2 text-center mb-4">
				<div class="alliance-logo p-4 <?php echo esc_attr( $defaults[2]['offset'] ); ?>">
					<img class="img-fluid" src="<?php echo esc_url( cjl_get_image_url( $defaults[2]['image'] ) ); ?>" alt="<?php echo esc_attr( $defaults[2]['alt'] ); ?>" loading="lazy" decoding="async">
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<?php foreach ( array_slice( $defaults, 3, 2 ) as $alliance ) : ?>
						<div class="col-sm-12 col-md-6 mb-4">
							<div class="alliance-logo p-4 <?php echo esc_attr( $alliance['offset'] ); ?>">
								<img class="img-fluid" src="<?php echo esc_url( cjl_get_image_url( $alliance['image'] ) ); ?>" alt="<?php echo esc_attr( $alliance['alt'] ); ?>" loading="lazy" decoding="async">
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
