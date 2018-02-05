<div id="feature-boxes" class="fbox-img-overlay">
	<div class="container-fluid">
		<div class="row no-gutters">
			<?php if (get_theme_mod('themeslug_fboxes_count') == 'value1') : ?>
			
			<!-- Three Boxes -->
				<div class="col-4">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_1_url' ); ?>">
						<h5><?php echo get_theme_mod( 'themeslug_fbox_1_title' ); ?></h5>
						<div class="fbox-img-container fbox-1-img">
							<div class="fbox-descr text-center">
								<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_1_descr' ); ?></p>
								<button class="btn btn-info"><?php echo get_theme_mod( 'themeslug_fbox_1_btn' ); ?></button>
							</div>
							<div class="overlay"></div>
						</div>
					</a>
				</div>
				
				<div class="col-4">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_2_url' ); ?>">
						<h5><?php echo get_theme_mod( 'themeslug_fbox_2_title' ); ?></h5>
						<div class="fbox-img-container fbox-2-img">
							<div class="fbox-descr text-center">
								<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_2_descr' ); ?></p>
								<button class="btn btn-info"><?php echo get_theme_mod( 'themeslug_fbox_2_btn' ); ?></button>
							</div>
							<div class="overlay"></div>
						</div>
					</a>
				</div>
				
				<div class="col-4">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_3_url' ); ?>">
						<h5><?php echo get_theme_mod( 'themeslug_fbox_3_title' ); ?></h5>
						<div class="fbox-img-container fbox-3-img">
							<div class="fbox-descr text-center">
								<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_3_descr' ); ?></p>
								<button class="btn btn-info"><?php echo get_theme_mod( 'themeslug_fbox_3_btn' ); ?></button>
							</div>
							<div class="overlay"></div>
						</div>
					</a>
				</div>
			
			<?php else : ?>
			
			<!-- Four Boxes -->
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_1_url' ); ?>">
						<div class="fbox-img-container fbox-1-img"></div>
						<h5><?php echo get_theme_mod( 'themeslug_fbox_1_title' ); ?></h5> <i class="fa fa-long-arrow-right hidden-sm-down"></i>
					</a>
				</div>
				
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_2_url' ); ?>">
						<div class="fbox-img-container fbox-2-img"></div>
						<h5><?php echo get_theme_mod( 'themeslug_fbox_2_title' ); ?></h5> <i class="fa fa-long-arrow-right hidden-sm-down"></i>
					</a>
				</div>
				
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_3_url' ); ?>">
						<div class="fbox-img-container fbox-3-img"></div>
						<h5><?php echo get_theme_mod( 'themeslug_fbox_3_title' ); ?></h5>  <i class="fa fa-long-arrow-right hidden-sm-down"></i>
					</a>
				</div>
				
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_4_url' ); ?>">
						<div class="fbox-img-container fbox-4-img"></div>
						<h5><?php echo get_theme_mod( 'themeslug_fbox_4_title' ); ?></h5> <i class="fa fa-long-arrow-right hidden-sm-down"></i>
					</a>
				</div>
			
			<?php endif; ?>
			
		</div>
	</div><!-- /.container -->
</div><!-- /#feature-boxes -->