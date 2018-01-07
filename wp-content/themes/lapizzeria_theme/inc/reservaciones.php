<?php

/* === INSERTA LOS DATOS DE RESERVACIONES
================================================================================*/
function lapizzeria_guardar_datos() {

	if( isset( $_POST[ 'enviar' ] ) && $_POST[ 'oculto' ] == "1" ) {

		// sanitiza los campos del formulario, por cuestion de seguridad
		$nombre = sanitize_text_field( $_POST[ 'nombre' ] );
		$fecha = sanitize_text_field( $_POST[ 'fecha' ] );
		$correo = sanitize_text_field( $_POST[ 'correo' ] );
		$telefono = sanitize_text_field( $_POST[ 'telefono' ] );
		$mensaje = sanitize_text_field( $_POST[ 'mensaje' ] );
	} // fin del if

} // fin de la funcion lapizzeria_guardar_datos()

add_action( 'init', 'lapizzeria_guardar_datos' );