<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://tplugins.com/shop
 * @since             1.0.0
 * @package           Tp_Next_Previous_Button_In_Single_Product_Page
 *
 * @wordpress-plugin
 * Plugin Name:       TP Next & Previous Button on Single Product Page
 * Plugin URI:        https://tplugins.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            TP Plugins
 * Author URI:        https://tplugins.com/shop
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tp-next-previous-button-in-single-product-page
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TP_NEXT_PREVIOUS_BUTTON_IN_SINGLE_PRODUCT_PAGE_VERSION', '1.0.0' );
define('TPNPB_PLUGIN_NAME', 'TP Next & Previous Button in Single Product Page');
define('TPNPB_PLUGIN_MENU_NAME', 'TP Next & Previous Button');
define('TPNPB_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('TPNPB_PLUGIN_HOME', 'https://www.tplugins.com/');
define('TPNPB_PLUGIN_API', 'https://www.tplugins.com/tp-services');
define('TPNPB_PLUGIN_SLUG', 'tp-next-previous-button-in-single-product-page-pro');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tp-next-previous-button-in-single-product-page-activator.php
 */
function activate_tp_next_previous_button_in_single_product_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tp-next-previous-button-in-single-product-page-activator.php';
	Tp_Next_Previous_Button_In_Single_Product_Page_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tp-next-previous-button-in-single-product-page-deactivator.php
 */
function deactivate_tp_next_previous_button_in_single_product_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tp-next-previous-button-in-single-product-page-deactivator.php';
	Tp_Next_Previous_Button_In_Single_Product_Page_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tp_next_previous_button_in_single_product_page' );
register_deactivation_hook( __FILE__, 'deactivate_tp_next_previous_button_in_single_product_page' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tp-next-previous-button-in-single-product-page.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tp_next_previous_button_in_single_product_page() {

	$plugin = new Tp_Next_Previous_Button_In_Single_Product_Page();
	$plugin->run();

}
run_tp_next_previous_button_in_single_product_page();
