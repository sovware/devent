<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$footer_columns = 0;

foreach ( range( 1, 4 ) as $i ) {
	if ( is_active_sidebar( 'footer-' . $i ) ) {
		$footer_columns++;
	}
}

switch ( $footer_columns ) {
	case '1':
		$footer_class = 'col-sm-12 col-12';
		break;
	case '2':
		$footer_class = 'col-sm-6 col-12';
		break;
	case '3':
		$footer_class = 'col-md-4 col-sm-12 col-12';
		break;
	default:
		$footer_class = 'col-lg-3 col-md-6 col-sm-6';
		break;
}
?>

<footer class="footer">
	<?php if ( $footer_columns ) { ?>
		<div class="footer-top">
			<div class="footer-top-area">
				<div class="container">
					<div class="row">
						<?php
						foreach ( range( 1, 4 ) as $i ) {
							if ( ! is_active_sidebar( 'footer-' . $i ) ) {
								continue;
							}
							echo '<div class="' . esc_attr( $footer_class ) . '">';
							dynamic_sidebar( 'footer-' . $i );
							echo '</div>';
						}
						?>
					</div>
				</div>
			</div>
		</div>	
	<?php } ?>

	<?php if ( Theme::$options['copyright_area'] ) { ?>
			<div class="footer-bottom">
				<div class="container text-center">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer-copyright">
								<p> <?php echo wp_kses_post( Theme::$options['copyright_text'] ); ?> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php } ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
