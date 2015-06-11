<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/reydelleon
 * @since      1.0.0
 *
 * @package    Sold_Tickets_Addon
 * @subpackage Sold_Tickets_Addon/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sold_Tickets_Addon
 * @subpackage Sold_Tickets_Addon/public
 * @author     Reydel Leon Machado <contact@reydelleon.me>
 */
class Sold_Tickets_Addon_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Sold_Tickets_Addon_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Sold_Tickets_Addon_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/sold-tickets-addon-public.css', array(), $this->version, 'all');
        wp_enqueue_style('radial-progress', plugin_dir_url(__FILE__) . 'css/vendor/radial_progress.css', array(), $this->version, 'all');
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Sold_Tickets_Addon_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Sold_Tickets_Addon_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/sold-tickets-addon-public.js', array('jquery'), $this->version, false);
        wp_enqueue_script('d3js', '//d3js.org/d3.v3.min.js', array(), $this->version, false);
        wp_enqueue_script('radial-progress', plugin_dir_url(__FILE__) . 'js/vendor/radialProgress.js', array('d3js'), $this->version, false);
    }

    /**
     * Defines the default shortcode behavior.
     *
     * @since    1.0.0
     */
    public function tickets_sold_shortcode($attrs, $content = null) {
        // Required step when using is_plugin_active() in the front end
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');

        // Is Tickera activated?
        if (is_plugin_active('tickera-event-ticketing-system/tickera.php')) {
            // Get the remaining tickets amount
            $tickets_sold = tc_get_event_tickets_count_sold(53);
            $tickets_left = tc_get_event_tickets_count_left(53);

            include 'partials/sold-tickets-addon-default-shortcode-display.php';
        }
    }
}
