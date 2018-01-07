<?php get_header(); ?>

	<?php while( have_posts() ) { the_post(); ?>

		<div class="hero" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<h1><?php the_title(); ?></h1> <!-- imprime el titutlo de la página de WP -->
				</div>
			</div> <!-- .contenido-hero -->
		</div> <!-- .hero -->

		<div class="principal contacto contenedor">
			<main class="contenido-paginas">
				<?php //the_content(); ?> <!-- imprime el contenido de WP -->
				<h2>Realiza una reservación</h2>
				<form class="reserva-contacto" method="POST">
					<div class="campo">
						<input type="text" name="nombre" placeholder="Nombre" required />
					</div>
					<div class="campo">
						<input type="datetime-local" name="fecha" placeholder="Fecha" required />
					</div>
					<div class="campo">
						<input type="email" name="correo" placeholder="Correo" required />
					</div>
					<div class="campo">
						<input type="tel" name="telefono" placeholder="Telefono" required />
					</div>
					<div class="campo">
						<textarea name="mensaje" placeholder="Mensaje" required></textarea>
					</div>
					<div class="campo">
						<input type="submit" name="enviar" class="button" value="Enviar" />
					</div>
				</form> <!-- reserva-contacto -->
			</main> <!-- contenido-paginas -->
		</div> <!-- .principal contenedor -->

	<?php } // fin del while ?>

	<script>console.log('page.php');</script>
<?php get_footer(); ?>
