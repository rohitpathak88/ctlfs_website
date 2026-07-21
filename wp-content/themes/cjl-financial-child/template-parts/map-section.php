<?php
/**
 * Home worldwide trust section.
 *
 * Map graphic (continents + orange pins) is exported from the Figma Home
 * frame so placement matches the design exactly.
 *
 * @package CTL_Financial_Child
 */

$global  = ctl_financial_home_content()['global'];
$map_src = get_stylesheet_directory_uri() . '/assets/img/worldwide-trust-map.png';
?>

<section class="worldwide-trust-section ctl-worldwide-trust">
	<div class="container custom_container">
		<div class="row">
			<div class="col-md-8 m-auto text-center ctl-worldwide-trust__intro">
				<h2 class="back_white_text_gradient title fw-light mb-2"><?php echo esc_html( $global['title'] ); ?></h2>
				<p class="lead mb-5"><?php echo esc_html( $global['description'] ); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="ctl-worldwide-trust__map">
					<img
						src="<?php echo esc_url( $map_src ); ?>"
						alt="<?php esc_attr_e( 'World map highlighting the regions we serve', 'cjl-financial-child' ); ?>"
						class="img-fluid ctl-worldwide-trust__map-image"
						loading="lazy"
						decoding="async"
						width="932"
						height="358"
					>
				</div>
			</div>
		</div>
	</div>
</section>
