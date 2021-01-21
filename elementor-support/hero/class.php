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

class Hero extends Custom_Widget_Base {

	/**
	 * Description
	 *
	 * @param array $data an array.
	 * @param args  $args .
	 */
	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Hero Banner', 'devent' );
		$this->az_name  = 'az-dir-hero';
		parent::__construct( $data, $args );
	}

	public function az_fields() {
		$fields = array(
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_general',
				'label' => __( 'General', 'devent' ),
			),
			array(
				'id'      => 'title',
				'type'    => Controls_Manager::TEXTAREA,
				'label'   => __( 'Title', 'devent' ),
				'default' => 'The real world is calling',
			),
			array(
				'id'      => 'subtitle',
				'type'    => Controls_Manager::TEXTAREA,
				'label'   => __( 'Subtitle', 'devent' ),
				'default' => 'Your leading directory for internationals events, conferences, exhibitions, venues and trades shows.',
			),

			array(
				'id'      => 'tab1_icon',
				'type'    => Controls_Manager::ICON,
				'label'   => __( 'Tab1 Icon', 'devent' ),
				'default' => 'la la-bullhorn',
			),
			array(
				'id'      => 'tab1',
				'type'    => Controls_Manager::TEXT,
				'label'   => __( 'Tab1 Label', 'devent' ),
				'default' => 'Events',
			),
			array(
				'id'      => 'tab2_icon',
				'type'    => Controls_Manager::ICON,
				'label'   => __( 'Tab2 Icon', 'devent' ),
				'default' => 'la la-home',
			),
			array(
				'id'      => 'tab2',
				'type'    => Controls_Manager::TEXT,
				'label'   => __( 'Tab2 Label', 'devent' ),
				'default' => 'Venue',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'search',
				'label'   => __( 'Search Button Text', 'devent' ),
				'default' => 'Search',
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
				'id'        => 'tab',
				'label'     => __( 'Active Tab', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .adv-filter .adv-filter-content__tab ul .nav-link.active' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'tab_icon',
				'label'     => __( 'Tab Icon', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .adv-filter .adv-filter-content__tab ul .nav-link i' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 's_button',
				'label'     => __( 'Search Button BG', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .btn-primary' => 'background-color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
                 
			// Typography Tab.
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
				'id'       => 'tab_typo',
				'label'    => __( 'Tab', 'devent' ),
				'selector' => '{{WRAPPER}} .adv-filter .adv-filter-content__tab ul .nav-link',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'Search_typo',
				'label'    => __( 'Search Button', 'devent' ),
				'selector' => '{{WRAPPER}} .btn-primary',
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
