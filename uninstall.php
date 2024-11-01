<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://tplugins.com/shop
 * @since      1.0.0
 *
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'tpnpb_activate_next_previous' );
delete_option( 'tpnpb_buttons_position', 'top' );
delete_option( 'tpnpb_activate_next_previous_mobile' );
delete_option( 'tpnpb_add_product_image' );
delete_option( 'tpnpb_add_product_name' );
delete_option( 'tpnpb_label_previous' );
delete_option( 'tpnpb_label_next' );
delete_option( 'tpnpb_buttons_color' );
delete_option( 'tpnpb_buttons_border' );
delete_option( 'tpnpb_buttons_font_size' );
delete_option( 'tpnpb_product_image_size' );
delete_option( 'tpnpb_buttons_icons' );