<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class Helper {

	use URI_Trait;

	public static function test() {
		if ( method_exists( 'get_image' ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Sidebar name
	 */
	public static function sidebar() {
		if ( class_exists( 'woocommerce' ) && ( is_shop() || is_product_taxonomy() ) ) {
			$sidebar = 'shop-sidebar';
		} elseif ( is_page() ) {
			$sidebar = 'sidebar';
		} else {
			$sidebar = 'blog-sidebar';
		}
		return $sidebar;
	}

	/**
	 * Has sidebar widgets
	 */
	public static function has_sidebar() {
		$layout  = self::banner( 'blog_layout', 'single_post_banner', 'search_layout', 'error_layout', 'page_layout' );
		$sidebar = get_post_meta( self::page_id(), 'sidebar', true );
		$sidebar = 'default' === $sidebar ? $layout : $sidebar;
		return ( 'full-wide' !== $sidebar ) && is_active_sidebar( self::sidebar() ) ? true : false;
	}

	public static function the_layout_class() {
		echo self::has_sidebar() ? 'col-md-8 col-sm-12 col-12' : 'col-sm-12 col-12';
	}

	public static function left_sidebar() {
		$layout  = self::banner( 'blog_layout', 'single_post_layout', 'search_layout', 'error_layout', 'page_layout' );
		$sidebar = get_post_meta( self::page_id(), 'sidebar', true );
		$sidebar = 'default' === $sidebar ? $layout : $sidebar;
		if ( self::has_sidebar() && ( 'left-sidebar' === $sidebar ) ) {
			get_sidebar();
		}
	}

	public static function right_sidebar() {
		$layout  = self::banner( 'blog_layout', 'single_post_layout', 'search_layout', 'error_layout', 'page_layout' );
		$sidebar = get_post_meta( self::page_id(), 'sidebar', true );
		$sidebar = 'default' === $sidebar ? $layout : $sidebar;
		if ( self::has_sidebar() && ( 'right-sidebar' === $sidebar ) ) {
			get_sidebar();
		}
	}

	public static function the_sidebar_class() {
		$shop_class = '';
		if ( class_exists( 'woocommerce' ) && ( is_shop() || is_product_taxonomy() ) ) {
			$shop_class = 'order-lg-0 order-1';
		}
		echo 'col-md-4 ol-sm-12 col-12 ' . esc_html( $shop_class );
	}

	public static function the_breadcrumb() {
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		} else {
			$args       = array(
				'show_browse'   => false,
				'post_taxonomy' => array(
					'at_biz_dir' => 'at_biz_dir-category',
					'product'    => 'product_cat',
				),
			);
			$breadcrumb = new \AazzTech\Theme\Lib\Breadcrumb\Breadcrumb( $args );
			return $breadcrumb->trail();
		}
	}

	public static function filter_content( $content ) {
		// Wp filters.
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = convert_chars( $content );
		$content = wpautop( $content );
		$content = shortcode_unautop( $content );

		// remove shortcodes.
		$pattern = '/\[(.+?)\]/';
		$content = preg_replace( $pattern, '', $content );

		$content = strip_tags( $content );

		return $content;
	}

	public static function get_nav_menu_args() {
		$nav_menu_args = array(
			'theme_location' => 'primary',
			'container'      => false,
			'fallback_cb'    => false,
			'class'          => 'navbar-nav mr-auto',
		);
		return $nav_menu_args;
	}

	public static function get_page_title() {
		if ( is_search() ) {
			$title = esc_html__( 'Search Results for : ', 'devent' ) . get_search_query();
		} elseif ( is_404() ) {
			$title = esc_html__( 'Page not Found', 'devent' );
		} elseif ( is_home() ) {
			if ( get_option( 'page_for_posts' ) ) {
				$title = get_the_title( get_option( 'page_for_posts' ) );
			} else {
				$title = apply_filters( 'aztheme_blog_title', esc_html__( 'All Posts', 'devent' ) );
			}
		} elseif ( is_archive() ) {
			$title = get_the_archive_title();
		} else {
			$title = get_the_title();
		}

		return apply_filters( 'aztheme_page_title', $title );
	}

	public static function page_id() {
		$id = '';
		if ( class_exists( 'woocommerce' ) && is_shop() || class_exists( 'woocommerce' ) && is_product_taxonomy() ) {
			$id = wc_get_page_id( 'shop' );
		} elseif ( class_exists( 'woocommerce' ) && is_cart() ) {
			$id = wc_get_page_id( 'cart' );
		} elseif ( class_exists( 'woocommerce' ) && is_checkout() ) {
			$id = wc_get_page_id( 'checkout' );
		} elseif ( class_exists( 'woocommerce' ) && is_account_page() ) {
			$id = wc_get_page_id( 'myaccount' );
		} elseif ( is_archive() || is_home() || is_search() ) {
			$id = get_option( 'page_for_posts' );
		} else {
			$id = get_the_ID();
		}
		return $id;
	}

	public static function get_primary_color() {
		$primary_color = Theme::$options['primary_color'];

		return apply_filters( 'aztheme_primary_color', $primary_color );
	}

	public static function user_socials() {
		$socials = array(
			'facebook'  => array(
				'label' => esc_html__( 'Facebook Link', 'devent' ),
				'type'  => 'text',
				'icon'  => 'fa-facebook',
			),
			'twitter'   => array(
				'label' => esc_html__( 'Twitter Link', 'devent' ),
				'type'  => 'text',
				'icon'  => 'fa-twitter',
			),
			'linkedin'  => array(
				'label' => esc_html__( 'Linkedin Link', 'devent' ),
				'type'  => 'text',
				'icon'  => 'fa-linkedin',
			),
			'github'    => array(
				'label' => esc_html__( 'Github Link', 'devent' ),
				'type'  => 'text',
				'icon'  => 'fa-github',
			),
			'youtube'   => array(
				'label' => esc_html__( 'Youtube Link', 'devent' ),
				'type'  => 'text',
				'icon'  => 'fa-youtube-play',
			),
			'pinterest' => array(
				'label' => esc_html__( 'Pinterest Link', 'devent' ),
				'type'  => 'text',
				'icon'  => 'fa-pinterest-p',
			),
			'instagram' => array(
				'label' => esc_html__( 'Instagram Link', 'devent' ),
				'type'  => 'text',
				'icon'  => 'fa-instagram',
			),
		);
		return $socials;
	}

	public static function user_textfield( $label, $field, $value ) {
		?>
		<tr>
			<th>
				<label><?php echo esc_html( $label ); ?></label>
			</th>
			<td>
				<input class="regular-text" type="text" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $field ); ?>">
			</td>
		</tr>
		<?php
	}

	public static function comments_callback( $comment, $args, $depth ) {
		$args2 = get_defined_vars();
		self::get_template_part( 'template-parts/comments-callback', $args2 );
	}

	public static function hex2rgb( $hex ) {

		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = "$r, $g, $b";
		return $rgb;
	}

	public static function uniqueid() {
		$time = microtime();
		$time = str_replace( array( ' ', '.' ), '-', $time );
		$id   = 'u-' . $time;
		return $id;
	}

	public static function image_alt( $id = null ) {
		if ( is_object( $id ) || is_array( $id ) ) :

			if ( isset( $id['attachment_id'] ) ) :
				$post = get_post( $id['attachment_id'] );
				if ( is_object( $post ) ) :
					if ( $post->post_excerpt ) :
						return esc_attr( $post->post_excerpt );
					else :
						return esc_attr( $post->post_title );
					endif;
				endif;
			else :
				return false;
			endif;

		elseif ( $id > 0 ) :

			$post = get_post( $id );
			if ( is_object( $post ) ) :
				if ( $post->post_excerpt ) :
					return esc_attr( $post->post_excerpt );
				else :
					return esc_attr( $post->post_title );
				endif;
			endif;

		endif;
	}

	public static function using_elementor() {
		global $post;
		if ( in_array( 'elementor/elementor.php', (array) get_option( 'active_plugins' ) ) ) {
			return \Elementor\Plugin::$instance->db->is_built_with_elementor( $post->ID );
		}
	}

	public static function banner( $blog = '', $post = '', $search = '', $error = '', $page = '' ) {
		if ( is_home() || is_archive() ) {
			$banner_g = Theme::$options[ $blog ];
		} elseif ( is_singular( 'post' ) ) {
			$banner_g = Theme::$options[ $post ];
		} elseif ( is_search() ) {
			$banner_g = Theme::$options[ $search ];
		} elseif ( is_404() ) {
			$banner_g = Theme::$options[ $error ];
		} else {
			$banner_g = Theme::$options[ $page ];
		}
		return $banner_g;
	}
}
