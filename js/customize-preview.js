/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function( $ ) {
	// Hide site tagline
	wp.customize( 'header_display_tagline', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				$( 'body' ).addClass( 'hide-site-tagline' );
			} else {
				$( 'body' ).removeClass( 'hide-site-tagline' );
			}
		});
	});

	// Hide Front Page Title
	wp.customize( 'hide_front_page_title', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( 'body' ).addClass( 'hide-homepage-title' );
			} else {
				$( 'body' ).removeClass( 'hide-homepage-title' );
			}
		});
	});
})( jQuery );
