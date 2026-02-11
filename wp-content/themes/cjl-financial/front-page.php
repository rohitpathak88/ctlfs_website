<?php
/**
 * Front Page Template
 *
 * @package CJL_Financial
 */

get_header();
?>

<?php
// Hero Section
get_template_part('template-parts/hero-section');

// Services Section
get_template_part('template-parts/services-section');

// Alliances Section
get_template_part('template-parts/alliances-section');

// News Section
get_template_part('template-parts/news-section');

// FAQ Section
get_template_part('template-parts/faq-section');

// Contact Section
get_template_part('template-parts/contact-section');
?>

<?php
get_footer();
