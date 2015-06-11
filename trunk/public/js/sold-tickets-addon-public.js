(function ($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note that this assume you're going to use jQuery, so it prepares
     * the $ function reference to be used within the scope of this
     * function.
     *
     * From here, you're able to define handlers for when the DOM is
     * ready:
     *
     * $(function() {
	 *
	 * });
     *
     * Or when the window is loaded:
     *
     * $( window ).load(function() {
	 *
	 * });
     *
     * ...and so on.
     *
     * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
     * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
     * be doing this, we should try to minimize doing that in our own work.
     */

    $(function () {
        var charts = $('.chart.radial');

        if (charts.length !== 0) {
            for (var index = 0; index < charts.length; index += 1) {
                var chart = charts.eq(index),
                    chart_value = 0,
                    chart_diameter = 50,
                    chart_label = null;

                chart_value = chart.attr('data-value');
                chart_diameter = chart.attr('data-maxvalue');
                chart_label = chart.attr('data-label');

                radialProgress(charts.get(index))
                    .label(chart_label)
                    //.onClick(onClick1)
                    .diameter(chart_diameter)
                    .value(chart_value)
                    .render();
            }
        }
    });
})(jQuery);
