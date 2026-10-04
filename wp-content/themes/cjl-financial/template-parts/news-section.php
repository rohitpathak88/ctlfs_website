<?php
/**
 * News Section Template Part
 *
 * @package CJL_Financial
 */

$news_title = get_theme_mod('cjl_news_title', 'Our Fresh News');

// Get news items from customizer
$news_items = array(
    array(
        'title' => get_theme_mod('cjl_news_1_title', 'The Ultimate Guide To Staging Your Home For A Quick Sale'),
        'date' => get_theme_mod('cjl_news_1_date', 'Oct 23 2025'),
        'description' => get_theme_mod('cjl_news_1_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...'),
        'image' => get_theme_mod('cjl_news_1_image', ''),
        'link' => get_theme_mod('cjl_news_1_link', '#'),
    ),
    array(
        'title' => get_theme_mod('cjl_news_2_title', 'The Ultimate Guide To Staging Your Home For A Quick Sale'),
        'date' => get_theme_mod('cjl_news_2_date', 'Oct 23 2025'),
        'description' => get_theme_mod('cjl_news_2_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...'),
        'image' => get_theme_mod('cjl_news_2_image', ''),
        'link' => get_theme_mod('cjl_news_2_link', '#'),
    ),
    array(
        'title' => get_theme_mod('cjl_news_3_title', 'The ultimate guide to staging your home for a quick sale'),
        'date' => get_theme_mod('cjl_news_3_date', 'Oct 23 2025'),
        'description' => get_theme_mod('cjl_news_3_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...'),
        'image' => get_theme_mod('cjl_news_3_image', ''),
        'link' => get_theme_mod('cjl_news_3_link', '#'),
    ),
);
?>

<!-- News Section -->
<section class="news-section">
    <div class="container custom_container">
        <h2 class="text-center back_white_text_gradient title fw-light mb-5"><?php echo esc_html($news_title); ?></h2>
        <div class="row g-4">
            <?php if (!empty($news_items[0]['title'])): ?>
                <!-- News Item 1 (Large) -->
                <div class="col-lg-7 col-md-12">
                    <div class="h-100">
                        <div class="news-image position-relative">
                            <?php
                            $news_1_image = !empty($news_items[0]['image']) ? $news_items[0]['image'] : cjl_get_image_url('news1.png');
                            ?>
                            <img src="<?php echo esc_url($news_1_image); ?>" alt="<?php echo esc_attr($news_items[0]['title']); ?>" class="img-fluid rounded-5 w-100">
                        </div>
                        <div class="d-block mt-4">
                            <small class="d-inline-block mb-3 pb-1 pe-3 ps-3 pt-1" style="color:#B8B8B8;background-color: #39241E;border-end-end-radius: 50px; border-start-end-radius: 50px;">
                                Published: <?php echo esc_html($news_items[0]['date']); ?>
                            </small>
                            <a href="<?php echo esc_url($news_items[0]['link']); ?>" class="text-decoration-none text-white">
                                <h5 class="sub-title"><?php echo esc_html($news_items[0]['title']); ?></h5>
                            </a>
                            <p class="lead"><?php echo esc_html($news_items[0]['description']); ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- News Items 2 & 3 (Side) -->
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <?php if (!empty($news_items[1]['title'])): ?>
                            <div class="col-sm-6 col-lg-12 col-md-6 mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="news-image position-relative">
                                            <?php
                                            $news_2_image = !empty($news_items[1]['image']) ? $news_items[1]['image'] : cjl_get_image_url('news2.png');
                                            ?>
                                            <img src="<?php echo esc_url($news_2_image); ?>" alt="<?php echo esc_attr($news_items[1]['title']); ?>" class="img-fluid rounded-5 w-100">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="d-block mt-md-0 mt-4">
                                            <small class="d-inline-block mb-3 pb-1 pe-3 ps-3 pt-1" style="color:#B8B8B8;background-color: #39241E;border-end-end-radius: 50px; border-start-end-radius: 50px;">
                                                Published: <?php echo esc_html($news_items[1]['date']); ?>
                                            </small>
                                            <a href="<?php echo esc_url($news_items[1]['link']); ?>" class="text-decoration-none text-white">
                                                <h5 class="sub-title"><?php echo esc_html($news_items[1]['title']); ?></h5>
                                            </a>
                                            <p class="lead"><?php echo esc_html($news_items[1]['description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($news_items[2]['title'])): ?>
                            <div class="col-sm-6 col-lg-12 col-md-6 mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="news-image position-relative">
                                            <?php
                                            $news_3_image = !empty($news_items[2]['image']) ? $news_items[2]['image'] : cjl_get_image_url('news3.png');
                                            ?>
                                            <img src="<?php echo esc_url($news_3_image); ?>" alt="<?php echo esc_attr($news_items[2]['title']); ?>" class="img-fluid rounded-5 w-100">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="d-block mt-md-0 mt-4">
                                            <small class="d-inline-block mb-3 pb-1 pe-3 ps-3 pt-1" style="color:#B8B8B8;background-color: #39241E;border-end-end-radius: 50px; border-start-end-radius: 50px;">
                                                Published: <?php echo esc_html($news_items[2]['date']); ?>
                                            </small>
                                            <a href="<?php echo esc_url($news_items[2]['link']); ?>" class="text-decoration-none text-white">
                                                <h5 class="sub-title"><?php echo esc_html($news_items[2]['title']); ?></h5>
                                            </a>
                                            <p class="lead"><?php echo esc_html($news_items[2]['description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <!-- Default news items if no customizer data -->
                <div class="col-lg-7 col-md-12">
                    <div class="h-100">
                        <div class="news-image position-relative">
                            <img src="<?php echo esc_url(cjl_get_image_url('news1.png')); ?>" alt="News 1" class="img-fluid rounded-5 w-100">
                        </div>
                        <div class="d-block mt-4">
                            <small class="d-inline-block mb-3 pb-1 pe-3 ps-3 pt-1" style="color:#B8B8B8;background-color: #39241E;border-end-end-radius: 50px; border-start-end-radius: 50px;">Published: Oct 23 2025</small>
                            <a href="#" class="text-decoration-none text-white">
                                <h5 class="sub-title">The Ultimate Guide To Staging Your Home For A Quick Sale</h5>
                            </a>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12 col-md-6 mb-4">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="news-image position-relative">
                                        <img src="<?php echo esc_url(cjl_get_image_url('news2.png')); ?>" alt="News 2" class="img-fluid rounded-5 w-100">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="d-block mt-md-0 mt-4">
                                        <small class="d-inline-block mb-3 pb-1 pe-3 ps-3 pt-1" style="color:#B8B8B8;background-color: #39241E;border-end-end-radius: 50px; border-start-end-radius: 50px;">Published: Oct 23 2025</small>
                                        <a href="#" class="text-decoration-none text-white">
                                            <h5 class="sub-title">The Ultimate Guide To Staging Your Home For A Quick Sale</h5>
                                        </a>
                                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12 col-md-6 mb-4">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="news-image position-relative">
                                        <img src="<?php echo esc_url(cjl_get_image_url('news3.png')); ?>" alt="News 3" class="img-fluid rounded-5 w-100">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="d-block mt-md-0 mt-4">
                                        <small class="d-inline-block mb-3 pb-1 pe-3 ps-3 pt-1" style="color:#B8B8B8;background-color: #39241E;border-end-end-radius: 50px; border-start-end-radius: 50px;">Published: Oct 23 2025</small>
                                        <a href="#" class="text-decoration-none text-white">
                                            <h5 class="sub-title">The ultimate guide to staging your home for a quick sale</h5>
                                        </a>
                                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
