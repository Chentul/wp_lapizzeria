<?php get_header(); ?>

<?php while( have_posts() ) { the_post(); ?>

  <div class="hero" style="background: url( <?php echo get_the_post_thumbnail_url(); ?>);">
    <div class="contenido-hero">
      <div class="texto-hero">
        <h1><?php the_title(); ?></h1> <!-- imprime el titutlo de la página de WP -->
      </div>
    </div> <!-- .contenido-hero -->
  </div> <!-- .hero -->

  <div class="principal contenedor">
    <main class="texto-centrado contenido-paginas">
      <?php the_content(); ?> <!-- imprime el contenido de WP -->
    </main> <!-- .contenido-paginas -->
  </div> <!-- .principal contenedor -->
  
<?php } // fin del while ?>

<script>console.log('page-nosotros.php');</script>
<?php get_footer(); ?>
