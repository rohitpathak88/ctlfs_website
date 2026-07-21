<?php
/**
 * Dynamic Home contact section.
 *
 * @package CTL_Financial_Child
 */

$phone   = get_theme_mod( 'cjl_phone', '' );
$email   = get_theme_mod( 'cjl_email', '' );
$address = get_theme_mod( 'cjl_address', '' );
?>

<section id="contact" class="contact-section ctl-contact-section">
	<div class="container custom_container">
		<h2 class="text-center text-uppercase mb-0 big_heading"><?php esc_html_e( 'Let’s connect', 'cjl-financial-child' ); ?></h2>
		<div class="reach_out ctl-contact-section__panel">
			<h2 class="mb-4 back_white_text_gradient fw-light title"><?php esc_html_e( 'Let’s Build Stronger Fund Operations—Together.', 'cjl-financial-child' ); ?></h2>
			<p class="lead"><?php esc_html_e( 'Entrust your fund operations to a partner defined by precision, discretion, and strategic foresight. We don’t simply administer funds—we architect operational confidence.', 'cjl-financial-child' ); ?></p>

			<div class="row align-items-start mt-5">
				<div class="col-lg-6 mb-4 mb-lg-0">
					<form id="ctlContactForm" class="ctl-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
						<input type="hidden" name="action" value="ctl_home_contact_form">
						<?php wp_nonce_field( 'ctl_home_contact', 'nonce' ); ?>
						<div class="ctl-contact-form__trap" aria-hidden="true">
							<label for="contact-website"><?php esc_html_e( 'Website', 'cjl-financial-child' ); ?></label>
							<input type="text" id="contact-website" name="website" tabindex="-1" autocomplete="off">
						</div>

						<div class="mb-4">
							<label for="contact-name" class="mb-1 fw-medium"><?php esc_html_e( 'Your Name', 'cjl-financial-child' ); ?> <span aria-hidden="true">*</span></label>
							<input type="text" id="contact-name" name="name" class="form-control" autocomplete="name" required>
						</div>
						<div class="mb-4">
							<label for="contact-email" class="mb-1 fw-medium"><?php esc_html_e( 'Email Address', 'cjl-financial-child' ); ?> <span aria-hidden="true">*</span></label>
							<input type="email" id="contact-email" name="email" class="form-control" autocomplete="email" required>
						</div>
						<div class="mb-4">
							<label for="contact-company" class="mb-1 fw-medium"><?php esc_html_e( 'Company Name', 'cjl-financial-child' ); ?></label>
							<input type="text" id="contact-company" name="company" class="form-control" autocomplete="organization">
						</div>
						<div class="mb-4">
							<label for="contact-message" class="mb-1 fw-medium"><?php esc_html_e( 'Message', 'cjl-financial-child' ); ?> <span aria-hidden="true">*</span></label>
							<textarea id="contact-message" name="message" class="form-control" rows="5" required></textarea>
						</div>
						<button type="submit" class="btn btn-danger btn-lg rounded-0">
							<span class="ctl-contact-form__submit-label"><?php esc_html_e( 'Submit', 'cjl-financial-child' ); ?></span>
						</button>
						<p id="ctlContactStatus" class="ctl-contact-form__status mt-3 mb-0" role="status" aria-live="polite"></p>
					</form>
				</div>

				<div class="col-lg-6">
					<div class="contact-info ps-lg-5 mt-4">
						<h3 class="mb-4 text-uppercase"><?php esc_html_e( 'Contact Info', 'cjl-financial-child' ); ?></h3>
						<hr>
						<?php if ( $phone ) : ?>
							<div class="mb-4">
								<small class="lead text-uppercase mb-2"><?php esc_html_e( 'Phone', 'cjl-financial-child' ); ?></small>
								<p><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
							</div>
						<?php endif; ?>
						<?php if ( $email ) : ?>
							<div class="mb-4">
								<small class="lead text-uppercase mb-2"><?php esc_html_e( 'Email Address', 'cjl-financial-child' ); ?></small>
								<p><a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></p>
							</div>
						<?php endif; ?>
						<?php if ( $address ) : ?>
							<div>
								<small class="lead text-uppercase mb-2"><?php esc_html_e( 'Service Area', 'cjl-financial-child' ); ?></small>
								<p><?php echo wp_kses_post( nl2br( esc_html( $address ) ) ); ?></p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
