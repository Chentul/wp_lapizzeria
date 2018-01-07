<?php

/* === INSERTA LOS DATOS DE RESERVACIONES
================================================================*/
function lapizzeria_guardar_datos() {

	if( isset( $_POST[ 'enviar' ] ) && $_POST[ 'oculto' ] == "1" ) {

		
	}
}

add_action( 'init', 'lapizzeria_guardar_datos' );