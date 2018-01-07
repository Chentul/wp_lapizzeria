<?php 

function lapizzeria_database() {

	global $wpdb; // incluye la clase con muchos métodos
	global $lapiizeria_dbversion;
	$lapiizeria_dbversion; = '0.1';

	$tabla = $wpdb->prefix . 'reservaciones'; // el prefix es wp_
	
	$charset_collate = $wpdb->get_charset_collate(); // obtiene el caracter set


}
// hook que se corre una vez que se cargaron los archivos del themes
add_actrion( 'after_setup_theme', 'lapizzeria_database' );