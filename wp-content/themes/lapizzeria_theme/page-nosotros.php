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

  <div class="informacion-cajas contenedor">
    <div class="caja">
      <!-- <img src="<?php //the_field( 'imagen_1' )?>" alt=""> -->
      <?php
        // obtiene el id de la imagen
        $id_imagen = get_field( 'imagen_1' );
        // crea un arreglo con diferentes propiedades de la imagen
        // la función recibe dos parametros, el id de la imagen y el tamaño creado previamente en functions.php en la línea 56
        $imagen = wp_get_attachment_image_src( $id_imagen, 'nosotros');
      ?>
      <img src="<?php echo $imagen[ 0 ]; ?>" class="imagen-caja" alt="" />
      <div class="contenido-caja">
        <?php the_field( 'descripcion_1' ); ?>
      </div> <!-- .contenido-caja -->
    </div> <!-- .caja -->

    <div class="caja">
      <!-- <img src="<?php //the_field( 'imagen_1' )?>" alt=""> -->
      <?php
        // obtiene el id de la imagen
        $id_imagen = get_field( 'imagen_2' );
        // crea un arreglo con diferentes propiedades de la imagen
        // la función recibe dos parametros, el id de la imagen y el tamaño creado previamente en functions.php en la línea 56
        $imagen = wp_get_attachment_image_src( $id_imagen, 'nosotros');
      ?>
      <img src="<?php echo $imagen[ 0 ]; ?>" class="imagen-caja" alt="" />
      <div class="contenido-caja">
        <?php the_field( 'descripcion_2' ); ?>
      </div> <!-- .contenido-caja -->
    </div> <!-- .caja -->

    <div class="caja">
      <!-- <img src="<?php //the_field( 'imagen_1' )?>" alt=""> -->
      <?php
        // obtiene el id de la imagen
        $id_imagen = get_field( 'imagen_3' );
        // crea un arreglo con diferentes propiedades de la imagen
        // la función recibe dos parametros, el id de la imagen y el tamaño creado previamente en functions.php en la línea 56
        $imagen = wp_get_attachment_image_src( $id_imagen, 'nosotros');
      ?>
      <img src="<?php echo $imagen[ 0 ]; ?>" class="imagen-caja" alt="" />
      <div class="contenido-caja">
        <?php the_field( 'descripcion_3' ); ?>
      </div> <!-- .contenido-caja -->
    </div> <!-- .caja -->
  </div> <!-- informacion-cajas -->
<?php } // fin del while ?>

<script>console.log('page-nosotros.php');</script>
<?php get_footer(); ?>
