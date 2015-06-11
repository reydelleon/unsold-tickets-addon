<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/reydelleon
 * @since             1.0.0
 * @package           Sold_Tickets_Addon
 *
 * @wordpress-plugin
 * Plugin Name:       Sold Tickets Add-On - Tickera
 * Plugin URI:        https://github.com/reydelleon/unsold-tickets-addon
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Reydel Leon Machado
 * Author URI:        https://www.linkedin.com/in/reydelleon
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sold-tickets-addon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sold-tickets-addon-activator.php
 */
function activate_sold_tickets_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sold-tickets-addon-activator.php';
	Sold_Tickets_Addon_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sold-tickets-addon-deactivator.php
 */
function deactivate_sold_tickets_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sold-tickets-addon-deactivator.php';
	Sold_Tickets_Addon_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sold_tickets_addon' );
register_deactivation_hook( __FILE__, 'deactivate_sold_tickets_addon' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sold-tickets-addon.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sold_tickets_addon() {

	$plugin = new Sold_Tickets_Addon();
	$plugin->run();

}
run_sold_tickets_addon();
