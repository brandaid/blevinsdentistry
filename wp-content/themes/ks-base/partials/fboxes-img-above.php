<div id="feature-boxes" class="fbox-img-above">
	<div class="container">
		
		<?php if (get_theme_mod('themeslug_fboxes_count') == 'value1') : ?>
			<div class="row text-center">
				<div class="col-lg-8 offset-lg-2">
					<div class="row">
					<!-- Three Boxes -->	
						<div class="col-4">
							<a href="<?php echo get_theme_mod( 'themeslug_fbox_1_url' ); ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_fbox_1_img' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_fbox_1_title' ); ?>" 
									class="
										<?php if (get_theme_mod('themeslug_fbox_img_style') == 'value1') { ?>
											
										<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value2') { ?>
											rounded
										<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value3') { ?>
											rounded-circle
										<?php } ?>
									"
								/>
								<h4><?php echo get_theme_mod( 'themeslug_fbox_1_title' ); ?></h4>
								<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_1_descr' ); ?></p>
								<button class="btn btn-primary hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_1_btn' ); ?></button>
							</a>
						</div>
						
						<div class="col-4">
							<a href="<?php echo get_theme_mod( 'themeslug_fbox_2_url' ); ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_fbox_2_img' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_fbox_2_title' ); ?>" 
									class="
										<?php if (get_theme_mod('themeslug_fbox_img_style') == 'value1') { ?>
											
										<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value2') { ?>
											rounded
										<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value3') { ?>
											rounded-circle
										<?php } ?>
									"
								/>
								<h4><?php echo get_theme_mod( 'themeslug_fbox_2_title' ); ?></h4>
								<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_2_descr' ); ?></p>
								<button class="btn btn-primary hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_2_btn' ); ?></button>
							</a>
						</div>
						
						<div class="col-4">
							<a href="<?php echo get_theme_mod( 'themeslug_fbox_3_url' ); ?>">
								<img src="<?php echo get_theme_mod( 'themeslug_fbox_3_img' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_fbox_3_title' ); ?>" 
									class="
										<?php if (get_theme_mod('themeslug_fbox_img_style') == 'value1') { ?>
											
										<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value2') { ?>
											rounded
										<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value3') { ?>
											rounded-circle
										<?php } ?>
									"
								/>
								<h4><?php echo get_theme_mod( 'themeslug_fbox_3_title' ); ?></h4>
								<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_3_descr' ); ?></p>
								<button class="btn btn-primary hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_3_btn' ); ?></button>
							</a>
						</div>
							
					</div>
				</div>
			</div>

					
			<?php else : ?>
					
			<!-- Four Boxes -->
			<div class="row text-center">
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_1_url' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_fbox_1_img' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_fbox_1_title' ); ?>" 
							class="
								<?php if (get_theme_mod('themeslug_fbox_img_style') == 'value1') { ?>
									
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value2') { ?>
									rounded
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value3') { ?>
									rounded-circle
								<?php } ?>
							"
						/>
						<h4><?php echo get_theme_mod( 'themeslug_fbox_1_title' ); ?></h4>
						<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_1_descr' ); ?></p>
						<button class="btn btn-primary hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_1_btn' ); ?></button>
					</a>
				</div>
				
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_2_url' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_fbox_2_img' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_fbox_2_title' ); ?>" 
							class="
								<?php if (get_theme_mod('themeslug_fbox_img_style') == 'value1') { ?>
									
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value2') { ?>
									rounded
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value3') { ?>
									rounded-circle
								<?php } ?>
							"
						/>
						<h4><?php echo get_theme_mod( 'themeslug_fbox_2_title' ); ?></h4>
						<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_2_descr' ); ?></p>
						<button class="btn btn-primary hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_2_btn' ); ?></button>
					</a>
				</div>
				
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_3_url' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_fbox_3_img' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_fbox_3_title' ); ?>" 
							class="
								<?php if (get_theme_mod('themeslug_fbox_img_style') == 'value1') { ?>
									
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value2') { ?>
									rounded
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value3') { ?>
									rounded-circle
								<?php } ?>
							"
						/>
						<h4><?php echo get_theme_mod( 'themeslug_fbox_3_title' ); ?></h4>
						<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_3_descr' ); ?></p>
						<button class="btn btn-primary hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_3_btn' ); ?></button>
					</a>
				</div>
				
				<div class="col-6 col-md-3">
					<a href="<?php echo get_theme_mod( 'themeslug_fbox_4_url' ); ?>">
						<img src="<?php echo get_theme_mod( 'themeslug_fbox_4_img' ); ?>" alt="<?php echo get_theme_mod( 'themeslug_fbox_4_title' ); ?>" 
							class="
								<?php if (get_theme_mod('themeslug_fbox_img_style') == 'value1') { ?>
									
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value2') { ?>
									rounded
								<?php } elseif (get_theme_mod('themeslug_fbox_img_style') == 'value3') { ?>
									rounded-circle
								<?php } ?>
							"
						/>
						<h4><?php echo get_theme_mod( 'themeslug_fbox_4_title' ); ?></h4>
						<p class="hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_4_descr' ); ?></p>
						<button class="btn btn-primary hidden-md-down"><?php echo get_theme_mod( 'themeslug_fbox_4_btn' ); ?></button>
					</a>
				</div>
			</div>
					
			<?php endif; ?>
			
	</div>
</div><!-- /#feature-boxes -->