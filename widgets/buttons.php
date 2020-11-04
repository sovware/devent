<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class Buttons_Widget extends \WP_Widget {
	
	public function __construct() {
		$id = 'devent_buttons';
		parent::__construct(
			$id, // Base ID.
			esc_html__( '-devent: Buttons', 'devent' ), // Name.
			array(
				'description' => esc_html__( 'devent: Buttons( Footer )', 'devent' ),
			)
		);
	}

	public function widget( $args, $instance ) {
		?>
<div class="widget apps-download">
	<?php
			if ( ! empty( $instance['title'] ) ) {
				?>
	<h5 class="widget-title"><?php echo esc_attr( $instance['app_button'] ); ?></h5>
	<?php
			}
			?>

	<ul>
		<?php
				if ( ! empty( $instance['app_button'] ) ) {
					?>
		<li>
			<a href="<?php echo esc_url( $instance['app_url'] ); ?>" class="btn btn-primary btn-lg">
				<img src="<?php echo Helper::get_img( 'apple.png' ); ?>" class="img-fluid" alt="">
				<?php echo esc_attr( $instance['app_button'] ); ?>
			</a>
		</li>
		<?php
				}
				?>
		<?php
				if ( ! empty( $instance['app_button'] ) ) {
					?>
		<li>
			<a href="<?php echo esc_url( $instance['google_url'] ); ?>" class="btn btn-secondary btn-lg">
				<img src="<?php echo Helper::get_img( 'google-play.png' ); ?>" class="img-fluid" alt="">
				<?php echo esc_attr( $instance['google_button'] ); ?>
			</a>
		</li>
		<?php
				}
				?>
	</ul>
</div>

<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['app_button']    = ( ! empty( $new_instance['app_button'] ) ) ? sanitize_text_field( $new_instance['app_button'] ) : '';
		$instance['app_url']       = ( ! empty( $new_instance['app_url'] ) ) ? sanitize_text_field( $new_instance['app_url'] ) : '';
		$instance['google_button'] = ( ! empty( $new_instance['google_button'] ) ) ? sanitize_text_field( $new_instance['google_button'] ) : '';
		$instance['google_url']    = ( ! empty( $new_instance['google_url'] ) ) ? sanitize_text_field( $new_instance['google_url'] ) : '';
		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'title'         => '',
			'app_button'    => '',
			'app_url'       => '',
			'google_button' => '',
			'google_url'    => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'         => array(
				'label' => esc_html__( 'Widget Title', 'devent' ),
				'type'  => 'text',
			),
			'app_button'    => array(
				'label' => esc_html__( 'App Store Button', 'devent' ),
				'type'  => 'text',
			),
			'app_url'       => array(
				'label' => esc_html__( 'App Store URL', 'devent' ),
				'type'  => 'url',
			),
			'google_button' => array(
				'label' => esc_html__( 'Google Play Button', 'devent' ),
				'type'  => 'text',
			),
			'google_url'    => array(
				'label' => esc_html__( 'Google Play URL', 'devent' ),
				'type'  => 'url',
			),
		);

		Widget_Fields::display( $fields, $instance, $this );
	}
}