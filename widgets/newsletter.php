<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class Newsletter_Widget extends \WP_Widget {

	public function __construct() {
		parent::__construct(
			'devent_newsletter',
			esc_html__( '-devent: Newsletter', 'directorist' ),
			array(
				'description' => esc_html__( 'devent: Newsletter( Footer )', 'devent' ),
			)
		);
	}

	public function widget( $args, $instance ) {
		$form  = ! empty( $instance['form'] ) ? $instance['form'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		?>

<div class="subscribe-widget widget">
	<h5 class="widget-title"><?php echo esc_attr( $title ); ?></h5>
	<div class="subscribe-form">
		<form action="<?php echo esc_url( $form ); ?>" method="get">
			<div class="form-group">
				<input type="email"
					placeholder="<?php echo esc_attr_x( 'Enter email', 'placeholder', 'directorist' ); ?>" value=""
					name="EMAIL" class="required email" id="mce-EMAIL" required="">
				<a href="#" class="submit-btn"><i class="la la-paper-plane"></i></a>
			</div>
		</form>
	</div>
</div>

<?php
	}

	public function form( $instance ) {
		$defaults = array(
			'title' => '',
			'form'  => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title' => array(
				'label' => esc_html__( 'Title', 'devent' ),
				'type'  => 'text',
			),
			'form'  => array(
				'label' => esc_html__( 'Mailchimp Action Url', 'devent' ),
				'type'  => 'url',
			),
		);

		Widget_Fields::display( $fields, $instance, $this );
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['form']  = ( ! empty( $new_instance['form'] ) ) ? sanitize_text_field( $new_instance['form'] ) : '';

		return $instance;
	}
}