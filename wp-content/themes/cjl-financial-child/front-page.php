<?php
/**
 * Home page composition.
 *
 * The Investors/alliance and Fresh News sections are intentionally omitted at
 * the approved Home-page scope; the parent theme remains unchanged.
 *
 * @package CTL_Financial_Child
 */

get_header();

get_template_part( 'template-parts/hero-section' );
get_template_part( 'template-parts/marquee-section' );
get_template_part( 'template-parts/services-section' );
get_template_part( 'template-parts/why-choose-us-section' );
get_template_part( 'template-parts/map-section' );
get_template_part( 'template-parts/faq-section' );
get_template_part( 'template-parts/contact-section' );

get_footer();
