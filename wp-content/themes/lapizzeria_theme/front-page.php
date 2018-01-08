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
	<?php } // fin del while ?>

	<div class="principal contenedor">
		<main class="contenedor-grid">
			<h2 class="texto-centrado color-rojo">Nuestras Especialidades</h2>
			<?php 
				// imprimimos contenido de otras secciones
				$args = array(
					'posts_per_page' => 3, // imprime 3 post
					'orderby' => 'rand', // imprime aleatoriamente
					'post_type' => 'especialidades' // slug para indicarle que imprima las pizzas
					// 'category_name' => 'pizzas' ó // para imprimir por categorias
				);

				$especialidades = new WP_Query( $args );

				while( $especialidades->have_posts() ) {
					$especialidades->the_post();
			?>
				<div class="especialidad columnas1-3">
					<div class="contenido-especialidad">
						<?php the_post_thumbnail( 'especialidades_portrait' ); ?>
						<div class="informacion-platillo">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
							<p class="precio">$<?php the_field( 'precio' ); ?></p>
							<a href="<?php the_permalink(); ?>" class="button">Leer más</a>
						</div>
					</div>
				</div>
			<?php 
				} // fin del while de $especialidades 
				wp_reset_postdata(); // para finalizar el WP_Query()
			?>
		</main> <!-- contenido-paginas -->
	</div> <!-- .principal contenedor -->

	<section class="ingredientes">
		<div class="contenedor">
			<div class="contenedor-grid">
				<?php 
					while( have_posts() ) {
						the_post();
				?>
					<div class="columnas2-4">
						<?php 
							the_field( 'contenido' ); 
							$url = get_page_by_title( 'Sobre Nosotros' );
						?>
						<a class="button" href="<?php echo get_permalink( $url->ID ); ?>">Leer más</a>
					</div>
					<div class="columnas2-4 imagen">
						<img src="<?php the_field( 'imagen' ); ?>" />
					</div>
				<?php } // fin del while ?>
			</div>
		</div>
	</section>  <!-- .ingredientes -->

	<section class="contenedor">
		<h2 class="color-rojo texto-centrado">Galeria de Imágenes</h2>
		<?php 
			$url = get_page_by_title( 'Galeria' );
			echo get_post_gallery( $url->ID ); // imprime la galeria del post
		?>
	</section> <!-- .galeria -->

	<section class="ubicacion-reservacion">
		<div class="contenedor-grid">
			<div class="columnas2-4">
				mapa
			</div>
			<div class="columnas2-4">
				<?php
					// trae el formulario de reservacion
					get_template_part( 'templates/formulario', 'reservacion' );
				?>
			</div>
		</div>
	</section> <!-- .ubicacion-reservacion -->

	<script>console.log('front-page.php');</script>
<?php get_footer(); ?>
g