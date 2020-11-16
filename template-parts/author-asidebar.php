<?php
/**
 * Description.
 *
 * @package WordPress
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

use AazzTech\devent\Helper;

if ( ! is_directorist() && ! is_user_logged_in() ) {
	return;
}

$reg = \ATBDP_Permalink::get_registration_page_link();


$user_id     = get_user_meta( get_current_user_id(), 'pro_pic', true );
$profile_img = wp_get_attachment_image_src( $user_id );
$avatar_img  = get_avatar( get_current_user_id(), 40, null, null, array( 'class' => 'img-fluid' ) );

$enable_listing    = get_directorist_option( 'my_listing_tab', 1 ) ? true : false;
$listing_tab_label = get_directorist_option( 'my_listing_tab_text', 'Listings' );
$enable_need       = class_exists( 'Post_Your_Need' ) && get_directorist_option( 'enable_pyn', 1 ) && get_directorist_option( 'display_user_need_tab', 1 ) ? true : false;
$need_tab_label    = get_directorist_option( 'need_tab_label', 'My Needs' );
$enable_profile    = get_directorist_option( 'my_profile_tab', 1 ) ? true : false;
$profile_tab_label = get_directorist_option( 'my_profile_tab_text', 'My Profile' );
$enable_fav        = get_directorist_option( 'fav_listings_tab', 1 ) ? true : false;
$fav_tab_label     = get_directorist_option( 'fav_listings_tab_text', 'Bookmarks' );
$enable_packages   = get_directorist_option( 'user_active_package', 1 ) ? true : false;
$enable_history    = get_directorist_option( 'user_order_history', 1 ) ? true : false;
$enable_chat       = get_directorist_option( 'enable_live_chat', 1 ) ? true : false;
$enable_booking    = get_directorist_option( 'enable_booking', 1 ) ? true : false;
?>

<div class="notification-area">
	<ul>
		<li>
			<a class="notification" href="#">
				<?php
				if ( empty( $profile_img ) ) {
					echo wp_kses_post( $avatar_img );
				} else {
					echo sprintf( '<img src="%s" alt="%s" class="img-fluid"/>', esc_url( $profile_img[0] ), esc_attr( Helper::image_alt( $user_id ) ) );
				}
				?>
			</a>

			<div class="notification-dropdown-menu author-dropdown-menu">
				<div class="author-user">
					<?php
						$author_name = get_the_author_meta( 'display_name', $post->post_author );
					if ( ! $profile_img ) {
						echo wp_kses_post( $avatar_img );
					} else {
						echo sprintf( '<img width="65" src="%s" alt="%s" class="img-fluid rounded-circle"/>', esc_url( $profile_img[0] ), esc_attr( Helper::image_alt( $user_id ) ) );
					}
						echo $author_name ? '<h6>' . esc_attr( $author_name ) . '</h6>' : '';
					?>
				</div>

				<?php if ( $enable_listing ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-listings'; ?>"><i class="la la-list-alt"></i><?php echo esc_attr( $listing_tab_label ); ?></a>
				<?php } ?>

				<?php if ( $enable_need ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-enquiry-tab'; ?>"><?php echo esc_attr( $need_tab_label ); ?></a>
				<?php } ?>

				<?php if ( $enable_profile ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-profile'; ?>"><i class="la la-user"></i><?php echo esc_attr( $profile_tab_label ); ?></a>
				<?php } ?>

				<a href="#"><i class="la la-star-o"></i></i>My Reviews</a>
				<a href="#"><i class="la la-bell"></i>Notifications</a>

				<?php if ( $enable_chat ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-chat'; ?>"><i class="la la-envelope"></i><?php esc_html_e( 'Chats', 'devent' ); ?></a>
				<?php } ?>

				<a href="#"><i class="la la-money"></i>Billings</a>

				<?php if ( $enable_booking ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-my-booking'; ?>"><i class="la la-calendar-check-o"></i><?php esc_html_e( 'My Bookings', 'devent' ); ?></a>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#approved-booking'; ?>"><?php esc_html_e( 'All Bookings', 'devent' ); ?></a>
				<?php } ?>

				<?php if ( $enable_fav ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-bookmarks'; ?>"><i class="la la-heart-o"></i><?php echo esc_attr( $fav_tab_label ); ?></a>
				<?php } ?>

				<?php if ( $enable_packages ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-packages'; ?>"><?php esc_html_e( 'Packages', 'devent' ); ?></a>
				<?php } ?>

				<?php if ( $enable_history ) { ?>
					<a href="<?php echo esc_url( ATBDP_Permalink::get_dashboard_page_link() ) . '#active-history'; ?>"><?php esc_html_e( 'Order History', 'devent' ); ?></a>
				<?php } ?>

				<a class="btn" role="button" href=" <?php echo wp_logout_url( ATBDP_Permalink::get_login_page_link() ); ?> "><i class="la la-power-off"></i><?php esc_html_e( 'Logout', 'devent' ); ?></a>

			</div>
		</li>
	</ul>
</div>
