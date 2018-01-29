<?php
/**
 * The template for displaying all post types
 */

get_header(); ?>

	<div class="container-1200">
		<?php while(have_posts()) {
			the_post(); 

			get_template_part( 'template-parts/content', get_post_type() );

		} ?>
	</div>

<?php
get_sidebar();
get_footer();