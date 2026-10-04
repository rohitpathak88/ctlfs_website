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

// Marquee
get_template_part('template-parts/marquee-section');

// Services and About Us Section
get_template_part('template-parts/services-section');

// Why Choose Us
get_template_part('template-parts/why-choose-us-section');

// Alliances Section
get_template_part('template-parts/alliances-section');

// News Section
// get_template_part('template-parts/news-section');

// Map Section
get_template_part('template-parts/map-section');

// FAQ Section
get_template_part('template-parts/faq-section');

// Contact Section
get_template_part('template-parts/contact-section');
?>

<?php
get_footer();
