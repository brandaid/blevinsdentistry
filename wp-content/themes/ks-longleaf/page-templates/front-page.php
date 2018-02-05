<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php if (get_theme_mod ( 'themeslug_anchor-post-off') == 'value2'  ) : ?>
	<div class="wide text-center">
		<div class="container">
			<p class="lead headline"><a href="<?php echo get_theme_mod( 'themeslug_anchor-post-url' ); ?>"><?php echo get_theme_mod( 'themeslug_anchor-post-title' ); ?></a></p>
		</div><!-- /.container -->
	</div><!-- /.wide -->
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_fboxes-off') == 'value2'  ) : ?>

	<div class="feature-boxes-wrapper texture-border texture-border--top texture-tan">
		<div class="container">
			<?php get_template_part('feature-boxes'); ?>
		</div><!-- /.container -->
	</div><!-- /.wide -->
	
<?php endif; ?>


<div class="container">	
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>