<?php
/**
 * Alliances Section Template Part
 *
 * @package CJL_Financial
 */

// Query alliances
$alliances_query = new WP_Query(array(
    'post_type'      => 'alliances',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
));

// Default logos (fallback)
$default_alliances = array(
    array('image' => cjl_get_image_url('eit_health_logo.png'), 'alt' => 'EIT Health', 'order' => 1, 'position' => 0),
    array('image' => cjl_get_image_url('Sony-Logo.png'), 'alt' => 'Sony', 'order' => 2, 'position' => 80),
    array('image' => cjl_get_image_url('Horizon-2020-logo.png'), 'alt' => 'Blue Prism', 'order' => 3, 'position' => 170),
    array('image' => cjl_get_image_url('Venturecup.png'), 'alt' => 'Venture Cup', 'order' => 4, 'position' => 80),
    array('image' => cjl_get_image_url('almi_logo.png'), 'alt' => 'ALMI', 'order' => 5, 'position' => 0),
);

$alliances = array();

// Get logos from meta
if ($alliances_query->have_posts()) {
    while ($alliances_query->have_posts()) {
        $alliances_query->the_post();

        $logos = get_post_meta(get_the_ID(), '_alliance_logos', true);

        if (is_array($logos)) {
            foreach ($logos as $logo) {
                if (empty($logo['image'])) {
                    continue;
                }

                $alliances[] = array(
                    'image'    => $logo['image'],
                    'alt'      => $logo['alt'] ?? get_the_title(),
                    'order'    => $logo['order'] ?? 999,
                    'position' => $logo['position'] ?? 'normal',
                );
            }
        }
    }
    wp_reset_postdata();
}

// Fallback if no logos
if (empty($alliances)) {
    $alliances = $default_alliances;
}

// Sort by order
usort($alliances, function ($a, $b) {
    return ($a['order'] ?? 999) <=> ($b['order'] ?? 999);
});

// Only first 5 logos
$alliances = array_slice($alliances, 0, 5);
?>

<!-- Trusted Alliances Section -->
<section class="alliances-section"
    style="background-image:url(<?php echo esc_url(cjl_get_image_url('our_trusted_alliances_bg.png')); ?>);
           background-position: bottom;
           background-repeat: no-repeat;">

    <div class="container custom_container">
        <h2 class="text-center back_white_text_gradient title fw-light mb-5 mb-md-0">
            Our Trusted Alliances
        </h2>

        <div class="row">

            <!-- LEFT -->
            <div class="col-md-5">
                <div class="row">
                    <?php for ($i = 0; $i < 2; $i++): if (!isset($alliances[$i])) continue; ?>
                        <div class="col-sm-12 col-md-6 mb-4">
                            <div class="alliance-logo p-4 <?php
                                echo ($alliances[$i]['position'] !== 0)
                                    ? 'position-relative alliance-logo-top-' . esc_attr($alliances[$i]['position'])
                                    : '';
                            ?>">
                                <img class="img-fluid"
                                     src="<?php echo esc_url($alliances[$i]['image']); ?>"
                                     alt="<?php echo esc_attr($alliances[$i]['alt']); ?>">
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- CENTER -->
            <?php if (isset($alliances[2])): ?>
                <div class="col-sm-12 col-md-2 text-center mb-4">
                    <div class="alliance-logo p-4 position-relative alliance-logo-top-<?php echo esc_attr($alliances[2]['position']); ?>">
                        <img class="img-fluid"
                             src="<?php echo esc_url($alliances[2]['image']); ?>"
                             alt="<?php echo esc_attr($alliances[2]['alt']); ?>">
                    </div>
                </div>
            <?php endif; ?>

            <!-- RIGHT -->
            <div class="col-md-5">
                <div class="row">
                    <?php for ($i = 3; $i < 5; $i++): if (!isset($alliances[$i])) continue; ?>
                        <div class="col-sm-12 col-md-6 mb-4">
                            <div class="alliance-logo p-4 <?php
                                echo ($alliances[$i]['position'] !== 0)
                                    ? 'position-relative alliance-logo-top-' . esc_attr($alliances[$i]['position'])
                                    : '';
                            ?>">
                                <img class="img-fluid"
                                     src="<?php echo esc_url($alliances[$i]['image']); ?>"
                                     alt="<?php echo esc_attr($alliances[$i]['alt']); ?>">
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

        </div>
    </div>
</section>
