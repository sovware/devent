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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => __( 'Style', 'devent' ),
				'options' => array(
					'1' => __( 'Style 1', 'devent' ),
					'2' => __( 'Style 2', 'devent' ),
				),
				'default' => '1',
			),
			array(
				'id'          => 'title',
				'type'        => Controls_Manager::TEXTAREA,
				'label'       => __( 'Title', 'devent' ),
				'placeholder' => __( 'Enter section title', 'devent' ),
			),
			array(
				'id'          => 'subtitle',
				'type'        => Controls_Manager::TEXTAREA,
				'label'       => __( 'Subtitle', 'devent' ),
				'placeholder' => __( 'Enter section subtitle', 'devent' ),
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
				'label'    => __( 'Specify Category', 'devent' ),
				'id'       => 'slug',
				'type'     => Controls_Manager::SELECT2,
				'multiple' => true,
				'options'  => \AazzTech\devent\DirHelper::categories(),
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
				'selectors' => array( '{{WRAPPER}} .section-title h1' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'subtitle_color',
				'label'     => __( 'Subtitle', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .section-title p' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'cat_icon_color',
				'label'     => __( 'Category Icon (style-1)', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .category-card__img i' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'cat_color',
				'label'     => __( 'Category', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .category-card__wrapper a' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'cat_hover_color',
				'label'     => __( 'Category Hover', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .category-card__wrapper:hover:before' => 'border-bottom-color: {{VALUE}}','{{WRAPPER}} .category-card .category-card__wrapper:hover' => 'border-color: {{VALUE}}' ),
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
				'selector' => '{{WRAPPER}} .section-title h1',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'subtitle_typo',
				'label'    => __( 'Subtitle', 'devent' ),
				'selector' => '{{WRAPPER}} .section-title p',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'category_label',
				'label'    => __( 'Category', 'devent' ),
				'selector' => '{{WRAPPER}} .category-card__wrapper a',
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
