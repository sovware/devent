<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

$opt_name = Constants::$theme_options;

function aztheme_redux_post_type_fields( $prefix ) {
	return array(
		array(
			'id'      => $prefix . '_banner',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Banner', 'devent' ),
			'default' => true,
		),
		array(
			'id'         => $prefix . '_style',
			'type'       => 'radio',
			'title'      => esc_html__( 'Banner Style', 'directorist' ),
			'options'    => array(
				'default' => 'Default',
				'1'       => 'Style 1',
				'2'       => 'Style 2',
			),
			'default'    => 'default',
			'dependency' => array( $prefix . '_banner', '==', 'true' ),
		),
		array(
			'id'         => $prefix . '_bgtype',
			'type'       => 'radio',
			'title'      => esc_html__( 'Banner Background Type', 'devent' ),
			'options'    => array(
				'bgcolor' => esc_html__( 'Background Color', 'devent' ),
				'bgimg'   => esc_html__( 'Background Image', 'devent' ),
			),
			'default'    => 'bgcolor',
			'dependency' => array( $prefix . '_banner', '==', 'true' ),
		),
		array(
			'id'          => $prefix . '_bgcolor',
			'type'        => 'color',
			'title'       => esc_html__( 'Banner Background Color', 'devent' ),
			'validate'    => 'color',
			'transparent' => false,
			'default'     => '#1136f1',
			'dependency'  => array( $prefix . '_bgtype|' . $prefix . '_banner', '==', 'bgcolor|true' ),
		),
		array(
			'id'         => $prefix . '_bgimg',
			'type'       => 'media',
			'title'      => esc_html__( 'Banner Background Image', 'devent' ),
			'library'    => 'image',
			'url'        => false,
			'dependency' => array( $prefix . '_bgtype|' . $prefix . '_banner', '==', 'bgimg|true' ),
		),
		array(
			'id'         => $prefix . '_opacity',
			'type'       => 'slider',
			'title'      => esc_html__( 'Banner Background Opacity', 'devent' ),
			'min'        => 0,
			'max'        => 100,
			'step'       => 1,
			'default'    => 60,
			'unit'       => '%',
			'dependency' => array( $prefix . '_bgtype|' . $prefix . '_banner', '==', 'bgimg|true' ),
		),
		'layout' => array(
			'id'      => $prefix . '_layout',
			'type'    => 'radio',
			'title'   => esc_html__( 'Layout', 'devent' ),
			'options' => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'devent' ),
				'full-wide'     => esc_html__( 'full Wide', 'devent' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'devent' ),
			),
			'default' => 'full-wide',
		),
	);
}

\CSF::createSection(
	$opt_name,
	array(
		'title' => esc_html__( 'Layout Settings', 'devent' ),
		'id'    => 'layout_defaults',
		'icon'  => 'fas fa-th-large',
	)
);

// Page.
$aztheme_page_fields                      = aztheme_redux_post_type_fields( 'page' );
$aztheme_page_fields['layout']['default'] = 'full-wide';
\CSF::createSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Page', 'devent' ),
		'parent' => 'layout_defaults',
		'fields' => $aztheme_page_fields,
	)
);

// Post Archive.
$aztheme_post_archive_fields = aztheme_redux_post_type_fields( 'blog' );
\CSF::createSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Blog / Archive', 'devent' ),
		'parent' => 'layout_defaults',
		'fields' => $aztheme_post_archive_fields,
	)
);

// Single Post.
$aztheme_single_post_fields = aztheme_redux_post_type_fields( 'single_post' );
\CSF::createSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Post Single', 'devent' ),
		'parent' => 'layout_defaults',
		'fields' => $aztheme_single_post_fields,
	)
);

// Search.
$aztheme_search_fields = aztheme_redux_post_type_fields( 'search' );
\CSF::createSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Search Layout', 'devent' ),
		'parent' => 'layout_defaults',
		'fields' => $aztheme_search_fields,
	)
);

// Error 404 Layout.
$aztheme_error_fields = aztheme_redux_post_type_fields( 'error' );
unset( $aztheme_error_fields['layout'] );
\CSF::createSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Error 404 Layout', 'devent' ),
		'parent' => 'layout_defaults',
		'fields' => $aztheme_error_fields,
	)
);
