<?php

/**
 * Page Template
 *
 * @package CJL_Financial
 */

get_header();
?>

<main id="main" class="site-main mt-5 pt-4">
    <div class="container custom_container py-5">
        <?php
        while (have_posts()) { the_post();  ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header mb-4">
                    <h1 class="entry-title back_white_text_gradient"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail mb-4">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content lead">
                    <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'cjl-financial'),
                            'after' => '</div>',
                        ));
                    ?>
                </div>

                <?php if (comments_open() || get_comments_number()): ?>
                    <footer class="entry-footer mt-4 pt-4 border-top border-secondary">
                        <?php comments_template(); ?>
                    </footer>
                <?php endif; ?>
            </article>
        <?php } ?>
    </div>
</main>

<?php
get_footer();
