<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

$items = $data['items'];
?>

<section class="cta-wrapper">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h2><?php echo esc_attr( $data['title'] ); ?></h2>
			<p><?php echo esc_attr( $data['subtitle'] ); ?></p>
			<div class="cta-action-btns">

			<?php
			foreach ( $items as $item ) {
				$color       = $item['button_color'];
				$bg          = $item['button_bg'];
				$btn_label   = $item['btn_label'];
				$button_icon = $item['button_icon'] ? '<i class="' . $item['button_icon'] . '"></i>' : '';
				$btn_url     = $item['button_url'];
				$style       = 'style="background: ' . $bg . '; color: ' . $color . ';"';
				$attr        = '';
				if ( ! empty( $btn_url['url'] ) ) {
					$attr  = 'href="' . $item['button_url']['url'] . '"';
					$attr .= ! empty( $item['button_url']['is_external'] ) ? ' target="_blank"' : '';
					$attr .= ! empty( $item['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';
				}
				?>

				<?php if ( $btn_label ) { ?>
				<a  class="cta-btn cta-btn--dark" <?php echo wp_kses_post( $attr . $style ); ?> > <?php echo wp_kses_post( $button_icon ) . esc_attr( $btn_label ); ?></a>
				<?php } ?>

				<?php
			}
			?>
			</div>
		</div>
	</div>
</section>
