<?php
/**
 * Child theme bootstrap for CTL Financial Home page work.
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/service-content.php';
require_once get_stylesheet_directory() . '/inc/home-content.php';
require_once get_stylesheet_directory() . '/inc/privacy-content.php';

/**
 * Free the /services/ URL prefix for hierarchical service pages.
 * The parent theme registers a CPT with the same slug, which otherwise 404s pages.
 */
function ctl_financial_child_remap_services_cpt( $args, $post_type ) {
	if ( 'services' !== $post_type ) {
		return $args;
	}

	$args['rewrite']     = array( 'slug' => 'service' );
	$args['has_archive'] = false;
	return $args;
}
add_filter( 'register_post_type_args', 'ctl_financial_child_remap_services_cpt', 20, 2 );

/**
 * Create/update Services parent + five detail pages and publish Privacy Policy.
 */
function ctl_financial_child_ensure_navigation_pages() {
	if ( get_option( 'ctl_nav_pages_version' ) === '1.6.0' ) {
		return;
	}

	$parent = get_page_by_path( 'services' );
	if ( ! $parent ) {
		$parent_id = wp_insert_post(
			array(
				'post_title'   => 'Services',
				'post_name'    => 'services',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			),
			true
		);
	} else {
		$parent_id = (int) $parent->ID;
	}

	if ( is_wp_error( $parent_id ) || ! $parent_id ) {
		return;
	}

	update_post_meta( $parent_id, '_wp_page_template', 'default' );

	$catalog = ctl_financial_service_catalog();
	foreach ( $catalog as $slug => $service ) {
		$existing = get_page_by_path( 'services/' . $slug );
		if ( ! $existing ) {
			$existing = get_page_by_path( $slug );
		}

		$page_data = array(
			'post_title'   => $service['title'],
			'post_name'    => $slug,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_parent'  => $parent_id,
			'post_excerpt' => $service['subtitle'],
			'post_content' => implode( "\n\n", $service['intro'] ),
		);

		if ( $existing ) {
			$page_data['ID'] = (int) $existing->ID;
			$page_id         = wp_update_post( $page_data, true );
		} else {
			$page_id = wp_insert_post( $page_data, true );
		}

		if ( ! is_wp_error( $page_id ) && $page_id ) {
			update_post_meta( $page_id, '_wp_page_template', 'template-service-detail.php' );
		}
	}

	$privacy = get_page_by_path( 'privacy-policy' );
	if ( $privacy && 'publish' !== $privacy->post_status ) {
		wp_update_post(
			array(
				'ID'          => (int) $privacy->ID,
				'post_status' => 'publish',
			)
		);
	}

	if ( $privacy ) {
		update_option( 'wp_page_for_privacy_policy', (int) $privacy->ID );
	}

	$teams = get_page_by_path( 'teams' );
	$team_content = ctl_financial_home_content()['team'];
	$teams_data   = array(
		'post_title'   => 'Teams',
		'post_name'    => 'teams',
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_excerpt' => isset( $team_content['description'] ) ? $team_content['description'] : '',
		'post_content' => isset( $team_content['expertise'] ) ? $team_content['expertise'] : '',
	);

	if ( $teams ) {
		$teams_data['ID'] = (int) $teams->ID;
		$teams_id         = wp_update_post( $teams_data, true );
	} else {
		$teams_id = wp_insert_post( $teams_data, true );
	}

	if ( ! is_wp_error( $teams_id ) && $teams_id ) {
		update_post_meta( $teams_id, '_wp_page_template', 'template-teams.php' );
	}

	$privacy_page = get_page_by_path( 'privacy-policy' );
	$privacy_copy = ctl_financial_privacy_content();
	$privacy_data = array(
		'post_title'   => $privacy_copy['title'],
		'post_name'    => 'privacy-policy',
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_content' => $privacy_copy['intro'],
		'post_excerpt' => $privacy_copy['intro'],
	);

	if ( $privacy_page ) {
		$privacy_data['ID'] = (int) $privacy_page->ID;
		$privacy_id         = wp_update_post( $privacy_data, true );
	} else {
		$privacy_id = wp_insert_post( $privacy_data, true );
	}

	if ( ! is_wp_error( $privacy_id ) && $privacy_id ) {
		update_post_meta( $privacy_id, '_wp_page_template', 'template-privacy-policy.php' );
		update_option( 'wp_page_for_privacy_policy', (int) $privacy_id );
	}

	$about_page    = get_page_by_path( 'about-us' );
	$about_content = ctl_financial_home_content()['about'];
	$about_data    = array(
		'post_title'   => 'About Us',
		'post_name'    => 'about-us',
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_excerpt' => isset( $about_content['title'] ) ? $about_content['title'] : '',
		'post_content' => isset( $about_content['description'] ) ? $about_content['description'] : '',
	);

	if ( $about_page ) {
		$about_data['ID'] = (int) $about_page->ID;
		$about_id         = wp_update_post( $about_data, true );
	} else {
		$about_id = wp_insert_post( $about_data, true );
	}

	if ( ! is_wp_error( $about_id ) && $about_id ) {
		update_post_meta( $about_id, '_wp_page_template', 'template-about-us.php' );
	}

	delete_option( 'rewrite_rules' );
	flush_rewrite_rules( false );
	update_option( 'ctl_nav_pages_version', '1.6.0' );
}
add_action( 'init', 'ctl_financial_child_ensure_navigation_pages', 30 );

/**
 * Turn the empty Services parent page into a simple index of detail pages.
 */
function ctl_financial_child_services_parent_content( $content ) {
	if ( ! is_page( 'services' ) || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}

	$page = get_queried_object();
	if ( ! $page || (int) $page->post_parent !== 0 ) {
		return $content;
	}

	$catalog = ctl_financial_service_catalog();
	$items   = '';
	foreach ( $catalog as $slug => $service ) {
		$items .= '<li><a href="' . esc_url( ctl_financial_service_url( $slug ) ) . '">' . esc_html( $service['title'] ) . '</a></li>';
	}

	return '<p>' . esc_html__( 'Explore our institutional fund services:', 'cjl-financial-child' ) . '</p><ul>' . $items . '</ul>';
}
add_filter( 'the_content', 'ctl_financial_child_services_parent_content' );

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

	wp_enqueue_script(
		'ctl-financial-home',
		get_stylesheet_directory_uri() . '/assets/js/home.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	if ( is_front_page() ) {
		// The parent script initially hides Home content; use a progressive
		// enhancement script that never makes content dependent on JavaScript.
		wp_dequeue_script( 'cjl-main-script' );

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
}
add_action( 'wp_enqueue_scripts', 'ctl_financial_child_enqueue_assets', 100 );
