<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

$btn_url = $data['button_url'];
if ( ! empty( $btn_url['url'] ) ) {
	$attr  = 'href="' . $data['button_url']['url'] . '"';
	$attr .= ! empty( $data['button_url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';

}
?>

<!-- Start About -->
<section class="about-wrapper">
	<div class="about-intro content_above">
		<div class="align-items-center">
			<h1 class="fst"><?php echo esc_attr( $data['title'] ); ?></h1>
			<div class="fsc"><?php echo wp_kses_post( $data['content'] ); ?></div>
			<?php
			if ( $btn_url['url'] ) {
				?>
				<a class="video-iframe play-btn-two"  <?php echo wp_kses_post( $attr ); ?> >
					<span class="icon"><i class="la la-youtube-play"></i></span>
					<span class="video"><?php echo esc_attr( $data['button_text'] ); ?></span>
				</a>
				<?php
			}
			?>
		</div>
	</div><!-- ends: .about-intro -->
</section>
<!-- End About -->
