<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://patmos.sk
 * @since      1.0.0
 *
 * @package    Wc_Order_Details_Enhancements
 * @subpackage Wc_Order_Details_Enhancements/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Order_Details_Enhancements
 * @subpackage Wc_Order_Details_Enhancements/admin
 * @author     Peter Gál <pergalsk@gmail.com>
 */
class Wc_Order_Details_Enhancements_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


	/**
	 * The WC order.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $order    WC order object.
	 */
	private $order = null;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Order_Details_Enhancements_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Order_Details_Enhancements_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wc-order-details-enhancements-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Order_Details_Enhancements_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Order_Details_Enhancements_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wc-order-details-enhancements-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 * Custom order items header title.
	 *
	 * @since    1.0.0
	 */
	public function admin_order_items_headers($order)
	{
		$this->order = $order;
?>
		<th class="line_cost_incl_tax sortable" data-sort="float"><?php esc_html_e('Celková cena', 'wc-order-details-enhancements'); ?></th>
		<th class="item_cost_incl_tax sortable" data-sort="float"><?php esc_html_e('Cena položky', 'wc-order-details-enhancements'); ?></th>
		<?php
	}

	/**
	 * Custom order items header title.
	 *
	 * @since    1.0.0
	 */
	public function admin_order_item_values($product, $item, $item_id)
	{
		if (empty($this->order)) {
			return;
		}

		if ($product === null) {
		?>
			<td class="line_cost_incl_tax" width="1%">&nbsp;</td>
			<td class="item_cost_incl_tax" width="1%">&nbsp;</td>
		<?php
		} else {
			$line_incl_tax = $this->order->get_line_total($item, true, true);
			$price_incl_tax = $this->order->get_item_subtotal($item, true, true);
			$currency = $this->order->get_currency();
		?>
			<td class="line_cost_incl_tax fill" width="1%" data-sort-value="<?php echo esc_attr($line_incl_tax); ?>">
				<div class="view">
					<span class="item_format">
						<?php
						echo wc_price($line_incl_tax, array('currency' => $currency)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>&nbsp;s&nbsp;DPH</span>
				</div>
			</td>

			<td class="item_cost_incl_tax fill" width="1%" data-sort-value="<?php echo esc_attr($price_incl_tax); ?>">
				<div class="view">
					<span class="item_format">
						<?php
						echo wc_price($price_incl_tax, array('currency' => $currency)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>&nbsp;s&nbsp;DPH</span>
				</div>
			</td>
<?php
		}
	}
}
