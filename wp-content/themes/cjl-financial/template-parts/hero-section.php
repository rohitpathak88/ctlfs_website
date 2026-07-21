<?php
/**
 * Hero Section Template Part
 *
 * @package CJL_Financial
 */
?>

<!-- Hero Section -->
<section id="home" class="hero-section" style="background-image:url(<?php echo esc_url(cjl_get_image_url('home_banner_bottom_color_gradient.png')); ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="position-absolute start-0 top-0 z-n1" style="content: url(<?php echo esc_url(cjl_get_image_url('home_banner_left_corner.png')); ?>);"></div>
    <div class="container custom_container">
        <div class="row align-items-center">
            <div class="col-lg-7 order-1 order-lg-0">
                <?php
                $hero_eyebrow = get_theme_mod('cjl_hero_eyebrow', 'Discover. Develop. Deliver.');
                $hero_title = get_theme_mod('cjl_hero_title', 'Elevating Global Fund Administration');
                $hero_description = get_theme_mod('cjl_hero_description', 'A technology-enabled, institutionally governed platform delivering precision fund accounting, investor servicing, regulatory assurance, and strategic structuring across global markets.');
                $hero_button_text = get_theme_mod('cjl_hero_button_text', 'Request a Private Consultation');
                $hero_button_link = get_theme_mod('cjl_hero_button_link', '#contact');
                $hero_button2_text = get_theme_mod('cjl_hero_button2_text', 'Explore Our Capabilities');
                $hero_button2_link = get_theme_mod('cjl_hero_button2_link', '#services');
                ?>
                <?php if ($hero_eyebrow) : ?>
                    <p class="hero-eyebrow text-uppercase mb-3"><?php echo esc_html($hero_eyebrow); ?></p>
                <?php endif; ?>
                <h1 class="accent-gradient display-4 fw-light mb-3">
                    <?php echo wp_kses_post($hero_title); ?>
                </h1>
                <p class="lead mb-4">
                    <?php echo esc_html($hero_description); ?>
                </p>
                <div class="hero-actions d-flex flex-wrap gap-4 mt-4">
                    <a href="<?php echo esc_url($hero_button_link); ?>" class="btn-explore"><?php echo esc_html($hero_button_text); ?></a>
                    <?php if ($hero_button2_text) : ?>
                        <a href="<?php echo esc_url($hero_button2_link); ?>" class="btn-explore btn-explore-secondary"><?php echo esc_html($hero_button2_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-image text-center">
                    <?php
                    $hero_image = get_theme_mod('cjl_hero_image', '');
                    if ($hero_image) {
                        echo '<img src="' . esc_url($hero_image) . '" alt="' . esc_attr__('Financial expert', 'cjl-financial') . '" class="img-fluid banner-men-image" fetchpriority="high" decoding="async">';
                    } else {
                        echo '<img src="' . esc_url(cjl_get_image_url('banner_men.png')) . '" alt="' . esc_attr__('Financial expert', 'cjl-financial') . '" class="img-fluid banner-men-image" fetchpriority="high" decoding="async">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-0 position-absolute start-0 z-n1" style="content: url(<?php echo esc_url(cjl_get_image_url('home_banner_right_corner.png')); ?>);"></div>
</section>
