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

class Client extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Brand Logo', 'devent' );
		$this->az_name  = 'az-dir-brand-logo';
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
				'id'      => 'title',
				'label'   => __( 'Title', 'devent' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Explore by popular makers',
			),
			array(
				'id'      => 'style',
				'type'    => Controls_Manager::SELECT2,
				'label'   => __( 'Style', 'ddoctor' ),
				'options' => array(
					'1' => __( 'Style 1', 'ddoctor' ),
					'2' => __( 'Style 2', 'ddoctor' ),
				),
				'default' => '1',
			),
			array(
				'type'   => Controls_Manager::REPEATER,
				'id'     => 'items',
				'label'  => __( 'Client Logos', 'devent' ),
				'fields' => array(
					array(
						'name'  => 'img',
						'label' => __( 'Client Logo', 'devent' ),
						'type'  => Controls_Manager::MEDIA,
					),
					array(
						'name'    => 'title',
						'label'   => __( 'Title', 'devent' ),
						'type'    => Controls_Manager::TEXT,
						'default' => 'BMW',
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