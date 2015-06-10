<?php
/*
Plugin Name: Tickera - Unsold Tickets Add-On
Plugin URI:  https://github.com/reydelleon/unsold-tickets-addon
Description: Shows how many tickets are available in different formats - Tickera Add-On
Version:     0.1.0
Author:      Reydel Leon Machado
Author URI:  https://www.linkedin.com/in/reydelleon
*/

/*
 * This plugin was built on top of WordPress-Plugin-Skeleton by Ian Dunn.
 * See https://github.com/iandunn/WordPress-Plugin-Skeleton for details.
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

define( 'WPTUT_NAME',                 'Tickera - Unsold Tickets Add-On' );
define( 'WPTUT_REQUIRED_PHP_VERSION', '5.3' );                          // because of get_called_class()
define( 'WPTUT_REQUIRED_WP_VERSION',  '3.1' );                          // because of esc_textarea()

/**
 * Checks if the system requirements are met
 *
 * @return bool True if system requirements are met, false if not
 */
function wptut_requirements_met() {
	global $wp_version;
	//require_once( ABSPATH . '/wp-admin/includes/plugin.php' );		// to get is_plugin_active() early

	if ( version_compare( PHP_VERSION, WPTUT_REQUIRED_PHP_VERSION, '<' ) ) {
		return false;
	}

	if ( version_compare( $wp_version, WPTUT_REQUIRED_WP_VERSION, '<' ) ) {
		return false;
	}

	/*
	if ( ! is_plugin_active( 'plugin-directory/plugin-file.php' ) ) {
		return false;
	}
	*/

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function wptut_requirements_error() {
	global $wp_version;

	require_once( dirname( __FILE__ ) . '/views/requirements-error.php' );
}

/*
 * Check requirements and load main class
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
if ( wptut_requirements_met() ) {
	require_once( __DIR__ . '/classes/wptut-module.php' );
	require_once( __DIR__ . '/classes/unsold-tickets-addon.php' );
	require_once( __DIR__ . '/includes/admin-notice-helper/admin-notice-helper.php' );
//	require_once( __DIR__ . '/classes/wptut-custom-post-type.php' );
//	require_once( __DIR__ . '/classes/wptut-cpt-example.php' );
	require_once( __DIR__ . '/classes/wptut-settings.php' );
	require_once( __DIR__ . '/classes/wptut-cron.php' );
	require_once( __DIR__ . '/classes/wptut-instance-class.php' );

	if ( class_exists( 'Unsold_Tickets_AddOn' ) ) {
		$GLOBALS['wptut'] = Unsold_Tickets_AddOn::get_instance();
		register_activation_hook(   __FILE__, array( $GLOBALS['wptut'], 'activate' ) );
		register_deactivation_hook( __FILE__, array( $GLOBALS['wptut'], 'deactivate' ) );
	}
} else {
	add_action( 'admin_notices', 'wptut_requirements_error' );
}
