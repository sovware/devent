<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$items = $data['items'];
?>

<!-- Start features -->
<section class="features">
	<div class="container">
		<div class="row">
		<?php
		foreach ( $items as $item ) {
			$plc  = Helper::get_img( 'car.png' );
			$imgs = $item['img'];
			$name = $item['title'];
			$desc = $item['description'];
			$img  = $imgs['url'] ? $imgs['url'] : $plc;
			$alt  = $imgs['id'] ? $imgs['id'] : $name;
			?>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="features-box text-center">
				<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
					<h3><?php echo esc_attr( $name ); ?></h3>
					<p><?php echo esc_attr( $desc ); ?></p>
				</div>
			</div>
			<?php
		}
		?>
		</div>
	</div>
</section>
<!-- End features -->
