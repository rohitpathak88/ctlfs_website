<?php
/**
 * Template Name: Privacy Policy
 *
 * Figma-matched Privacy Policy layout.
 *
 * @package CTL_Financial_Child
 */

get_header();

$privacy = ctl_financial_privacy_content();
?>

<div class="ctl-privacy-page">
	<section class="ctl-privacy-hero">
		<div class="container custom_container">
			<h1 class="ctl-privacy-hero__title"><?php echo esc_html( $privacy['title'] ); ?></h1>
			<p class="ctl-privacy-hero__intro mb-0"><?php echo esc_html( $privacy['intro'] ); ?></p>
		</div>
	</section>

	<?php foreach ( $privacy['sections'] as $index => $section ) : ?>
		<section class="ctl-privacy-section<?php echo 0 === $index ? ' ctl-privacy-section--first' : ''; ?>">
			<div class="container custom_container">
				<h2 class="ctl-privacy-section__title"><?php echo esc_html( $section['title'] ); ?></h2>
				<?php if ( ! empty( $section['lead'] ) ) : ?>
					<p class="ctl-privacy-section__lead"><?php echo esc_html( $section['lead'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $section['bullets'] ) ) : ?>
					<ul class="ctl-privacy-list">
						<?php foreach ( $section['bullets'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
	<?php endforeach; ?>
</div>

<?php
get_footer();
