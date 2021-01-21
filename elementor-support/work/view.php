<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$items = $data['items'];
$imgs  = $data['img'];
$img   = $imgs['url'] ? $imgs['url'] : '';
$alt   = $imgs['id'] ? $imgs['id'] : '';
?>

<section class="testimonial-wrapper h_work-testimonial">
	<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
	<div class="h_work-carousel-box">
		<?php if ( $data['title'] || $data['subtitle'] ) { ?>
			<div class="title text-center">
				<h1><?php echo esc_attr( $data['title'] ); ?></h1>
				<p><?php echo esc_attr( $data['subtitle'] ); ?></p>
			</div>
		<?php } ?>
		<div class="h_work-carousel owl-carousel">
			<?php
			foreach ( $items as $item ) {
				$desc = $item['desc'];
				echo wpautop( $desc );
			}
			?>
		</div>
	</div>
</section>
