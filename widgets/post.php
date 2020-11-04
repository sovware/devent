<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class Post_Widget extends \WP_Widget {

	public function __construct() {
		$id = 'devent_post';
		parent::__construct(
			$id, // Base ID.
			esc_html__( '-devent: Posts', 'devent' ), // Name.
			array(
				'description' => esc_html__( 'devent: Posts', 'devent' ),
			)
		);
	}

	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}

		$q_args = array(
			'cat'                 => (int) $instance['cat'],
			'orderby'             => $instance['orderby'],
			'posts_per_page'      => $instance['number'],
			'ignore_sticky_posts' => true,
		);

		switch ( $instance['orderby'] ) {
			case 'title':
			case 'menu_order':
				$q_args['order'] = 'ASC';
				break;
		}

		$query = new \WP_Query( $q_args );
		?>
				<ul>
		<?php if ( $query->have_posts() ) : ?>
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
					<li class="azin-item">
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="azin-thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?><div class="azin-icon"><i class="flaticon-plus-symbol"></i></div></a>
						<?php else : ?>
							<a class="azin-thumb" href="<?php the_permalink(); ?>"><img src="<?php echo Helper::get_img( 'nothumb.png' ); ?>"><div class="azin-icon"><i class="flaticon-plus-symbol"></i></div></a>
						<?php endif; ?>
						<div class="azin-content">
							<div class="azin-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
							<h3 class="azin-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</li>
			<?php endwhile; ?>
		<?php else : ?>
			<div><?php esc_html_e( 'Currently there are no posts to display', 'devent' ); ?></div>
		<?php endif; ?>
		</ul>
		<?php wp_reset_postdata(); ?>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance            = array();
		$instance['title']   = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['cat']     = ( ! empty( $new_instance['cat'] ) ) ? sanitize_text_field( $new_instance['cat'] ) : '';
		$instance['orderby'] = ( ! empty( $new_instance['orderby'] ) ) ? sanitize_text_field( $new_instance['orderby'] ) : '';
		$instance['number']  = ( ! empty( $new_instance['number'] ) ) ? sanitize_text_field( $new_instance['number'] ) : '';
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'title'   => '',
			'cat'     => '0',
			'orderby' => '',
			'number'  => '5',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$categories        = get_categories();
		$category_dropdown = array( '0' => __( 'All Categories', 'devent' ) );

		foreach ( $categories as $category ) {
			$category_dropdown[ $category->term_id ] = $category->name;
		}

		$orderby = array(
			'date'       => __( 'Date (Recent comes first)', 'devent' ),
			'title'      => __( 'Title', 'devent' ),
			'menu_order' => __( 'Custom Order (Available via Order field inside Page Attributes box)', 'devent' ),
		);

		$fields = array(
			'title'   => array(
				'label' => esc_html__( 'Title', 'devent' ),
				'type'  => 'text',
			),
			'cat'     => array(
				'label'   => esc_html__( 'Category', 'devent' ),
				'type'    => 'select',
				'options' => $category_dropdown,
			),
			'orderby' => array(
				'label'   => esc_html__( 'Order by', 'devent' ),
				'type'    => 'select',
				'options' => $orderby,
			),
			'number'  => array(
				'label' => esc_html__( 'Number of Post', 'devent' ),
				'type'  => 'number',
			),
		);

		Widget_Fields::display( $fields, $instance, $this );
	}
}
