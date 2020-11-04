<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class General_Setup {

	protected static $instance = null;

	public function __construct() {
		add_filter( 'atbdp_elementor_widgets_activated', '__return_false' );
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'widgets_init', array( $this, 'register_sidebars' ), 5 );
		add_action( 'wp_head', array( $this, 'pingback' ) );

		/*
		* add_action( 'wp_head',             array( $this, 'noscript_hide_preloader' ), 1 );
		* add_action( 'wp_body_open',        array( $this, 'preloader' ) );
		*/

		add_action( 'wp_footer', array( $this, 'back_to_top' ), 5 );
		add_filter( 'body_class', array( $this, 'body_classes' ) );
		add_filter( 'post_class', array( $this, 'hentry_config' ) );
		add_filter( 'get_search_form', array( $this, 'search_form' ) );
		// add_filter( 'wp_nav_menu_items', array( $this, 'login_link_to_menu' ), 10, 2 );
		add_filter( 'elementor/widgets/wordpress/widget_args', array( $this, 'elementor_widget_args' ) );

		/* User social fields */
		add_action( 'show_user_profile', array( $this, 'user_fields_form' ) );
		add_action( 'edit_user_profile', array( $this, 'user_fields_form' ) );
		add_action( 'personal_options_update', array( $this, 'user_fields_update' ) );
		add_action( 'edit_user_profile_update', array( $this, 'user_fields_update' ) );
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function theme_setup() {

		// Theme supports.
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_post_type_support( 'post', 'page-attributes' );

		// Image sizes.
		$sizes = array(
			'devent-size1' => array( 730, 450, true ), // Single Post.
			'devent-size2' => array( 540, 350, true ), // Blog.
		);

		$this->add_image_sizes( $sizes );

		// Register menus.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'devent' ),
			)
		);
	}

	/**
	 * Image sizes
	 *
	 * @param array $sizes sd.
	 */
	private function add_image_sizes( $sizes ) {
		$sizes = apply_filters( 'aztheme_image_sizes', $sizes );

		foreach ( $sizes as $size => $value ) {
			add_image_size( $size, $value[0], $value[1], $value[2] );
		}
	}

	public function register_sidebars() {

		$footer_widget_titles = array(
			'1' => esc_html__( 'Footer 1', 'devent' ),
			'2' => esc_html__( 'Footer 2', 'devent' ),
			'3' => esc_html__( 'Footer 3', 'devent' ),
			'4' => esc_html__( 'Footer 4', 'devent' ),
		);

		foreach ( $footer_widget_titles as $id => $name ) {
			register_sidebar(
				array(
					'name'          => $name,
					'id'            => 'footer-' . $id,
					'before_widget' => '<div id="%1$s" class="footer-box widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="widget-title">',
					'after_title'   => '</h5>',
				)
			);
		}

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'devent' ),
				'id'            => 'sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog Sidebar', 'devent' ),
				'id'            => 'blog-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);

		if ( class_exists( 'woocommerce' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Shop Sidebar', 'devent' ),
					'id'            => 'shop-sidebar',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);
		}

	}

	public function body_classes( $classes ) {

		// Sidebar.
		if ( 'left - sidebar' === Theme::$layout ) {
			$classes[] = 'has-sidebar left-sidebar';
		} elseif ( 'right-sidebar' === Theme::$layout ) {
			$classes[] = 'has-sidebar right-sidebar';
		} else {
			$classes[] = 'no-sidebar';
		}

		// Bgtype.
		if ( 'bgimg' === Theme::$bgtype ) {
			$classes[] = 'header-bgimg';
		}

		return $classes;
	}

	public function hentry_config( $classes ) {
		if ( is_search() || is_page() ) {
			$classes = array_diff( $classes, array( 'hentry' ) );
		}
		return $classes;
	}

	public function pingback() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	public function noscript_hide_preloader() {
		// Hide preloader in case js disabled.
		echo '<noscript><style>#theme-preloader{display:none;}</style></noscript>';
	}

	public function preloader() {
		if ( Theme::$options['preloader'] ) {
			if ( ! empty( Theme::$options['preloader_image']['url'] ) ) {
				$preloader_img = Theme::$options['preloader_image']['url'];
			} else {
				$preloader_img = Helper::get_img( 'preloader.gif' );
			}
			echo '<div id="theme-preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
		}
	}

	public function back_to_top() {
		if ( Theme::$options['back_to_top'] ) {
			echo '<a href="#" class="theme-back-to-top "><i class="la la-angle-up"></i></a>';
		}
	}

	public function search_form() {
		$output = '
		<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div class="custom-search-input">
		<div class="input-group">
		<input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Search here ...', 'devent' ) . '" value="' . get_search_query() . '" name="s" />
		<button value="search" type="submit"><i class="la la-search"></i></button>
		</div>
		</div>
		</form>
		';
		return $output;
	}

	// public function login_link_to_menu( $items, $args ) {
	// 	if ( class_exists( 'Directorist_Base' ) && ! is_user_logged_in() && Theme::$options['login_button'] && 'primary' === $args->theme_location ) {
	// 		$link   = \ATBDP_Permalink::get_login_page_link();
	// 		$html   = '<li id="header-login-link d-none"><a href="' . esc_url( $link ) . '">' . esc_html__( 'Login', 'devent' ) . '</a></li>';
	// 		$items .= $html;
	// 	}
	// 	return $items;
	// }

	public function user_fields_form( $user ) {
		$user_meta = get_the_author_meta( 'devent_user_socials', $user->ID );
		$socials   = Helper::user_socials();
		?>
		<h2><?php esc_html_e( 'Social Links', 'devent' ); ?></h2>
		<table class="form-table">
			<tbody>
				<?php
				foreach ( $socials as $key => $value ) {
					$social = isset( $user_meta[ $key ] ) ? $user_meta[ $key ] : '';
					Helper::user_textfield( $value['label'], "devent_user_socials[$key]", $social );
				}
				?>
			</tbody>
		</table>
		<?php
	}

	public function user_fields_update( $user_id = false ) {
		if ( ! $user_id ) {
			$user_id = get_current_user_id();
			if ( ! $user_id ) {
				return;
			}
		}

		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}

		if ( ! isset( $_POST['devent_user_socials'] ) ) {
			return;
		}

		// Sanitize fields.
		$meta = $_POST['devent_user_socials'];
		foreach ( $meta as $key => $value ) {
			$meta[ $key ] = sanitize_text_field( $value );
		}

		update_user_meta( $user_id, 'devent_user_socials', $meta );
	}

	public function elementor_widget_args( $args ) {
		$args['before_widget'] = '<div class="widget %2$s">';
		$args['after_widget']  = '</div>';
		$args['before_title']  = '<h3>';
		$args['after_title']   = '</h3>';
		return $args;
	}
}

General_Setup::instance();
