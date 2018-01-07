<aside class="columnas1-3 sidebar">
	<?php 
		// valida si esta activo el sidebar, en el parametro va el slug que se le indico en el functions.php
		if( is_active_sidebar( 'blog_sidebar' ) ) {

			// función que imprime el sidebar
			dynamic_sidebar( 'blog_sidebar' );
		}
	?>
</aside>