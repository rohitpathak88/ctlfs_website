<?php get_header(); ?>

<!-- <div class="container custom_container mt-5 pt-5"> -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="container custom_container mt-5 pt-5">
                <div class="service-image mt-5 pt-3">
                    <img class="img-fluid w-100" src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="">
                </div>
            </div>
        <?php endif; ?>
        <div class="container custom_container  mt-5 pt-5">
            <div class="d-flex mb-2 mt-5 single_service_icon">
                <span class="bg-secondary-accent d-block rounded-5 text-center">
                    <img src="<?php echo cjl_get_image_url('wealth_advisory_icon.png'); ?>" alt="<?php the_title(); ?>">
                </span>
                <h1 class="accent-gradient display-4 fw-light mb-3 ms-5"><?php the_title(); ?> </h1>
            </div>
        </div>

        <div class="service-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>
<!-- </div> -->

<?php
    // Contact Section
    get_template_part('template-parts/contact-section');

?>

<?php get_footer();
