$ = jQuery.noConflict();

$( document ).ready( function() {

	/* === MENU 
	==============================================*/
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
	/* === FLUIDBOX 
	==============================================*/
	$( '.gallery a' ).each( function() {
		$( this ).attr( { 'data-fluidbox' : '' } );
	});

	if( $( '[data-fluidbox]' ).length > 0 ) {
		$( '[data-fluidbox]' ).fluidbox();
	}

}); // fin de la función principal de jQuery