<?php
/**
 * CTL-Doc Home page content.
 *
 * This keeps source-approved Home copy in one reusable location while the
 * visual composition remains in focused template parts.
 *
 * @package CTL_Financial_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the source-of-truth content used by the Home page.
 *
 * @return array<string, mixed>
 */
function ctl_financial_home_content() {
	static $content = null;

	if ( null !== $content ) {
		return $content;
	}

	$content = array(
		'hero'            => array(
			'eyebrow'     => 'Discover. Develop. Deliver.',
			'title'       => 'Elevating Global Fund Administration',
			'description' => 'A technology-enabled, institutionally governed platform delivering precision fund accounting, investor servicing, regulatory assurance, and strategic structuring across global markets.',
			'primary_cta' => 'Request a Private Consultation',
			'second_cta'  => 'Explore Our Capabilities',
		),
		'marquee'         => array(
			'Governance-driven operational excellence for alternative investment platforms',
			'Enterprise-grade, cloud-enabled infrastructure for global fund administration',
			'Precision, discretion, and accountability across the fund lifecycle',
			'Structured governance, regulatory alignment, and operational precision',
		),
		'services'        => array(
			array(
				'title'       => 'Fund Accounting & NAV Calculation',
				'description' => 'We deliver institutionally governed fund accounting and independent NAV calculation supported by robust controls and technology-driven validation frameworks.',
				'icon'        => 'wealth_advisory_icon.png',
				'slug'        => 'fund-accounting-nav-calculation',
				'url'         => ctl_financial_service_url( 'fund-accounting-nav-calculation' ),
			),
			array(
				'title'       => 'Investor Services & Reporting',
				'description' => 'Secure digital channels and precision reporting that enhance investor clarity, responsiveness, and confidence.',
				'icon'        => 'asset_advisory_icon.png',
				'slug'        => 'investor-services-reporting',
				'url'         => ctl_financial_service_url( 'investor-services-reporting' ),
			),
			array(
				'title'       => 'Regulatory Compliance & Filing',
				'description' => 'Disciplined compliance monitoring and regulatory filing services aligned with jurisdiction-specific requirements.',
				'icon'        => 'capital_market_icon.png',
				'slug'        => 'regulatory-compliance-filing',
				'url'         => ctl_financial_service_url( 'regulatory-compliance-filing' ),
			),
			array(
				'title'       => 'Transfer Agency Services',
				'description' => 'Precise ownership records and seamless processing of subscriptions, redemptions, and transfers.',
				'icon'        => 'wealth_advisory_icon.png',
				'slug'        => 'transfer-agency-services',
				'url'         => ctl_financial_service_url( 'transfer-agency-services' ),
			),
			array(
				'title'       => 'Fund Setup & Operational Launch Support',
				'description' => 'Administrative framework, documentation, and service coordination for a smooth and confident launch.',
				'icon'        => 'asset_advisory_icon.png',
				'slug'        => 'fund-setup-operational-launch-support',
				'url'         => ctl_financial_service_url( 'fund-setup-operational-launch-support' ),
			),
		),
		'about'           => array(
			'title'       => 'Institutional Discipline. Fintech Precision.',
			'description' => 'We are a next-generation fund services firm operating at the intersection of institutional governance and advanced financial technology. Our integrated operating model brings together accounting rigor, regulatory intelligence, and investor transparency—engineered for performance-driven fund managers and global asset platforms. With a commitment to precision, discretion, and accountability, we act as a strategic extension of our clients’ operations—strengthening infrastructure while safeguarding reputation and investor trust.',
			'mission'     => array(
				'title' => 'Our Mission',
				'text'  => 'To deliver institutionally governed, technology-enabled fund services that combine precision, regulatory confidence, and transparency—empowering fund managers and global asset platforms to operate with clarity, control, and scale. We are committed to executing every mandate with discretion, accountability, and uncompromising accuracy.',
			),
			'vision'      => array(
				'title' => 'Vision',
				'text'  => 'To be a globally trusted fund services partner—setting the benchmark for institutional excellence through fintech innovation, disciplined governance, and data-driven intelligence. We envision a future where fund operations are seamlessly integrated, risk is proactively managed, and insight-led infrastructure enables sustainable growth across global markets.',
			),
		),
		'differentiators' => array(
			'title'       => 'Why Global Managers Choose Us',
			'description' => 'We combine discretion, rigor, and technology to deliver scalable infrastructure built for long-term performance.',
			'items'       => array(
				'Institutional governance frameworks',
				'Fintech-enabled operational precision',
				'Cross-jurisdictional expertise',
				'Advanced data security protocols',
				'Partnership-driven engagement model',
			),
		),
		'team'            => array(
			'title'            => 'Institutional Discipline. Operational Precision.',
			'description'      => 'We are a next-generation fund services firm delivering institutional-grade solutions to investment managers, asset managers, and global financial platforms. Operating at the intersection of financial governance and advanced technology, we provide the operational infrastructure that modern investment organizations require to scale with confidence.',
			'description_2'    => 'Our model is built on a foundation of precision, accountability, and regulatory discipline. By integrating fund accounting expertise, investor servicing capabilities, and compliance intelligence, we enable our clients to focus on what matters most—generating performance and delivering value to their investors.',
			'description_3'    => 'In an increasingly complex regulatory and operational landscape, we act as a trusted partner—bringing clarity, control, and transparency to every stage of the fund lifecycle.',
			'expertise_title'  => 'Expertise that drives confidence',
			'expertise'        => 'Our team is composed of highly experienced professionals from fund administration, financial accounting, compliance advisory, and financial technology backgrounds. Each member brings deep industry knowledge and a commitment to operational excellence.',
			'expertise_extra'  => 'Working as a strategic extension of our clients’ organizations, our specialists deliver disciplined execution across accounting, investor services, compliance, and fund operations.',
			'expertise_extra_2'=> 'What distinguishes our team is not only technical expertise but also a culture of accountability, discretion, and partnership. We approach every client relationship with a long-term perspective—ensuring operational stability, regulatory alignment, and consistent service quality.',
			'experts_title'    => 'Meet the expert behind building your vision',
			'experts_intro'    => 'Driven by expertise, focused on building your vision.',
			'experts'          => array(
				array(
					'name'      => 'Dilip Dixit',
					'role'      => 'Founder at CTL',
					'image'     => 'dilip-dixit.png',
					'linkedin'  => 'https://www.linkedin.com/in/dilip-dixit-ba4104370/',
					'link_name' => true,
					'show_rule' => false,
				),
				array(
					'name'      => 'Umesh Salvi',
					'role'      => 'Managing Director at CTL',
					'image'     => 'umesh-salvi.png',
					'linkedin'  => 'https://www.linkedin.com/in/umesh-salvi-ba8b1628/',
					'link_name' => true,
					'show_rule' => false,
				),
				array(
					'name'      => 'Jayesh Khaitan',
					'role'      => 'Managing Director',
					'image'     => 'jayesh-khaitan.png',
					'linkedin'  => 'https://www.linkedin.com/in/jayesh-khaitan-4284963b/',
					'link_name' => true,
					'show_rule' => true,
				),
				array(
					'name'      => 'Yogesh Darji',
					'role'      => 'Head of Business Development',
					'image'     => 'yogesh-darji.png',
					'linkedin'  => 'https://www.linkedin.com/in/yogeshh-darji-79420325/',
					'link_name' => true,
					'show_rule' => false,
				),
			),
			'impact_title'     => 'Our Impact',
			'impact_subtitle'  => 'Performance Backed by Results',
			'impact'           => array(
				array( 'value' => '75+', 'label' => 'AIFs Onboarded' ),
				array( 'value' => '252 +', 'label' => 'Team of Employees' ),
				array( 'value' => '~60%', 'label' => 'Share in Securitisation at PAN India' ),
				array( 'value' => '~29%', 'label' => 'Share in NCDs at PAN India' ),
				array( 'value' => '1000+', 'label' => 'Security Trustee' ),
				array( 'value' => 'AUM', 'label' => '~ INR 30 lakh crores' ),
			),
			'cta_title'        => 'Powering the Next Generation of Investment Platforms',
			'cta_text'         => 'Discover how our institutional-grade fund services can strengthen your operational infrastructure and enhance investor confidence.',
			'cta_primary'      => 'Start a Conversation',
			'cta_secondary'    => 'Explore Our Services',
		),
		'global'          => array(
			'title'       => 'Worldwide Trust',
			'description' => 'Institutional-grade fund services designed for global investment platforms, with disciplined governance and technology-enabled precision across jurisdictions.',
		),
		'faq'             => array(
			array( 'What categories of clients do you serve?', 'We provide services to institutional fund managers, asset managers, and global investment platforms requiring structured governance, regulatory alignment, and operational precision.' ),
			array( 'What fund structures are within your scope?', 'Our services extend to multi-asset, multi-currency, and alternative investment fund structures, subject to applicable regulatory and jurisdictional requirements.' ),
			array( 'How is accuracy and valuation integrity maintained?', 'Fund accounting and NAV calculations are delivered through institutionally governed frameworks, incorporating layered controls, independent oversight, and audit-ready documentation.' ),
			array( 'Do you support cross-jurisdictional fund operations?', 'Yes. We support multi-jurisdictional fund operations, ensuring alignment with local regulatory requirements while maintaining global operational consistency.' ),
			array( 'What investor servicing capabilities do you provide?', 'We deliver secure investor servicing and reporting solutions, including capital activity management, performance reporting, and customized institutional disclosures.' ),
			array( 'What is your role in regulatory compliance?', 'We provide ongoing compliance monitoring, regulatory filings, and governance coordination, in alignment with jurisdiction-specific mandates and evolving regulatory standards.' ),
			/*
			array( 'Do you provide fund formation and launch support?', 'Yes. We provide fund setup and structuring support, including operational framework design and coordination with legal and advisory service providers.' ),
			array( 'How does your service model differ from traditional administrators?', 'Our model integrates institutional governance, advanced technology, and partnership-driven engagement, designed to deliver scalable and risk-aware fund infrastructure.' ),
			array( 'What measures are in place to ensure data security?', 'We operate under advanced data security and access control protocols, supported by secure digital environments and confidentiality safeguards.' ),
			array( 'What is your service delivery methodology?', 'Our delivery methodology follows a disciplined four-stage framework: Understand, Design, Execute, and Support.' ),
			array( 'Are services scalable over time?', 'Yes. Our operating model is designed to support scalability and long-term operational sustainability.' ),
			array( 'How may prospective clients initiate engagement?', 'Engagements typically begin with a confidential consultation to assess requirements and define an appropriate service framework.' ),
			*/
		),
		'final_cta'       => array(
			'title'       => 'Built for Institutional Excellence.',
			'description' => 'Entrust your fund operations to a partner defined by precision, discretion, and strategic foresight. We don’t simply administer funds—we architect operational confidence.',
			'primary_cta' => 'Schedule a Strategic Discussion',
			'second_cta'  => 'Contact Our Global Team',
		),
	);

	return $content;
}
