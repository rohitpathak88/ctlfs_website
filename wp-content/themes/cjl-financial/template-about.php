<?php
/**
 * Template Name: About Us / Insights
 *
 * Insights/articles page per Figma (node 3572:7025) — featured article,
 * article grid with author chips, load-more, CTA band and fresh news.
 *
 * @package CJL_Financial
 */

get_header();

$author_name   = 'Kriti Jaiswal';
$author_avatar = cjl_get_image_url('author_avatar.png');

$articles = array(
    array(
        'image' => 'blog_card_1.jpg',
        'title' => 'Why Accurate NAV Calculation Is Critical for Investment Funds',
        'text'  => 'Net Asset Value (NAV) is one of the most fundamental metrics in the fund management industry. It represents the total value of a fund\'s assets minus its liabilities and determines the price at which investors buy or redeem fund units...',
    ),
    array(
        'image' => 'blog_card_2.png',
        'title' => 'The Importance of Regulatory Compliance in Fund Operations',
        'text'  => 'Regulatory compliance has become one of the most important aspects of operating an investment fund. With financial authorities around the world continuously strengthening oversight, fund managers must ensure that their operations...',
    ),
    array(
        'image' => 'blog_card_3.png',
        'title' => 'How Investor Services Enhance Fund Transparency',
        'text'  => 'Investor expectations in the financial industry have evolved significantly over the past decade. Investors today demand greater transparency, faster communication, and better access to information about their investments....',
    ),
);

// The Figma layout shows two identical rows of the three article cards.
$article_rows = array($articles, $articles);
?>

<div class="insights-page">

    <!-- Featured Article -->
    <section class="insights-featured">
        <div class="container custom_container">
            <div class="featured-card text-center">
                <span class="author-chip author-chip-dark mb-4">
                    <img src="<?php echo esc_url($author_avatar); ?>" alt="" loading="lazy" decoding="async">
                    <?php echo esc_html($author_name); ?>
                </span>
                <h1 class="back_white_text_gradient fw-light title text-capitalize mb-3">The Role of Fund Administration in Modern Investment Management</h1>
                <p class="lead mb-0">The global investment landscape is becoming increasingly complex, driven by regulatory changes, cross-border investment flows, and evolving investor expectations. In this environment, efficient fund administration has become a critical component of successful... <a href="#" class="read-more">Read More</a></p>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="insights-grid">
        <div class="container custom_container">
            <?php foreach ($article_rows as $row): ?>
                <div class="row g-4 insights-row">
                    <?php foreach ($row as $article): ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="insight-card">
                                <div class="insight-image mb-4">
                                    <img src="<?php echo esc_url(cjl_get_image_url($article['image'])); ?>" alt="<?php echo esc_attr($article['title']); ?>" loading="lazy" decoding="async">
                                    <span class="author-chip author-chip-light">
                                        <img src="<?php echo esc_url($author_avatar); ?>" alt="" loading="lazy" decoding="async">
                                        <?php echo esc_html($author_name); ?>
                                    </span>
                                </div>
                                <h2 class="back_white_text_gradient fw-light title text-capitalize mb-3"><?php echo esc_html($article['title']); ?></h2>
                                <p class="lead mb-0"><?php echo esc_html($article['text']); ?> <a href="#" class="read-more">Read More</a></p>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div class="load-more-wrap d-flex align-items-center mt-5">
                <span class="load-more-line" aria-hidden="true"></span>
                <a href="#" class="btn-explore">Load More</a>
                <span class="load-more-line load-more-line-end" aria-hidden="true"></span>
            </div>
        </div>
    </section>

    <!-- CTA Band -->
    <section class="cta-band text-center">
        <div class="container custom_container">
            <h2 class="back_white_text_gradient fw-light title text-capitalize mb-3">Powering the Next Generation of Investment Platforms</h2>
            <p class="lead mb-5">Discover how our institutional-grade fund services can strengthen your operational infrastructure and enhance investor confidence.</p>
            <div class="d-flex flex-wrap gap-4 justify-content-center">
                <a href="#contact" class="btn-explore btn-explore-white">Start a Conversation</a>
                <a href="<?php echo esc_url(home_url('/#services')); ?>" class="btn-explore btn-explore-white">Explore Our Services</a>
            </div>
        </div>
    </section>

    <?php
    // Our Fresh News (shared with the front page).
    get_template_part('template-parts/news-section');
    ?>

</div>

<?php
get_footer();
