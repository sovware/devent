<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Info extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Info Box', 'devent' );
		$this->az_name  = 'az-dir-info';
		parent::__construct( $data, $args );
	}

	public function az_fields() {

		$fields = array(
			// Section style tab.
			array(
				'mode'  => 'section_start',
				'id'    => 'section_style',
				'label' => __( 'General', 'devent' ),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'label'   => __( 'Info Box', 'devent' ),
				'fields'  => array(
					array(
						'name'  => 'img',
						'label' => __( 'Image', 'devent' ),
						'type'  => Controls_Manager::MEDIA,
					),
					array(
						'name'  => 'title',
						'label' => __( 'Title', 'devent' ),
						'type'  => Controls_Manager::TEXT,
					),
					array(
						'name'  => 'description',
						'label' => __( 'Description', 'devent' ),
						'type'  => Controls_Manager::TEXTAREA,
					),
				),
				'default' => array(
					array(
						'img'         => '',
						'title'       => 'Nurse line',
						'description' => 'Kellamco laboris nisi ut aliquip ex ea commodo consequat labore et dolore magna aliqua. Ut enim ad minim veniam',
					),
					array(
						'img'         => '',
						'title'       => 'Virtual doctors',
						'description' => 'Kellamco laboris nisi ut aliquip ex ea commodo consequat labore et dolore magna aliqua. Ut enim ad minim veniam',
					),
					array(
						'img'         => '',
						'title'       => 'Urgent care',
						'description' => 'Kellamco laboris nisi ut aliquip ex ea commodo consequat labore et dolore magna aliqua. Ut enim ad minim veniam',
					),

				),
			),
			array(
				'mode' => 'section_end',
			),
		);

		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		return $this->az_template( 'view', $data );
	}

}
