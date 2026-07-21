<?php
/**
 * Home Our Team teaser (keeps #our-team anchor; links to full Teams page).
 *
 * @package CTL_Financial_Child
 */

$content   = ctl_financial_home_content();
$team      = isset( $content['team'] ) ? $content['team'] : array();
$teams_url = home_url( '/teams/' );
?>

<section id="our-team" class="ctl-team-section py-5">
	<div class="container custom_container">
		<div class="row">
			<div class="col-lg-8 m-auto text-center">
				<h2 class="back_white_text_gradient title fw-light mb-3"><?php echo esc_html( $team['title'] ?? __( 'Our Team', 'cjl-financial-child' ) ); ?></h2>
				<p class="lead mb-4"><?php echo esc_html( $team['description'] ?? '' ); ?></p>
				<?php if ( ! empty( $team['expertise'] ) ) : ?>
					<p class="lead mb-4"><?php echo esc_html( $team['expertise'] ); ?></p>
				<?php endif; ?>
				<a href="<?php echo esc_url( $teams_url ); ?>" class="btn-explore"><?php esc_html_e( 'Meet the Experts', 'cjl-financial-child' ); ?></a>
			</div>
		</div>
	</div>
</section>
