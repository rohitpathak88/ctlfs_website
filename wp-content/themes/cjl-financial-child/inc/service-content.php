<?php
/**
 * Service detail page content (CTL-Doc source).
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * All service definitions keyed by page slug.
 *
 * @return array<string, array<string, mixed>>
 */
function ctl_financial_service_catalog() {
	static $catalog = null;

	if ( null !== $catalog ) {
		return $catalog;
	}

	$catalog = array(
		'fund-accounting-nav-calculation'      => array(
			'title'       => 'Fund Accounting & NAV Calculation',
			'subtitle'    => 'Accurate, timely net asset value calculations with multi-currency support.',
			'intro_title' => 'Precision Without Compromise',
			'intro'       => array(
				'In today’s regulated investment environment, accuracy is not optional—it is foundational. Our Fund Accounting & Independent NAV services are designed to deliver institutional-grade precision, governance integrity, and operational transparency across complex fund structures.',
				'We operate as a disciplined extension of your investment operations, combining rigorous accounting standards with advanced technology frameworks to ensure every valuation is independently verified, fully reconciled, and audit-ready at all times.',
				'From multi-asset portfolios to cross-border structures, our operating model ensures accuracy, regulatory alignment, and investor confidence—without operational friction.',
			),
			'approach'    => array(
				'intro' => 'We integrate accounting expertise with technology-enabled validation systems to create a controlled, repeatable, and transparent NAV process.',
				'items' => array(
					array( 'title' => 'Segregation of duties & independent oversight', 'text' => 'Independent oversight strengthens governance, ensuring accuracy, transparency, and operational integrity.' ),
					array( 'title' => 'Automated reconciliation and break management', 'text' => 'Discrepancies are detected early and resolved through structured exception management.' ),
					array( 'title' => 'Multi-jurisdiction regulatory alignment', 'text' => 'Our frameworks ensure consistent reporting while adapting to evolving global regulations.' ),
					array( 'title' => 'Real-time data transparency', 'text' => 'Access to accurate and up-to-date financial data that supports informed decision-making.' ),
				),
			),
			'expertise'   => array(
				array( 'title' => 'Multi-Asset, Multi-Currency Fund Accounting', 'text' => 'Manage diverse portfolios with seamless accounting across multiple asset classes and currencies. Ensure accurate valuations, automated reporting, and real-time financial insights.' ),
				array( 'title' => 'Independent NAV Oversight', 'text' => 'Structured, independently governed NAV calculation with validation checkpoints, pricing verification, and exception escalation protocols.' ),
				array( 'title' => 'Advanced Reconciliation Architecture', 'text' => 'Technology-enabled reconciliations across custodians, brokers, counterparties, and internal records—designed to identify discrepancies early.' ),
				array( 'title' => 'Financial Statement & Audit Coordination', 'text' => 'Preparation of periodic financial statements aligned with applicable GAAP/IFRS standards, supported by seamless auditor coordination.' ),
			),
			'benefits'    => array(
				'Preserves valuation integrity',
				'Enhances investor confidence',
				'Strengthens regulatory defensibility',
				'Reduces operational risk',
				'Supports scalable growth',
			),
			'benefits_note' => 'Our institutional governance framework ensures your fund operations remain resilient, compliant, and performance-focused across jurisdictions.',
			'process'     => array(
				array( 'title' => 'Understand', 'text' => 'Deep discovery of fund structure, valuation policies, and reporting requirements.' ),
				array( 'title' => 'Design', 'text' => 'Tailored accounting model, reconciliation framework, and audit-ready documentation.' ),
				array( 'title' => 'Execute', 'text' => 'Accurate, timely NAV delivery with layered quality control and oversight.' ),
				array( 'title' => 'Support', 'text' => 'Ongoing partnership, exception management, and continuous improvement.' ),
			),
			'faq'         => array(
				array( 'How is NAV accuracy maintained?', 'Through institutionally governed frameworks with layered controls, independent oversight, and audit-ready documentation.' ),
				array( 'Do you support multi-currency portfolios?', 'Yes. Our model supports multi-asset, multi-currency fund accounting and reporting.' ),
				array( 'How do we begin?', 'Engagements typically begin with a confidential consultation to assess requirements and define the service framework.' ),
			),
			'cta_title'   => 'Strengthen Your Accounting Infrastructure',
			'cta_text'    => 'Partner with a disciplined, technology-enabled fund accounting team built for precision, scale, and regulatory confidence.',
			'cta_label'   => 'Schedule a Consultation',
			'icon'        => 'wealth_advisory_icon.png',
		),
		'investor-services-reporting'          => array(
			'title'       => 'Investor Services & Reporting',
			'subtitle'    => 'Transparent investor communication and structured reporting designed for institutional confidence.',
			'intro_title' => 'Transparency That Builds Trust',
			'intro'       => array(
				'In today’s global investment environment, investors expect more than performance—they expect clarity, accessibility, and consistent communication.',
				'Our Investor Services & Reporting framework delivers transparent investor engagement, structured reporting, and seamless communication across the investor lifecycle.',
				'From onboarding to ongoing communications, our model ensures operational efficiency, regulatory transparency, and exceptional service standards.',
			),
			'approach'    => array(
				'intro' => 'We combine specialized investor servicing expertise with secure digital infrastructure to create a transparent and responsive investor experience.',
				'items' => array(
					array( 'title' => 'Secure investor onboarding and KYC verification', 'text' => 'Structured documentation workflows and identity verification procedures.' ),
					array( 'title' => 'Structured investor communication workflows', 'text' => 'Consistent, professional communication at every investor touchpoint.' ),
					array( 'title' => 'Automated reporting and statement distribution', 'text' => 'Accurate, timely statements and performance updates delivered with clarity.' ),
					array( 'title' => 'Centralized investor data management', 'text' => 'Secure recordkeeping that preserves data integrity and confidentiality.' ),
				),
			),
			'expertise'   => array(
				array( 'title' => 'Investor Onboarding & Account Management', 'text' => 'Efficient onboarding supported by secure documentation workflows and structured account management.' ),
				array( 'title' => 'Capital Call & Distribution Management', 'text' => 'Accurate management of capital calls, distributions, and allocations with timely notifications.' ),
				array( 'title' => 'Investor Reporting & Performance Statements', 'text' => 'Institutional-quality reporting including statements, capital account summaries, and performance updates.' ),
				array( 'title' => 'Secure Investor Communication Platforms', 'text' => 'Technology-enabled channels that provide controlled access to reports, documents, and fund updates.' ),
			),
			'benefits'    => array(
				'Strengthens investor relationships',
				'Enhances reporting transparency',
				'Improves operational efficiency',
				'Ensures regulatory alignment',
				'Supports investor confidence and retention',
			),
			'benefits_note' => 'Every communication, report, and transaction is delivered with precision, transparency, and institutional discipline.',
			'process'     => array(
				array( 'title' => 'Understand', 'text' => 'Map investor lifecycle, reporting needs, and communication channels.' ),
				array( 'title' => 'Design', 'text' => 'Define servicing workflows, statement packs, and secure portals.' ),
				array( 'title' => 'Execute', 'text' => 'Deliver capital activity management and institutional disclosures.' ),
				array( 'title' => 'Support', 'text' => 'Continuous refinement of investor experience and reporting quality.' ),
			),
			'faq'         => array(
				array( 'What investor reporting do you provide?', 'Capital activity management, performance reporting, and customized institutional disclosures.' ),
				array( 'Are communications secure?', 'Yes. We operate secure digital channels with confidentiality safeguards.' ),
				array( 'Can reporting be customized?', 'Yes. We support custom institutional reporting frameworks.' ),
			),
			'cta_title'   => 'Elevate Your Investor Experience',
			'cta_text'    => 'Partner with a specialized investor services team built for modern investment platforms.',
			'cta_label'   => 'Schedule a Consultation',
			'icon'        => 'asset_advisory_icon.png',
		),
		'regulatory-compliance-filing'         => array(
			'title'       => 'Regulatory Compliance & Filing',
			'subtitle'    => 'Structured compliance frameworks and accurate regulatory filings designed to support global fund governance.',
			'intro_title' => 'Compliance That Protects Integrity',
			'intro'       => array(
				'Regulatory expectations continue to evolve across jurisdictions, requiring rigorous compliance standards and transparent reporting practices.',
				'We act as a strategic compliance partner, supporting fund managers in maintaining adherence while minimizing operational risk.',
				'From routine filings to ongoing monitoring, our framework ensures transparency, governance, and operational integrity.',
			),
			'approach'    => array(
				'intro' => 'We combine deep regulatory expertise with structured workflows and technology-enabled compliance systems.',
				'items' => array(
					array( 'title' => 'Structured filing schedules and reporting calendars', 'text' => 'Clear timelines that keep every obligation on track.' ),
					array( 'title' => 'Multi-jurisdiction compliance monitoring', 'text' => 'Coordinated frameworks across evolving regulatory environments.' ),
					array( 'title' => 'Automated documentation and filing workflows', 'text' => 'Consistent, controlled preparation of regulatory submissions.' ),
					array( 'title' => 'Audit-ready compliance documentation', 'text' => 'Recordkeeping that supports inspections and governance reviews.' ),
				),
			),
			'expertise'   => array(
				array( 'title' => 'Regulatory Filings & Periodic Reporting', 'text' => 'Preparation and submission of required filings aligned with regulatory timelines.' ),
				array( 'title' => 'Compliance Monitoring & Governance', 'text' => 'Ongoing monitoring so funds operate within established compliance frameworks.' ),
				array( 'title' => 'Multi-Jurisdiction Regulatory Alignment', 'text' => 'Coordinated compliance for funds operating across multiple regulatory environments.' ),
				array( 'title' => 'Documentation & Audit Support', 'text' => 'Comprehensive records to support inspections, reviews, and verifications.' ),
			),
			'benefits'    => array(
				'Reduces regulatory risk and exposure',
				'Ensures timely and accurate filings',
				'Strengthens governance and transparency',
				'Supports multi-jurisdiction compliance',
				'Enhances operational confidence',
			),
			'benefits_note' => 'Every regulatory obligation is managed with discipline, accuracy, and accountability.',
			'process'     => array(
				array( 'title' => 'Understand', 'text' => 'Identify jurisdiction-specific mandates and filing calendars.' ),
				array( 'title' => 'Design', 'text' => 'Build monitoring controls and disclosure workflows.' ),
				array( 'title' => 'Execute', 'text' => 'Deliver accurate filings and ongoing compliance tracking.' ),
				array( 'title' => 'Support', 'text' => 'Adapt frameworks as regulatory standards evolve.' ),
			),
			'faq'         => array(
				array( 'Which jurisdictions do you support?', 'We support multi-jurisdictional operations with local alignment and global consistency.' ),
				array( 'Do you assist with audits?', 'Yes. We maintain audit-ready documentation and coordination support.' ),
				array( 'How do engagements start?', 'With a confidential consultation to define the appropriate compliance framework.' ),
			),
			'cta_title'   => 'Strengthen Your Compliance Framework',
			'cta_text'    => 'Partner with a compliance team designed for modern investment platforms and institutional standards.',
			'cta_label'   => 'Schedule a Consultation',
			'icon'        => 'capital_market_icon.png',
		),
		'transfer-agency-services'             => array(
			'title'       => 'Transfer Agency Services',
			'subtitle'    => 'Comprehensive investor record management and transaction processing designed for seamless fund operations.',
			'intro_title' => 'Investor Administration That Ensures Accuracy',
			'intro'       => array(
				'Efficient investor administration is essential for maintaining trust, transparency, and operational discipline.',
				'Our Transfer Agency Services manage the complete investor lifecycle—from onboarding to transaction processing and reporting.',
				'Every transaction is executed with institutional-grade control and transparency.',
			),
			'approach'    => array(
				'intro' => 'We combine disciplined operational processes with technology-enabled recordkeeping systems.',
				'items' => array(
					array( 'title' => 'Investor onboarding and account setup', 'text' => 'Defined procedures for accurate account establishment.' ),
					array( 'title' => 'Subscription, redemption, and transfer processing', 'text' => 'Strict validation to ensure operational control.' ),
					array( 'title' => 'Secure investor record maintenance', 'text' => 'Precise ownership records throughout the investment lifecycle.' ),
					array( 'title' => 'Transaction reconciliation and verification', 'text' => 'Controlled processes that keep every activity auditable.' ),
				),
			),
			'expertise'   => array(
				array( 'title' => 'Investor Onboarding & Account Administration', 'text' => 'Structured onboarding, documentation management, and accurate investor records.' ),
				array( 'title' => 'Subscription & Redemption Processing', 'text' => 'Efficient processing of subscriptions, redemptions, and transfers with validation checkpoints.' ),
				array( 'title' => 'Investor Recordkeeping & Data Management', 'text' => 'Detailed registers, ownership records, and transaction histories with secure protocols.' ),
				array( 'title' => 'Investor Communication & Reporting', 'text' => 'Confirmations, statements, and transaction reporting for clarity and transparency.' ),
			),
			'benefits'    => array(
				'Ensures accurate investor recordkeeping',
				'Streamlines subscription and redemption processing',
				'Strengthens transparency in investor transactions',
				'Enhances operational efficiency',
				'Builds investor confidence',
			),
			'benefits_note' => 'Investor administration is managed with precision, discipline, and transparency.',
			'process'     => array(
				array( 'title' => 'Understand', 'text' => 'Assess registry, KYC, and transaction processing requirements.' ),
				array( 'title' => 'Design', 'text' => 'Implement transfer agency workflows and control points.' ),
				array( 'title' => 'Execute', 'text' => 'Process ownership changes with institutional-grade accuracy.' ),
				array( 'title' => 'Support', 'text' => 'Ongoing registry maintenance and investor communications.' ),
			),
			'faq'         => array(
				array( 'Do you manage the investor register?', 'Yes. We maintain precise ownership records and transaction histories.' ),
				array( 'Can you support KYC coordination?', 'Yes. Onboarding and KYC coordination support is part of our model.' ),
				array( 'How are transactions validated?', 'Through structured validation checkpoints and reconciliation protocols.' ),
			),
			'cta_title'   => 'Streamline Your Investor Administration',
			'cta_text'    => 'Partner with a transfer agency team built for modern investment platforms and institutional standards.',
			'cta_label'   => 'Schedule a Consultation',
			'icon'        => 'wealth_advisory_icon.png',
		),
		'fund-setup-operational-launch-support' => array(
			'title'       => 'Fund Setup & Operational Launch Support',
			'subtitle'    => 'Operational launch support that establishes a strong administrative and reporting foundation.',
			'intro_title' => 'Preparing Funds for Operational Success',
			'intro'       => array(
				'Launching a fund requires a reliable administrative and operational framework that supports accurate reporting and investor servicing.',
				'We help investment managers prepare funds for smooth day-to-day administration from the outset.',
				'By focusing on operational readiness, we help ensure funds begin with clarity, organization, and scalable processes.',
			),
			'approach'    => array(
				'intro' => 'We combine administrative expertise with structured implementation frameworks to support efficient fund launches.',
				'items' => array(
					array( 'title' => 'Administrative setup and operational readiness', 'text' => 'Systems and workflows prepared before day one.' ),
					array( 'title' => 'Coordination with external service providers', 'text' => 'Aligned stakeholders across advisory and administration partners.' ),
					array( 'title' => 'Accounting and reporting framework setup', 'text' => 'Templates and processes ready for ongoing administration.' ),
					array( 'title' => 'Launch coordination and implementation', 'text' => 'Clear timelines that support a confident go-live.' ),
				),
			),
			'expertise'   => array(
				array( 'title' => 'Operational Setup & Administrative Readiness', 'text' => 'Preparation of systems, workflows, and reporting processes required for effective fund administration.' ),
				array( 'title' => 'Documentation & Data Coordination', 'text' => 'Organization of required operational documentation and data inputs with external advisors.' ),
				array( 'title' => 'Accounting & Reporting Framework Setup', 'text' => 'Configuration of fund accounting processes, reporting templates, and investor communication structures.' ),
				array( 'title' => 'Launch Coordination & Service Provider Alignment', 'text' => 'Operational coordination with administrators, custodians, and other providers.' ),
			),
			'benefits'    => array(
				'Establishes a strong administrative foundation',
				'Ensures operational readiness from day one',
				'Streamlines fund launch coordination',
				'Supports accurate reporting and investor servicing',
				'Enables scalable and efficient fund administration',
			),
			'benefits_note' => 'Every new fund begins with the administrative structure, reporting systems, and workflows needed for ongoing operations.',
			'process'     => array(
				array( 'title' => 'Understand', 'text' => 'Define structure, jurisdictions, and launch dependencies.' ),
				array( 'title' => 'Design', 'text' => 'Build the administrative framework and provider plan.' ),
				array( 'title' => 'Execute', 'text' => 'Implement processes, documentation, and onboarding flows.' ),
				array( 'title' => 'Support', 'text' => 'Stabilize post-launch operations and hand over cleanly.' ),
			),
			'faq'         => array(
				array( 'Do you support fund formation?', 'Yes. We provide setup and structuring support including operational framework design.' ),
				array( 'Do you coordinate with legal advisors?', 'Yes. We coordinate with legal and advisory service providers as required.' ),
				array( 'When should we engage you?', 'Ideally before launch, so administrative readiness is in place from day one.' ),
			),
			'cta_title'   => 'Launch Your Fund with Confidence',
			'cta_text'    => 'Partner with a team that provides structured operational setup support and administrative readiness.',
			'cta_label'   => 'Schedule a Consultation',
			'icon'        => 'asset_advisory_icon.png',
		),
	);

	return $catalog;
}

/**
 * Resolve service content for the current page.
 *
 * @param string $slug Optional page slug.
 * @return array<string, mixed>|null
 */
function ctl_financial_get_service_content( $slug = '' ) {
	if ( '' === $slug ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
	}

	$catalog = ctl_financial_service_catalog();
	return isset( $catalog[ $slug ] ) ? $catalog[ $slug ] : null;
}

/**
 * Public URL for a service by slug.
 *
 * @param string $slug Service page slug.
 * @return string
 */
function ctl_financial_service_url( $slug ) {
	$page = get_page_by_path( 'services/' . $slug );
	if ( $page ) {
		return get_permalink( $page );
	}

	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page );
	}

	return home_url( '/services/' . $slug . '/' );
}
