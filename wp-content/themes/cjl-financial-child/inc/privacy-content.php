<?php
/**
 * Privacy Policy page content (Figma-aligned).
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Structured Privacy Policy content.
 *
 * @return array<string, mixed>
 */
function ctl_financial_privacy_content() {
	return array(
		'title' => 'Privacy Policy',
		'intro' => 'At Catalyst Fund Services, we are committed to protecting the privacy and confidentiality of the information shared with us. This Privacy Policy outlines how we collect, use, store, and safeguard personal data when you visit our website or interact with our services. By accessing our website or submitting information through our platform, you acknowledge and agree to the practices described in this policy.',
		'sections' => array(
			array(
				'title'   => 'Information We Collect',
				'lead'    => 'We may collect personal information that you voluntarily provide when you:',
				'bullets' => array(
					'Contact us through website forms',
					'Subscribe to newsletters or updates',
					'Request a consultation or service enquiry',
					'Engage with our investor or client communications',
				),
			),
			array(
				'title'   => 'How We Use Your Information',
				'lead'    => 'We use collected information to:',
				'bullets' => array(
					'Respond to enquiries and provide requested services',
					'Improve website functionality and user experience',
					'Send relevant updates where you have opted in',
					'Maintain security, compliance, and operational integrity',
				),
			),
			array(
				'title'   => 'Data Protection & Security',
				'lead'    => 'We apply institutional-grade controls to safeguard personal data, including:',
				'bullets' => array(
					'Restricted access based on operational need',
					'Secure digital environments and transmission practices',
					'Confidentiality safeguards across service workflows',
					'Ongoing monitoring of data-handling processes',
				),
			),
			array(
				'title'   => 'Sharing of Information',
				'lead'    => 'We do not sell personal information. Data may be shared only when required to:',
				'bullets' => array(
					'Deliver contracted services through approved partners',
					'Comply with applicable legal or regulatory obligations',
					'Protect the rights, safety, and integrity of our platform',
				),
			),
			array(
				'title'   => 'Your Choices',
				'lead'    => 'Depending on applicable law, you may request to:',
				'bullets' => array(
					'Access the personal information we hold about you',
					'Correct inaccurate or incomplete information',
					'Withdraw consent for optional communications',
					'Ask questions about how your data is processed',
				),
			),
			array(
				'title'   => 'Contact Us',
				'lead'    => 'If you have questions about this Privacy Policy or your personal data, please contact our team through the website contact form or the details published on our Contact section.',
				'bullets' => array(),
			),
		),
	);
}
