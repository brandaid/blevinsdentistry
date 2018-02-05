<div id="leave-a-review">
			<p class="lead">Want to Tell Others about Your Experience at <?php bloginfo('name'); ?>?</p>
			<h3><i class="fa fa-arrow-down"></i> Review us Here! <i class="fa fa-arrow-down"></i></h3>
		
		<div class="row">
			<?php if (get_theme_mod ( 'themeslug_gplus_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_gplus_rev' ); ?>" class="btn btn-primary btn-block google" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-google-plus.png" alt="" /> Google+</a>
				</div>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_fb_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_fb_rev' ); ?>" class="btn btn-primary btn-block facebook" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-facebook.png" alt="" /> Facebook</a>
				</div>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_yelp_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_yelp_rev' ); ?>" class="btn btn-primary btn-block yelp" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-yelp.png" alt="" /> Yelp</a>
				</div>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_kudzu_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_kudzu_rev' ); ?>" class="btn btn-primary btn-block kudzu" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-kudzu.png" alt="" /> Kudzu</a>
				</div>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_insiderpages_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_insiderpages_rev' ); ?>" class="btn btn-primary btn-block insider-pages" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-insider-pages.png" alt="" /> InsiderPages</a>
				</div>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_citysearch_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_citysearch_rev' ); ?>" class="btn btn-primary btn-block city-search" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-citysearch.png" alt="" /> CitySearch</a>
				</div>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_healthgrades_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_healthgrades_rev' ); ?>" class="btn btn-primary btn-block insider-pages" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-insider-pages.png" alt="" /> HealthGrades</a>
				</div>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_ratemds_rev_off') == 'value2'  ) : ?>
				<div class="col-sm-2">
					<a href="<?php echo get_theme_mod( 'themeslug_ratemds_rev' ); ?>" class="btn btn-primary btn-block city-search" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/icon-ratemds.png" alt="" /> Rate MDs</a>
				</div>
			<?php endif; ?>
		</div><!-- /.row -->
</div><!-- end leave-a-review -->