<?php

/**
 * Fired during plugin activation
 *
 * @link       https://tplugins.com/shop
 * @since      1.0.0
 *
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 * @subpackage Tp_Next_Previous_Button_In_Single_Product_Page/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 * @subpackage Tp_Next_Previous_Button_In_Single_Product_Page/includes
 * @author     TP Plugins <pluginstp@gmail.com>
 */
class Tp_Next_Previous_Button_In_Single_Product_Page_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option( 'tpnpb_activate_next_previous', 1 );
		add_option( 'tpnpb_buttons_position', 'top' );
		add_option( 'tpnpb_activate_next_previous_mobile', 0 );
		add_option( 'tpnpb_add_product_image', 0 );
		add_option( 'tpnpb_add_product_name', 0 );
		add_option( 'tpnpb_label_previous', 'PREVIOUS' );
		add_option( 'tpnpb_label_next', 'NEXT' );
		add_option( 'tpnpb_buttons_color', '#29a6e5' );
		add_option( 'tpnpb_buttons_border', 0 );
		add_option( 'tpnpb_buttons_font_size', 15 );
		add_option( 'tpnpb_product_image_size', 70 );
		add_option( 'tpnpb_buttons_icons', 'tpnpbicon-left-open-big@tpnpbicon-right-open-big' );
	}

}
