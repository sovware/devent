<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class Socials_Widget extends \WP_Widget {
	
	public function __construct() {
		$id = 'devent_socials';
		parent::__construct(
			$id, // Base ID.
			esc_html__( '-devent: Socials', 'devent' ), // Name.
			array(
				'description' => esc_html__( 'devent: Socials( Footer )', 'devent' ),
			)
		);
	}

	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );
		?>
		<div class="social-box">
			<ul>
			<?php
			if ( ! empty( $instance['facebook'] ) ) {
				?>
				<li>
					<a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="la la-facebook-official"></i></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['twitter'] ) ) {
				?>
				<li>
					<a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="la la-twitter"></i></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['linkedin'] ) ) {
				?>
				<li>
					<a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="la la-linkedin"></i></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['pinterest'] ) ) {
				?>
					<li>
					<a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="la la-pinterest"></i></a>
					</li>
				<?php
			}
			if ( ! empty( $instance['instagram'] ) ) {
				?>
					<li>
					<a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="la la-instagram"></i></a>
					</li>
				<?php
			}
			if ( ! empty( $instance['youtube'] ) ) {
				?>
					<li>
					<a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><i class="la la-youtube-play"></i></a>
					</li>
				<?php
			}
			if ( ! empty( $instance['rss'] ) ) {
				?>
					<li>
					<a href="<?php echo esc_url( $instance['rss'] ); ?>" target="_blank"><i class="la la-rss"></i></a>
					</li>
				<?php
			}
			?>
			</ul>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['youtube']   = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['rss']       = ( ! empty( $new_instance['rss'] ) ) ? sanitize_text_field( $new_instance['rss'] ) : '';
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'facebook'  => '',
			'twitter'   => '',
			'linkedin'  => '',
			'pinterest' => '',
			'instagram' => '',
			'youtube'   => '',
			'rss'       => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'facebook'  => array(
				'label' => esc_html__( 'Facebook URL', 'devent' ),
				'type'  => 'url',
			),
			'twitter'   => array(
				'label' => esc_html__( 'Twitter URL', 'devent' ),
				'type'  => 'url',
			),
			'linkedin'  => array(
				'label' => esc_html__( 'Linkedin URL', 'devent' ),
				'type'  => 'url',
			),
			'pinterest' => array(
				'label' => esc_html__( 'Pinterest URL', 'devent' ),
				'type'  => 'url',
			),
			'instagram' => array(
				'label' => esc_html__( 'Instagram URL', 'devent' ),
				'type'  => 'url',
			),
			'youtube'   => array(
				'label' => esc_html__( 'YouTube URL', 'devent' ),
				'type'  => 'url',
			),
			'rss'       => array(
				'label' => esc_html__( 'Rss Feed URL', 'devent' ),
				'type'  => 'url',
			),
		);

		Widget_Fields::display( $fields, $instance, $this );
	}
}
