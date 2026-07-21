<?php
/**
 * Marquee Section Template Part
 *
 * Renders a seamless infinite marquee. The list is printed twice inside the
 * track; the CSS animation moves the track by -50% so the loop restarts
 * exactly where the duplicate begins (no cut-off items, no empty gap).
 *
 * @package CJL_Financial
 */

$marquee_query = new WP_Query(array(
    'post_type' => 'marquee',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
));

$default_marquee = array(
    array('title' => 'Governance-driven operational excellence for alternative investment platforms'),
    array('title' => 'Enterprise-grade, cloud-enabled infrastructure for global fund administration'),
    array('title' => 'Governance-driven operational excellence for alternative investment platforms'),
    array('title' => 'Enterprise-grade, cloud-enabled infrastructure for global fund administration'),
);

$marquees = array();
if ($marquee_query->have_posts()) {
    while ($marquee_query->have_posts()) {
        $marquee_query->the_post();
        $marquees[] = array(
            'title' => get_the_title(),
        );
    }
    wp_reset_postdata();
} else {
    $marquees = $default_marquee;
}

// Scale the scroll duration with the number of items so speed stays constant.
$marquee_count = max(count($marquees), 1);
?>
<section class="marquee" aria-label="<?php esc_attr_e('Highlights', 'cjl-financial'); ?>">
    <div class="marquee-track" style="--marquee-items: <?php echo esc_attr($marquee_count); ?>;">
        <?php for ($pass = 0; $pass < 2; $pass++) : ?>
            <ul class="marquee-group list-unstyled"<?php echo $pass === 1 ? ' aria-hidden="true"' : ''; ?>>
                <?php foreach ($marquees as $marquee) : ?>
                    <li class="item">
                        <img class="me-3" src="<?php echo esc_url(cjl_get_image_url('marquee_star.png')); ?>" alt="" loading="lazy" decoding="async">
                        <?php echo esc_html($marquee['title']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endfor; ?>
    </div>
</section>
