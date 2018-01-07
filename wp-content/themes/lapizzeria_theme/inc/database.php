<?php 

function lapizzeria_database() {

	global $wpdb; // incluye la clase con muchos métodos
	global $lapiizeria_dbversion;
	$lapiizeria_dbversion = '0.1';

	$tabla = $wpdb->prefix . 'reservaciones'; // el prefix es wp_
	
	$charset_collate = $wpdb->get_charset_collate(); // obtiene el caracter set

	$sql = "CREATE TABLE $tabla (
		id mediumint( 9 ) NOT NULL AUTO_INCREMENT,
		nombre varchar( 50 ) NOT NULL,
		fecha datetime NOT NULL,
		correo varchar( 50 ) DEFAULT '' NOT NULL,
		telefono varchar( 10 ) NOT NULL,
		mensaje longtext NOT NULL,
		PRIMARY KEY ( id )
	) $charset_collate; ";

	// cuando creamos un SQL tenemos que llamar a este archivo
	// ABSPATH imprime la ruta absoluta
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	// esta funcion se encarga de examinar la estructura de las tablas y agrega o modifica la tabla si es necesario
	dbDelta( $sql );

	add_option( 'lapizzeria_version', $lapiizeria_dbversion );
}
// hook que se corre una vez que se cargaron los archivos del themes
add_action( 'after_setup_theme', 'lapizzeria_database' );