<?php get_header(); ?>

	<?php while( have_posts() ) { the_post(); ?>

		<div class="hero" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<h1>
						<?php 
							// imprime la descripción de WP
							echo esc_html( get_option( 'blogdescription' ) );
							// esc_html( bloginfo( 'description' ) );
						?>
					</h1>
					<?php 
						the_content(); // imprime el contenido de la página 
						$url = get_page_by_title( 'Sobre Nosotros' );
					?>
					<a href="<?php echo get_permalink( $url->ID ); ?>" class="button naranja">Leer más</a>
				</div>
			</div> <!-- .contenido-hero -->
		</div> <!-- .hero -->

		<div class="principal contenedor">
			<main class="texto-centrado contenido-paginas">
			</main> <!-- contenido-paginas -->
		</div> <!-- .principal contenedor -->

	<?php } // fin del while ?>

	<script>console.log('front-page.php');</script>
<?php get_footer(); ?>
g