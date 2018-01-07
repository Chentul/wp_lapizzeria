<?php

/* === OTRAS FUNCIONES
================================================================*/
require dirname( __FILE__ ) . '/inc/database.php'; // funciones para crear la db
require dirname( __FILE__ ) . '/inc/reservaciones.php'; // funciones para insertar datos en la db

// incluye nuestro archivo style.css de nuestro tema a WordPress
function lapizzeria_styles() {

	/* === STYLES
	================================================================*/

	// función para registrar los estilos
	wp_register_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '7.0' );
	wp_register_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900', array(), '1.0.0' );
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array( 'normalize' ), '4.7' );
	wp_register_style( 'fluidboxcss', get_template_directory_uri() . '/assets/css/fluidbox.min.css', array( 'normalize' ), '2.0' );
	// se agrego en el parametro array( 'normalize' ) como dependencia, es decir, primero carga normalize y seguidamente nuestro style.css
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array( 'normalize' ), '1.0' );

	// función para incrustrar los estilos
	wp_enqueue_style( 'normalize' );
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'fluidboxcss' );
	wp_enqueue_style( 'style' );

	/* === SCRIPTS
	================================================================*/
	// el ultimo parametro indica que posicione el archivo en el footer
	wp_register_script( 'fluidboxjs', get_template_directory_uri() . '/assets/js/jquery.fluidbox.min.js', array(), '2.0', true );
	wp_register_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.0', true );

	wp_enqueue_script( 'jquery' ); // incluimos la libreria de jquery a nuestro tema
	wp_enqueue_script( 'fluidboxjs' ); // incluimos plugin de fluidbox
	wp_enqueue_script( 'scripts' ); // incluimos nuestro archivo scripts


}

add_action( 'wp_enqueue_scripts', 'lapizzeria_styles' ); // hook para agregar css y js

// función para implementar los menus en nuestro tema de WordPress
function lapizzeria_menus() {

	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'lapizzeria' ),
		'social-menu' => __( 'Social Menu', 'lapizzeria' )
	));
}

add_action( 'init', 'lapizzeria_menus' );

function lapizzeria_setup() {

	add_theme_support( 'post-thumbnails' );
	// función para agregar un tamaño personalizado a una imagen
	// 1er: nombre, 2do: width, 3ero: height, 4to: se redimenciona la imagen
	add_image_size( 'nosotros', 437, 291, true );

	add_image_size( 'especialidades', 768, 515, true );

	// cambia los ajustes del tamaño de las imagenes en miniatura, tambien se puede cambiar desde ajustes > medios en el dashboard de WP, pero lo recomendable es hacerlo por el functions.php
	update_option( 'thumbnail_size_w', 253 ); // small width
	update_option( 'thumbnail_size_h', 164 ); // small height

	// update_option( 'medium_size_w', 253 ); // small width
	// update_option( 'medium_size_h', 164 ); // small height
	// update_option( 'large_size_w', 253 ); // small width
	// update_option( 'large_size_h', 164 ); // small height
}

add_action( 'after_setup_theme', 'lapizzeria_setup' ); // hook que se corre una sola vez

/* === WIDGETS
================================================================*/
function lapizzeria_widgets() {

	register_sidebar( array(
		'name' => 'Blog Siderbar', // nombre que aparece en el back-end de WP
		'id' => 'blog_sidebar', // id que utilizaremos para imprimirlo en el sidebar
		'before_widget' => '<div class="widget">', // etiquetas que encierran el contenido del widget
		'after_widget' => '</div>',
		'before_title' => '<h3>', // etiqueta que se posiciona antes de imprimir el nombre del widget
		'after_title' => '</h3>'
	) );
}

add_action( 'widgets_init', 'lapizzeria_widgets' ); // hook para agregar widgets

/* === CUSTOM POST TYPE
================================================================*/
function lapizzeria_especialidades() {
	// interfaz
	$labels = array(
		'name'               => _x( 'Pizzas', 'lapizzeria' ),
		'singular_name'      => _x( 'Pizzas', 'post type singular name', 'lapizzeria' ),
		'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
		'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
		'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
		'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
		'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
		'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
		'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
		'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
		'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
		'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
		'not_found'          => __( 'No Pizzases found.', 'lapizzeria' ),
		'not_found_in_trash' => __( 'No Pizzases found in Trash.', 'lapizzeria' )
	);
	// campos
	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'lapizzeria' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		// url
		'rewrite'            => array( 'slug' => 'especialidades' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		// titulo, editor y imagen
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		// habilitamos categorias
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'especialidades', $args );
}

add_action( 'init', 'lapizzeria_especialidades' ); // hook que se corre al inicializar WP