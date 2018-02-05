<?php if (get_theme_mod ( 'themeslug_fboxes-count') == 'value1'  ) : ?>
	<!-- 3 Boxes -->
	<div id="feature-boxes" class="text-center feature-boxes">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="row">
					<div class="col-sm-4">
						<div class="fbox-wrapper">
							<a href="<?php echo get_theme_mod( 'themeslug_box-one-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-one-title' ); ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_box-one-pic' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_box-one-title' ); ?>" class="img-circle fbox-img aligncenter" />
								<p><?php echo get_theme_mod( 'themeslug_box-one-title' ); ?></p>
							</a>			
						</div><!-- /.fbox-wrapper -->
					</div><!-- /.col4 -->
					<div class="col-sm-4">
						<div class="fbox-wrapper">
							<a href="<?php echo get_theme_mod( 'themeslug_box-two-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-two-title' ); ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_box-two-pic' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_box-two-title' ); ?>" class="img-circle fbox-img aligncenter" />
								<p><?php echo get_theme_mod( 'themeslug_box-two-title' ); ?></p>
							</a>			
						</div><!-- /.fbox-wrapper -->
					</div><!-- /.col4 -->
					<div class="col-sm-4">
						<div class="fbox-wrapper">
							<a href="<?php echo get_theme_mod( 'themeslug_box-three-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-three-title' ); ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_box-three-pic' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_box-three-title' ); ?>" class="img-circle fbox-img aligncenter" />
								<p><?php echo get_theme_mod( 'themeslug_box-three-title' ); ?></p>
							</a>			
						</div><!-- /.fbox-wrapper -->
					</div><!-- /.col4 -->
				</div><!-- /.row -->
			</div><!-- /col10 -->
		</div><!-- /.row-->
	</div>
<?php else : ?>

	<!-- 4 Boxes -->
	<div id="feature-boxes" class="text-center feature-boxes">
		<div class="row">
			<div class="col-xs-6 col-sm-2 col-sm-offset-1">
				<div class="fbox-wrapper">
					<a href="<?php bloginfo('url'); ?>/thorough-dental-exams/">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2016/03/doctor-patient-square.jpg" class="img-circle fbox-img aligncenter" />
						<p>Thorough Dental Exams</p>
					</a>			
				</div><!-- /.fbox-wrapper -->
			</div><!-- /.col3 -->
			<div class="col-xs-6 col-sm-2">
				<div class="fbox-wrapper">
					<a href="<?php echo get_theme_mod( 'themeslug_box-one-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-one-title' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_box-one-pic' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_box-one-title' ); ?>" class="img-circle fbox-img aligncenter" />
						<p><?php echo get_theme_mod( 'themeslug_box-one-title' ); ?></p>
					</a>			
				</div><!-- /.fbox-wrapper -->
			</div><!-- /.col3 -->
			<div class="col-xs-6 col-sm-2">
				<div class="fbox-wrapper">
					<a href="<?php echo get_theme_mod( 'themeslug_box-two-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-two-title' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_box-two-pic' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_box-two-title' ); ?>" class="img-circle fbox-img aligncenter" />
						<p><?php echo get_theme_mod( 'themeslug_box-two-title' ); ?></p>
					</a>			
				</div><!-- /.fbox-wrapper -->
			</div><!-- /.col3 -->
			<hr class="visible-xs" style="clear:left;" />
			<div class="col-xs-6 col-sm-2">
				<div class="fbox-wrapper">
					<a href="<?php echo get_theme_mod( 'themeslug_box-three-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-three-title' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_box-three-pic' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_box-three-title' ); ?>" class="img-circle fbox-img aligncenter" />
						<p><?php echo get_theme_mod( 'themeslug_box-three-title' ); ?></p>
					</a>			
				</div><!-- /.fbox-wrapper -->
			</div><!-- /.col3 -->
			<div class="col-xs-6 col-sm-2">
				<div class="fbox-wrapper">
					<a href="<?php echo get_theme_mod( 'themeslug_box-four-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-four-title' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_box-four-pic' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_box-four-title' ); ?>" class="img-circle fbox-img aligncenter" />
						<p><?php echo get_theme_mod( 'themeslug_box-four-title' ); ?></p>
					</a>			
				</div><!-- /.fbox-wrapper -->
			</div><!-- /.col3 -->
		</div><!-- /.row-->
	</div>
<?php endif; ?>