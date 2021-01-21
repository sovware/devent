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

class Location extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Locations', 'devent' );
		$this->az_name  = 'az-dir-location-slider';
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
				'label'       => __( 'Title', 'devent' ),
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'title',
				'placeholder' => __( 'Enter section title', 'devent' ),
				'default'     => __( 'Find cars by city' ),
			),
			array(
				'id'      => 'layout',
				'type'    => Controls_Manager::SELECT,
				'label'   => __( 'Style', 'devent' ),
				'options' => array(
					'grid' => __( 'Grid View', 'dservice-core' ),
					'list' => __( 'List View', 'dservice-core' ),
				),
				'default' => 'grid',
			),
			array(
				'id'      => 'row',
				'type'    => Controls_Manager::SELECT,
				'label'   => __( 'Locations Per Row', 'devent' ),
				'options' => array(
					'5' => __( '5 Items / Row', 'dservice-core' ),
					'4' => __( '4 Items / Row', 'dservice-core' ),
					'3' => __( '3 Items / Row', 'dservice-core' ),
					'2' => __( '2 Items / Row', 'dservice-core' ),
				),
				'default' => '4',
			),

			array(
				'id'      => 'order_by',
				'type'    => Controls_Manager::SELECT,
				'label'   => __( 'Order by', 'devent' ),
				'options' => array(
					'id'    => __( 'Location ID', 'dservice-core' ),
					'count' => __( 'Listing Count', 'dservice-core' ),
					'name'  => __( ' Location name (A-Z)', 'dservice-core' ),
					'slug'  => __( ' Location Slug', 'dservice-core' ),
				),
				'default' => 'id',
			),
			array(
				'id'        => 'slug',
				'type'      => Controls_Manager::SELECT2,
				'label'     => __( 'Specify locations', 'devent' ),
				'multiple'  => true,
				'options'   => \AazzTech\devent\DirHelper::categories(),
				'condition' => array( 'order_by' => array( 'slug' ) ),
			),
			array(
				'label'   => __( 'location Order', 'devent' ),
				'id'      => 'order_list',
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'ASC'  => __( 'ASC', 'devent' ),
					'DESC' => __( 'DESC', 'devent' ),
				),
			),
			array(
				'id'      => 'number_loc',
				'type'    => Controls_Manager::NUMBER,
				'label'   => __( 'Number of Locations to Show:', 'devent' ),
				'min'     => 1,
				'max'     => 1000,
				'step'    => 1,
				'default' => 4,
			),
			array(
				'mode' => 'section_end',
			),

			// Color Tab.
			array(
				'mode'  => 'section_start',
				'id'    => 'title_style',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Color', 'devent' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_color',
				'label'     => __( 'Title', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .fst' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),

			// subtitle Style Tab.
			array(
				'mode'  => 'section_start',
				'id'    => 'subtitle_style',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Typography', 'devent' ),
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'title_typo',
				'label'    => __( 'Title', 'devent' ),
				'selector' => '{{WRAPPER}} .fst',
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
