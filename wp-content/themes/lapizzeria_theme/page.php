<?php get_header(); ?>
	
	<?php while( have_posts() ) the_post(); { ?>

		<?php 
			// agrega la imagen destacada
			the_post_thumbnail();
		?>

		<h1><?php the_title(); ?></h1>
	
		<div class="principal contenedor">
			<main>
				<?php the_content(); ?>		
			</main>
		</div>

	<?php } // fin del while ?>

	<script>console.log('page.php');</script>
<?php get_footer(); ?>