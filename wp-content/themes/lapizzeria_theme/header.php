<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta description="" />
	<title>La Pizzeria | <?php the_title(); ?></title>
	<?php 
		// Función de WordPress para incluir dependencias
		wp_head();
	?>
</head>
<body>
	<header class="encabezado-sitio">
		<div class="contenedor">
			<div class="logo">
				<a href="<?php echo esc_url( home_url('/') ); ?>" title="ir a inicio">
					<img src="<?php echo get_template_directory_uri()?>/assets/img/logo.svg" alt="logo de la pizzeria" />
				</a>
			</div> <!-- .logo -->
			<div class="informacion-encabezado">
				<div class="redes-sociales">
					<?php 
						// argumentos necesarios para imprimir nuestro menu de redes sociales
						$args = array(
							'theme_location' => 'social-menu',
							'container' => 'nav',
							'container_class' => 'sociales',
							'container_id' => 'sociales',
							'link_before' => '<span class="sr-text">',
							'link_after' => '</span>'
						);
						// imprime el menu de redes sociales
						wp_nav_menu( $args );
					?>
				</div>	<!-- .redes-sociales -->
				<div class="direccion">
					<p>8179 Bay Avenue Mountain View, CA 94043</p>
					<p>Teléfono: +1-92-456-7890</p>
				</div>
			</div><!-- .informacion-encabezado -->
		</div> <!-- .contenedor -->
	</header>
	<nav class="menu-sitio">
		<div class="contenedor navegacion">
			<?php 
				// argumentos necesarios para imprimir nuestro menu de páginas
				$args = array(
					'theme_location' => 'header-menu',
					'container' => 'nav',
					'container_class' => 'menu-sitio'
				);
				// imprime el menu de navegación de nuestro menu
				wp_nav_menu( $args );
			?>
		</div>
	</nav>