<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
		<?php if (!is_page('contact-us')) : ?>
			<?php /* get_template_part('call-to-action'); */ ?>
		<?php endif; ?>	
		
		</div><!-- /.container -->
		
	</div><!-- #main .wrapper -->

</div><!-- /.main-content -->

	
	<footer id="colophon" class="texture-tan texture-border texture-border--top" role="contentinfo">
		<div class="footer-inner">
			<div class="container">
				<?php get_sidebar( 'front' ); ?>
				
				<hr />
				
				<div class="row">
					<div class="col-sm-4">
						<a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a> | <a href="<?php bloginfo('url'); ?>/site-map">Sitemap</a> | <a href="<?php bloginfo('url'); ?>/disclaimer">Disclaimer</a>
					</div><!-- /.col-sm-4 -->
					
					<div class="col-sm-4 text-center">
						
					</div><!-- /.col-sm-4 -->
		
					<div class="col-sm-4 text-right">
						<p id="powered">Powered by <a href="http://www.killershark.me">Killer Shark</a></p>
					</div><!-- /.col-sm-4 -->
				</div><!-- /.row -->
				
				<p class="text-center"><small><em><?php echo get_theme_mod( 'themeslug_disclaimer' ); ?></em></small></p>
			</div><!-- /.container -->
		</div><!-- /.footer-inner -->
	</footer><!-- #colophon -->
</div><!-- #page -->
</div><!-- /#main-container -->

<?php wp_footer(); ?>

<!--<script>
	jQuery( ".nav-toggle" ).click(function() {
	  jQuery( ".navbar" ).toggleClass( "static-navbar" );
	});
</script>-->


<!-- Rate Us Star Ratings -->
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.raty.min.js"></script>

<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script>
	jQuery('.dropdown-menu').find('form').click(function (e) {
    e.stopPropagation();
  });
</script>

<?php if (!is_mobile()) : ?>
	<!-- Sticky in Parent -->
	<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/sticky-in-parent.js"></script>
	<script>
		jQuery("#secondary").stick_in_parent({offset_top: 65})
	</script>
	
	<!-- Close Callout -->
	<script>
		jQuery(function() {                    
		  jQuery(".close-callout").click(function() {
		    jQuery('#bottom-call-out').addClass("hide");
		  });
		  jQuery(".close-callout-right").click(function() {
		    jQuery('#bottom-call-out-right').addClass("hide");
		  });
		});
	</script>
<?php endif; ?>

<?php if (is_single()) : ?>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/rrssb.css">
	<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/rrssb.min.js"></script>
<?php endif; ?>

<!-- Slide Out Form -->
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/popout.js"></script>

<!-- Nav Cover -->
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/nav-cover.js"></script>

<!-- Smooth Scroll -->
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/smooth-scroll.js"></script>

<!-- browser width detection -->
<!-- <script src="http://d1fn8nfhcard9d.cloudfront.net/js/visual-browser-size.js"></script> -->

<!--[if lt IE 9]>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/respond.js" type="text/javascript"></script>
<![endif]-->
</body>
</html>