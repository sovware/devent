<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

	<?php
	get_template_part( 'template-parts/content-header' );

	$banner_g = Helper::banner( 'blog_banner', 'single_post_banner', 'search_banner', 'error_banner', 'page_banner' );
	$banner   = Theme::post_options( 'banner' );
	$banner   = 'default' === $banner || is_404() ? $banner_g : $banner;
	$banner   = '2' === $banner ? false : $banner;

	if ( $banner ) {
		get_template_part( 'template-parts/content', 'banner' );
	}
