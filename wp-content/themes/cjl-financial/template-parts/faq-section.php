<?php
/**
 * FAQ Section Template Part
 *
 * @package CJL_Financial
 */

$faq_query = new WP_Query(array(
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

// Default FAQs if none exist
$default_faqs = array(
    array(
        'question' => 'What categories of clients do you serve?',
        'answer' => 'We provide services to institutional fund managers, asset managers, and global investment platforms requiring structured governance, regulatory alignment, and operational precision.',
        'order' => 1
    ),
    array(
        'question' => 'What fund structures are within your scope?',
        'answer' => 'Our services extend to multi-asset, multi-currency, and alternative investment fund structures, subject to applicable regulatory and jurisdictional requirements.',
        'order' => 2
    ),
    array(
        'question' => 'How is accuracy and valuation integrity maintained?',
        'answer' => 'Fund accounting and NAV calculations are delivered through institutionally governed frameworks, incorporating layered controls, independent oversight, and audit-ready documentation.',
        'order' => 3
    ),
    array(
        'question' => 'Do you support cross-jurisdictional fund operations?',
        'answer' => 'Yes. We support multi-jurisdictional fund operations, ensuring alignment with local regulatory requirements while maintaining global operational consistency.',
        'order' => 4
    ),
    array(
        'question' => 'What investor servicing capabilities do you provide?',
        'answer' => 'We deliver secure investor servicing and reporting solutions, including capital activity management, performance reporting, and customized institutional disclosures.',
        'order' => 5
    ),
    array(
        'question' => 'What is your role in regulatory compliance?',
        'answer' => 'We provide ongoing compliance monitoring, regulatory filings, and governance coordination, in alignment with jurisdiction-specific mandates and evolving regulatory standards.',
        'order' => 6
    ),
    array(
        'question' => 'Do you provide fund formation and launch support?',
        'answer' => 'Yes. We provide fund setup and structuring support, including operational framework design and coordination with legal and advisory service providers.',
        'order' => 7
    ),
    array(
        'question' => 'How does your service model differ from traditional administrators?',
        'answer' => 'Our model integrates institutional governance, advanced technology, and partnership-driven engagement, designed to deliver scalable and risk-aware fund infrastructure.',
        'order' => 8
    ),
    array(
        'question' => 'What measures are in place to ensure data security?',
        'answer' => 'We operate under advanced data security and access control protocols, supported by secure digital environments and confidentiality safeguards.',
        'order' => 9
    ),
    array(
        'question' => 'What is your service delivery methodology?',
        'answer' => 'Our delivery methodology follows a disciplined four-stage framework: Understand, Design, Execute, and Support.',
        'order' => 10
    ),
    array(
        'question' => 'Are services scalable over time?',
        'answer' => 'Yes. Our operating model is designed to support scalability and long-term operational sustainability.',
        'order' => 11
    ),
    array(
        'question' => 'How may prospective clients initiate engagement?',
        'answer' => 'Engagements typically begin with a confidential consultation to assess requirements and define an appropriate service framework.',
        'order' => 12
    )
);

$faqs = array();
if ($faq_query->have_posts()) {
    while ($faq_query->have_posts()) {
        $faq_query->the_post();
        $faqs[] = array(
            'question' => get_the_title(),
            'answer' => get_the_content(),
            'order' => get_post_meta(get_the_ID(), '_faq_order', true) ?: 999
        );
    }
    wp_reset_postdata();
} else {
    $faqs = $default_faqs;
}

// Sort by order
usort($faqs, function($a, $b) {
    return $a['order'] <=> $b['order'];
});
?>

<!-- FAQ Section -->
<section id="faq" class="faq-section py-5">
    <div class="container custom_container">
        <div class="faq-heading-wrap position-relative">
            <h2 class="text-center back_white_text_gradient title fw-light mb-5">Got Questions? We've Got Answers.</h2>
            <img class="faq-checker d-none d-lg-block" src="<?php echo esc_url(cjl_get_image_url('service_box_top.png')); ?>" alt="" loading="lazy" decoding="async">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion accordion-flush" id="faqAccordion">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <?php $is_first = ($index === 0); ?>
                        <div class="accordion-item bg-transparent border-secondary pb-3">
                            <h3 class="accordion-header align-items-center d-flex m-0">
                                <span class="faq-number fw-bold" aria-hidden="true"><?php echo esc_html(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?>-</span>
                                <button class="text-break accordion-button bg-transparent text-white shadow-none<?php echo $is_first ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $index + 1; ?>" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="faq<?php echo $index + 1; ?>">
                                    <?php echo esc_html($faq['question']); ?>
                                </button>
                            </h3>
                            <div id="faq<?php echo $index + 1; ?>" class="accordion-collapse collapse<?php echo $is_first ? ' show' : ''; ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body lead">
                                    <p class="ps-4 text-break"><?php echo wp_kses_post($faq['answer']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
