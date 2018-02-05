<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if (!is_page('contact')) : ?>
	<?php get_template_part( 'partials/call', 'to-action' ); ?>
<?php endif; ?>
	
	<footer class="site-footer" id="colophon">
	
		<div class="row flex-row">
			<div class="col-md-6 col-lg-5 flex-col darken">
				<h4 class="widget-title">Visit Our Office<?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>s<?php endif; ?></h4>
				
				<div class="row">
					<div class="col-sm-6">
						<p><i class="fa fa-map-marker"></i> <strong><?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?><?php echo get_theme_mod( 'themeslug_loc1_name' ); ?><?php else : ?>Address<?php endif; ?></strong><br />
						<a href="#loc1-modal" class="modal-trigger" data-toggle="modal" title="Click to Get Customized Directions"><?php echo get_theme_mod( 'themeslug_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_address_zip' ); ?></a><br />
						<i class="fa fa-phone-square"></i> <strong>Phone:</strong> <?php echo get_theme_mod( 'themeslug_phone' ); ?>
						</p>
					</div>
						
						<?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>
							<div class="col-sm-6">
								<p><i class="fa fa-map-marker"></i> <strong><?php echo get_theme_mod( 'themeslug_loc2_name' ); ?></strong><br />
								<a href="#loc2-modal" class="modal-trigger" data-toggle="modal" title="Click to Get Customized Directions"><?php echo get_theme_mod( 'themeslug_loc2_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc2_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc2_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc2_address_zip' ); ?></a><br />
								<i class="fa fa-phone-square"></i> <strong>Phone:</strong> <?php echo get_theme_mod( 'themeslug_loc2_phone' ); ?>
								</p>
							</div>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc3_name') ) : ?>
							<div class="col-sm-6">
								<p><i class="fa fa-map-marker"></i> <strong><?php echo get_theme_mod( 'themeslug_loc3_name' ); ?></strong><br />
								<a href="#loc3-modal" class="modal-trigger" data-toggle="modal" title="Click to Get Customized Directions"><?php echo get_theme_mod( 'themeslug_loc3_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc3_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc3_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc3_address_zip' ); ?></a><br />
								<i class="fa fa-phone-square"></i> <strong>Phone:</strong> <?php echo get_theme_mod( 'themeslug_loc3_phone' ); ?>
								</p>
							</div>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc4_name') ) : ?>
							<div class="col-sm-6">
								<p><i class="fa fa-map-marker"></i> <strong><?php echo get_theme_mod( 'themeslug_loc4_name' ); ?></strong><br />
								<a href="#loc4-modal" class="modal-trigger" data-toggle="modal" title="Click to Get Customized Directions"><?php echo get_theme_mod( 'themeslug_loc4_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc4_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc4_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc4_address_zip' ); ?></a><br />
								<i class="fa fa-phone-square"></i> <strong>Phone:</strong> <?php echo get_theme_mod( 'themeslug_loc4_phone' ); ?>
								</p>
							</div>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc5_name') ) : ?>
							<div class="col-sm-6">
								<p><i class="fa fa-map-marker"></i> <strong><?php echo get_theme_mod( 'themeslug_loc5_name' ); ?></strong><br />
								<a href="#loc5-modal" class="modal-trigger" data-toggle="modal" title="Click to Get Customized Directions"><?php echo get_theme_mod( 'themeslug_loc5_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc5_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc5_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc5_address_zip' ); ?></a><br />
								<i class="fa fa-phone-square"></i> <strong>Phone:</strong> <?php echo get_theme_mod( 'themeslug_loc5_phone' ); ?>
								</p>
							</div>
						<?php endif; ?>
						
						<?php if (get_theme_mod ( 'themeslug_loc6_name') ) : ?>
							<div class="col-sm-6">
								<p><i class="fa fa-map-marker"></i> <strong><?php echo get_theme_mod( 'themeslug_loc6_name' ); ?></strong><br />
								<a href="#loc6-modal" class="modal-trigger" data-toggle="modal" title="Click to Get Customized Directions"><?php echo get_theme_mod( 'themeslug_loc6_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc6_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc6_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc6_address_zip' ); ?></a><br />
								<i class="fa fa-phone-square"></i> <strong>Phone:</strong> <?php echo get_theme_mod( 'themeslug_loc6_phone' ); ?>
								</p>
							</div>
						<?php endif; ?>
				</div><!-- /.row -->
				
				<hr />
				
				<?php get_template_part( 'partials/footer', 'social' ); ?>
			</div><!-- /.col -->
			
			<div class="col-md-6 col-lg-7 flex-col">
				<h4 class="widget-title">About Us</h4>
				<p><?php echo get_theme_mod( 'themeslug_footer_about_text' ); ?></p>
				
				<?php if (get_theme_mod ( 'themeslug_show_footer_pics') == 'value1'  ) : ?>
					<div class="row">

						<?php if (get_theme_mod ( 'themeslug_footer_img2')) : ?>
						
						    <div class="<?php if (get_theme_mod ( 'themeslug_footer_img3') ) : ?>col-4<?php else : ?>col-6<?php endif; ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_footer_img1' ); ?>" alt="" />
							</div><!-- /.col-6 -->
							<div class="<?php if (get_theme_mod ( 'themeslug_footer_img3') ) : ?>col-4<?php else : ?>col-6<?php endif; ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_footer_img2' ); ?>" alt="" />
							</div><!-- /.col-6 -->
							
							<?php if (get_theme_mod ( 'themeslug_footer_img3') ) : ?>
								<div class="col-4">
									<img src="<?php echo get_theme_mod( 'themeslug_footer_img3' ); ?>" alt="" />
								</div>
							<?php endif; ?>
						
						<?php else : ?>
						
							<div class="col-12">
								<img src="<?php echo get_theme_mod( 'themeslug_footer_img1' ); ?>" alt="" />
							</div><!-- /.col-12 -->
						
						<?php endif; ?>
						
					</div>
				<?php endif; ?>
				
				<hr />
				
				<div id="footer-credits" class="row">
					<div class="col-sm-7 text-center text-md-left">
						<p>
						<?php if (get_theme_mod ( 'themeslug_show_priv') == 'value1'  ) : ?>
							<a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a> | 
						<?php endif; ?>
						<?php if (get_theme_mod ( 'themeslug_show_disclaimer') == 'value1'  ) : ?>
							<a href="<?php bloginfo('url'); ?>/disclaimer">Disclaimer</a> | 
						<?php endif; ?>
						<?php if (get_theme_mod ( 'themeslug_show_sitemap') == 'value1'  ) : ?>
							<a href="<?php bloginfo('url'); ?>/site-map">Sitemap</a>
						<?php endif; ?>
						</p>
					</div><!-- /col-sm-7 -->
					
					<div class="col-sm-5 text-center text-md-right">
						<?php if (get_theme_mod ( 'themeslug_powered_type') == 'value1'  ) : ?>
							<p id="powered"><img src="http://www.killershark.me/images/shark-icon.svg" onerror="this.onerror=null; this.src='http://www.killershark.me/images/shark-icon.png'"> Powered by <a href="http://www.killershark.me" target="_blank">Killer Shark</a></p>
						<?php else : ?>
							<p><a href="<?php echo get_theme_mod( 'themeslug_powered_wl_a' ); ?>" target="_blank"><?php echo get_theme_mod( 'themeslug_powered_wl_text' ); ?></a></p>
						<?php endif; ?>
					</div><!-- /col-sm-5 -->
				</div>
			</div><!-- /.col -->
		</div>
		
		<?php if (get_theme_mod ( 'themeslug_show_addl_disclaimer') == 'value1'  ) : ?>
			<div class="container text-center">
				<hr />
				<div class="row">
					<div class="col-12">
						<p><small><em><?php echo get_theme_mod( 'themeslug_disclaimer' ); ?></em></small></p>
					</div>
				</div>
			</div><!-- /.container -->
		<?php endif; ?>
	
	</footer><!-- #colophon -->
