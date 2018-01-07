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
		<div class="contenedor-grid">
			<main class="columnas2-3 contenido-paginas">
				<?php while( have_posts() ) { the_post(); ?>
					<article class="entrada-blog">
						<a href="<?php the_permalink(); ?>">
							<?php
								// imprime las imagenes de las entradas con el tamaño
								the_post_thumbnail( 'especialidades' );
							?>
						</a>
						<!-- el header es utilizado para representar la introducción de un contenido -->
						<header class="informacion-entrada clear">
							<div class="fecha">
								<time>
									<?php echo the_time( 'd' ); // trae el dia del post ?>
									<span>
										<?php the_time( 'M' ); // trae el mes del post ?>
									</span>
								</time>
							</div> <!-- .fecha -->
							<div class="titulo-entrada">
								<h2><?php the_title(); // imprime el titulo de la entrada ?></h2>
								<p class="autor">
									<i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); // imprime el nombre del author que creo la entrada ?>
								</p>
							</div>
							<?php 
								// the_category(); // imprime las categorias de la entrada
								// the_tags(); // imprime las etiquetas de las entradas
							?>
						</header> <!-- .header -->
						<div class="contenido-entrada">
							<?php 
								//the_content(); // imprime todo el contenido de la entrada/post
								the_excerpt(); // imprime una pequeña cantidad de la entrada/post
							?>
							<a href="<?php the_permalink(); // genera la url de la entrada/post ?>" class="button rojo">Leer más</a>
						</div>
					</article>
				<?php } // fin del while ?>
				<div class="paginacion">
					<?php
						// imprime la paginación de las entradas ( Método 1 )
						// echo paginate_links();
					?>
					<div class="anteriores">
						<?php next_posts_link( 'Anterior' ); ?>
					</div>
					<div class="siguientes">
						<?php previous_posts_link( 'Siguiente' ); ?>
					</div>
				</div>
			</main> <!-- contenido-paginas -->

			<?php get_sidebar(); // imprime el sidebar ?>
		</div> <!-- .contenedor-grid -->
	</div> <!-- .principal contenedor -->


	<script>console.log('page.php');</script>
<?php get_footer(); ?>
