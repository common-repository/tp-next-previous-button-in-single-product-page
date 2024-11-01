<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://tplugins.com/shop
 * @since      1.0.0
 *
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 * @subpackage Tp_Next_Previous_Button_In_Single_Product_Page/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Tp_Next_Previous_Button_In_Single_Product_Page
 * @subpackage Tp_Next_Previous_Button_In_Single_Product_Page/includes
 * @author     TP Plugins <pluginstp@gmail.com>
 */
class Tp_Next_Previous_Button_In_Single_Product_Page_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tp-next-previous-button-in-single-product-page',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
