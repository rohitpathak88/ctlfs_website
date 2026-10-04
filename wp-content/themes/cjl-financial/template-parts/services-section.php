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
        'icon' => 'wealth_advisory_icon.png',
        'order' => 1
    ),
    array(
        'title' => 'Asset Advisory',
        'subtitle' => 'We deliver comprehensive, tailored solutions for discerning investors.',
        'description' => 'Our asset management platform designs exclusive, high-conviction investment strategies tailored to the distinct requirements of HNI and UHNI clients, with a long-term vision grounded in rigorous due diligence, innovation, and deep market insight.',
        'icon' => 'asset_advisory_icon.png',
        'order' => 2
    ),
    array(
        'title' => 'Capital Market',
        'description' => 'Powered by differentiated, in-depth research, we deliver actionable trading intelligence, comprehensive sales support, and privileged corporate access. Fund managers worldwide rely on our seasoned team to support informed decision-making and strategic outcomes.',
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
            'description' => wp_trim_words( get_the_content(), 10, '...' ), // get_the_content(),
            'icon' => get_post_meta(get_the_ID(), '_service_icon', true) ?: 'wealth_advisory_icon.png',
            'order' => get_post_meta(get_the_ID(), '_service_order', true) ?: 999,
            'link' => get_permalink(), //get_post_meta(get_the_ID(), '_service_button_url', true) ?: '#', // get_permalink(), 
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
<section id="services-section" class="services-section" style="background-image:url(<?php echo esc_url(cjl_get_image_url('home_banner_bottom_color_gradient.png')); ?>);background-position: bottom; background-repeat: no-repeat;">
    <div class="container custom_container">
        <div class="row justify-content-center">
            <?php foreach ($services as $index => $service): ?>

                <div class="col-md-6 col-lg-4 col-xxl-4 mb-4">
                    <div class="position-relative pt-1 service-card h-100">
                        <?php if ($index == 0 ) {?>
                            <span class="text-uppercase top_corner_text">Services</span>
                            <span class="text-uppercase left_corner_text">Services</span>
                        <?php }?>
                            
                        <div class="text-center">
                            <img src="<?php echo esc_url(cjl_get_image_url('service_box_top.png')); ?>" class="img-img-fuild">
                        </div>
                        <div class="card-body p-4 pt-3">
                            <span class="bg-secondary-accent d-block mb-5 rounded-5 text-center">
                                <img src="<?php echo esc_url(filter_var($service['icon'], FILTER_VALIDATE_URL) ? $service['icon'] : cjl_get_image_url($service['icon'])); ?>" alt="<?php echo esc_attr($service['title']); ?>">
                            </span>
                            <h5 class="back_white_text_gradient title fw-light"> <?php echo esc_html($service['title']); ?> </h5>
                            <p class="lead mt-3"><?php echo wp_kses_post($service['description']); ?></p>
                            <a target="_blank" href="<?php echo $service['link'] ?>" class="d-inline-block mb-3 mt-3">
                                <img src="<?php echo esc_url(cjl_get_image_url('arrow.png')); ?>" alt="">
                            </a>
                        </div>
                        <?php if (count($services)-1 == $index ) {?>
                            <span class="text-uppercase bottom_corner_text">Services</span>
                            <span class="text-uppercase right_corner_text">Services</span>
                        <?php } ?>
                    </div>
                </div> 

            <?php endforeach; ?>
        </div>
    </div>

    <!-- About Us Section --> 
    <div id="about_us" class="container custom_container mt-5 pt-5 about-us">
        <div class="row align-items-center">
            <div class="col-md-12 col-xl-6 col-xxl-5">
                <div>
                    <!-- <img class="img-fluid w-100" 
                    src="<?php echo esc_url(get_theme_mod('about_us_image', cjl_get_image_url('about_us_img.png') )); ?>"
                     alt=""> -->

                     <img class="img-fluid w-100" 
                      src="<?php echo esc_url(filter_var(get_theme_mod('about_us_image'), FILTER_VALIDATE_URL) ? get_theme_mod('about_us_image') : cjl_get_image_url('about_us_img.png')); ?>" alt="">
                     
                </div>
            </div>
            <div class="col-md-12 col-xl-6 col-xxl-7">
                <div class="ps-md-5">
                    <h2 class="back_white_text_gradient title fw-light mb-3">
                        <?php echo esc_html(get_theme_mod('about_us_heading', 'About Us')); ?>
                    </h2>
                    <p class="lead"><?php echo wp_kses_post(get_theme_mod('about_us_content', 'Lorem ipsum dolor sit amet...')); ?></p>
                    <div class="about-content position-relative">
                        <!-- <div class="progress-line"></div> -->
                        <div class="top-dot"></div>
                        <div class="bottom-dot"></div>
                        <h4 class="back_white_text_gradient fw-light mb-2"><?php echo esc_html(get_theme_mod('about_us_vision_heading', 'Our Vision')); ?></h4>
                        <p class="lead"><?php echo wp_kses_post(get_theme_mod('about_us_vision_content', 'Lorem ipsum dolor sit amet...')); ?></p>
                        <h4 class="back_white_text_gradient fw-light mb-2"><?php echo esc_html(get_theme_mod('about_us_mission_heading', 'Our Mission')); ?></h4>
                        <p class="lead"><?php echo wp_kses_post(get_theme_mod('about_us_mission_content', 'Lorem ipsum dolor sit amet...')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
