<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_Init {

	public $prefix;
	public $category;
	public $widgets;

	public function __construct() {
		$this->init();
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_style' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_category' ) );
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}

	private function init() {
		$this->prefix   = 'devent';
		$this->category = __( 'devent Elements', 'devent' );

		// Widgets -- dirname=>classname .
		$widgets1 = array(
			'info'            => 'Info',
			'client'          => 'Client',
			'cta'             => 'CTA',
			'review'          => 'review',
			'counter'         => 'Counter',
			'text-with-title' => 'Text_with_Title',
			'team'            => 'Team',
			'testimonials'    => 'Testimonials',
			'work'            => 'Work',
		);

		$widgets2 = array();
		if ( class_exists( 'Directorist_Base' ) ) {
			$widgets2 = array(
				'search'      => 'Search',
				'cat'         => 'Cat',
				'location'    => 'Location',
				'listings'    => 'Listings',
				'top-listing' => 'TopListings',

			);
		}

		$this->widgets = array_merge( $widgets1, $widgets2 );
	}

	public function editor_style() {
		$img = get_stylesheet_directory_uri() . '/elementor-support/icon.png';
		wp_add_inline_style( 'elementor-editor', '.elementor-control-type-select2 .elementor-control-input-wrapper {min-width: 130px;}.elementor-element .icon .aztheme-el-custom{content: url(' . $img . ');width: 22px;}' );
	}

	public function widget_category( $class ) {
		$id         = $this->prefix . '-widgets';
		$properties = array(
			'title' => $this->category,
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}

	public function register_widgets() {
		require_once __DIR__ . '/base.php';

		foreach ( $this->widgets as $dirname => $class ) {
			$template_name = '/elementor-support/' . $dirname . '/class.php';
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			} elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			} else {
				$file = __DIR__ . '/' . $dirname . '/class.php';
			}

			require_once $file;

			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register_widget_type( new $classname() );
		}
	}
}

new Widget_Init();
