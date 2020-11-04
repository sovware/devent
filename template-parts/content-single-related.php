<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$args = array(
	'category__in'        => wp_get_post_categories( $post->ID ),
	'post__not_in'        => array( $post->ID ),
	'numberposts'         => 3,
	'ignore_sticky_posts' => 1,
);

$related = get_posts( $args );
$count   = count( $related );

if ( ! $count ) {
	return;
}

$thumb_size  = 'devent-size2';
$date_format = apply_filters( 'aztheme_related_post_date_format', 'F j, Y' );

if ( 3 === $count ) {
	$post_class = 'col-lg-4 col-sm-6 col-12';
} elseif ( 2 === $count ) {
	$post_class = 'col-sm-6 col-12';
} else {
	$post_class = 'col-sm-12 col-12';
}
?>

<div class="related-post-area">
	<h3 class="related-post-section-title"><?php esc_html_e( 'Related Posts', 'devent' ); ?></h3>
	<div class="related-post">
		<div class="row">
			<?php foreach ( $related as $post_obj ) : ?>
				<div class="<?php echo esc_attr( $post_class ); ?>">
					<div class="devent_blog-card related-post-each">
						<?php if ( has_post_thumbnail( $post_obj ) ) : ?>
							<div class="related-post-thumbnail"><?php echo get_the_post_thumbnail( $post_obj, $thumb_size ); ?></div>
						<?php endif; ?>

						<h5 class="related-post-title">
							<a href="<?php echo esc_url( get_permalink( $post_obj ) ); ?>"><?php echo get_the_title( $post_obj ); ?></a>
						</h5>

						<div class="related-post-meta">
							<span class="related-post-time"><?php echo get_post_time( $date_format, false, $post_obj ); ?></span>
							<span class="related-post-sep"><?php esc_html_e( '- In', 'devent' ); ?></span>
							<span class="related-post-cats"><?php echo get_the_category_list( ', ', '', $post_obj->ID ); ?></span>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
