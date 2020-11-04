<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class About_Widget extends \WP_Widget {
	public function __construct() {
		$id = 'devent_about';
		parent::__construct(
			$id, // Base ID
			esc_html__( '-devent: About', 'devent' ), // Name
			array(
				'description' => esc_html__( 'devent: About( Footer )', 'devent' ),
			)
		);
	}

		
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $instance['logo'] ) ) {
			$html = wp_get_attachment_image_src( $instance['logo'], 'full' );
			$html = $html[0];
			$html = '<div class="azin-img"><img src="' . $html . '" alt="' . $html . '"></div>';
		} elseif ( ! empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			$html = $args['before_title'] . $html . $args['after_title'];
		} else {
			$html = '';
		}

		echo wp_kses_post( $html );
		?>
		<p class="azin-des">
		<?php
		if ( ! empty( $instance['description'] ) ) {
			echo wp_kses_post( $instance['description'] );}
		?>
		</p>
		<ul class="azin-socials">
			<?php
			if ( ! empty( $instance['facebook'] ) ) {
				?>
				<li class="azin-facebook"><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fa fa-fw fa-facebook"></i></a></li>
															  <?php
			}
			if ( ! empty( $instance['twitter'] ) ) {
				?>
				<li class="azin-twitter"><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fa fa-fw fa-twitter"></i></a></li>
															 <?php
			}
			if ( ! empty( $instance['linkedin'] ) ) {
				?>
				<li class="azin-linkedin"><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fa fa-fw fa-linkedin"></i></a></li>
															  <?php
			}
			if ( ! empty( $instance['pinterest'] ) ) {
				?>
				<li class="azin-pinterest"><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fa fa-fw fa-pinterest"></i></a></li>
															   <?php
			}
			if ( ! empty( $instance['instagram'] ) ) {
				?>
				<li class="azin-instagram"><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fa fa-fw fa-instagram"></i></a></li>
															   <?php
			}
			if ( ! empty( $instance['youtube'] ) ) {
				?>
				<li class="azin-youtube"><a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><i class="fa fa-fw fa-youtube-play"></i></a></li>
															 <?php
			}
			if ( ! empty( $instance['rss'] ) ) {
				?>
				<li class="azin-rss"><a href="<?php echo esc_url( $instance['rss'] ); ?>" target="_blank"><i class="fa fa-fw fa-rss"></i></a></li>
														 <?php
			}
			?>
		</ul>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}


	public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['title']       = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['logo']        = ( ! empty( $new_instance['logo'] ) ) ? sanitize_text_field( $new_instance['logo'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
		$instance['facebook']    = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']     = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['linkedin']    = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest']   = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['instagram']   = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['youtube']     = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['rss']         = ( ! empty( $new_instance['rss'] ) ) ? sanitize_text_field( $new_instance['rss'] ) : '';
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'title'       => '',
			'logo'        => '',
			'description' => '',
			'facebook'    => '',
			'twitter'     => '',
			'linkedin'    => '',
			'pinterest'   => '',
			'instagram'   => '',
			'youtube'     => '',
			'rss'         => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label' => esc_html__( 'Title', 'devent' ),
				'type'  => 'text',
			),
			'logo'        => array(
				'label' => esc_html__( 'Logo', 'devent' ),
				'type'  => 'image',
			),
			'description' => array(
				'label' => esc_html__( 'Description', 'devent' ),
				'type'  => 'textarea',
			),
			'facebook'    => array(
				'label' => esc_html__( 'Facebook URL', 'devent' ),
				'type'  => 'url',
			),
			'twitter'     => array(
				'label' => esc_html__( 'Twitter URL', 'devent' ),
				'type'  => 'url',
			),
			'linkedin'    => array(
				'label' => esc_html__( 'Linkedin URL', 'devent' ),
				'type'  => 'url',
			),
			'pinterest'   => array(
				'label' => esc_html__( 'Pinterest URL', 'devent' ),
				'type'  => 'url',
			),
			'instagram'   => array(
				'label' => esc_html__( 'Instagram URL', 'devent' ),
				'type'  => 'url',
			),
			'youtube'     => array(
				'label' => esc_html__( 'YouTube URL', 'devent' ),
				'type'  => 'url',
			),
			'rss'         => array(
				'label' => esc_html__( 'Rss Feed URL', 'devent' ),
				'type'  => 'url',
			),
		);

		Widget_Fields::display( $fields, $instance, $this );
	}
}
