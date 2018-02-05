<?php
/**
 * Template Name: Front Page Template - Wider
 *
 *
 * @package Understrap
 */

get_header(); ?>

<?php if (get_theme_mod('themeslug_fheader_select') == 'value1') : ?>
	
	<!-- the static header -->
	<?php get_template_part( 'partials/header', 'static' ); ?>
		
<?php elseif (get_theme_mod('themeslug_fheader_select') == 'value2') : ?>
	
	<!-- the carousel header -->
	<?php get_template_part( 'partials/header', 'carousel' ); ?>
		
<?php elseif (get_theme_mod('themeslug_fheader_select') == 'value3') : ?>
	
	<!-- the video header -->
	<?php get_template_part( 'partials/header', 'video' ); ?>
		
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_bar_logos_on') == 'value1'  ) : ?>
	<?php get_template_part( 'partials/bar', 'logos' ); ?>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_bar_announcement_on') == 'value1'  ) : ?>
	<?php get_template_part( 'partials/bar', 'announcement' ); ?>
<?php endif; ?>


<?php if (get_theme_mod ( 'themeslug_fboxes_on') == 'value1'  ) : ?>
	<?php get_template_part( 'partials/feature', 'boxes' ); ?>
<?php endif; ?>

<div class="wrapper">
	<div class="container">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'loop-templates/content', 'page' ); ?>
			
			<?php endwhile; // end of the loop. ?>

	</div><!-- /.container -->
</div><!-- /.wrapper -->


<?php get_footer(); ?>