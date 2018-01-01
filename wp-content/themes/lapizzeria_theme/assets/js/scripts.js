$ = jQuery.noConflict();

$( document ).ready( function() {

	$( '.mobile-menu a' ).click( function() {
		$( '.menu-sitio' ).toggle( 'slow' );
	});

	$( window ).resize( function() {
		if( $( document ).width() >= 768 ) {
			$( '.menu-sitio' ).show();
		}
		else {
			$( '.menu-sitio' ).hide();	
		}
	});

}); // fin de la función principal de jQuery