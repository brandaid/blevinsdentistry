<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-8 col-lg-9">
				<main class="site-main" id="main">
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php get_template_part( 'loop-templates/content', 'single' ); ?>
	
							<?php /* understrap_post_nav(); */ ?>
	
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
	
					<?php endwhile; // end of the loop. ?>
	
				</main><!-- #main -->
			</div>

			<div id="secondary" class="sidebar col-md-4 col-lg-3">
				<?php get_sidebar( 'right' ); ?>
			</div>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
