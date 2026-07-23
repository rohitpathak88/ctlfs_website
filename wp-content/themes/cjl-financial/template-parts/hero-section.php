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
                $hero_title = get_theme_mod('cjl_hero_title', 'Innovative & Intelligent <br> Financial Solutions');
                $hero_description = get_theme_mod('cjl_hero_description', 'At CJL Client Success, Asset And Capital Focused Precision Delivering Superior Client Experiences In Accelerating Business Growth Through Research-Led Holistic Financial Capabilities.');
                $hero_button_text = get_theme_mod('cjl_hero_button_text', 'EXPLORE MORE');
                $hero_button_link = get_theme_mod('cjl_hero_button_link', '#services');
                ?>
                <h1 class="accent-gradient display-4 fw-light mb-3">
                    <?php echo wp_kses_post($hero_title); ?>
                </h1>
                <p class="lead mb-4">
                    <?php echo esc_html($hero_description); ?>
                </p>
                <a href="<?php echo esc_url($hero_button_link); ?>" class="btn-explore mt-4"><?php echo esc_html($hero_button_text); ?></a>
            </div>
            <div class="col-lg-5">
                <div class="hero-image text-center">
                    <?php
                    $hero_image = get_theme_mod('cjl_hero_image', '');
                    if ($hero_image) {
                        echo '<img src="' . esc_url($hero_image) . '" alt="Financial Expert" class="img-fluid banner-men-image">';
                    } else {
                        echo '<img src="' . esc_url(cjl_get_image_url('banner_men.png')) . '" alt="Financial Expert" class="img-fluid banner-men-image">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-0 position-absolute start-0 z-n1" style="content: url(<?php echo esc_url(cjl_get_image_url('home_banner_right_corner.png')); ?>);"></div>
</section>
