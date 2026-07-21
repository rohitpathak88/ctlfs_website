<?php
/**
 * Figma-aligned Home service card.
 *
 * @package CTL_Financial_Child
 *
 * @var array<string, string> $args
 */

$service = isset( $args['service'] ) ? $args['service'] : array();

if ( empty( $service ) ) {
	return;
}

$url = ! empty( $service['url'] ) ? $service['url'] : home_url( '/#services' );
?>

<article class="service-card ctl-service-card position-relative">
	<img class="ctl-service-card__top-decoration" src="<?php echo esc_url( cjl_get_image_url( 'service_box_top.png' ) ); ?>" alt="" width="304" height="54" loading="lazy" decoding="async">
	<div class="ctl-service-card__body">
		<span class="ctl-service-card__icon" aria-hidden="true">
			<img src="<?php echo esc_url( cjl_get_image_url( $service['icon'] ) ); ?>" alt="" width="36" height="36" loading="lazy" decoding="async">
		</span>
		<h3 class="back_white_text_gradient"><?php echo esc_html( $service['title'] ); ?></h3>
		<p><?php echo esc_html( $service['description'] ); ?></p>
		<a href="<?php echo esc_url( $url ); ?>" class="ctl-service-card__link stretched-link" aria-label="<?php echo esc_attr( sprintf( __( 'Explore %s', 'cjl-financial-child' ), $service['title'] ) ); ?>">
			<img src="<?php echo esc_url( cjl_get_image_url( 'arrow.png' ) ); ?>" alt="" width="26" height="13" loading="lazy" decoding="async">
		</a>
	</div>
</article>
