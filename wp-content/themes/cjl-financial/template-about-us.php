<?php
/**
 * Template Name: About Us
 *
 * Dedicated About Us page matching the Figma dark page system.
 *
 * @package CTL_Financial_Child
 */

get_header(); ?>

<div class="container custom_container mt-5 pt-5 pb-5">
    <div class="d-flex mb-2 mt-5 pt-5">
            <h1 class="accent-gradient display-4 fw-light mb-3">Institutional Discipline. Fintech Precision.</h1>
        </div>
        <div class="service-content">
            <p class="fw-light">Institutional governance and fintech precision for global fund platforms.</p>
            
        </div>
    </div> 
</div>

  
    <div style="background-color:#0d0d0d;">
        <div id="about_us" class="container custom_container pb-5 pt-5 about-us">
            <div class="row">
                <div class="col-md-12 col-xl-5 col-xxl-5">
                    <div>
                        <!-- <img class="img-fluid w-100" 
                        src="<?php echo esc_url(get_theme_mod('about_us_image', cjl_get_image_url('about_us_img.png') )); ?>"
                        alt=""> -->
    
                        <img class="img-fluid w-100" 
                            src="<?php echo esc_url(filter_var(get_theme_mod('about_us_image'), FILTER_VALIDATE_URL) ? get_theme_mod('about_us_image') : cjl_get_image_url('about_us_img.png')); ?>" alt="">
                        
                    </div>
                </div>
                <div class="col-md-12 col-xl-7 col-xxl-7">
                    <div class="ps-md-5">
                        <h2 class="back_white_text_gradient title fw-light mb-3">
                            <?php echo esc_html(get_theme_mod('about_us_heading', 'Who We Are')); ?>
                        </h2>
                        <!-- <p class="lead"><?php echo wp_kses_post(get_theme_mod('about_us_content', 'We are a next-generation fund services firm operating at the intersection of institutional governance and advanced financial technology. Our integrated operating model brings together accounting rigor, regulatory intelligence, and investor transparency—engineered for performance-driven fund managers and global asset platforms. With a commitment to precision, discretion, and accountability, we act as a strategic extension of our clients’ operations—strengthening infrastructure while safeguarding reputation and investor trust.')); ?></p> -->
                        <p class="lead">We are a next-generation fund services firm operating at the intersection of institutional governance and advanced financial technology. Our integrated operating model brings together accounting rigor, regulatory intelligence, and investor transparency—engineered for performance-driven fund managers and global asset platforms. With a commitment to precision, discretion, and accountability, we act as a strategic extension of our clients’ operations—strengthening infrastructure while safeguarding reputation and investor trust</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container custom_container pt-5 pb-5 mb-5 t-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <article>
                    <h2 class="ctl-about-page__section-title">Vision</h2>
                    <p class="ctl-about-page__lead mb-0">To be a globally trusted fund services partner—setting the benchmark for institutional excellence through fintech innovation, disciplined governance, and data-driven intelligence. We envision a future where fund operations are seamlessly integrated, risk is proactively managed, and insight-led infrastructure enables sustainable growth across global markets.</p>
                </article>
            </div>
            <div class="col-lg-6">
                <article>
                    <h2 class="ctl-about-page__section-title">Our Mission</h2>
                    <p class="ctl-about-page__lead mb-0">To deliver institutionally governed, technology-enabled fund services that combine precision, regulatory confidence, and transparency—empowering fund managers and global asset platforms to operate with clarity, control, and scale. We are committed to executing every mandate with discretion, accountability, and uncompromising accuracy.</p>
                </article>
            </div>
        </div>
    </div>

    <section class="py-5 text-center text-white"
        style="background: linear-gradient(90deg, rgba(255,112,76,0.05) 0%, rgba(255,112,76,0.5) 51.92%, rgba(255,112,76,0.05) 100%);">

        <div class="container custom_container py-4">
            <h2 class="back_white_text_gradient title fw-normal fs-2">Powering The Next Generation Of Investment Platforms </h2>
            <p class="fw-light mb-4"> Discover how our institutional-grade fund services can strengthen your operational infrastructure and enhance investor confidence.</p>

            <div class="d-flex justify-content-center gap-5 flex-wrap">

                <a href="#" class="btn-explore btn-explore-white">
                START A CONVERSATION
                </a>

                <a href="#" class="btn-explore">
                EXPLORE OUR SERVICES
                </a>

            </div>

        </div>
    </section>
	<?php get_template_part( 'template-parts/contact-section' ); ?>

    </div>

<?php get_footer();
