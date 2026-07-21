<?php
/**
 * Home highlights marquee.
 *
 * @package CTL_Financial_Child
 */

$content = ctl_financial_home_content();
$items   = $content['marquee'];
?>

<section class="marquee ctl-marquee" aria-label="<?php esc_attr_e( 'Highlights', 'cjl-financial-child' ); ?>">
	<div class="marquee-track">
		<?php for ( $pass = 0; $pass < 2; $pass++ ) : ?>
			<ul class="marquee-group list-unstyled"<?php echo 1 === $pass ? ' aria-hidden="true"' : ''; ?>>
				<?php foreach ( $items as $item ) : ?>
					<li class="item">
						<img src="<?php echo esc_url( cjl_get_image_url( 'marquee_star.png' ) ); ?>" alt="" width="19" height="19" loading="lazy" decoding="async">
						<?php echo esc_html( $item ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endfor; ?>
	</div>
</section>
