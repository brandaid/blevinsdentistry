<?php
/**
 * Template Name: Contact Page Template
 *
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="row flex-row">
					<div class="col-sm-6 flex-col flex-col-color">
						<h1>Contact Us</h1>
						<p>We'd really like to hear from you! Please give us a call or fill out the form below to make an appointment or ask a question!</p>
						<?php echo do_shortcode( '[contact-form-7 id="9" title="Contact form 1"]' ); ?>
					</div>
					
					<?php if(get_field('show_map_or_photo') == "Photo") { ?>
						<div class="col-sm-6 flex-col flex-col-img" style="background: url(<?php the_field('contact_photo'); ?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
					<?php } ?>
					<?php if(get_field('show_map_or_photo') == "Map") { ?>
						<div class="col-sm-6 flex-col flex-col-img">
							<?php echo get_theme_mod( 'themeslug_gmap' ); ?>
					<?php } ?>

					</div>
				</div>
				
				<div class="row flex-row">
					<div class="col-sm-4 flex-col">
						<h3><i class="fa fa-map-marker"></i> Visit Our Office<?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>s<?php endif; ?></h3>
						<a href="#loc1-modal" class="modal-trigger btn btn-primary btn-block" data-toggle="modal"><?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?><?php echo get_theme_mod( 'themeslug_loc1_name' ); ?><?php else : ?>Get Customized<?php endif; ?> Directions <i class="fa fa-angle-right"></i></a>
						
						<?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>
							<a href="#loc2-modal" class="modal-trigger btn btn-primary btn-block" data-toggle="modal"><?php echo get_theme_mod( 'themeslug_loc2_name' ); ?> Directions <i class="fa fa-angle-right"></i></a>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc3_name') ) : ?>
							<a href="#loc3-modal" class="modal-trigger btn btn-primary btn-block" data-toggle="modal"><?php echo get_theme_mod( 'themeslug_loc3_name' ); ?> Directions <i class="fa fa-angle-right"></i></a>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc4_name') ) : ?>
							<a href="#loc4-modal" class="modal-trigger btn btn-primary btn-block" data-toggle="modal"><?php echo get_theme_mod( 'themeslug_loc4_name' ); ?> Directions <i class="fa fa-angle-right"></i></a>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc5_name') ) : ?>
							<a href="#loc5-modal" class="modal-trigger btn btn-primary btn-block" data-toggle="modal"><?php echo get_theme_mod( 'themeslug_loc5_name' ); ?> Directions <i class="fa fa-angle-right"></i></a>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc6_name') ) : ?>
							<a href="#loc6-modal" class="modal-trigger btn btn-primary btn-block" data-toggle="modal"><?php echo get_theme_mod( 'themeslug_loc6_name' ); ?> Directions <i class="fa fa-angle-right"></i></a>
						<?php endif; ?>
						
					</div>
					<div class="col-sm-4 flex-col hours-col">
						<h3><i class="fa fa-clock-o"></i> Office Hours</h3>
						<p><?php echo get_theme_mod( 'themeslug_hours' ); ?></p>
					</div>
					<div class="col-sm-4 flex-col flex-col-color">
						<h3><i class="fa fa-phone"></i> Call Us</h3>
						<p><?php echo get_theme_mod( 'themeslug_phone' ); ?><?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?> - <?php echo get_theme_mod( 'themeslug_loc1_name' ); ?><?php endif; ?></p>
						
						<?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>
							<p><?php echo get_theme_mod( 'themeslug_loc2_phone' ); ?> - <?php echo get_theme_mod( 'themeslug_loc2_name' ); ?></p>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc3_name') ) : ?>
							<p><?php echo get_theme_mod( 'themeslug_loc3_phone' ); ?> - <?php echo get_theme_mod( 'themeslug_loc3_name' ); ?></p>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc4_name') ) : ?>
							<p><?php echo get_theme_mod( 'themeslug_loc4_phone' ); ?> - <?php echo get_theme_mod( 'themeslug_loc4_name' ); ?></p>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc5_name') ) : ?>
							<p><?php echo get_theme_mod( 'themeslug_loc5_phone' ); ?> - <?php echo get_theme_mod( 'themeslug_loc5_name' ); ?></p>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc6_name') ) : ?>
							<p><?php echo get_theme_mod( 'themeslug_loc6_phone' ); ?> - <?php echo get_theme_mod( 'themeslug_loc6_name' ); ?></p>
						<?php endif; ?>

					</div>
				</div>
			
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>