<?php
/**
 * Template Name: Service Detail
 *
 * Service detail page per Figma (node 3515:469) — hero, intro band,
 * approach, core expertise cards, benefit pills, CTA band and contact.
 *
 * @package CJL_Financial
 */

get_header();

$subtitle = has_excerpt() ? get_the_excerpt() : 'Accurate, timely net asset value calculations with multi-currency support.';

$approach_items = array(
    array(
        'icon'  => 'approach_icon_1.svg',
        'title' => 'Segregation of duties & independent oversight',
        'text'  => 'Independent oversight strengthens governance, ensuring accuracy, transparency, and operational integrity.',
    ),
    array(
        'icon'  => 'approach_icon_2.svg',
        'title' => 'Automated reconciliation and break management',
        'text'  => 'Discrepancies are detected early and resolved through structured exception management.',
    ),
    array(
        'icon'  => 'approach_icon_3.svg',
        'title' => 'Multi-jurisdiction regulatory alignment',
        'text'  => 'Our frameworks ensure consistent reporting while adapting to evolving global regulations.',
    ),
    array(
        'icon'  => 'approach_icon_4.svg',
        'title' => 'Real-time data transparency',
        'text'  => 'Access to accurate and up-to-date financial data that supports informed decision-making.',
    ),
);

$expertise_cards = array(
    array(
        'number' => '01.',
        'title'  => 'Multi-Asset, Multi-Currency Fund Accounting',
        'text'   => 'Manage diverse portfolios with seamless accounting across multiple asset classes and currencies. Ensure accurate valuations, automated reporting, and real-time financial insights.',
    ),
    array(
        'number' => '02.',
        'title'  => 'Independent NAV Oversight',
        'text'   => 'Structured, independently governed NAV calculation with validation checkpoints, pricing verification, and exception escalation protocols to ensure transparency and investor protection.',
    ),
    array(
        'number' => '03.',
        'title'  => 'Advanced Reconciliation Architecture',
        'text'   => 'Technology-enabled reconciliations across custodians, brokers, counterparties, and internal records—designed to identify discrepancies early and resolve them efficiently.',
    ),
    array(
        'number' => '04.',
        'title'  => 'Financial Statement & Audit Coordination',
        'text'   => 'Preparation of periodic financial statements aligned with applicable GAAP/IFRS standards, supported by seamless coordination with auditors to ensure timely and efficient completion cycles.',
    ),
);

$benefit_pills = array(
    'Preserves valuation integrity',
    'Enhances investor confidence',
    'Strengthens regulatory defensibility',
    'Reduces operational risk',
    'Supports scalable growth',
);
?>

<div class="service-detail-page">

    <!-- Hero -->
    <section class="service-detail-hero">
        <div class="container custom_container">
            <h1 class="accent-gradient fw-light text-capitalize"><?php the_title(); ?></h1>
            <p class="subtitle text-capitalize fw-medium mb-0"><?php echo esc_html($subtitle); ?></p>
        </div>
    </section>

    <!-- Intro Band -->
    <section class="service-intro-band">
        <div class="container custom_container">
            <h2 class="back_white_text_gradient fw-light title text-capitalize mb-4">Precision Without Compromise</h2>
            <p class="lead mb-3">In today&rsquo;s regulated investment environment, accuracy is not optional&mdash;it is foundational. Our Fund Accounting &amp; Independent NAV services are designed to deliver institutional-grade precision, governance integrity, and operational transparency across complex fund structures.</p>
            <p class="lead mb-3">We operate as a disciplined extension of your investment operations, combining rigorous accounting standards with advanced technology frameworks to ensure every valuation is independently verified, fully reconciled, and audit-ready at all times.</p>
            <p class="lead mb-0">From multi-asset portfolios to cross-border structures, our operating model ensures accuracy, regulatory alignment, and investor confidence&mdash;without operational friction.</p>
        </div>
    </section>

    <!-- Our Approach -->
    <section class="service-approach" style="background-image:url(<?php echo esc_url(cjl_get_image_url('service_gradient_band.svg')); ?>);">
        <div class="container custom_container">
            <h2 class="back_white_text_gradient fw-light title text-capitalize mb-3">Our Approach</h2>
            <p class="lead mb-5">We integrate accounting expertise with technology-enabled validation systems to create a controlled, repeatable, and transparent NAV process. Every calculation undergoes structured oversight, layered reconciliations, and exception-based review protocols to ensure valuation integrity.</p>
            <div class="row g-4">
                <?php foreach ($approach_items as $item): ?>
                    <div class="col-sm-6 col-lg-3">
                        <span class="approach-icon mb-4">
                            <img src="<?php echo esc_url(cjl_get_image_url($item['icon'])); ?>" alt="" loading="lazy" decoding="async">
                        </span>
                        <h3 class="approach-title text-white fw-normal"><?php echo esc_html($item['title']); ?></h3>
                        <p class="lead mb-0"><?php echo esc_html($item['text']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Core Expertise -->
    <section class="core-expertise">
        <div class="container custom_container">
            <h2 class="back_white_text_gradient fw-light title text-capitalize mb-5">Core Expertise</h2>
            <div class="row g-4">
                <?php foreach ($expertise_cards as $card): ?>
                    <div class="col-lg-6">
                        <div class="expertise-card">
                            <div class="number back_white_text_gradient text-capitalize"><?php echo esc_html($card['number']); ?></div>
                            <h3 class="card-title back_white_text_gradient fw-light text-capitalize"><?php echo esc_html($card['title']); ?></h3>
                            <p class="lead mb-0"><?php echo esc_html($card['text']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why It Matters -->
    <section class="why-matters">
        <div class="container custom_container text-center">
            <h2 class="back_white_text_gradient fw-light title text-capitalize mb-5">Why It Matters?</h2>
            <div class="benefit-pills mb-5">
                <?php foreach ($benefit_pills as $pill): ?>
                    <span class="benefit-pill back_white_text_gradient text-capitalize"><?php echo esc_html($pill); ?></span>
                <?php endforeach; ?>
            </div>
            <p class="lead mx-auto why-matters-note mb-0">Our institutional governance framework ensures your fund operations remain resilient, compliant, and performance-focused across jurisdictions.</p>
        </div>
    </section>

    <!-- CTA Band -->
    <section class="cta-band text-center">
        <div class="container custom_container">
            <h2 class="back_white_text_gradient fw-light title text-capitalize mb-3">Strengthen Your Accounting Infrastructure</h2>
            <p class="lead mb-5">Partner with a disciplined, technology-enabled fund accounting team built for precision, scale, and regulatory confidence.</p>
            <a href="#contact" class="btn-explore btn-explore-white">Schedule a Consultation</a>
        </div>
    </section>

    <?php
    // Let's Connect / contact block (shared with the front page).
    get_template_part('template-parts/contact-section');
    ?>

</div>

<?php
get_footer();
