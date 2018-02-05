<?php
/**
 * Template Name: Review Us
 */

get_header(); ?>

	<div id="primary" class="site-content text-center">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				
				<?php get_template_part('reviews-bar'); ?>
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>