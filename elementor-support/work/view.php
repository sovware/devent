<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$items = $data['items'];
$style = $data['style'];
$imgs  = $data['img'];
$img   = $imgs['url'] ? $imgs['url'] : '';
$alt   = $imgs['id'] ? $imgs['id'] : '';
?>

<section class="testimonial-wrapper">
	<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
	<?php
	if ( $data['title'] || $data['subtitle'] ) {
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
			$desc = $item['desc'];
			echo wpautop( $desc );
		}
		?>
	</div>
</section>
