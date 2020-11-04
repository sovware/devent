<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

if ( ! class_exists( 'CSF' ) ) {
	return;
}

add_filter(
	'csf_field_typography_googlewebfonts',
	function( $fonts ) {
		$fonts['Inter'] = array( array( '100', '200', '300', 'normal', '500', '600', '700', '800', '900' ), array( 'latin-ext', 'latin' ) );
		return $fonts;
	}
);

$prefix = Constants::$theme_options;
$theme  = wp_get_theme();

\CSF::createOptions(
	$prefix,
	array(
		'framework_title' => $theme->get( 'Name' ),
		'menu_title'      => esc_html__( 'Theme Options', 'devent' ),
		'menu_slug'       => Constants::$theme_prefix . '-options',
		'menu_type'       => 'submenu',
		'menu_parent'     => 'themes.php',
		'theme'           => 'dark',
		'footer_credit'   => sprintf( '<a href="%s" target="_blank">Theme Documentation</a>', '#' ),
	)
);

Helper::requires( 'options/general.php' );
Helper::requires( 'options/header.php' );
Helper::requires( 'options/footer.php' );
Helper::requires( 'options/color.php' );
Helper::requires( 'options/typography.php' );
Helper::requires( 'options/layout.php' );
Helper::requires( 'options/blog.php' );
Helper::requires( 'options/post.php' );
Helper::requires( 'options/page.php' );
Helper::requires( 'options/error.php' );
Helper::requires( 'options/advanced.php' );
Helper::requires( 'options/export.php' );
