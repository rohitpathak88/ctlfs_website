<?php
/**
 * Search Results Template
 *
 * @package CJL_Financial
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container custom_container py-5">
        <header class="page-header mb-5">
            <h1 class="page-title back_white_text_gradient">
                <?php
                printf(
                    esc_html__('Search Results for: %s', 'cjl-financial'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>
        
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                    <header class="entry-header mb-3">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none back_white_text_gradient"><?php the_title(); ?></a>
                        </h2>
                        <div class="entry-meta text-muted">
                            <small>Published: <?php echo get_the_date(); ?></small>
                        </div>
                    </header>
                    
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post-thumbnail mb-3">
                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
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
            
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&laquo; Previous', 'cjl-financial'),
                'next_text' => __('Next &raquo;', 'cjl-financial'),
            ));
        } else {
            ?>
            <div class="text-center py-5">
                <p class="lead">Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
                <?php get_search_form(); ?>
            </div>
            <?php
        }
        ?>
    </div>
</main>

<?php
get_footer();
