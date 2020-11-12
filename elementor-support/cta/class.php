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
				'label'       => __( 'Title', 'elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'title',
				'dynamic'     => array(
					'active' => true,
				),
				'placeholder' => __( 'Enter your title', 'elementor' ),
				'default'     => __( 'Looks for the event feed?</br> Get the app' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'devent' ),
				'default' => 'Find great events to attend, connect with new opportunities</br>and expand your networking!',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_text',
				'label'   => __( 'Button Label 1', 'devent' ),
				'default' => 'App Store',
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'button_url',
				'label' => __( 'Button URL 1', 'devent' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_text2',
				'label'   => __( 'Button Label 2', 'devent' ),
				'default' => 'Google Play',
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'button_url2',
				'label' => __( 'Button URL 2', 'devent' ),
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
				'selectors' => array( '{{WRAPPER}} .fsc' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'phone_color',
				'label'     => __( 'Phone', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .call' => 'color: {{VALUE}}' ),
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
		$data = $this->get_settings();

		$template = 'view';

		return $this->az_template( $template, $data );
	}

}
