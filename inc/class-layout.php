<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class Layouts {

	protected static $instance = null;
	public $prefix;
	public $type;
	public $meta_value;

	public function __construct() {
		$this->prefix = Constants::$theme_prefix;

		add_action( 'template_redirect', array( $this, 'layout_settings' ) );
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function layout_settings() {

		if ( ( is_single() || is_page() ) ) {
			$post_type = get_post_type();

			switch ( $post_type ) {
				case 'page':
					$this->type = 'page';
					break;
				case 'post':
					$this->type = 'single_post';
					break;
				default:
					$this->type = 'single_post';
					break;
			}
		} elseif ( is_home() || is_archive() || is_search() || is_404() ) {
			if ( is_search() ) {
				$this->type = 'search';
			} elseif ( is_404() ) {
				$this->type                                = 'error';
				Theme::$options[ $this->type . '_layout' ] = 'full-width';
			} else {
				$this->type = 'blog';
			}
		} else {
			$this->type = 'single_post';
		}
	}
}

Layouts::instance();
