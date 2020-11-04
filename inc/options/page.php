<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

$prefix = 'devent_layout';

CSF::createMetabox(
	$prefix,
	array(
		'title'     => 'Page Options',
		'post_type' => array( 'page', 'post', 'at_biz_dir' ),
		'context'   => 'side',
		'data_type' => 'unserialize',
	)
);

CSF::createSection(
	$prefix,
	array(
		'fields' => array(
			array(
				'id'      => 'banner',
				'type'    => 'radio',
				'title'   => __( 'Display Banner', 'directorist' ),
				'options' => array(
					'default' => 'Default',
					'1'       => 'Show',
					'2'       => 'Hide',
				),
				'default' => 'default',
			),
			array(
				'id'         => 'banner_style',
				'type'       => 'radio',
				'title'      => __( 'Banner Style', 'directorist' ),
				'options'    => array(
					'default' => 'Default',
					'1'       => 'Style 1',
					'2'       => 'Style 2',
				),
				'default'    => 'default',
				'dependency' => array( 'banner', '==', 'true' ),
			),
			array(
				'id'      => 'sidebar',
				'type'    => 'radio',
				'title'   => __( 'Display Sidebar', 'directorist' ),
				'options' => array(
					'default'       => 'Default',
					'left-sidebar'  => esc_html__( 'Left Sidebar', 'devent' ),
					'full-wide'     => esc_html__( 'full Wide', 'devent' ),
					'right-sidebar' => esc_html__( 'Right Sidebar', 'devent' ),
				),
				'default' => 'default',
			),
		),
	)
);
