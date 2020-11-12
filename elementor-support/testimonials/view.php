<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$items = $data['items'];
?>

<section class="testimonial-wrapper">
	<?php
	if ( $data['title'] || $data['subtitle'] ) {
		?>
		<div class="title text-center">
			<h1 class="fst"><?php echo wp_kses_post( $data['title'] ); ?></h1>
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
			$imgs = $item['img'];
			$img  = $imgs['url'] ? $imgs['url'] : '';
			$alt  = $imgs['id'] ? $imgs['id'] : '';
			?>
			<div class="carousel-single">
				<div class="author-info">
					<img src="<?php echo esc_url( $plc ); ?>" class="img-fluid" alt="<?php echo esc_html( 'testimonial' ); ?>">
				</div>
				<div class="author-comment"><?php echo wp_kses_post( $desc ); ?></div>
				<p><?php echo esc_attr( $name ); ?></p>
			</div>
			<?php
		}
		?>
	</div>
</section>
