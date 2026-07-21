<?php
/**
 * Template Name: Teams
 *
 * Full Teams page: intro, expertise, experts grid, impact, and CTA.
 *
 * @package CTL_Financial_Child
 */

get_header();

$content = ctl_financial_home_content();
$team    = isset( $content['team'] ) ? $content['team'] : array();
$contact = trailingslashit( home_url( '/' ) ) . '#contact';
$experts = isset( $team['experts'] ) && is_array( $team['experts'] ) ? $team['experts'] : array();
$impact  = isset( $team['impact'] ) && is_array( $team['impact'] ) ? $team['impact'] : array();
?>

<div class="ctl-teams-page">
	<section class="service-detail-hero ctl-teams-hero">
		<div class="container custom_container">
			<p class="hero-eyebrow text-uppercase mb-3"><?php esc_html_e( 'Our Team', 'cjl-financial-child' ); ?></p>
			<h1 class="accent-gradient fw-light"><?php echo esc_html( $team['title'] ?? __( 'Institutional Discipline. Operational Precision.', 'cjl-financial-child' ) ); ?></h1>
			<?php if ( ! empty( $team['description'] ) ) : ?>
				<p class="subtitle fw-medium mb-0"><?php echo esc_html( $team['description'] ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="service-intro-band">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title mb-4"><?php echo esc_html( $team['expertise_title'] ?? __( 'Expertise that drives confidence', 'cjl-financial-child' ) ); ?></h2>
			<?php if ( ! empty( $team['expertise'] ) ) : ?>
				<p class="lead mb-3"><?php echo esc_html( $team['expertise'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $team['expertise_extra'] ) ) : ?>
				<p class="lead mb-0"><?php echo esc_html( $team['expertise_extra'] ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( $experts ) : ?>
	<section class="ctl-teams-experts py-5">
		<div class="container custom_container">
			<div class="text-center mb-5">
				<h2 class="back_white_text_gradient title fw-light mb-3"><?php echo esc_html( $team['experts_title'] ?? __( 'Meet the Experts', 'cjl-financial-child' ) ); ?></h2>
				<?php if ( ! empty( $team['experts_intro'] ) ) : ?>
					<p class="lead mb-0"><?php echo esc_html( $team['experts_intro'] ); ?></p>
				<?php endif; ?>
			</div>
			<div class="row g-4">
				<?php foreach ( $experts as $expert ) : ?>
					<div class="col-md-6 col-lg-4">
						<article class="ctl-team-card">
							<div class="ctl-team-card__avatar" aria-hidden="true">
								<span><?php echo esc_html( function_exists( 'mb_substr' ) ? mb_substr( $expert['name'], 0, 1 ) : substr( $expert['name'], 0, 1 ) ); ?></span>
							</div>
							<h3 class="ctl-team-card__name"><?php echo esc_html( $expert['name'] ); ?></h3>
							<p class="ctl-team-card__role mb-3"><?php echo esc_html( $expert['role'] ); ?></p>
							<ul class="list-unstyled ctl-team-card__meta mb-0">
								<?php if ( ! empty( $expert['email'] ) ) : ?>
									<li>
										<a href="mailto:<?php echo esc_attr( $expert['email'] ); ?>"><?php echo esc_html( $expert['email'] ); ?></a>
									</li>
								<?php endif; ?>
								<?php if ( ! empty( $expert['phone'] ) ) : ?>
									<li>
										<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $expert['phone'] ) ); ?>"><?php echo esc_html( $expert['phone'] ); ?></a>
									</li>
								<?php endif; ?>
								<?php if ( ! empty( $expert['address'] ) ) : ?>
									<li><?php echo esc_html( $expert['address'] ); ?></li>
								<?php endif; ?>
							</ul>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $impact ) : ?>
	<section class="ctl-teams-impact py-5">
		<div class="container custom_container text-center">
			<h2 class="back_white_text_gradient title fw-light mb-5"><?php echo esc_html( $team['impact_title'] ?? __( 'Our Impact', 'cjl-financial-child' ) ); ?></h2>
			<?php if ( ! empty( $team['impact_subtitle'] ) ) : ?>
				<p class="lead mb-5"><?php echo esc_html( $team['impact_subtitle'] ); ?></p>
			<?php endif; ?>
			<div class="row g-4">
				<?php foreach ( $impact as $stat ) : ?>
					<div class="col-6 col-md-4 col-lg">
						<div class="ctl-impact-stat">
							<div class="ctl-impact-stat__value accent-gradient"><?php echo esc_html( $stat['value'] ); ?></div>
							<p class="ctl-impact-stat__label mb-0"><?php echo esc_html( $stat['label'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="cta-band text-center">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title mb-3"><?php echo esc_html( $team['cta_title'] ?? __( 'Powering the Next Generation of Investment Platforms', 'cjl-financial-child' ) ); ?></h2>
			<?php if ( ! empty( $team['cta_text'] ) ) : ?>
				<p class="lead mb-5"><?php echo esc_html( $team['cta_text'] ); ?></p>
			<?php endif; ?>
			<div class="d-flex flex-wrap justify-content-center gap-3">
				<a href="<?php echo esc_url( $contact ); ?>" class="btn-explore btn-explore-white"><?php echo esc_html( $team['cta_primary'] ?? __( 'Start a Conversation', 'cjl-financial-child' ) ); ?></a>
				<a href="<?php echo esc_url( trailingslashit( home_url( '/' ) ) . '#services' ); ?>" class="btn-explore"><?php echo esc_html( $team['cta_secondary'] ?? __( 'Explore Our Services', 'cjl-financial-child' ) ); ?></a>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/contact-section' ); ?>
</div>

<?php
get_footer();
