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
        'question' => 'Is consultancy a required investment to secure client?',
        'answer' => 'Yes, our consultancy services are essential to understand your business needs and provide tailored solutions that maximize your investment returns.',
        'order' => 1
    ),
    array(
        'question' => 'Is it ages old method used with technical app assistance?',
        'answer' => 'No, we use cutting-edge technology combined with proven financial strategies to deliver superior results.',
        'order' => 2
    ),
    array(
        'question' => 'Do you take on consultant level fees to hire for a period?',
        'answer' => 'Our pricing is flexible and tailored to your specific needs. We offer various engagement models to suit your budget and timeline.',
        'order' => 3
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
        <h2 class="text-center back_white_text_gradient title fw-light mb-5">Got Questions? We've Got Answers.</h2>
        <div class="row">
            <div class="ccol-md-12">
                <div class="accordion accordion-flush" id="faqAccordion">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <div class="accordion-item bg-transparent border-secondary pb-3">
                            <h2 class="accordion-header align-items-center d-flex">
                                <span style="font-size:20px;color:#FF704C;" class="fw-bold"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>-</span>
                                <button class="accordion-button collapsed bg-transparent text-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $index + 1; ?>">
                                    <?php echo esc_html($faq['question']); ?>
                                </button>
                            </h2>
                            <div id="faq<?php echo $index + 1; ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body lead">
                                    <p class="ps-4"><?php echo wp_kses_post($faq['answer']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
