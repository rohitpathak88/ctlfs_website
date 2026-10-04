<?php
/**
 * 404 Error Page Template
 *
 * @package CJL_Financial
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container custom_container py-5">
        <div class="text-center py-5">
            <h1 class="display-1 back_white_text_gradient mb-4">404</h1>
            <h2 class="back_white_text_gradient mb-4">Page Not Found</h2>
            <p class="lead mb-4">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-danger btn-lg">Go to Homepage</a>
        </div>
    </div>
</main>

<?php
get_footer();
