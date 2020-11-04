<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

use \ReflectionClass;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Custom_Widget_Base extends Widget_Base {

	public $az_prefix = 'devent'; // change category prefix here /@dev

	public $az_title;
	public $az_name;
	public $az_category;
	public $az_icon;
	public $az_translate;
	public $az_dir;

	public function __construct( $data = array(), $args = null ) {
		$this->az_category = $this->az_prefix . '-widgets';
		$this->az_icon     = 'aztheme-el-custom';
		$this->az_dir      = dirname( ( new ReflectionClass( $this ) )->getFileName() );
		parent::__construct( $data, $args );
	}

	public function get_name() {
		return $this->az_name;
	}

	public function get_title() {
		return $this->az_title;
	}

	public function get_icon() {
		return $this->az_icon;
	}

	public function get_categories() {
		return array( $this->az_category );
	}

	// Either Override az_fields() or the default _register_controls()
	protected function az_fields() {
		return array();
	}

	protected function _register_controls() {
		$fields = $this->az_fields();
		foreach ( $fields as $field ) {
			if ( isset( $field['mode'] ) && $field['mode'] == 'section_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_section( $id, $field );
			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'section_end' ) {
				$this->end_controls_section();
			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tabs_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tabs( $id );
			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tabs_end' ) {
				$this->end_controls_tabs();
			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tab_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tab( $id, $field );
			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tab_end' ) {
				$this->end_controls_tab();
			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'group' ) {
				$type          = $field['type'];
				$field['name'] = $field['id'];
				unset( $field['mode'] );
				unset( $field['type'] );
				unset( $field['id'] );
				$this->add_group_control( $type, $field );
			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'responsive' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->add_responsive_control( $id, $field );
			} else {
				$id = $field['id'];
				unset( $field['id'] );
				$this->add_control( $id, $field );
			}
		}
	}

	public function az_template( $template, $data ) {
		$template_name = '/elementor-support/' . basename( $this->az_dir ) . '/' . $template . '.php';
		if ( file_exists( STYLESHEETPATH . $template_name ) ) {
			$file = STYLESHEETPATH . $template_name;
		} elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
			$file = TEMPLATEPATH . $template_name;
		} else {
			$file = $this->az_dir . '/' . $template . '.php';
		}

		ob_start();
		include $file;
		echo ob_get_clean();
	}
}
