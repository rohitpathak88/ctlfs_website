<?php
/**
 * Single Post Template
 *
 * @package CJL_Financial
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container custom_container py-5">
        <?php
        while (have_posts()) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                <header class="entry-header mb-4">
                    <h1 class="entry-title back_white_text_gradient"><?php the_title(); ?></h1>
                    <div class="entry-meta text-muted mb-3">
                        <small>Published: <?php echo get_the_date(); ?></small>
                        <?php if (get_the_category()): ?>
                            <span class="ms-3">Category: <?php the_category(', '); ?></span>
                        <?php endif; ?>
                    </div>
                </header>
                
                <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail mb-4">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content lead">
                    <?php the_content(); ?>
                </div>
                
                <footer class="entry-footer mt-4 pt-4 border-top border-secondary">
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'cjl-financial'),
                        'after' => '</div>',
                    ));
                    ?>
                </footer>
            </article>
            
            <?php
            // Post navigation
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'cjl-financial') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'cjl-financial') . '</span> <span class="nav-title">%title</span>',
            ));
            
            // Comments
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        }
        ?>
    </div>
</main>

<?php
get_footer();
