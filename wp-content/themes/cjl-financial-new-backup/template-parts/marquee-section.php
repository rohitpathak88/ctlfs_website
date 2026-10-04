<?php
/**
 * Marquee Section Template Part
 *
 * @package CJL_Financial
 */
?>
<?php
$marquee_query = new WP_Query(array(
    'post_type' => 'marquee',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
));

$default_marquee = array(
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 1'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 2'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 3'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 4'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 5'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 6'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 7'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 8'),
    array('title' => 'Wealth Advisory Announced new partnerships to strengthen market presence. 9')
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

?>
<section class="marquee">
    <ul class="d-flex gap-5 m-0 p-0 list-unstyled">
        <?php foreach ($marquees as $index => $marquee): ?>
            <li class="item">
                <img class="me-3" src="<?php echo get_template_directory_uri(); ?>/assets/img/marquee_star.png">
                <?php echo esc_html($marquee['title']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>