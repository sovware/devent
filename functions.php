<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}

/**
 * Main class
 */
class devent_Main {

	public $theme = 'devent';

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		$this->includes();
	}

	public function load_textdomain() {
		load_theme_textdomain( $this->theme, get_template_directory() . '/languages' );
	}

	public function includes() {

		if ( is_admin() ) {
			require_once get_template_directory() . '/lib/codestar-framework/codestar-framework.php';
		}

		require_once get_template_directory() . '/lib/az-svg/init.php';
		require_once get_template_directory() . '/lib/az-breadcrumb/breadcrumb.php';
		require_once get_template_directory() . '/lib/tgm/class-tgm-plugin-activation.php';
		require_once get_template_directory() . '/inc/class-constants.php';
		require_once get_template_directory() . '/inc/traits/uri.php';
		require_once get_template_directory() . '/inc/class-helper.php';
		require_once get_template_directory() . '/inc/class-dirhelper.php';
		require_once get_template_directory() . '/inc/traits/uri.php';
		require_once get_template_directory() . '/inc/class-activation.php';
		require_once get_template_directory() . '/inc/options/init.php';
		require_once get_template_directory() . '/inc/class-theme.php';
		require_once get_template_directory() . '/inc/class-general.php';
		require_once get_template_directory() . '/inc/class-scripts.php';
		require_once get_template_directory() . '/inc/class-layout.php';
		require_once get_template_directory() . '/widgets/init.php';

		if ( did_action( 'elementor/loaded' ) ) {
			require_once get_template_directory() . '/elementor-support/init.php';
		}
	}
}

new devent_Main();

/**
 * Is directorist active
 */
function is_directorist() {
	return class_exists( 'Directorist_Base' ) ? true : false;
}
