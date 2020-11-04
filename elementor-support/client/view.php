<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

use AazzTech\devent\Helper;

$items = $data['items'];
$style = $data['style'];

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="partner">
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
			foreach ( $items as $item ) {
				$title = $item['title'];
				$plc   = Helper::get_img( 'bmw.png' );
				$imgs  = $item['img'];
				$img   = $imgs['url'] ? $imgs['url'] : $plc;
				$alt   = $imgs['id'] ? $imgs['id'] : $name;

				if ( 1 == $style ) {
					?>
						<div class="brand-col-6 col-lg-3 col-md-4 col-sm-6">
							<div class="features-box features-box--4">
								<div class="features-box__wrapper">
									<div class="features-box__img content-center">
										<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
									</div>
								</div>
							</div>
						</div>
						<?php
				} else {
					?>
						<div class="brand-col-8 col-lg-3 col-md-4 col-sm-6">
							<div class="features-box features-box--3  text-center">
								<div class="features-box__wrapper">
									<div class="features-box__img p-20 border-color shadow6 radius-sm ">
										<img src="<?php echo esc_url( $img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $alt ); ?>">
									</div>
									<div class="features-box__title">
										<p><?php echo esc_attr( $title ); ?></p>
									</div>
								</div>
							</div>
						</div>
						<?php
				}
			}
			?>
		</div>
	</div>
</section>
