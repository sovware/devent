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
		'title'  => esc_html__( 'General', 'devent' ),
		'icon'   => 'fas fa-globe-asia',
		'fields' => array(
			array(
				'id'      => 'logo',
				'type'    => 'media',
				'title'   => esc_html__( 'Logo', 'devent' ),
				'library' => 'image',
				'url'     => false,
			),
			array(
				'id'      => 'preloader',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Preloader', 'devent' ),
				'default' => true,
			),
			array(
				'id'         => 'preloader_image',
				'type'       => 'media',
				'title'      => esc_html__( 'Preloader Image', 'devent' ),
				'subtitle'   => esc_html__( 'Please upload your choice of preloader image. Transparent GIF format is recommended', 'devent' ),
				'library'    => 'image',
				'url'        => false,
				'dependency' => array( 'preloader', '==', 'true' ),
			),
			array(
				'id'      => 'back_to_top',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Back to Top Arrow', 'devent' ),
				'default' => true,
			),
		),
	)
);
