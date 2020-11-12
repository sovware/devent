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

class Testimonials extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Testimonials', 'devent' );
		$this->az_name  = 'az-dir-testimonials';
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
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'title',
				'placeholder' => __( 'Enter section title', 'elementor' ),
				'default'     => __( 'What others are saying' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'devent' ),
				'default' => 'Here is what people say about devents',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'label'   => __( 'Testimonials', 'devent' ),
				'fields'  => array(
					array(
						'name'  => 'name',
						'label' => __( 'User Name', 'devent' ),
						'type'  => Controls_Manager::TEXT,
					),
					array(
						'name'  => 'desc',
						'label' => __( 'Description', 'devent' ),
						'type'  => Controls_Manager::TEXTAREA,
					),
				),
				'default' => array(
					array(
						'name' => '@TomBourgoing',
						'desc' => 'Consumers across the US are keeping their cars longer than ever before. That can make the car buying process 						even more stressful when it’s done only once per decade.  To help shoppers get the best deal and ensure a 						quality purchase.',
					),
					array(
						'name' => '@TomBourgoing',
						'desc' => 'Consumers across the US are keeping their cars longer than ever before. That can make the car buying process 						even more stressful when it’s done only once per decade.  To help shoppers get the best deal and ensure a 						quality purchase.',
					),
				),
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
				'type'      => Controls_Manager::COLOR,
				'id'        => 'subtitle_color',
				'label'     => __( 'subtitle', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .fsc p' => 'color: {{VALUE}}' ),
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
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'subtitle_typo',
				'label'    => __( 'subtitle', 'devent' ),
				'selector' => '{{WRAPPER}} .fsc p',
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
