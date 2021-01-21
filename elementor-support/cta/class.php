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

class CTA extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Call To Action', 'devent' );
		$this->az_name  = 'az-dir-cta';
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
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'title',
				'dynamic'     => array(
					'active' => true,
				),
				'placeholder' => __( 'Enter your title', 'elementor' ),
				'default'     => __( 'Create your events or venues on dEvents' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'devent' ),
				'default' => 'Explore by popular makers',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'label'   => __( 'Add Button', 'devent' ),
				'fields'  => array(
					array(
						'name'    => 'btn_label',
						'label'   => __( 'Button Label', 'devent' ),
						'type'    => Controls_Manager::TEXT,
						'default' => 'See our pricing plan',
					),
					array(
						'name'  => 'button_url',
						'label' => __( 'Button URL', 'devent' ),
						'type'  => Controls_Manager::URL,
					),
					array(
						'name'  => 'button_icon',
						'label' => __( 'Button Icon', 'devent' ),
						'type'  => Controls_Manager::ICON,
					),
					array(
						'name'  => 'button_color',
						'label' => __( 'Button Label Color', 'devent' ),
						'type'  => Controls_Manager::COLOR,
					),
					array(
						'name'  => 'button_bg',
						'label' => __( 'Button BG Color', 'devent' ),
						'type'  => Controls_Manager::COLOR,
					),
					array(
						'name'  => 'button_hover_label',
						'label' => __( 'Button Hover Label Color', 'devent' ),
						'type'  => Controls_Manager::COLOR,
					),
					array(
						'name'  => 'button_hover_bg',
						'label' => __( 'Button Hover BG Color', 'devent' ),
						'type'  => Controls_Manager::COLOR,
					),
				),
				'default' => array(
					array(
						'btn_label' => 'See our pricing plan',
					),
					array(
						'btn_label' => 'Create your listing',
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
				'selectors' => array( '{{WRAPPER}} .section-title h1' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'subtitle_color',
				'label'     => __( 'Subtitle', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .section-title p' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Content Style Tab.
			array(
				'mode'  => 'section_start',
				'id'    => 'content_style',
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
				'label'    => __( 'Content', 'devent' ),
				'selector' => '{{WRAPPER}} .fsc',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'phone_typo',
				'label'    => __( 'Phone', 'devent' ),
				'selector' => '{{WRAPPER}} .call',
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
