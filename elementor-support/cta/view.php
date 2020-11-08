<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

$imgs    = $data['img'];
$img     = $imgs['url'] ? $imgs['url'] : '';
$alt     = $imgs['id'] ? $imgs['id'] : '';
$btn_url = $data['button_url'];

if ( ! empty( $btn_url['url'] ) ) {
	$attr  = 'href="' . $data['button_url']['url'] . '"';
	$attr .= ! empty( $data['button_url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= ! empty( $data['button_url']['nofollow'] ) ? ' rel="nofollow"' : '';
}
?>

<section class="cta-wrapper">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<p class="cta-subtitle">Create your Events or Venues on DEvents</p>
			<h2>Reach new audiences and sell more tickets with DEvents</h2>
			<div class="cta-action-btns">
				<a href="" class="btn btn-primary">See Our Pricing</a>
				<a href="" class="btn btn-secondary">Create Events</a>
			</div>
		</div>
	</div>
</section>
