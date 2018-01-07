<?php
/* === CREA LAS OPCIONES
================================================================================*/
add_action( 'admin_menu', 'lapizzeria_ajustes' );

function lapizzeria_ajustes() {

	// 1er: titulo, 2do: titulo dentro de la pagina, 3er: capability quien lo puede usar, 4to: slug, 5to: funcion que se manda a llamar, 6to: el icono, 7to: la posicion
	add_menu_page( 'La Pizzeria', 'La Pizzeria Ajustes', 'administrator', 'lapizzeria_ajustes', 'lapizzeria_opciones', '', 6 ); // agrega el menu principal

	// 1ero: el slug, 2do: nombre de la pagina, 3ero: titulo del menu, 4to: capability que es el administrador, 5to: slug, 6to: funcion callback
	add_submenu_page( 'lapizzeria_ajustes', 'Reservaciones', 'Reservaciones', 'administrator', 'lapizzeria_reservaciones', 'lapizzeria_reservaciones' ); // agrega los submenus del menu principal

}

function lapizzeria_opciones() {

}

lapizzeria_reservaciones() {

}