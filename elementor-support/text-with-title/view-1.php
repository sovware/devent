<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

?>

<!-- Start About-Header -->
<section class="about-header">
	<div class="about-image"> <img src="<?php echo esc_url( $data['image']['url'] ); ?>" class="img-fluid"> </div>
	<div class="about-header-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="about-header-wrapper-inner">
						<div class="display-two fst"> <?php echo esc_attr( $data['title'] ); ?> </div>
						<div class="fsc"><?php echo wp_kses_post( $data['content'] ); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Header -->
