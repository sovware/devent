<?php
/**
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

namespace AazzTech\devent;

class DirHelper {

	// Directorist categories.
	public static function categories() {
		$categories = get_terms( 'at_biz_dir-category' );
		$cat        = array();
		if ( $categories ) {
			foreach ( $categories as $category ) {
				$cat[ $category->slug ] = $category->name;
			}
			wp_reset_postdata();
		}
		return $cat;
	}

	// Directorist tags.
	public static function tags() {
		$tags    = get_terms( 'at_biz_dir-tags' );
		$all_tag = array();
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				$all_tag[ $tag->slug ] = $tag->name;
			}
			wp_reset_postdata();
		}
		return $all_tag;
	}

	// Directorist locations.
	public static function locations() {
		$locations = get_terms( 'at_biz_dir-location' );
		$loc       = array();
		if ( $locations ) {
			foreach ( $locations as $location ) {
				$loc[ $location->slug ] = $location->name;
			}
			wp_reset_postdata();
		}
		return $loc;
	}

	// Directorist contacts.
	public static function cf7_names() {
		global $wpdb;
		$cf7_list = $wpdb->get_results(
			"SELECT ID, post_title
                    FROM $wpdb->posts
                    WHERE post_type = 'wpcf7_contact_form'"
		);
		$cf7_val  = array();
		if ( $cf7_list ) {
			$cf7_val[0] = __( 'Select a Contact Form', 'findbiz' );
			foreach ( $cf7_list as $value ) {
				$cf7_val[ $value->ID ] = $value->post_title;
			}
			wp_reset_postdata();
		} else {
			$cf7_val[0] = esc_html__( 'No contact forms found', 'findbiz' );
		}
		return $cf7_val;
	}
}
