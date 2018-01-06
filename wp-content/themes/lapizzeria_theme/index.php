<?php 
	get_header();
	
	$pagina_blog = get_option( 'page_for_posts' ); // obtiene la página
	$imagen_id = get_post_thumbnail_id( $pagina_blog ); // obtiene el id de la imagen
	// la función wp_get_attachment_image_src() recibe dos parametros, el id de la imagen y el tamaño
	// obtiene un arreglo con las propiedades de la imagen
	$imagen = wp_get_attachment_image_src( $imagen_id, 'full' );
?>

	<div class="hero" style="background: url(<?php echo $imagen[ 0 ]; ?>);">
		<div class="contenido-hero">
			<div class="texto-hero">
				<h1><?php echo get_the_title( $pagina_blog ); ?></h1> <!-- imprime el titutlo de la página de WP -->
			</div>
		</div> <!-- .contenido-hero -->
	</div> <!-- .hero -->

	<div class="principal contenedor">
		<main class="texto-centrado contenido-paginas">
			<?php while( have_posts() ) { the_post(); ?>
				<article class="entrada-blog">
					<?php the_title(); ?>
				</article>
			<?php } // fin del while ?>
		</main> <!-- contenido-paginas -->
	</div> <!-- .principal contenedor -->


	<script>console.log('page.php');</script>
<?php get_footer(); ?>
