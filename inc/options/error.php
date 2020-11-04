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
		'title'  => esc_html__( 'Error Page Settings', 'devent' ),
		'icon'   => 'fas fa-exclamation-circle',
		'fields' => array(
			array(
				'id'      => 'error_404img',
				'type'    => 'media',
				'title'   => esc_html__( '404 Image', 'devent' ),
				'library' => 'image',
				'url'     => false,
			),
			array(
				'id'      => 'error_title',
				'type'    => 'text',
				'title'   => esc_html__( 'Title', 'devent' ),
				'default' => esc_html__( 'Oops! That page can’t be found. Perhaps searching can help.', 'devent' ),
			),
		),
	)
);
