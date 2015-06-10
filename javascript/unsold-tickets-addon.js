/**
 * Wrapper function to safely use $
 */
function wppsWrapper( $ ) {
	var wptut = {

		/**
		 * Main entry point
		 */
		init: function () {
			wptut.prefix      = 'wptut_';
			wptut.templateURL = $( '#template-url' ).val();
			wptut.ajaxPostURL = $( '#ajax-post-url' ).val();

			wptut.registerEventHandlers();
		},

		/**
		 * Registers event handlers
		 */
		registerEventHandlers: function () {
			$( '#example-container' ).children( 'a' ).click( wptut.exampleHandler );
		},

		/**
		 * Example event handler
		 *
		 * @param object event
		 */
		exampleHandler: function ( event ) {
			alert( $( this ).attr( 'href' ) );

			event.preventDefault();
		}
	}; // end wptut

	$( document ).ready( wptut.init );

} // end wppsWrapper()

wppsWrapper( jQuery );
