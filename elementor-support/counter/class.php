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

class Counter extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->az_title = __( 'Countdown', 'devent' );
		$this->az_name  = 'az-dir-counter-down';
		parent::__construct( $data, $args );
	}

	private function az_load_scripts() {
		// counterup.
		wp_enqueue_script( 'counterup' );
		// waypoints.
		wp_enqueue_script( 'waypoints' );
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
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'items',
				'label'   => __( 'Count Down', 'devent' ),
				'fields'  => array(
					array(
						'name'  => 'num',
						'label' => __( 'Number', 'devent' ),
						'type'  => Controls_Manager::NUMBER,
					),
					array(
						'name'  => 'suffix',
						'label' => __( 'Number Suffix', 'devent' ),
						'type'  => Controls_Manager::TEXT,
					),
					array(
						'name'  => 'label',
						'label' => __( 'Title', 'devent' ),
						'type'  => Controls_Manager::TEXT,
					),
				),
				'default' => array(
					array(
						'num'    => 3.9,
						'suffix' => 'M',
						'label'  => 'Worldwide Events in 2020',
					),
					array(
						'num'    => 795,
						'suffix' => 'K',
						'label'  => 'Events creators in 2020',
					),
					array(
						'num'    => 170,
						'suffix' => '',
						'label'  => 'Countries Live experiences',
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
				'id'        => 'color',
				'label'     => __( 'Number Color', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .counter-wrapper .counter-inner h6' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_color',
				'label'     => __( 'Title Color', 'devent' ),
				'selectors' => array( '{{WRAPPER}} .counter-wrapper .counter-inner p' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
		);

		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		if ( $data['items'] ) {
			$this->az_load_scripts();
		}

		return $this->az_template( 'view', $data );
	}
}
