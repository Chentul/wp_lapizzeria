<?php
/* === CREA LAS OPCIONES
================================================================================*/
add_action( 'admin_menu', 'lapizzeria_ajustes' );

function lapizzeria_ajustes() {

	// 1er: titulo, 2do: titulo dentro de la pagina, 3er: capability quien lo puede usar, 4to: slug, 5to: funcion que se manda a llamar, 6to: el icono, 7to: la posicion
	add_menu_page( 'La Pizzeria', 'La Pizzeria Ajustes', 'administrator', 'lapizzeria_ajustes', 'lapizzeria_opciones', '', 6 ); // agrega el menu principal

	// 1ero: el slug, 2do: nombre de la pagina, 3ero: titulo del menu, 4to: capability que es el administrador, 5to: slug, 6to: funcion callback
	add_submenu_page( 'lapizzeria_ajustes', 'Reservaciones', 'Reservaciones', 'administrator', 'lapizzeria_reservaciones', 'lapizzeria_reservaciones' ); // agrega los submenus del menu principal

	// llamar al registro de las opciones de nuestro theme
	add_action( 'admin_init', 'lapizzeria_registrar_opciones' );
}

function lapizzeria_registrar_opciones() {

	// registrar opciones una por campo
	// 1era: grupo, 2do: el name del input del form
	register_setting( 'lapizzeria_opciones_grupo', 'lapizzeria_direccion' );
	register_setting( 'lapizzeria_opciones_grupo', 'lapizzeria_telefono' );


}

function lapizzeria_opciones() {
?>
	<div class="wrap">
		<h1>Ajustes La Pizzeria</h1>
		<!-- el action siempre debe ser options.php, el cual se encuentra en wp-admin>options.php, el cual ya trae muchas funcionalidades para los forms -->
		<form action="options.php" method="POST">
			<?php
				// le indica a WP que utilice estas opciones
				settings_fields( 'lapizzeria_opciones_grupo' );
				do_settings_sections( 'lapizzeria_opciones_grupo' );
			?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Dirección</th>
					<td><input type="text" name="lapizzeria_direccion" value="<?php echo esc_attr( get_option( 'lapizzeria_direccion' ) ); ?>"/></td>
				</tr>
				<tr valign="top">
					<th scope="row">Teléfono</th>
					<td><input type="text" name="lapizzeria_telefono" value="<?php echo esc_attr( get_option( 'lapizzeria_telefono' ) ); ?>"/></td>
				</tr>
			</table>
			<?php submit_button(); // boton de guardar ?>
		</form>
	</div>
<?php
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