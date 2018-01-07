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

function lapizzeria_reservaciones() {
?>
	<div class="wrap">
		<h1>Reservaciones</h1>
		<table class="wp-list-table widefat striped">
			<thead>
				<tr>
					<th class="manage-column">ID</th>
					<th class="manage-column">Nombre</th>
					<th class="manage-column">Fecha</th>
					<th class="manage-column">Correo</th>
					<th class="manage-column">Telefono</th>
					<th class="manage-column">Mensaje</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					global $wpdb;
					
					$reservaciones = $wpdb->prefix . 'reservaciones'; // obtenemos la table
					
					// regresa los registros como un array númerico 
					// $registros = $wpdb->get_results( "SELECT * FROM $reservaciones;", ARRAY_N );
					// regresa los registros como array asociativo
					$registros = $wpdb->get_results( "SELECT * FROM $reservaciones;", ARRAY_A );
					
					foreach( $registros as $registro ) {

				?>
					<tr>
						<td><?php echo $registro[ 'id' ]; ?></td>
						<td><?php echo $registro[ 'nombre' ]; ?></td>
						<td><?php echo $registro[ 'fecha' ]; ?></td>
						<td><?php echo $registro[ 'correo' ]; ?></td>
						<td><?php echo $registro[ 'telefono' ]; ?></td>
						<td><?php echo $registro[ 'mensaje' ]; ?></td>
					</tr>
				<?php } // fin del foreach ?>
			</tbody>
		</table>
	</div>
<?php
} // fin de la funcion