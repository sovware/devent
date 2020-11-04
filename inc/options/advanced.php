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
		'title'  => esc_html__( 'Advanced', 'devent' ),
		'icon'   => 'fas fa-code',
		'fields' => array(
			array(
				'id'       => 'custom_css',
				'type'     => 'code_editor',
				'title'    => esc_html__( 'Custom CSS', 'devent' ),
				'settings' => array(
					'mode' => 'css',
				),
			),
		),
	)
);
