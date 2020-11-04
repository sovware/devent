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

class Cat extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Categories', 'devent' );
		$this->az_name  = 'az-dir-category-slider';
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
				'default'     => __( 'Choose your car style' ),
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
				'label'   => __( 'Order by', 'devent' ),
				'type'    => Controls_Manager::SELECT,
				'id'      => 'order_by',
				'default' => 'id',
				'options' => array(
					'id'    => esc_html__( 'Cat ID', 'devent' ),
					'count' => esc_html__( 'Listing Count', 'devent' ),
					'slug'  => esc_html__( 'Specify Category', 'devent' ),
				),
			),
			array(
				'label'     => __( 'Specify Category', 'devent' ),
				'id'        => 'slug',
				'type'      => Controls_Manager::SELECT2,
				'multiple'  => true,
				'options'   => \AazzTech\devent\DirHelper::categories(),
				'condition' => array( 'order_by' => array( 'slug' ) ),
			),
			array(
				'label'   => __( 'Category Order', 'devent' ),
				'id'      => 'order_list',
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'ASC'  => esc_html__( 'ASC', 'devent' ),
					'DESC' => esc_html__( 'DESC', 'devent' ),
				),
			),
			array(
				'id'      => 'number',
				'type'    => Controls_Manager::NUMBER,
				'label'   => __( 'Number of categories to Show:', 'devent' ),
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'default' => 5,
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
