<?php
/**
 * Template Name: Teams
 *
 * Full Teams page: intro, expertise, experts grid, impact, and CTA.
 *
 * @package CTL_Financial_Child
 */

get_header();

$content        = ctl_financial_home_content();
$team           = isset( $content['team'] ) ? $content['team'] : array();
$contact        = trailingslashit( home_url( '/' ) ) . '#contact';
$experts        = isset( $team['experts'] ) && is_array( $team['experts'] ) ? $team['experts'] : array();
$impact         = isset( $team['impact'] ) && is_array( $team['impact'] ) ? $team['impact'] : array();
$linkedin_icon  = get_stylesheet_directory_uri() . '/assets/img/linkedin-icon.svg';
?>

<div class="ctl-teams-page">
	<section class="service-detail-hero ctl-teams-hero">
		<div class="container custom_container">
			<h1 class="accent-gradient fw-light"><?php echo esc_html( $team['title'] ?? __( 'Institutional Discipline. Operational Precision.', 'cjl-financial-child' ) ); ?></h1>
			<?php if ( ! empty( $team['description'] ) ) : ?>
				<p class="subtitle fw-medium"><?php echo esc_html( $team['description'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $team['description_2'] ) ) : ?>
				<p class="subtitle fw-medium"><?php echo esc_html( $team['description_2'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $team['description_3'] ) ) : ?>
				<p class="subtitle fw-medium mb-0"><?php echo esc_html( $team['description_3'] ); ?></p>
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
				<p class="lead mb-3"><?php echo esc_html( $team['expertise_extra'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $team['expertise_extra_2'] ) ) : ?>
				<p class="lead mb-0"><?php echo esc_html( $team['expertise_extra_2'] ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( $experts ) : ?>
	<section class="ctl-teams-experts">
		<div class="container custom_container">
			<div class="ctl-teams-experts__intro">
				<h2 class="back_white_text_gradient title fw-light ctl-teams-experts__title"><?php echo esc_html( $team['experts_title'] ?? __( 'Meet the expert behind building your vision', 'cjl-financial-child' ) ); ?></h2>
				<?php if ( ! empty( $team['experts_intro'] ) ) : ?>
					<p class="ctl-teams-experts__subtitle mb-0"><?php echo esc_html( $team['experts_intro'] ); ?></p>
				<?php endif; ?>
			</div>
			<div class="ctl-teams-experts__grid">
				<?php foreach ( $experts as $expert ) : ?>
					<?php
					$image_file   = ! empty( $expert['image'] ) ? $expert['image'] : '';
					$image_url    = $image_file ? get_stylesheet_directory_uri() . '/assets/img/team/' . $image_file : '';
					$phone_href   = ! empty( $expert['phone'] ) ? preg_replace( '/[^0-9+]/', '', $expert['phone'] ) : '';
					$link_name    = ! empty( $expert['link_name'] ) && ! empty( $expert['linkedin'] );
					$show_linkedin_icon = ! empty( $expert['linkedin'] ) && ! $link_name;
					$has_meta     = ! empty( $expert['email'] ) || ! empty( $expert['phone'] ) || ! empty( $expert['address'] ) || $show_linkedin_icon;
					?>
					<article class="ctl-expert-card">
						<div class="ctl-expert-card__media">
							<?php if ( $image_url ) : ?>
								<img
									class="ctl-expert-card__image"
									src="<?php echo esc_url( $image_url ); ?>"
									alt="<?php echo esc_attr( $expert['name'] ); ?>"
									width="300"
									height="406"
									loading="lazy"
									decoding="async"
								>
							<?php endif; ?>
							<div class="ctl-expert-card__badge">
								<h3 class="ctl-expert-card__name">
									<?php if ( $link_name ) : ?>
										<a
											class="ctl-expert-card__name-link"
											href="<?php echo esc_url( $expert['linkedin'] ); ?>"
											target="_blank"
											rel="noopener noreferrer"
										><?php echo esc_html( $expert['name'] ); ?></a>
									<?php else : ?>
										<?php echo esc_html( $expert['name'] ); ?>
									<?php endif; ?>
								</h3>
								<p class="ctl-expert-card__role"><?php echo esc_html( $expert['role'] ); ?></p>
								<?php if ( ! empty( $expert['show_rule'] ) ) : ?>
									<span class="ctl-expert-card__rule" aria-hidden="true"></span>
								<?php endif; ?>
							</div>
						</div>
						<?php if ( $has_meta ) : ?>
							<div class="ctl-expert-card__meta">
								<?php if ( ! empty( $expert['email'] ) ) : ?>
									<a href="mailto:<?php echo esc_attr( $expert['email'] ); ?>"><?php echo esc_html( $expert['email'] ); ?></a>
								<?php endif; ?>
								<?php if ( ! empty( $expert['phone'] ) ) : ?>
									<a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $expert['phone'] ); ?></a>
								<?php endif; ?>
								<?php if ( ! empty( $expert['address'] ) ) : ?>
									<span><?php echo esc_html( $expert['address'] ); ?></span>
								<?php endif; ?>
								<?php if ( $show_linkedin_icon ) : ?>
									<a
										class="ctl-expert-card__linkedin"
										href="<?php echo esc_url( $expert['linkedin'] ); ?>"
										target="_blank"
										rel="noopener noreferrer"
										aria-label="<?php echo esc_attr( sprintf( __( 'View %s on LinkedIn', 'cjl-financial-child' ), $expert['name'] ) ); ?>"
									>
										<img src="<?php echo esc_url( $linkedin_icon ); ?>" alt="" width="12" height="12" loading="lazy" decoding="async">
										<span><?php esc_html_e( 'LinkedIn', 'cjl-financial-child' ); ?></span>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $impact ) : ?>
	<section class="ctl-teams-impact">
		<div class="container custom_container text-center">
			<h2 class="back_white_text_gradient title fw-light mb-3"><?php echo esc_html( $team['impact_title'] ?? __( 'Our Impact', 'cjl-financial-child' ) ); ?></h2>
			<?php if ( ! empty( $team['impact_subtitle'] ) ) : ?>
				<p class="lead mb-5"><?php echo esc_html( $team['impact_subtitle'] ); ?></p>
			<?php endif; ?>
			<div class="row g-4 justify-content-center">
				<?php foreach ( $impact as $stat ) : ?>
					<div class="col-6 col-md-4 col-xl-2">
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
