<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

use AazzTech\devent\Helper;

$items   = $data['items'];
$btn_url = $data['button_url'];
if ( ! empty( $btn_url['url'] ) ) {
	$attr  = 'href="' . $data['button_url']['url'] . '"';
	$attr .= ! empty( $data['button_url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';

} ?>

<section class="partner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title section-title--two">
					<div>
						<h1><?php echo esc_attr( $data['title'] ); ?></h1>
						<p><?php echo esc_attr( $data['subtitle'] ); ?></p>
					</div>
					<?php
					if ( $btn_url['url'] || $data['button_text'] ) {
						?>
						<a class="view-all" <?php echo wp_kses_post( $attr ); ?> ><?php echo esc_attr( $data['button_text'] ); ?><i class="la la-long-arrow-right"></i></a>
						<?php
					}
					?>
				</div>
			</div>
			<?php if ( $items ) { ?>
				<div class="col-lg-12">
					<div class="brand-logo-wrapper owl-carousel">
						<?php
						foreach ( $items as $item ) {
							$plc  = Helper::get_img( 'bmw.png' );
							$imgs = $item['img'];
							$img  = $imgs['url'] ? $imgs['url'] : $plc;
							$alt  = $imgs['id'] ? $imgs['id'] : '';
							?>
								<div class="brand-logo-single">
									<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( Helper::image_alt( $alt ) ); ?>">
								</div>
							<?php
						}
						?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
