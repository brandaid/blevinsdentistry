<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<div class="wrapper" id="archive-wrapper">
	
	<div class="entry-content">

		<div class="container" id="content" tabindex="-1">
	
				<main class="site-main" id="main">
	
					<?php if ( have_posts() ) : ?>
	
						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title text-center">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						
						<div class="row">
	
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
	
							<?php
	
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', get_post_format() );
							?>
	
						<?php endwhile; ?>
	
					<?php else : ?>
	
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
	
					<?php endif; ?>
					
					</div>
	
				</main><!-- #main -->
	
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
	
			</div><!-- #primary -->
	
	</div><!-- Container end -->

	</div><!-- /.entry-content -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
