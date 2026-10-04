<?php
/**
 * Why Choose Us Section Template Part
 *
 * @package CJL_Financial
 */
?>

<section id="why_choose_us" class="why-choose-section" style="background-image:url(<?php echo esc_url(cjl_get_image_url('home_banner_bottom_color_gradient.png')); ?>);background-position: bottom; background-repeat: no-repeat;">
    <div class="container custom_container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 col-xl-8 m-auto">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-4">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-12 mb-5 mb-lg-5 pe-lg-0 mb-sm-0">
                                <div class="why-choose-card">
                                    <div class="number"><?php echo esc_html(get_theme_mod('why_choose_card_1_number', 1)); ?></div>
                                    <h5 class="back_white_text_gradient title fw-light"><?php echo esc_html(get_theme_mod('why_choose_card_1_title', 'Scale Without Complexity')); ?></h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-12 pe-lg-0">
                                <div class="why-choose-card">
                                    <div class="number"><?php echo esc_html(get_theme_mod('why_choose_card_2_number', 2)); ?></div>
                                    <h5 class="back_white_text_gradient title fw-light"><?php echo esc_html(get_theme_mod('why_choose_card_2_title', 'Scale Without Complexity')); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 p-lg-0">

                        <div class="justify-content-center m-0 row">
                            <div class="col-md-12 p-lg-0">
                                <div class="text-center"> 
                                    <img src="<?php echo esc_url(cjl_get_image_url('why_choose_us_dotted_img.png')); ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-7 col-lg-11 pb-3 pe-0 ps-0 pt-3">
                                <div class="text-center">
                                    <h2 class="back_white_text_gradient title fw-light"><?php echo esc_html(get_theme_mod('why_choose_title', 'Why Choose Us?')); ?></h2>
                                    <p class="lead">
                                        <?php echo esc_html(get_theme_mod('why_choose_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Um dolor sit amet, adipiscing elit consectetur adipiscing dolor.')); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 p-lg-0">
                                <div class="text-center"> 
                                        <img src="<?php echo esc_url(cjl_get_image_url('why_choose_us_dotted_img.png')); ?>" alt="" class="img-fluid">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-12 mb-5 ps-lg-0">
                                <div class="why-choose-card">
                                    <div class="number"><?php echo esc_html(get_theme_mod('why_choose_card_3_number',3)); ?></div>
                                    <h5 class="back_white_text_gradient title fw-light"><?php echo esc_html(get_theme_mod('why_choose_card_3_title','Scale Without Complexity')); ?></h5>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-12 ps-lg-0">
                                <div class="why-choose-card">
                                    <div class="number"><?php echo esc_html(get_theme_mod('why_choose_card_4_number',4)); ?></div>
                                    <h5 class="back_white_text_gradient title fw-light"><?php echo esc_html(get_theme_mod('why_choose_card_4_title', 'Scale Without Complexity')); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
