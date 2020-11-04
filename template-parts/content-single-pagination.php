<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$previous = get_previous_post();
$next     = get_next_post();

$date_format = apply_filters( 'aztheme_post_pagination_date_format', 'F j, Y' );
?>

<div class="post-pagination">

	<?php if ( $previous ) : ?>

		<?php $post_obj = $previous; ?>

		<div class="post-pagination-each prev-post-pagination">
			<div class="post-pagination-label"><?php esc_html_e( 'Previous Post:', 'devent' ); ?></div>
			<h3 class="post-pagination-title">
				<a href="<?php echo esc_url( get_permalink( $post_obj ) ); ?>">
					<?php echo get_the_title( $post_obj ); ?>
				</a>
			</h3>
			<div class="post-pagination-meta">
				<span class="post-pagination-time"><?php echo esc_html( get_post_time( $date_format, false, $post_obj ) ); ?></span>
				<span class="post-pagination-sep"><?php esc_html_e( '- In', 'devent' ); ?></span>
				<span class="post-pagination-cats"><?php echo wp_kses_data( get_the_category_list( ', ', '', $post_obj->ID ) ); ?></span>
			</div>
		</div>

	<?php endif; ?>

	<?php if ( $next ) : ?>

		<?php $post_obj = $next; ?>

		<div class="post-pagination-each next-post-pagination">
			<div class="post-pagination-label"><?php esc_html_e( 'Next Post:', 'devent' ); ?></div>
			<h3 class="post-pagination-title"> 
				<a href="<?php echo esc_url( get_permalink( $post_obj ) ); ?>"><?php echo get_the_title( $post_obj ); ?></a>
			</h3>
			<div class="post-pagination-meta">
				<span class="post-pagination-time"><?php echo esc_html( get_post_time( $date_format, false, $post_obj ) ); ?></span>
				<span class="post-pagination-sep"><?php esc_html_e( '- In', 'devent' ); ?></span>
				<span class="post-pagination-cats"><?php echo wp_kses_data( get_the_category_list( ', ', '', $post_obj->ID ) ); ?></span>
			</div>
		</div>

	<?php endif; ?>

</div>
