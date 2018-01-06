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
		<h3 class="">Pizzas</h3>
		<?php 
			// argumentos del query
			$args = array(
				'post_type' => 'especialidades',
				'posts_per_page' => -1, // el -1 indica que traiga todas las entradas
				'orderby' => 'title',
				'order' => 'ASC',
				'category_name' => 'pizzas'
			);
			$pizzas = new WP_Query( $args );

			while( $pizzas->have_posts() ) { $pizzas->the_post();
		?>
			<ul>
				<li><?php the_title(); ?></li>
			</ul>
		<?php 
			} // fin del while de $pizzas 
			// siempre que se utiliza la clase WP_Query tenemos que terminar con wp_reset_postdata()
			wp_reset_postdata();
		?>
	</div>

	<script>console.log('nuestras-especialidades.php');</script>
<?php get_footer(); ?>
