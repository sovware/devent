<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

use Elementor\Plugin;

class Scripts {

	public $version;

	protected static $instance = null;

	public function __construct() {
		$this->version = Constants::$theme_version;

		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 12 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ), 15 );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function register_scripts() {

		// Google fonts.
		wp_register_style( 'devent-gfonts', $this->fonts_url(), array(), $this->version );
		// Bootstrap.
		wp_register_style( 'bootstrap', Helper::get_vendor_assets( 'bootstrap/css/bootstrap.css' ), array(), $this->version );
		// Font-awesome.
		wp_register_style( 'font-awesome', Helper::get_vendor_assets( 'fonts-library/css/font-awesome.min.css' ), array(), $this->version );
		// jquery UI.
		wp_register_style( 'jquery-ui', Helper::get_vendor_assets( 'jquery-ui/css/jquery-ui.min.css' ), array(), $this->version );
		// offcanvas.
		wp_register_style( 'offcanvas', Helper::get_vendor_assets( 'offcanvas/css/js-offcanvas.css' ), array(), $this->version );
		// Line Awesome.
		wp_register_style( 'line-awesome', Helper::get_vendor_assets( 'fonts-library/css/line-awesome.min.css' ), array(), $this->version );
		// magnific-popup.
		wp_register_style( 'magnific-popup', Helper::get_vendor_assets( 'magnific-popup/css/magnific-popup.css' ), array(), $this->version );
		// magnific-popup.
		wp_register_style( 'select', Helper::get_vendor_assets( 'select/css/select2.min.css' ), array(), $this->version );
		// carousel.
		wp_register_style( 'carousel', Helper::get_vendor_assets( 'carousel/css/owl.carousel.min.css' ), array(), $this->version );
		// Main Style.
		wp_register_style( 'devent-style', Helper::get_css( 'style' ), array(), $this->version );
		// Directory Listing.
		wp_register_style( 'devent-directorist', Helper::get_css( 'directorist' ), array(), $this->version );
		// Elementor.
		wp_register_style( 'devent-elementor', Helper::get_css( 'elementor' ), array(), $this->version );

		// popper.
		wp_register_script( 'popper', Helper::get_vendor_assets( 'bootstrap/js/popper.js' ), array( 'jquery' ), $this->version, true );
		// bootstrap.
		wp_register_script( 'bootstrap', Helper::get_vendor_assets( 'bootstrap/js/bootstrap.min.js' ), array( 'jquery' ), $this->version, true );
		// filterizr.
		wp_register_script( 'filterizr', Helper::get_vendor_assets( 'js/filterizr.min.js' ), array( 'jquery' ), $this->version, true );
		// isotope.
		wp_register_script( 'isotope', Helper::get_vendor_assets( 'js/isotope.pkgd.min.js' ), array( 'jquery' ), $this->version, true );
		// barrating.
		wp_register_script( 'barrating', Helper::get_vendor_assets( 'js/jquery.barrating.min.js' ), array( 'jquery' ), $this->version, true );
		// counterup.
		wp_register_script( 'counterup', Helper::get_vendor_assets( 'js/jquery.counterup.min.js' ), array( 'jquery' ), $this->version, true );
		// magnific-popup.
		wp_register_script( 'magnific-popup', Helper::get_vendor_assets( 'js/jquery.magnific-popup.min.js' ), array( 'jquery' ), $this->version, true );
		// waypoints.
		wp_register_script( 'waypoints', Helper::get_vendor_assets( 'js/jquery.waypoints.min.js' ), array( 'jquery' ), $this->version, true );
		// offcanvas.
		wp_register_script( 'offcanvas', Helper::get_vendor_assets( 'js/js-offcanvas.pkgd.min.js' ), array( 'jquery' ), $this->version, true );
		// select
		wp_register_script( 'select2', Helper::get_vendor_assets( 'js/select2.full.min.js' ), array( 'jquery' ), $this->version, true );
		// carousel.
		wp_register_script( 'carousel', Helper::get_vendor_assets( 'js/owl.carousel.min.js' ), array( 'jquery' ), $this->version, true );
		// headroom.
		wp_register_script( 'headroom', Helper::get_vendor_assets( 'js/Headroom.js' ), array( 'jquery' ), $this->version, true );
		// Main js.
		wp_register_script( 'devent-main', Helper::get_js( 'main' ), array( 'jquery' ), $this->version, true );
		// headroom.
		wp_register_script( 'headroom', Helper::get_vendor_assets( 'js/Headroom.js' ), array( 'jquery' ), $this->version, true );

	}

	public function enqueue_scripts() {

		// disable Directorist style.
		wp_dequeue_style( 'atbdp-bootstrap-style' );
		// google fonts.
		wp_enqueue_style( 'devent-gfonts' );
		// Bootstrap.
		wp_enqueue_style( 'bootstrap' );
		// Font Awesome.
		wp_enqueue_style( 'font-awesome' );
		// jQuery UI.
		wp_enqueue_style( 'jquery-ui' );
		// offcanvas.
		wp_enqueue_style( 'offcanvas' );
		// Font Awesome.
		wp_enqueue_style( 'line-awesome' );
		// carousel.
		wp_enqueue_style( 'carousel' );
		// Theme CSS.
		wp_enqueue_style( 'devent-style' );
		// Directory Listing.
		wp_enqueue_style( 'devent-directorist' );
		// Elementor.
		wp_enqueue_style( 'devent-elementor' );

		// popper.
		wp_enqueue_script( 'popper' );
		// bootstrap.
		wp_enqueue_script( 'bootstrap' );
		// filterizr.
		wp_enqueue_script( 'filterizr' );
		// isotope.
		wp_enqueue_script( 'isotope' );
		// jquery-ui.
		wp_enqueue_script( 'jquery-ui-core' );
		// barrating.
		wp_enqueue_script( 'barrating' );
		// magnific-popup.
		wp_enqueue_script( 'magnific-popup' );
		// offcanvas.
		wp_enqueue_script( 'offcanvas' );
		// carousel.
		wp_enqueue_script( 'carousel' );
		// headroom.
		wp_enqueue_script( 'headroom' );
		// devent-main.
		wp_enqueue_script( 'devent-main' );

		$this->elementor_scripts(); // Elementor Scripts in preview mode.
		$this->conditional_scripts();
		$this->dynamic_style();
		$this->localized_scripts(); // Localization.
		$this->directorist_scripts();
	}

	public function directorist_scripts() {
		if ( class_exists( 'Directorist_Base' ) ) {

			// Header Search.
			wp_enqueue_script( 'atbdp-search-listing', ATBDP_PUBLIC_ASSETS . 'js/search-form-listing.js', array(), $this->version, true );
			wp_localize_script(
				'atbdp-search-listing',
				'atbdp_search',
				array(
					'ajaxnonce' => wp_create_nonce( 'bdas_ajax_nonce' ),
					'ajax_url'  => admin_url( 'admin-ajax.php' ),
				)
			);

			$select_listing_map = get_directorist_option( 'select_listing_map', 'google' );
			wp_enqueue_script( 'atbdp-geolocation' );
			wp_localize_script( 'atbdp-geolocation', 'adbdp_geolocation', array( 'select_listing_map' => $select_listing_map ) );

			// Search price slider.
			if ( atbdp_is_page( 'all-listing' ) || atbdp_is_page( 'search-result' ) ) {
				wp_enqueue_style( 'nouislider' );
				wp_enqueue_script( 'nouislider' );
			}
		}
	}

	public function elementor_scripts() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}
		if ( Plugin::$instance->preview->is_preview_mode() ) {
			wp_enqueue_style( 'tiny-slider' );
			wp_enqueue_script( 'tiny-slider' );
		}
	}

	public function admin_scripts() {
		wp_enqueue_style( 'devent-admin', Helper::get_css( 'admin' ), array(), $this->version );
	}

	private function fonts_url() {
		$fonts_url = '';
		if ( 'off' !== _x( 'on', 'Google fonts - Inter : on or off', 'devent' ) ) {
			$fonts_url = add_query_arg( 'family', urlencode( 'Noto Sans:400,700&display=swap|Poppins:400,500,600,700&display=swap' ), 'https://fonts.googleapis.com/css' );
		}
		return $fonts_url;
	}

	private function localized_scripts() {
		$localize_data = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);

		wp_localize_script( 'devent-main', 'deventObj', $localize_data );
	}

	private function conditional_scripts() {
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( ( is_home() || is_archive() && ! Helper::has_sidebar() ) ) {
			wp_enqueue_script( 'imagesloaded' );
			wp_enqueue_script( 'isotope' );
		}
	}

	private function template_style() {
		$css = '';

		if ( 'bgcolor' === Theme::$bgtype ) {
			$bgcolor      = Theme::$bgcolor;
			$banner_style = "background-color:{$bgcolor};";
		} else {
			$bgimg        = Theme::$bgimg;
			$banner_style = "background:url({$bgimg}) no-repeat scroll center center / cover;";
		}

		$css .= ".banner{{$banner_style}}";

		if ( 'bgimg' === Theme::$bgtype ) {
			$opacity = Theme::$options['bgopacity'] / 100;
			$css    .= ".header-bgimg .banner:before{background-color:rgba(0,0,0,{$opacity});}";
		}

		return $css;
	}

	private function optimized_css( $css ) {
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $css );
		return $css;
	}

	private function dynamic_style() {
		$dynamic_css  = '';
		$dynamic_css .= $this->template_style();
		$dynamic_css .= Theme::$options['custom_css'];
		$dynamic_css  = $this->optimized_css( $dynamic_css );
		wp_register_style( 'devent-dynamic', false );
		wp_enqueue_style( 'devent-dynamic' );
		wp_add_inline_style( 'devent-dynamic', $dynamic_css );
	}
}

Scripts::instance();
