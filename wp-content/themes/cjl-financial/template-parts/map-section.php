<?php
/**
 * Map Section Template Part
 *
 * @package CJL_Financial
 */
?>

<!-- Worldwide Trust -->
<section class="worldwide-trust-section" style="background-image: url(<?php echo esc_url(cjl_get_image_url('home_banner_top_color_gradient.png')); ?>), url(<?php echo esc_url(cjl_get_image_url('home_banner_bottom_color_gradient.png')); ?>); background-position: top center, bottom center; background-repeat: no-repeat, no-repeat; background-size: 100% auto, 100% auto;
">
    <div class="container custom_container">
        <div class="row">
            <div class="col-md-6 m-auto text-center">
                <h2 class="text-center back_white_text_gradient title fw-light mb-2"><?php echo esc_html(get_theme_mod('cjl_map_title', 'Worldwide Trust')); ?></h2>
                <?php $map_desc = get_theme_mod('cjl_map_desc', ''); ?>
                <?php if ($map_desc) : ?>
                    <p class="lead mb-5"><?php echo esc_html($map_desc); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="<?php echo esc_url(cjl_get_image_url('map.png')); ?>" alt="<?php esc_attr_e('World map highlighting the regions we serve', 'cjl-financial'); ?>" class="img-fluid" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

