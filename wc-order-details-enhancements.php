<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://patmos.sk
 * @since             1.0.0
 * @package           Wc_Order_Details_Enhancements
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Order Details Enhancement
 * Plugin URI:        https://patmos.sk
 * Description:       Enhancements of order details.
 * Version:           1.0.0
 * Author:            Peter Gál
 * Author URI:        https://patmos.sk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-order-details-enhancements
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
define( 'WC_ORDER_DETAILS_ENHANCEMENTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wc-order-details-enhancements-activator.php
 */
function activate_wc_order_details_enhancements() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-order-details-enhancements-activator.php';
	Wc_Order_Details_Enhancements_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wc-order-details-enhancements-deactivator.php
 */
function deactivate_wc_order_details_enhancements() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-order-details-enhancements-deactivator.php';
	Wc_Order_Details_Enhancements_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wc_order_details_enhancements' );
register_deactivation_hook( __FILE__, 'deactivate_wc_order_details_enhancements' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wc-order-details-enhancements.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wc_order_details_enhancements() {

	$plugin = new Wc_Order_Details_Enhancements();
	$plugin->run();

}
run_wc_order_details_enhancements();
