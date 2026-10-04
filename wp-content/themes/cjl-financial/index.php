<?php
/**
 * The main template file
 *
 * @package CJL_Financial
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container custom_container py-5">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                    <header class="entry-header mb-3">
                        <h1 class="entry-title back_white_text_gradient">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none"><?php the_title(); ?></a>
                        </h1>
                        <div class="entry-meta text-muted">
                            <small>Published: <?php echo get_the_date(); ?></small>
                        </div>
                    </header>
                    
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post-thumbnail mb-3">
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content lead">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <footer class="entry-footer mt-3">
                        <a href="<?php the_permalink(); ?>" class="btn btn-danger">Read More</a>
                    </footer>
                </article>
                <?php
            }
            
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&laquo; Previous', 'cjl-financial'),
                'next_text' => __('Next &raquo;', 'cjl-financial'),
            ));
        } else {
            ?>
            <div class="text-center py-5">
                <h1 class="back_white_text_gradient mb-4">Nothing Found</h1>
                <p class="lead">It seems we can't find what you're looking for. Perhaps searching can help.</p>
                <?php get_search_form(); ?>
            </div>
            <?php
        }
        ?>
    </div>
</main>

<?php
get_footer();
