<?php
/**
 * Template Name: Location
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-wrapper">
	
	<?php if ( get_field( 'turn_on_header_block' ) ): ?>
		<header class="text-center jumbotron jumbotron-fluid <?php if (has_post_thumbnail()) : ?>jumbotron-with-bg<?php endif; ?> <?php if (get_field('header_block_alignment') == "Left") { ?>text-lg-left<?php } elseif (get_field('header_block_alignment') == "Right") { ?>text-lg-right<?php } else { ?><?php } ?>"
			
			<?php if (has_post_thumbnail()) : ?>
				style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"
			<?php endif; ?> >
			<div class="container">
				<h1><?php the_field('h1'); ?></h1>
						
				<?php if ( get_field( 'lead_paragraph' ) ): ?>
					<p class="lead text-muted"><?php the_field('lead_paragraph'); ?></p>
				<?php endif; ?>
			</div><!-- /.container -->
			<div class="overlay"></div>
		</header><!-- .jumbotron -->
	<?php else : ?>
		<hr />
	<?php endif; ?>

	<div class="container">

		<div class="row">

			<div class="col-12 col-md-8 col-lg-9">
				
				<main class="site-main" id="main">
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
	
					<?php endwhile; // end of the loop. ?>
	
				</main><!-- #main -->

			</div><!-- .col main -->
			
			<div id="right-sidebar" class="col-12 col-md-4 col-lg-3 widget-area sidebar" role="complementary">
				<div class="entry-content">
					
					<aside class="widget">
						
						<?php if (get_field ( 'appointment_button_url') ) : ?>
							<a href="<?php the_field('appointment_button_url'); ?>" class="btn btn-primary btn-lg btn-block"><i class="fa fa-calendar"></i><br /> Schedule Your<br /> Appointment Now!</a>
						<?php else : ?>
							<a href="<?php bloginfo('url'); ?>/contact" class="btn btn-primary btn-lg btn-block"><i class="fa fa-calendar"></i><br /> Schedule Your<br /> Appointment Now!</a>
						<?php endif; ?>
					
					</aside>
					
					<?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>
						<aside class="widget">
							<h4 class="widget-title"><i class="fa fa-map-marker"></i> All Locations</h4>
							
							<a href="<?php echo get_theme_mod( 'themeslug_loc1_url' ); ?>" class="btn btn-secondary btn-block"><?php echo get_theme_mod( 'themeslug_loc1_name' ); ?> <i class="fa fa-angle-right"></i></a>
								
								
							<a href="<?php echo get_theme_mod( 'themeslug_loc2_url' ); ?>" class="btn btn-secondary btn-block"><?php echo get_theme_mod( 'themeslug_loc2_name' ); ?> <i class="fa fa-angle-right"></i></a>
								
								<?php if (get_theme_mod ( 'themeslug_loc3_name') ) : ?>
									<a href="<?php echo get_theme_mod( 'themeslug_loc3_url' ); ?>" class="btn btn-secondary btn-block"><?php echo get_theme_mod( 'themeslug_loc3_name' ); ?> <i class="fa fa-angle-right"></i></a>
								<?php endif; ?>
								
								<?php if (get_theme_mod ( 'themeslug_loc4_name') ) : ?>
									<a href="<?php echo get_theme_mod( 'themeslug_loc4_url' ); ?>" class="btn btn-secondary btn-block"><?php echo get_theme_mod( 'themeslug_loc4_name' ); ?> <i class="fa fa-angle-right"></i></a>
								<?php endif; ?>
								
								<?php if (get_theme_mod ( 'themeslug_loc5_name') ) : ?>
									<a href="<?php echo get_theme_mod( 'themeslug_loc5_url' ); ?>" class="btn btn-secondary btn-block"><?php echo get_theme_mod( 'themeslug_loc5_name' ); ?> <i class="fa fa-angle-right"></i></a>
								<?php endif; ?>
								
								<?php if (get_theme_mod ( 'themeslug_loc6_name') ) : ?>
									<a href="<?php echo get_theme_mod( 'themeslug_loc6_url' ); ?>" class="btn btn-secondary btn-block"><?php echo get_theme_mod( 'themeslug_loc6_name' ); ?> <i class="fa fa-angle-right"></i></a>
								<?php endif; ?>
							</aside>
						<?php endif; ?>
					
					<?php get_template_part('sidebar-right'); ?>
				</div><!-- /.entry-content -->
			</div><!-- /.col sidebar-->

		</div><!-- .row -->

	</div><!-- /.container -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
