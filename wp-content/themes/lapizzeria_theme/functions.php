<?php 

// incluye nuestro archivo style.css de nuestro tema a WordPress
function lapizzeria_styles() {
	
	// función para registrar los estilos
	wp_register_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '7.0' );

	// se agrego en el parametro array( 'normalize' ) como dependencia, es decir, primero carga normalize y seguidamente nuestro style.css
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array( 'normalize' ), '1.0' );

	// función para incrustrar los estilos
	wp_enqueue_style( 'normalize' );
	wp_enqueue_style( 'style' );

}

add_action( 'wp_enqueue_scripts', 'lapizzeria_styles' );

// función para implementar los menus en nuestro tema de WordPress
function lapizzeria_menus() {

	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'lapizzeria' ),
		'social-menu' => __( 'Social Menu', 'lapizzeria' )
	));
}

add_action( 'init', 'lapizzeria_menus' );













