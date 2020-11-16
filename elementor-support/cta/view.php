<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

$btn_url  = $data['button_url'];
$btn_url2 = $data['button_url2'];

if ( ! empty( $btn_url['url'] ) ) {
	$attr  = 'href="' . $data['button_url']['url'] . '"';
	$attr .= ! empty( $data['button_url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';
}

if ( ! empty( $btn_url2['url'] ) ) {
	$attr2  = 'href="' . $data['button_url2']['url'] . '"';
	$attr2 .= ! empty( $data['button_url2']['is_external'] ) ? ' target="_blank"' : '';
	$attr2 .= ! empty( $data['button_url2']['nofollow'] ) ? ' rel="nofollow"' : '';
}
?>

<section class="cta-wrapper">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h2><?php echo esc_attr( $data['title'] ); ?></h2>
			<p><?php echo esc_attr( $data['subtitle'] ); ?></p>
			<div class="cta-action-btns">
			<?php if ( $btn_url['url'] || $data['button_text'] ) { ?>
				<a class="cta-btn cta-btn--dark" <?php echo wp_kses_post( $attr ); ?> ><i class="fab fa-apple"></i><?php echo esc_attr( $data['button_text'] ); ?> </a>
			<?php } ?>

			<?php if ( $btn_url2['url'] || $data['button_text2'] ) { ?>
				<a class="cta-btn cta-btn--light" <?php echo wp_kses_post( $attr2 ); ?> ><i class="lab la-google-play"></i></i><?php echo esc_attr( $data['button_text2'] ); ?> </a>
			<?php } ?>
			</div>
		</div>
	</div>
</section>
