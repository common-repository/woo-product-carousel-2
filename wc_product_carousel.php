<?php
/**
 * @link              http://designas.in
 * @since             1.0.0
 * @package           Wc_product_carousel
 *
 * @wordpress-plugin
 * Plugin Name:       WC product carousel
 * Plugin URI:        http://designas.in/plugins/
 * Description:       Visual Composer Product Slider addon for Woocommerce.Build your Product Carousel Very Easy
 * Version:           1.0.0
 * Author:            Sushovan Bhowmik
 * Author URI:        https://www.facebook.com/sushovan.bhowmik.58
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc_product_carousel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wc_product_carousel-activator.php
 */
function activate_wc_product_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc_product_carousel-activator.php';
	Wc_product_carousel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wc_product_carousel-deactivator.php
 */
function deactivate_wc_product_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc_product_carousel-deactivator.php';
	Wc_product_carousel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wc_product_carousel' );
register_deactivation_hook( __FILE__, 'deactivate_wc_product_carousel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wc_product_carousel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wc_product_carousel() {

	$plugin = new Wc_product_carousel();
	$plugin->run();

}
run_wc_product_carousel();