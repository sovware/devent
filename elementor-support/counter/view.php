<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

$items = $data['items'];
?>

<section class="counter">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="counter-wrapper">
					<?php foreach ( $items as $item ) { ?>
						<div class="counter-inner">
							<h6>
								<span class="count_up"><?php echo esc_attr( $item['num'] ); ?></span><b><?php echo esc_attr( $item['suffix'] ); ?></b>
							</h6>
							<p><?php echo esc_attr( $item['label'] ); ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
