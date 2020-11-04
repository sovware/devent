<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$items = $data['items'];
$style = $data['style'];
?>

<section class="testimonial-wrapper">
	<?php
	if ( ( '1' === $style ) && ( $data['title'] || $data['subtitle'] ) ) {
		?>
		<div class="title text-center">
			<h1 class="fst"><?php echo esc_attr( $data['title'] ); ?></h1>
			<div class="fsc"> <p><?php echo esc_attr( $data['subtitle'] ); ?></p></div>
		</div>
		<?php
	}
	?>
	<div class="testimonial-carousel owl-carousel">
		<?php
		foreach ( $items as $item ) {
			$plc  = Helper::get_img( 'testimonial.png' );
			$desc = $item['desc'];
			$name = $item['name'];

			if ( '1' === $style ) {
				?>
			<div class="carousel-single">
				<div class="author-info">
					<img src="<?php echo esc_url( $plc ); ?>" class="img-fluid" alt="<?php echo esc_html( 'testimonial' ); ?>">
				</div>
				<div class="author-comment"><?php echo wp_kses_post( $desc ); ?></div>
				<p><?php echo esc_attr( $name ); ?></p>
			</div>
				<?php
			} else {
				?>
				<p>Style 2 goes to here..</p>
				<?php
			}
		}
		?>
	</div>
</section>
