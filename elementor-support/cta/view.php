<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

$imgs    = $data['img'];
$img     = $imgs['url'] ? $imgs['url'] : '';
$alt     = $imgs['id'] ? $imgs['id'] : '';
$btn_url = $data['button_url'];

if ( ! empty( $btn_url['url'] ) ) {
	$attr  = 'href="' . $data['button_url']['url'] . '"';
	$attr .= ! empty( $data['button_url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';
}
?>

<section class="help">
	<div class="help-wrapper">
		<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
		<h2><?php echo esc_attr( $data['title'] ); ?></h2>
		<p><?php echo esc_attr( $data['subtitle'] ); ?></p>

		<?php
		if ( $btn_url['url'] ) {
			?>
			<div class="help-btn">
				<a <?php echo wp_kses_post( $attr ); ?> class="btn btn-secondary"> <?php echo esc_attr( $data['button_text'] ); ?> </a>
			</div>
			<?php
		}
		?>
	</div>
</section>
