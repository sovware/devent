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
			<div class="col-lg-12">
				<div class="section-title section-title--two">
					<div>
						<h1><?php echo esc_attr( $data['title'] ); ?></h1>
						<p>Browse worldwide leading event organisers</p>
					</div>
					<a href="" class="view-all">View All <i class="la la-long-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="brand-logo-wrapper owl-carousel">
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
					<div class="brand-logo-single">
						<img src="https://via.placeholder.com/90" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
