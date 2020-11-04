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
		'title'  => esc_html__( 'Colors', 'devent' ),
		'icon'   => 'fas fa-paint-brush',
		'fields' => array(
			array(
				'type'  => 'heading',
				'title' => esc_html__( 'Sitewide Colors', 'devent' ),
			),
			array(
				'id'          => 'primary_color',
				'type'        => 'color',
				'transparent' => false,
				'title'       => esc_html__( 'Primary Color', 'devent' ),
				'default'     => '#1136f1',
				'required'    => array( 'color_type', '=', 'custom' ),
			),
			array(
				'id'    => 'section-color-menu',
				'type'  => 'heading',
				'title' => esc_html__( 'Main Menu', 'devent' ),
			),
			array(
				'id'      => 'menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Menu Color', 'devent' ),
				'default' => '#111111',
			),
			array(
				'type'  => 'heading',
				'title' => esc_html__( 'Sub Menu', 'devent' ),
			),
			array(
				'id'      => 'submenu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Submenu Color', 'devent' ),
				'default' => '#111111',
			),
			array(
				'id'      => 'submenu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Submenu Hover Color', 'devent' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'submenu_hover_bgcolor',
				'type'    => 'color',
				'title'   => esc_html__( 'Submenu Hover Background Color', 'devent' ),
				'default' => '#111111',
			),
			array(
				'type'  => 'heading',
				'title' => esc_html__( 'Banner Area', 'devent' ),
			),
			array(
				'id'      => 'banner_title_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Banner Title Color', 'devent' ),
				'default' => '#000',
			),
			array(
				'type'  => 'heading',
				'title' => esc_html__( 'Footer Area', 'devent' ),
			),
			array(
				'id'          => 'footer_bgcolor',
				'type'        => 'color',
				'transparent' => false,
				'title'       => esc_html__( 'Footer Background Color', 'devent' ),
				'default'     => '#111111',
			),
			array(
				'id'          => 'footer_title_color',
				'type'        => 'color',
				'transparent' => false,
				'title'       => esc_html__( 'Footer Title Text Color', 'devent' ),
				'default'     => '#ffffff',
			),
			array(
				'id'          => 'footer_color',
				'type'        => 'color',
				'transparent' => false,
				'title'       => esc_html__( 'Footer Body Text Color', 'devent' ),
				'default'     => '#cccccc',
			),
			array(
				'id'          => 'footer_link_color',
				'type'        => 'color',
				'transparent' => false,
				'title'       => esc_html__( 'Footer Body Link Color', 'devent' ),
				'default'     => '#cccccc',
			),
			array(
				'id'          => 'footer_link_hover_color',
				'type'        => 'color',
				'transparent' => false,
				'title'       => esc_html__( 'Footer Body Link Hover Color', 'devent' ),
				'default'     => '#ffffff',
			),
		),
	)
);
