<?php
/**
 * Home worldwide trust section.
 *
 * @package CTL_Financial_Child
 */

$global = ctl_financial_home_content()['global'];
?>

<section class="worldwide-trust-section ctl-worldwide-trust">
	<div class="container custom_container">
		<div class="row">
			<div class="col-md-8 m-auto text-center">
				<h2 class="back_white_text_gradient title fw-light mb-2"><?php echo esc_html( $global['title'] ); ?></h2>
				<p class="lead mb-5"><?php echo esc_html( $global['description'] ); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<img src="<?php echo esc_url( cjl_get_image_url( 'map.png' ) ); ?>" alt="<?php esc_attr_e( 'World map highlighting the regions we serve', 'cjl-financial-child' ); ?>" class="img-fluid" loading="lazy" decoding="async" width="1140" height="478">
			</div>
		</div>
	</div>
</section>
