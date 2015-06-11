<?php

/**
 * Provides a the default shortcode view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.linkedin.com/in/reydelleon
 * @since      1.0.0
 *
 * @package    Sold_Tickets_Addon
 * @subpackage Sold_Tickets_Addon/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="sold-tickets-addon widget clear-fix">
    <div class="sta-grid-container">
        <div class="sta-grid-2">
            <div class="radial chart" data-value="<?php echo $tickets_sold ?>" data-diameter="250" data-label="" data-maxvalue="100"></div>
        </div>
        <div class="sta-grid-2">
            <span><?php echo $tickets_left ?></span> Tickets Now Available
        </div>
    </div>
</div>