<?php

/* === INSERTA LOS DATOS DE RESERVACIONES
================================================================================*/
function lapizzeria_guardar_datos() {

	global $wpdb;
	$tabla = $wpdb->prefix . "reservaciones";

	if( isset( $_POST[ 'enviar' ] ) ) {

		// sanitiza los campos del formulario, por cuestion de seguridad
		$nombre = sanitize_text_field( $_POST[ 'nombre' ] );
		$fecha = sanitize_text_field( $_POST[ 'fecha' ] );
		$correo = sanitize_text_field( $_POST[ 'correo' ] );
		$telefono = sanitize_text_field( $_POST[ 'telefono' ] );
		$mensaje = sanitize_text_field( $_POST[ 'mensaje' ] );

		// realizar crud en wordpress

	} // fin del if

	$datos = array(
		'nombre' => $nombre,
		'fecha' => $fecha,
		'correo' => $correo,
		'telefono' => $telefono,
		'mensaje' => $mensaje
	);

	$formato = array(
		'%s',
		'%s',
		'%s',
		'%s',
		'%s'
	);

	$wpdb->insert( $tabla, $datos, $formato );

} // fin de la funcion lapizzeria_guardar_datos()

add_action( 'init', 'lapizzeria_guardar_datos' );