<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

trait URI_Trait {

	public static function requires( $filename, $dir = false ) {
		require_once self::get_file_path( $filename, $dir );
	}

	public static function includes( $filename, $dir = false ) {
		include self::get_file_path( $filename, $dir );
	}

	/**
	 * Description
	 *
	 * @param string $filename .
	 */
	public static function get_img( $filename ) {
		$path = '/assets/img/' . $filename;
		return self::get_file_uri( $path );
	}

	/**
	 * Description
	 *
	 * @param string $filename .
	 */
	public static function get_css( $filename ) {
		$path = '/assets/css/' . $filename . '.css';
		return self::get_file_uri( $path );
	}

	/**
	 * Description
	 *
	 * @param string $filename .
	 */
	public static function get_js( $filename ) {
		$path = '/assets/js/' . $filename . '.js';
		return self::get_file_uri( $path );
	}

	/**
	 * Description
	 *
	 * @param string $file .
	 */
	public static function get_vendor_assets( $file ) {
		$path = '/assets/vendors/' . $file;
		return self::get_file_uri( $path );
	}

	/**
	 * Description
	 *
	 * @param string $template .
	 * @param array  $args .
	 */
	public static function get_template_part( $template, $args = array() ) {
		extract( $args );

		$template = '/' . $template . '.php';

		if ( file_exists( get_stylesheet_directory() . $template ) ) {
			$file = get_stylesheet_directory() . $template;
		} else {
			$file = get_template_directory() . $template;
		}

		require $file;
	}

	/**
	 * Description
	 *
	 * @param string $template .
	 */
	public static function get_template_content( $template ) {
		ob_start();
		get_template_part( $template );
		return ob_get_clean();
	}

	/**
	 * Description
	 *
	 * @param string $filename .
	 * @param string $dir .
	 */
	private static function get_file_path( $filename, $dir = false ) {
		if ( $dir ) {
			$child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			} else {
				$file = get_template_directory() . '/' . $dir . '/' . $filename;
			}
		} else {
			$child_file = get_stylesheet_directory() . '/inc/' . $filename;

			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			} else {
				$file = get_template_directory() . '/inc/' . $filename;
			}
		}

		return $file;
	}

	/**
	 * Description
	 *
	 * @param string $path .
	 */
	private static function get_file_uri( $path ) {
		$filepath = get_stylesheet_directory() . $path;
		$file     = get_stylesheet_directory_uri() . $path;
		if ( ! file_exists( $filepath ) ) {
			$file = get_template_directory_uri() . $path;
		}
		return $file;
	}

	/**
	 * Description
	 */
	public static function get_logo_src() {
		$result = empty( Theme::$options['logo']['url'] ) ? '' : Theme::$options['logo']['url'];
		return $result;
	}

	/**
	 * Description
	 *
	 * @param string $template .
	 * @param string $echo .
	 * @param array  $args .
	 */
	public static function get_custom_directorist_template( $template, $echo = true, $args = array() ) {
		$template = 'directorist-support/' . $template;
		if ( $echo ) {
			self::get_template_part( $template, $args );
		} else {
			$template .= '.php';
			return $template;
		}
	}
}
