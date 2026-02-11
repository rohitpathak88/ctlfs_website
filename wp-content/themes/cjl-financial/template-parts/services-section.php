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
        'title' => 'Wealth Advisory',
        'subtitle' => 'Our solutions are designed to accelerate business growth while strengthening long-term financial resilience.',
        'description' => 'From salaried professionals building personal wealth to seasoned traders, business owners, family offices, and HNI/UHNI clients focused on preservation and growth, we craft bespoke investment strategies that elevate long-term success.',
        'image' => 'wealth_advisory.png',
        'icon' => 'wealth_advisory_icon.png',
        'order' => 1
    ),
    array(
        'title' => 'Asset Advisory',
        'subtitle' => 'We deliver comprehensive, tailored solutions for discerning investors.',
        'description' => 'Our asset management platform designs exclusive, high-conviction investment strategies tailored to the distinct requirements of HNI and UHNI clients, with a long-term vision grounded in rigorous due diligence, innovation, and deep market insight.',
        'image' => 'asset_advisory.png',
        'icon' => 'asset_advisory_icon.png',
        'order' => 2
    ),
    array(
        'title' => 'Capital Market',
        'subtitle' => 'We provide a trusted platform that brings together India\'s leading corporates and institutional investors.',
        'description' => 'Powered by differentiated, in-depth research, we deliver actionable trading intelligence, comprehensive sales support, and privileged corporate access. Fund managers worldwide rely on our seasoned team to support informed decision-making and strategic outcomes.',
        'image' => 'capital_market.png',
        'icon' => 'capital_market_icon.png',
        'order' => 3
    )
);

$services = array();
if ($services_query->have_posts()) {
    while ($services_query->have_posts()) {
        $services_query->the_post();
        $services[] = array(
            'title' => get_the_title(),
            'subtitle' => get_the_content(),
            'description' => get_the_excerpt(), //get_post_meta(get_the_ID(), '_service_subtitle', true),,
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'full') ?: cjl_get_image_url('wealth_advisory.png'),
            'icon' => get_post_meta(get_the_ID(), '_service_icon', true) ?: 'wealth_advisory_icon.png',
            'order' => get_post_meta(get_the_ID(), '_service_order', true) ?: 999,
            'link' => get_post_meta(get_the_ID(), '_service_button_url', true) ?: '#', // get_permalink(), 
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
<section class="services-section" style="background-image:url(<?php echo esc_url(cjl_get_image_url('home_banner_bottom_color_gradient.png')); ?>);background-position: bottom; background-repeat: no-repeat;">
    <div class="container custom_container">
        <?php foreach ($services as $index => $service): ?>
            <div class="service-card mb-5 p-3">
                <div class="row align-items-center">
                    <div class="col-md-4 col-sm-12 <?php echo ($index % 2 == 1) ? 'order-md-2' : ''; ?>">
                        <div>
                             <img src="<?php echo esc_url(filter_var($service['image'], FILTER_VALIDATE_URL) ? $service['image'] : cjl_get_image_url($service['image'])); ?>" alt="<?php echo esc_attr($service['title']); ?>" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 <?php echo ($index % 2 == 1) ? 'order-md-1' : ''; ?>">
                        <div class="card-body ps-lg-4 ps-md-4 ps-sm-4 mt-5 mt-md-0">
                            <span class="mb-5 mb-xl-5 mb-md-3 bg-secondary-accent rounded-5 d-block text-center">
                                <img src="<?php echo esc_url(filter_var($service['icon'], FILTER_VALIDATE_URL) ? $service['icon'] : cjl_get_image_url($service['icon'])); ?>" alt="<?php echo esc_attr($service['title']); ?>">
                            </span>
                            <h5 class="back_white_text_gradient title fw-light"><?php echo esc_html($service['title']); ?></h5>
                            <?php if ($service['subtitle']): ?>
                                <p class="sub-title text-white fw-light"><?php echo esc_html($service['subtitle']); ?></p>
                            <?php endif; ?>
                            <p class="lead"><?php echo wp_kses_post($service['description']); ?></p>
                            <a href="<?php echo esc_url($service['link'] ?? '#'); ?>">
                                <img src="<?php echo esc_url(cjl_get_image_url('arrow.png')); ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
