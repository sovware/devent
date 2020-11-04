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
		'title'  => esc_html__( 'Blog Settings', 'devent' ),
		'icon'   => 'fas fa-tags',
		'fields' => array(
			array(
				'id'      => 'blog_cats',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Display Categories', 'devent' ),
				'default' => true,
			),
			array(
				'id'      => 'blog_author_name',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Display Author Name', 'devent' ),
				'default' => true,
			),
			array(
				'id'      => 'blog_date',
				'type'    => 'switcher',
				'title'   => esc_html__( 'Display Date', 'devent' ),
				'default' => true,
			),
		),
	)
);
