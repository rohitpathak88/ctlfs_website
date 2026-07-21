<?php
/**
 * Template Name: About Us
 *
 * Dedicated About Us page matching the Figma dark page system.
 *
 * @package CTL_Financial_Child
 */

get_header();

$content     = ctl_financial_home_content();
$about       = isset( $content['about'] ) ? $content['about'] : array();
$contact_url = trailingslashit( home_url( '/' ) ) . '#contact';
$teams_url   = home_url( '/teams/' );
$image_url   = cjl_get_image_url( 'about_us_img.png' );
?>

<div class="ctl-about-page">
	<section class="ctl-about-page__hero">
		<div class="container custom_container">
			<h1 class="ctl-about-page__title"><?php echo esc_html( $about['title'] ?? __( 'About Us', 'cjl-financial-child' ) ); ?></h1>
			<p class="ctl-about-page__subtitle mb-0"><?php esc_html_e( 'Institutional governance and fintech precision for global fund platforms.', 'cjl-financial-child' ); ?></p>
		</div>
	</section>

	<section class="ctl-about-page__band">
		<div class="container custom_container">
			<div class="row g-5 align-items-start">
				<div class="col-lg-5">
					<img
						src="<?php echo esc_url( $image_url ); ?>"
						alt="<?php esc_attr_e( 'CTL Financial team collaborating on fund operations', 'cjl-financial-child' ); ?>"
						class="ctl-about-page__image img-fluid"
						loading="lazy"
						decoding="async"
						width="557"
						height="628"
					>
				</div>
				<div class="col-lg-7">
					<h2 class="ctl-about-page__section-title"><?php esc_html_e( 'Who We Are', 'cjl-financial-child' ); ?></h2>
					<p class="ctl-about-page__lead mb-0"><?php echo esc_html( $about['description'] ?? '' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ctl-about-page__section">
		<div class="container custom_container">
			<div class="row g-5">
				<div class="col-lg-6">
					<article>
						<h2 class="ctl-about-page__section-title"><?php echo esc_html( $about['vision']['title'] ?? __( 'Vision', 'cjl-financial-child' ) ); ?></h2>
						<p class="ctl-about-page__lead mb-0"><?php echo esc_html( $about['vision']['text'] ?? '' ); ?></p>
					</article>
				</div>
				<div class="col-lg-6">
					<article>
						<h2 class="ctl-about-page__section-title"><?php echo esc_html( $about['mission']['title'] ?? __( 'Our Mission', 'cjl-financial-child' ) ); ?></h2>
						<p class="ctl-about-page__lead mb-0"><?php echo esc_html( $about['mission']['text'] ?? '' ); ?></p>
					</article>
				</div>
			</div>
		</div>
	</section>

	<section class="cta-band text-center">
		<div class="container custom_container">
			<h2 class="back_white_text_gradient fw-light title mb-3"><?php esc_html_e( 'Discover Our Philosophy', 'cjl-financial-child' ); ?></h2>
			<p class="lead mb-5"><?php esc_html_e( 'Partner with a team that combines institutional discipline, regulatory confidence, and technology-enabled precision.', 'cjl-financial-child' ); ?></p>
			<div class="d-flex flex-wrap justify-content-center gap-3">
				<a href="<?php echo esc_url( $contact_url ); ?>" class="btn-explore btn-explore-white"><?php esc_html_e( 'Request a Private Consultation', 'cjl-financial-child' ); ?></a>
				<a href="<?php echo esc_url( $teams_url ); ?>" class="btn-explore"><?php esc_html_e( 'Meet Our Team', 'cjl-financial-child' ); ?></a>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/contact-section' ); ?>
</div>

<?php
get_footer();
