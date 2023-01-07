<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://patmos.sk
 * @since      1.0.0
 *
 * @package    Wc_Order_Details_Enhancements
 * @subpackage Wc_Order_Details_Enhancements/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wc_Order_Details_Enhancements
 * @subpackage Wc_Order_Details_Enhancements/includes
 * @author     Peter Gál <pergalsk@gmail.com>
 */
class Wc_Order_Details_Enhancements_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-order-details-enhancements',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
