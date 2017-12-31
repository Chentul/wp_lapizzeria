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
		</div> <!-- .contenedor -->
		
	</header>