<?php
/**
 * Services Section Template Part
 *
 * @package CJL_Financial
 */

$services_query = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

// Default services if none exist
$default_services = array(
    array(
        'title' => 'Fund Accounting & NAV Calculation',
        'description' => 'Accurate, timely net asset value calculations with multi-currency support.',
        'icon' => 'wealth_advisory_icon.png',
        'order' => 1,
        'link' => '#'
    ),
    array(
        'title' => 'Investor Services & Reporting',
        'description' => 'Transparent investor communication and structured reporting designed for institutional confidence.',
        'icon' => 'asset_advisory_icon.png',
        'order' => 2,
        'link' => '#'
    ),
    array(
        'title' => 'Regulatory Compliance & Filing',
        'description' => 'Structured compliance frameworks and accurate regulatory filings designed to support global fund governance.',
        'icon' => 'capital_market_icon.png',
        'order' => 3,
        'link' => '#'
    ),
    array(
        'title' => 'Transfer Agency Services',
        'description' => 'Comprehensive investor record management and transaction processing designed to support seamless fund operations and investor confidence.',
        'icon' => 'wealth_advisory_icon.png',
        'order' => 4,
        'link' => '#'
    ),
    array(
        'title' => 'Fund Setup & Operational Launch Support',
        'description' => 'Operational launch support designed to help investment managers establish a strong administrative and reporting foundation for new investment vehicles.',
        'icon' => 'asset_advisory_icon.png',
        'order' => 5,
        'link' => '#'
    )
);

/**
 * Build a card excerpt from post content without repeating the post title.
 * Some service posts start their content with the service name, which used
 * to render as "Fund Accounting & NAV CalculationAccurate, timely..." on cards.
 */
function cjl_service_card_excerpt($post_id) {
    if (has_excerpt($post_id)) {
        return wp_strip_all_tags(get_the_excerpt($post_id));
    }

    $text  = trim(wp_strip_all_tags(strip_shortcodes(get_post_field('post_content', $post_id))));
    $title = trim(get_the_title($post_id));

    // Strip the leading duplicated title (if the content begins with it).
    if ($title !== '' && stripos($text, $title) === 0) {
        $text = ltrim(substr($text, strlen($title)), " \t\n\r:-–—");
    }

    return wp_trim_words($text, 25, '...');
}

$services = array();
if ($services_query->have_posts()) {
    while ($services_query->have_posts()) {
        $services_query->the_post();
        $services[] = array(
            'title' => get_the_title(),
            'description' => cjl_service_card_excerpt(get_the_ID()),
            'icon' => get_post_meta(get_the_ID(), '_service_icon', true) ?: 'wealth_advisory_icon.png',
            'order' => get_post_meta(get_the_ID(), '_service_order', true) ?: 999,
            'link' => get_permalink(),
        );
    }
    wp_reset_postdata();
} else {
    $services = $default_services;
}

// Sort by order
usort($services, function($a, $b) {
    return $a['order'] <=> $b['order'];
});
// echo "<pre>";print_r($services);
?>

<!-- Services Section -->
<section id="services" class="services-section" style="background-image:url(<?php echo esc_url(cjl_get_image_url('home_banner_bottom_color_gradient.png')); ?>);background-position: bottom; background-repeat: no-repeat;">
    <div class="container custom_container">
        <h2 class="visually-hidden"><?php esc_html_e('Our Services', 'cjl-financial'); ?></h2>
        <div class="services-grid position-relative">
            <span class="text-uppercase corner-label top_corner_text" aria-hidden="true">Services</span>
            <span class="text-uppercase corner-label left_corner_text" aria-hidden="true">Services</span>
            <span class="text-uppercase corner-label bottom_corner_text" aria-hidden="true">Services</span>
            <span class="text-uppercase corner-label right_corner_text" aria-hidden="true">Services</span>
            <div class="row justify-content-center">
                <?php foreach ($services as $index => $service): ?>

                    <div class="col-md-6 col-lg-6 col-xxl-4 mb-4">
                        <div class="position-relative pt-1 service-card h-100">
                            <div class="text-center">
                                <img src="<?php echo esc_url(cjl_get_image_url('service_box_top.png')); ?>" class="img-fluid" alt="" loading="lazy" decoding="async">
                            </div>
                            <div class="card-body p-5 pt-4">
                                <span class="bg-secondary-accent d-block mb-5 rounded-5 text-center">
                                    <img src="<?php echo esc_url(filter_var($service['icon'], FILTER_VALIDATE_URL) ? $service['icon'] : cjl_get_image_url($service['icon'])); ?>" alt="" loading="lazy" decoding="async">
                                </span>
                                <h3 class="back_white_text_gradient title fw-light h5"><?php echo esc_html($service['title']); ?></h3>
                                <p class="lead mt-3"><?php echo wp_kses_post($service['description']); ?></p>
                                <a href="<?php echo esc_url($service['link']); ?>" class="d-inline-block mb-3 mt-3" aria-label="<?php echo esc_attr(sprintf(__('Read more about %s', 'cjl-financial'), $service['title'])); ?>">
                                    <img src="<?php echo esc_url(cjl_get_image_url('arrow.png')); ?>" alt="" loading="lazy" decoding="async">
                                </a>
                            </div>
                        </div>
                    </div> 

                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- About Us Section --> 
    <div class="container custom_container mt-5 pt-5 about-us">
        <div class="row align-items-center">
            <div class="col-md-12 col-xl-6 col-xxl-5">
                <div>
                    <img class="img-fluid w-100"
                        src="<?php echo esc_url(filter_var(get_theme_mod('about_us_image'), FILTER_VALIDATE_URL) ? get_theme_mod('about_us_image') : cjl_get_image_url('about_us_img.png')); ?>"
                        alt="<?php echo esc_attr(get_theme_mod('about_us_heading', 'Institutional Discipline. Fintech Precision.')); ?>"
                        loading="lazy" decoding="async">
                </div>
            </div>
            <div class="col-md-12 col-xl-6 col-xxl-7">
                <div class="ps-md-5">
                    <h2 class="back_white_text_gradient title fw-light mb-3">
                        <?php echo esc_html(get_theme_mod('about_us_heading', 'Institutional Discipline. Fintech Precision.')); ?>
                    </h2>
                    <p class="lead"><?php echo wp_kses_post(get_theme_mod('about_us_content', 'We are a next-generation fund services firm operating at the intersection of institutional governance and advanced financial technology. Our integrated operating model brings together accounting rigor, regulatory intelligence, and investor transparency—engineered for performance-driven fund managers and global asset platforms.')); ?></p>
                    <div class="about-content position-relative">
                        <div class="top-dot"></div>
                        <div class="bottom-dot"></div>
                        <div class="about-block">
                            <h4 class="back_white_text_gradient fw-light mb-3"><?php echo esc_html(get_theme_mod('about_us_vision_heading', 'Vision')); ?></h4>
                            <p class="lead"><?php echo wp_kses_post(get_theme_mod('about_us_vision_content', 'To be a globally trusted fund services partner—setting the benchmark for institutional excellence through fintech innovation, disciplined governance, and data-driven intelligence.')); ?></p>
                        </div>
                        <div class="about-block">
                            <h4 class="back_white_text_gradient fw-light mb-3"><?php echo esc_html(get_theme_mod('about_us_mission_heading', 'Our Mission')); ?></h4>
                            <p class="lead"><?php echo wp_kses_post(get_theme_mod('about_us_mission_content', 'To deliver institutionally governed, technology-enabled fund services that combine precision, regulatory confidence, and transparency—empowering fund managers and global asset platforms to operate with clarity, control, and scale.')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
