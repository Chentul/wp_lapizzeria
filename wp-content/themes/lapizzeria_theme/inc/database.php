<?php 
 
/* === FUNCIÓN PARA CREAR LA BASE DE DATOS PARA EL CONTROL DE RESERVACIONES DEL CONTACTO
==========================================================================================*/
function lapizzeria_database() {

	global $wpdb; // incluye la clase con muchos métodos
	global $lapizeria_dbversion; // creamos la version de la base de datos de manera global
	$lapizeria_dbversion = '1.0'; // definimos la version

	$tabla = $wpdb->prefix . 'reservaciones'; // el prefix es wp_
	
	$charset_collate = $wpdb->get_charset_collate(); // obtiene el caracter set


	// creamos el sql para crar la tabla
	$sql = "CREATE TABLE $tabla (
		id mediumint( 9 ) NOT NULL AUTO_INCREMENT,
		nombre varchar( 50 ) NOT NULL,
		fecha datetime NOT NULL,
		correo varchar( 50 ) DEFAULT '' NOT NULL,
		telefono varchar( 10 ) NOT NULL,
		mensaje longtext NOT NULL,
		PRIMARY KEY ( id )
	) $charset_collate; ";

	// se necesita dbDelta para ejecutar el SQL y esta en el archivo upgrade.php
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); // ABSPATH imprime la ruta absoluta
	dbDelta( $sql );

	// guarda la version de la base de datos para realizar comparaciones
	add_option( 'lapizzeria_dbversion', $lapizeria_dbversion ); 

	/* === EN CASO DE HABER ACTUALIZACIÓNES
	================================================================*/
	if( lapizzeriadb_revisar() ) {

		$tabla = $wpdb->prefix . 'reservaciones';

		// nuevo SQL en dado caso que se quiera actualizar algunos campos
		$sql = "CREATE TABLE $tabla (
			id mediumint( 9 ) NOT NULL AUTO_INCREMENT,
			nombre varchar( 50 ) NOT NULL,
			fecha datetime NOT NULL,
			correo varchar( 50 ) DEFAULT '' NOT NULL,
			telefono varchar( 10 ) NOT NULL,
			mensaje longtext NOT NULL,
			PRIMARY KEY ( id )
		) $charset_collate; ";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		update_option( 'lapizzeria_dbversion', $lapizeria_dbversion ); // actualiza la version de la db
	}
}

// función para comparar la version antigua a la nueva
function lapizzeriadb_revisar() {

	global $lapizeria_dbversion;

	if( get_site_option( 'lapizzeria_dbversion') != $lapizeria_dbversion )
		return true;
	else
		return false;
}

add_action( 'after_setup_theme', 'lapizzeria_database' ); // hook que se corre una sola vez