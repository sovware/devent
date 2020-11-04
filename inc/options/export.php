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
		'title'  => esc_html__( 'Import/Export', 'devent' ),
		'icon'   => 'fas fa-shield-alt',
		'fields' => array(
			array(
				'type' => 'backup',
			),
		),
	)
);
