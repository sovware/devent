<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$opt_name = Constants::$theme_options;

\CSF::createSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Header', 'devent' ),
		'icon'   => 'fas fa-flag',
		'fields' => array(
			array(
				'id'       => 'resmenu_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Responsive Header Screen Width', 'devent' ),
				'subtitle' => esc_html__( 'Screen width in which mobile menu activated. Recommended value is: 991', 'devent' ),
				'default'  => 991,
				'min'      => 0,
				'step'     => 1,
				'max'      => 2000,
				'unit'     => 'px',
			),
			array(
				'id'      => 'login_button',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Sing In Button', 'devent' ),
				'default' => true,
			),
			array(
				'id'         => 'login_button_text',
				'type'       => 'text',
				'title'      => esc_html__( 'Sign In Button Text', 'devent' ),
				'default'    => esc_html__( 'Sign in', 'devent' ),
				'dependency' => array( 'login_button', '==', 'true' ),
			),
			array(
				'id'      => 'add_listing_button',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Add Listing Button', 'devent' ),
				'default' => true,
			),
			array(
				'id'         => 'add_listing_button_text',
				'type'       => 'text',
				'title'      => esc_html__( 'Add Listing Button Text', 'devent' ),
				'default'    => esc_html__( 'Create Event', 'devent' ),
				'dependency' => array( 'add_listing_button', '==', 'true' ),
			),
			array(
				'id'      => 'woo_cart',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Woocommerce Cart Icon', 'devent' ),
				'default' => true,
			),
		),
	)
);
