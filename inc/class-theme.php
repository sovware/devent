<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class Theme {

	protected static $instance;

	public static $options;

	public static $layout;

	public static $has_banner;

	public static $has_breadcrumb;

	public static $bgtype;

	public static $bgimg;

	public static $bgcolor;

	private function __construct() {
		add_action( 'after_setup_theme', array( $this, 'set_options' ) );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function set_options() {
		$options       = get_option( Constants::$theme_options, array() );
		self::$options = $options;
	}

	public static function post_options( $args ) {
		return get_post_meta( Helper::page_id(), $args, true );
	}

}

Theme::instance();
