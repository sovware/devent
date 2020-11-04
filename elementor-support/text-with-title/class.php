<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\Theme\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Text_with_Title extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Text with Title', 'devent' );
		$this->az_name  = 'az-dir-feature-section';
		parent::__construct( $data, $args );
	}

	private function az_load_scripts() {
		// magnific-popup.
		wp_enqueue_style( 'magnific-popup' );
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
				'default'     => __( 'Nullam aliquet eleifend dapibus. Cras sagittis, ex euismod lacinia tempor' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => __( 'Content', 'devent' ),
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate..',
			),
			array(
				'type'      => Controls_Manager::TEXT,
				'id'        => 'button_text',
				'label'     => __( 'Button Text', 'devent' ),
				'desc'      => __( 'Add video popup button Text.', 'devent' ),
				'default'   => 'Play Video',
				'condition' => array( 'style' => array( '1' ) ),
			),
			array(
				'type'      => Controls_Manager::URL,
				'id'        => 'button_url',
				'label'     => __( 'Button URL', 'devent' ),
				'condition' => array( 'style' => array( '1' ) ),
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
				'label'     => __( 'Content', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .fsc p' => 'color: {{VALUE}}' ),
			),

			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'video_color',
				'label'     => __( 'Button Text', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .video' => 'color: {{VALUE}}' ),
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
				'selector' => '{{WRAPPER}} .fsc p',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'video_color',
				'label'    => __( 'Button Text', 'devent' ),
				'selector' => '{{WRAPPER}} .video',
			),
			array(
				'mode' => 'section_end',
			),
		);

		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		if ( $data['button_url']['url'] ) {
			$this->az_load_scripts();
		}

		if ( '2' === $data['style'] ) {
			$template = 'view-1';
		} else {
			$template = 'view-2';
		}

		return $this->az_template( $template, $data );
	}
}
