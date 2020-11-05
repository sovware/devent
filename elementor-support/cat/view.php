<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$slugs              = 'slug' === $data['order_by'] ? $data['slug'] : '';
$args               = array(
	'slug'          => $slugs,
	'orderby'       => $data['order_by'],
	'order'         => $data['order_list'],
	'parent'        => 0,
	'number'        => $data['number'],
	'hide_empty'    => true,
	'taxonomy'      => ATBDP_CATEGORY,
	'no_found_rows' => true,
);
$popular_categories = get_categories( $args );
$style              = $data['style'];
?>

<section>
	<div class="container">
		<div class="row">
			<?php if ( $data['title'] || $data['subtitle'] ) { ?>
				<div class="col-lg-12">
					<div class="section-title">
						<h1><?php echo esc_attr( $data['title'] ); ?></h1>
						<p><?php echo esc_attr( $data['subtitle'] ); ?></p>
					</div>
				</div>
				<?php
			}

			if ( $popular_categories ) {
				foreach ( $popular_categories as $category ) {
					$link      = is_directorist() ? \ATBDP_Permalink::atbdp_get_category_page( (object) $category ) : '';
					$icon      = get_cat_icon( $category->term_id );
					$icon_type = substr( $icon, 0, 2 );
					$image_id  = get_term_meta( $category->term_id, 'image', true );
					$image     = $image_id ? wp_get_attachment_image_src( $image_id, 'findbiz-popular-cat' ) : '';
					$image     = ! empty( $image ) ? esc_url( $image[0] ) : '';
					$icon      = ( 'la' === $icon_type ) ? $icon_type . ' ' . $icon : 'fa ' . $icon;
					?>
					<div class="col-xl-5 col-lg-3 col-md-4 col-sm-6">
						<div class="features-box features-box--1 text-center content-center shadow6 radius-sm border-color px-30 pt-30 pb-20 ">
							<div class="features-box__wrapper">
								<a href="<?php echo esc_url( $link ); ?>">
									<div class="features-box__img">
										<?php
										echo sprintf( '<i class="%s cat-icon"></i>', esc_attr( $icon ) );
										// echo sprintf( '<img src="%s" alt="%s" class="img-fluid" />', esc_url( $image ), esc_attr( Helper::image_alt( $image_id ) ) );
										?>
									</div>
								</a>
								<div class="features-box__title">
									<p><?php echo esc_attr( $category->name ); ?> <span>- 84</span></p>
								</div>
							</div>
						</div>
					</div>
					<?php
				} wp_reset_postdata();
			} else {
				echo sprintf( '<h3>%s</h3>', esc_html__( 'No categories are found!', 'findbiz-core' ) );
			}
			?>
		</div>
	</div>
</section>
