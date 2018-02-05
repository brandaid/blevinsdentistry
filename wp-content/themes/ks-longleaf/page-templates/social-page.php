<?php
/**
 * Template Name: Page Template for Social
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row text-center">
					<div class="col-sm-8 col-sm-offset-2">
						<h1 class="text-center">Social</h1>
						<?php get_template_part('social'); ?>
					</div>
				</div>
				
				<hr />
				
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- /container -->

<?php get_footer(); ?>