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

class Search extends Custom_Widget_Base {

	/**
	 * Description
	 *
	 * @param array $data an array.
	 * @param args  $args .
	 */
	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Search Banner', 'devent' );
		$this->az_name  = 'az-dir-search';
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
				'default' => 'Lets find your ideal car for',
			),
			array(
				'id'      => 'subtitle',
				'type'    => Controls_Manager::TEXTAREA,
				'label'   => __( 'Subtitle', 'devent' ),
				'default' => 'Buy or Rent',
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
				'selectors' => array( '{{WRAPPER}} .fst' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 's_button',
				'label'     => __( 'Search Button BG', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .btn-primary' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'cats',
				'label'     => __( 'Categories Color', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .header-category li a' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'cats_bg',
				'label'     => __( 'Category Box BG', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .header-category ul' => 'background-color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
                 
			// Style Tab.
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
