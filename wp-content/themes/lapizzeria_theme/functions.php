<?php 

// Incluye nuestro archivo style.css de nuestro tema a WordPress
function lapizzeria_styles() {
	
	// Función para registrar los estilos
	wp_register_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '7.0' );
	
	// Se agrego en el parametro array( 'normalize' ) como dependencia, es decir, primero carga normalize y seguidamente nuestro style.css
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array( 'normalize' ), '1.0' );

	// Función para incrustrar los estilos
	wp_enqueue_style( 'normalize' );
	wp_enqueue_style( 'style' );

}

add_action( 'wp_enqueue_scripts', 'lapizzeria_styles' );