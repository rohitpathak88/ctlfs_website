<?php
/**
 * Home Our Team section (anchor target for header/footer).
 *
 * @package CTL_Financial_Child
 */

$content = ctl_financial_home_content();
$team    = isset( $content['team'] ) ? $content['team'] : array();
?>

<section id="our-team" class="ctl-team-section py-5">
	<div class="container custom_container">
		<div class="row">
			<div class="col-lg-8 m-auto text-center">
				<h2 class="back_white_text_gradient title fw-light mb-3"><?php echo esc_html( $team['title'] ?? __( 'Our Team', 'cjl-financial-child' ) ); ?></h2>
				<p class="lead mb-4"><?php echo esc_html( $team['description'] ?? '' ); ?></p>
				<?php if ( ! empty( $team['expertise'] ) ) : ?>
					<p class="lead mb-0"><?php echo esc_html( $team['expertise'] ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
