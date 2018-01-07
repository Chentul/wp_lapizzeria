<?php

/* === INSERTA LOS DATOS DE RESERVACIONES
================================================================================*/
function lapizzeria_guardar_datos() {

	global $wpdb;

	if( isset( $_POST[ 'enviar' ] ) && isset( $_POST[ 'oculto' ] ) ) {

		// sanitiza los campos del formulario, por cuestion de seguridad
		$nombre = sanitize_text_field( $_POST[ 'nombre' ] );
		$fecha = sanitize_text_field( $_POST[ 'fecha' ] );
		$correo = sanitize_text_field( $_POST[ 'correo' ] );
		$telefono = sanitize_text_field( $_POST[ 'telefono' ] );
		$mensaje = sanitize_text_field( $_POST[ 'mensaje' ] );

		$tabla = $wpdb->prefix . "reservaciones";
		
		// guarda los datos en un arreglo
		$datos = array(
			'nombre' => $nombre,
			'fecha' => $fecha,
			'correo' => $correo,
			'telefono' => $telefono,
			'mensaje' => $mensaje
		);
		
		// crea el formato de nuestros datos como string, puede ser $f (floats) , $d (integers)
		$formato = array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s'
		);

		// realizar crud en wordpress
		$wpdb->insert( $tabla, $datos, $formato ); // realiza la insercción

		$url = get_page_by_title( 'Gracias por su reserva' ); // obtiene la página
		wp_redirect( get_permalink( $url->ID ) ); // nos redirecciona a esa pagina
		exit(); // necesario para poder realizar la redirección

	} // fin del if
} // fin de la funcion lapizzeria_guardar_datos()

add_action( 'init', 'lapizzeria_guardar_datos' );