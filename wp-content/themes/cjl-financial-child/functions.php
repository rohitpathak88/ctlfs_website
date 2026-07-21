<?php
/**
 * Child theme bootstrap for CTL Financial Home page work.
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/home-content.php';

/**
 * Replace the parent contact endpoint on the Home page with a validated,
 * rate-limited handler that keeps the visitor email in Reply-To rather than
 * spoofing the From header.
 */
remove_action( 'wp_ajax_cjl_contact_form', 'cjl_financial_handle_contact_form' );
remove_action( 'wp_ajax_nopriv_cjl_contact_form', 'cjl_financial_handle_contact_form' );

function ctl_financial_child_handle_home_contact_form() {
	if ( ! check_ajax_referer( 'ctl_home_contact', 'nonce', false ) ) {
		wp_send_json_error( array( 'message' => __( 'Your session has expired. Please refresh the page and try again.', 'cjl-financial-child' ) ), 403 );
	}

	if ( ! empty( $_POST['website'] ) ) {
		wp_send_json_success( array( 'message' => __( 'Thank you. Your message has been received.', 'cjl-financial-child' ) ) );
	}

	$ip_address = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	$rate_key   = 'ctl_contact_' . md5( $ip_address );
	$attempts   = (int) get_transient( $rate_key );

	if ( $attempts >= 5 ) {
		wp_send_json_error( array( 'message' => __( 'Please wait a few minutes before sending another message.', 'cjl-financial-child' ) ), 429 );
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$company = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_send_json_error( array( 'message' => __( 'Please complete all required fields with a valid email address.', 'cjl-financial-child' ) ), 422 );
	}

	$recipient = get_theme_mod( 'cjl_email', get_option( 'admin_email' ) );
	$recipient = is_email( $recipient ) ? $recipient : get_option( 'admin_email' );
	$subject   = sprintf( __( 'New Home contact enquiry — %s', 'cjl-financial-child' ), get_bloginfo( 'name' ) );
	$body      = sprintf(
		"Name: %s\nEmail: %s\nCompany: %s\n\nMessage:\n%s",
		$name,
		$email,
		$company ? $company : __( 'Not provided', 'cjl-financial-child' ),
		$message
	);
	$headers   = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	if ( ! wp_mail( $recipient, $subject, $body, $headers ) ) {
		set_transient( $rate_key, $attempts + 1, 15 * MINUTE_IN_SECONDS );
		wp_send_json_error( array( 'message' => __( 'We could not send your message. Please try again or use the contact details shown here.', 'cjl-financial-child' ) ), 500 );
	}

	set_transient( $rate_key, $attempts + 1, 15 * MINUTE_IN_SECONDS );
	wp_send_json_success( array( 'message' => __( 'Thank you for your message. Our team will be in touch shortly.', 'cjl-financial-child' ) ) );
}
add_action( 'wp_ajax_ctl_home_contact_form', 'ctl_financial_child_handle_home_contact_form' );
add_action( 'wp_ajax_nopriv_ctl_home_contact_form', 'ctl_financial_child_handle_home_contact_form' );

/**
 * Enqueue child-owned Home page styles after the parent theme styles.
 *
 * Keeping Home customisations in the child theme preserves the parent as a
 * vendor baseline and prevents unrelated pages from inheriting new styles.
 */
function ctl_financial_child_enqueue_assets() {
	wp_enqueue_style(
		'ctl-financial-child',
		get_stylesheet_uri(),
		array( 'cjl-responsive-style' ),
		wp_get_theme()->get( 'Version' )
	);

	if ( ! is_front_page() ) {
		return;
	}

	// The parent script initially hides Home content; use a progressive
	// enhancement script that never makes content dependent on JavaScript.
	wp_dequeue_script( 'cjl-main-script' );

	wp_enqueue_script(
		'ctl-financial-home',
		get_stylesheet_directory_uri() . '/assets/js/home.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_localize_script(
		'ctl-financial-home',
		'ctlHome',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'sending' => __( 'Sending…', 'cjl-financial-child' ),
			'submit'  => __( 'Submit', 'cjl-financial-child' ),
			'error'   => __( 'Something went wrong. Please try again.', 'cjl-financial-child' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'ctl_financial_child_enqueue_assets', 100 );
