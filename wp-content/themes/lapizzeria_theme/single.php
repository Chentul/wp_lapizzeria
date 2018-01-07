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

		<div class="comentarios contenedor">
			<?php 
				// imprime el formulario de los comentarios
				comment_form();
			?>
		</div> <!-- .comentarios -->
		<div class="contenedor">
			<ul class="lista-comentarios">
				<?php 
					// variable que obtiene todos los comentarios
					$comentarios = get_comments( array(
						// solo muestra los comentarios que pertenezcan a este post
						'post_id' => $post->ID,
						// solo muestra los comentarios aprovados
						'status' => 'approve',
					) );
					// función que enlista los comentarios recibiendo dos parametros
					wp_list_comments( array(
						// solo muestra 10 comentarios por página
						'per_page' => 10,
						// muestra el último comentario en top
						'reverse_top_lever' => false
					), $comentarios );
				?>
			</ul>
		</div>
	<?php } // fin del while ?>

	<script>console.log('single.php');</script>
<?php get_footer(); ?>
