<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>La Pizzeria | <?php the_title(); ?></title>
	<?php wp_head(); // Función de WordPress para incluir dependencias ?>
</head>
<body>
	<?php 
	
		while( have_posts() ) {

			the_post();
			the_title( '<h1>', '</h1>' );
			the_content();
		}
		
	?>
</body>
</html>