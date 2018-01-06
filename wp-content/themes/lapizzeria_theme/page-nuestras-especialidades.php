<?php /* Template Name: Especialidades */ ?>
<?php get_header(); ?>

	<?php while( have_posts() ) { the_post(); ?>

		<div class="hero" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<h1><?php the_title(); ?></h1> <!-- imprime el titutlo de la página de WP -->
				</div>
			</div> <!-- .contenido-hero -->
		</div> <!-- .hero -->

		<div class="principal contenedor">
			<main class="texto-centrado contenido-paginas">
				<?php the_content(); ?> <!-- imprime el contenido de WP -->
			</main> <!-- contenido-paginas -->
		</div> <!-- .principal contenedor -->

	<?php } // fin del while ?>

	<div class="nuestras-especialidades contenedor">
		<h3 class="texto-rojo">Pizzas</h3>
		<div class="contenedor-grid">
			<?php 

				// argumentos del query para la base de datos
				$args = array(
					'post_type' => 'especialidades',
					'posts_per_page' => -1, // el -1 indica que traiga todas las entradas
					'orderby' => 'title',
					'order' => 'ASC',
					'category_name' => 'pizzas'
				);
				
				$pizzas = new WP_Query( $args ); // objeto para realizar la consulta en la base de datos

				//  loop para imprimir el post_type de especialidades
				while( $pizzas->have_posts() ) { $pizzas->the_post();
			?>
				<div class="columnas2-4">
					<?php the_post_thumbnail( 'especialidades' ); // imprime las imagenes guardadas en cada página ?>
					<div class="texto-especialidad">
						<h4>
							<?php the_title(); // imprime el titulo ?>
							<span>
								$ <?php the_field( 'precio' ); // imprime el precio vinculado con el post_field ?>
							</span>
						</h4>
						<?php the_content(); // imprime el contenido de la página ?>
					</div> <!-- .texto-especialidad -->
				</div>
			<?php 
				} // fin del while de $pizzas 
				wp_reset_postdata(); // siempre que se utiliza la clase WP_Query tenemos que terminar con wp_reset_postdata()
			?>
		</div> <!-- .contenedor-grid -->

		<h3 class="texto-rojo">Otros</h3>
		<div class="contenedor-grid">
			<?php 

				// argumentos del query para la base de datos
				$args = array(
					'post_type' => 'especialidades',
					'posts_per_page' => -1, // el -1 indica que traiga todas las entradas
					'orderby' => 'title',
					'order' => 'ASC',
					'category_name' => 'otros'
				);
				
				$otros = new WP_Query( $args ); // objeto para realizar la consulta en la base de datos

				//  loop para imprimir el post_type de especialidades
				while( $otros->have_posts() ) { $otros->the_post();
			?>
				<div class="columnas2-4">
					<?php the_post_thumbnail( 'especialidades' ); // imprime las imagenes guardadas en cada página ?>
					<div class="texto-especialidad">
						<h4>
							<?php the_title(); // imprime el titulo ?>
							<span>
								$ <?php the_field( 'precio' ); // imprime el precio vinculado con el post_field ?>
							</span>
						</h4>
						<?php the_content(); // imprime el contenido de la página ?>
					</div> <!-- .texto-especialidad -->
				</div>
			<?php 
				} // fin del while de $pizzas 
				wp_reset_postdata(); // siempre que se utiliza la clase WP_Query tenemos que terminar con wp_reset_postdata()
			?>
		</div> <!-- .contenedor-grid -->
	</div> <!-- .nuestras-especialidades -->
	
	<script>console.log('nuestras-especialidades.php');</script>
<?php get_footer(); ?>
