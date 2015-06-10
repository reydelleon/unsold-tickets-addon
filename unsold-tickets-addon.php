<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/reydelleon/unsold-tickets-addon
 * @since             0.1.0
 * @package           unsold_tickets_addon
 *
 * @wordpress-plugin
 * Plugin Name:       Unsold Tickets Add-On - Tickera
 * Plugin URI:        https://github.com/reydelleon/unsold-tickets-addon
 * Description:       Shows how many tickets are left in the system.
 * Version:           0.1.0
 * Author:            Reydel Leon Machado [SURPASSWEB]
 * Author URI:        https://www.linkedin.com/in/reydelleon
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       unsold-tickets-addon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-unsold-tickets-addon-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unsold-tickets-addon-activator.php';
	Unsold_Tickets_AddOn_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-unsold-tickets-addon-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unsold-tickets-addon-deactivator.php';
	Unsold_Tickets_AddOn_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-unsold-tickets-addon.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_unsold_tickets_addon() {

	$plugin = new Unsold_Tickets_AddOn();
	$plugin->run();
}

run_unsold_tickets_addon();
