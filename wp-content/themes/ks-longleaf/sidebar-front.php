<?php
/**
 * The sidebar containing the front page widget areas
 *
 * If no active widgets are in either sidebar, hide them completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */


// If we get this far, we have widgets. Let do this.
?>
<div class="widget-area" role="complementary">
	<div class="first front-widgets">
		<div class="row">
			<div class="col-sm-3 text-center">
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="footer-logo"></a>
				
				<p><i class="fa fa-map-marker"></i> <a href="#myModal1" class="modal-trigger" data-toggle="modal"><?php echo get_theme_mod( 'themeslug_address' ); ?></a></p>
						
				<p><i class="fa fa-phone"></i> <?php echo get_theme_mod( 'themeslug_phone' ); ?></p>
				
						
				<hr class="visible-xs" />
				
			</div>
			<div class="col-sm-9">
				
				<p><?php echo get_theme_mod( 'themeslug_about-text' ); ?></p>
				
				<hr />
				
				<?php get_template_part('social'); ?>
			</div>

	</div><!-- .first -->
	
</div><!-- #secondary -->