</div><!-- /#main-content -->

<?php if (!is_page('contact')) : ?>
	<?php if (get_theme_mod ( 'themeslug_show_slideout_form') == 'value1'  ) : ?>
		<?php get_template_part( 'partials/slideout', 'question' ); ?>
	<?php endif; ?>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_show_bubble_phone') == 'value1'  ) : ?>		
	<?php get_template_part( 'partials/bubble', 'phone' ); ?>
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Font Awesome -->
<script src="https://use.fontawesome.com/f122c5b326.js"></script>

<?php echo get_theme_mod('themeslug_google_analytics') ?>

<!-- Animated Menu Icon -->
<script>
  (function() {

    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }

  })();
</script>

<!-- Mobile Slide Out Nav -->
<script>
	jQuery(document).ready(function() {   
            var sideslider = jQuery('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                jQuery(sel).toggleClass('in');
                jQuery(sel2).toggleClass('out');
            });
            var headerHeight = jQuery('#wrapper-navbar').outerHeight();
			jQuery('#navbarNav').css('top', headerHeight + 'px');
        });
</script>

<!--- Slide Out Form -->
<script>
	jQuery(document).ready(function() {
	  // Snuggle bar toggle
	  jQuery('#open-form-btn').click(function(){
	    if (jQuery('#slideout-form').hasClass('slideout-form-opened') != true){
	      jQuery('#slideout-form').animate({left: '+=500'}, 350, function() {
	        jQuery('#slideout-form').toggleClass('slideout-form-opened');
	      });
		} else {
	      jQuery('#slideout-form').animate({left: '-=500'}, 350, function() {
	        jQuery('#slideout-form').removeClass('slideout-form-opened');
	      });
	    }
	  });
	  // Snuggle bar close button
	  jQuery('#close-form-btn').click(function(){
	    jQuery('#slideout-form').animate({left: '-=500'}, 350, function() {
	      jQuery('#slideout-form').removeClass('slideout-form-opened');
	    });
	  });
	});
</script>

<!-- Close Phone Bubble -->
<script>
	jQuery(function() {                    
		jQuery(".close-bubble").click(function() {
			jQuery('#bubble-phone').addClass("hidden-xl-down");
		});
		jQuery(".close-case").click(function() {
			jQuery('#case-studies').addClass("hidden-xl-down");
		});
	});
</script>

<!-- Share Buttons -->
<?php if (is_single()) : ?>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/rrssb.css">
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/rrssb.min.js"></script>
<?php endif; ?>

<?php get_template_part( 'partials/footer', 'scripts' ); ?>

</body>

</html>