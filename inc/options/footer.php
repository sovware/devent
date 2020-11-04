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
		'title'  => esc_html__( 'Footer', 'devent' ),
		'icon'   => 'fas fa-angle-double-down',
		'fields' => array(
			array(
				'id'      => 'footer_area',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Display Footer Area', 'devent' ),
				'default' => true,
			),
			array(
				'id'      => 'copyright_area',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Display Copyright Area', 'devent' ),
				'default' => true,
			),
			array(
				'id'         => 'copyright_text',
				'type'       => 'textarea',
				'title'      => esc_html__( 'Copyright Text', 'devent' ),
				'default'    => sprintf( '&copy; Devent %s. All rights reserved. Created by <a target="_blank" href="%s" rel="nofollow">AazzTech</a>', date( 'Y' ), esc_url( Constants::$theme_author_uri ) ),
				'dependency' => array( 'copyright_area', '==', 'true' ),
			),
		),
	)
);
