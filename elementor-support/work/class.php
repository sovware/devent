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

class Work extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'How it works', 'devent' );
		$this->az_name  = 'az-dir-how_it_works';
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
				'id'    => 'img',
				'type'  => Controls_Manager::MEDIA,
				'label' => __( 'Section Image', 'devent' ),
			),
			array(
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'title',
				'placeholder' => __( 'Enter section title', 'elementor' ),
				'default'     => __( 'How it works' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'devent' ),
				'default' => 'Free search & listing tools',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'label'   => __( 'Description', 'devent' ),
				'fields'  => array(
					array(
						'name'  => 'desc',
						'label' => __( 'Description', 'devent' ),
						'type'  => Controls_Manager::TEXTAREA,
					),
				),
				'default' => array(
					array(
						'desc' => 'Consumers across the US are keeping their cars longer than ever before.',
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
				'selectors' => array( '{{WRAPPER}} .title h1' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'subtitle_color',
				'label'     => __( 'Subtitle', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .title p' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'desc_color',
				'label'     => __( 'Description', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .h_work-carousel.owl-carousel p' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Typography Style Tab.
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
				'selector' => '{{WRAPPER}} .title h1',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'subtitle_typo',
				'label'    => __( 'Subtitle', 'devent' ),
				'selector' => '{{WRAPPER}} .title p',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'desc_typo',
				'label'    => __( 'Description', 'devent' ),
				'selector' => '{{WRAPPER}} .h_work-carousel.owl-carousel p',
			),
			array(
				'mode' => 'section_end',
			),
		);

		return $fields;
	}

	protected function render() {
		$data     = $this->get_settings();
		$template = 'view';
		return $this->az_template( $template, $data );
	}

}
