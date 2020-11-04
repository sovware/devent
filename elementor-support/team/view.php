<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$title = $data['title'];
$items = $data['items'];
?>

<!-- Start Team -->
<section class="team">
	<div class="container">
		<?php
		if ( $title ) {
			?>
			<div class="title text-center">
				<h1><?php echo esc_attr( $title ); ?></h1>
			</div>
			<?php
		}
		?>
		<div class="row">
			<?php
			foreach ( $items as $item ) {
				$plc  = Helper::get_img( 'team.jpg' );
				$imgs = $item['img'];
				$name = $item['name'];
				$desg = $item['designation'];
				$img  = $imgs['url'] ? $imgs['url'] : $plc;
				$alt  = $imgs['id'] ? $imgs['id'] : $name;
				?>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="team-wrapper">
						<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
						<div class="team-wrapper-inner">
							<h6><?php echo esc_attr( $name ); ?></h6>
							<p><?php echo esc_attr( $desg ); ?></p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
<!-- End Team -->
