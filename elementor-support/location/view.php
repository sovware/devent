<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$layout     = $data['layout'];
$number_loc = $data['number_loc'];
$order_by   = $data['order_by'];
$order_list = $data['order_list'];
$row        = $data['row'];
$slug       = $data['slug'] ? implode( $data['slug'], array() ) : '';
?>

<section>
	<div class="container">
		<div class="row">
			<?php if ( ! empty( $data['title'] ) ) { ?>
				<div class="col-lg-12">
					<div class="section-title">
						<h1><?php echo esc_attr( $data['title'] ); ?></h1>
					</div>
				</div>
				<?php
			}

			echo do_shortcode( '[directorist_all_locations view="' . esc_attr( $layout ) . '" orderby="' . esc_attr( $order_by ) . '" order="' . esc_attr( $order_list ) . '" loc_per_page="' . $number_loc . '" columns="' . esc_attr( $row ) . '" slug="' . esc_attr( $slug ) . '"]' );
			?>
		</div>
	</div>
</section>
