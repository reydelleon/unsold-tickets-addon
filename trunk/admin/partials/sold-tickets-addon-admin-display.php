<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.linkedin.com/in/reydelleon
 * @since      1.0.0
 *
 * @package    Sold_Tickets_Addon
 * @subpackage Sold_Tickets_Addon/admin/partials
 */

add_menu_page(
    'Sold Tickets Addon - Tickera',
    'Sold Tickets Addon',
    'administrator',
    'sold_tickets_addon_menu',
    'sold_tickets_addon_options_page_display'
);

// First, we register a section. This is necessary since all future options must belong to one.
add_settings_section(
    'general_settings_section',         // ID used to identify this section and with which to register options
    'General Options',                  // Title to be displayed on the administration page
    'sandbox_general_options_callback', // Callback used to render the description of the section
    'general'                           // Page on which to add this section of options
);

// Next, we will introduce the fields for toggling the visibility of content elements.
add_settings_field(
    'show_header',                      // ID used to identify the field throughout the theme
    'Header',                           // The label to the left of the option interface element
    'sandbox_toggle_header_callback',   // The name of the function responsible for rendering the option interface
    'general',                          // The page on which this option will be displayed
    'general_settings_section',         // The name of the section to which this field belongs
    array(                              // The array of arguments to pass to the callback. In this case, just a description.
        'Activate this setting to display the header.'
    )
);

/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */

/**
 * This function provides a simple description for the General Options page.
 *
 * It is called from the 'sandbox_initialize_theme_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function sandbox_general_options_callback()
{
    echo '<p>Select which areas of content you wish to display.</p>';
} // end sandbox_general_options_callback

/**
 * This function renders the interface elements for toggling the visibility of the header element.
 *
 * It accepts an array of arguments and expects the first element in the array to be the description
 * to be displayed next to the checkbox.
 */
function sandbox_toggle_header_callback($args)
{

    // Note the ID and the name attribute of the element should match that of the ID in the call to add_settings_field
    $html = '<input type="checkbox" id="show_header" name="show_header" value="1" ' . checked(1, get_option('show_header'), false) . '/>';

    // Here, we will take the first argument of the array and add it to a label next to the checkbox
    $html .= '<label for="show_header"> ' . $args[0] . '</label>';

    echo $html;

} // end sandbox_toggle_header_callback

function sold_tickets_addon_options_page_display() {
    return "<p>Change this!</p>";
}