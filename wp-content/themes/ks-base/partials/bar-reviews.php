<div id="bar-reviews" class="bar">
	<div class="container">

		<div class="row align-items-center">
			<div class="col-md-6 col-lg-8 text-center">
				
				<div id="carouselReviews" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner" role="listbox">
					  
				    <div class="carousel-item active">
					      <p> 
						    <?php if (get_theme_mod('themeslug_bar_reviews_rev_1_stars') == 'value1') { ?>
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
			
							<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_1_stars') == 'value2') { ?>
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
			
							<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_1_stars') == 'value3') { ?>
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								
							<?php } ?>
						      <em>"<?php echo get_theme_mod( 'themeslug_bar_reviews_rev_1' ); ?>"</em>
						  </p>
				    </div>

					<?php if (get_theme_mod('themeslug_bar_reviews_rev_2')) : ?>
						<div class="carousel-item">
						      <p> 
							    <?php if (get_theme_mod('themeslug_bar_reviews_rev_2_stars') == 'value1') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_2_stars') == 'value2') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_2_stars') == 'value3') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									
								<?php } ?>
							      <em>"<?php echo get_theme_mod( 'themeslug_bar_reviews_rev_2' ); ?>"</em>
							  </p>
					    </div>
					<?php endif; ?>
					
					<?php if (get_theme_mod('themeslug_bar_reviews_rev_3')) : ?>
						<div class="carousel-item">
						      <p> 
							    <?php if (get_theme_mod('themeslug_bar_reviews_rev_3_stars') == 'value1') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_3_stars') == 'value2') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_3_stars') == 'value3') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									
								<?php } ?>
							      <em>"<?php echo get_theme_mod( 'themeslug_bar_reviews_rev_3' ); ?>"</em>
							  </p>
					    </div>
					<?php endif; ?>
					
					<?php if (get_theme_mod('themeslug_bar_reviews_rev_4')) : ?>
						<div class="carousel-item">
						      <p> 
							    <?php if (get_theme_mod('themeslug_bar_reviews_rev_4_stars') == 'value1') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_4_stars') == 'value2') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_4_stars') == 'value3') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									
								<?php } ?>
							      <em>"<?php echo get_theme_mod( 'themeslug_bar_reviews_rev_4' ); ?>"</em>
							  </p>
					    </div>
					<?php endif; ?>
					
					<?php if (get_theme_mod('themeslug_bar_reviews_rev_5')) : ?>
						<div class="carousel-item">
						      <p> 
							    <?php if (get_theme_mod('themeslug_bar_reviews_rev_5_stars') == 'value1') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_5_stars') == 'value2') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				
								<?php } elseif (get_theme_mod('themeslug_bar_reviews_rev_5_stars') == 'value3') { ?>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									
								<?php } ?>
							      <em>"<?php echo get_theme_mod( 'themeslug_bar_reviews_rev_5' ); ?>"</em>
							  </p>
					    </div>
					<?php endif; ?>

				  </div>
				</div>
				
			</div>
			<div class="col-6 col-md-3 col-lg-2">
				<a href="<?php bloginfo('url'); ?>/reviews" class="btn btn-sm btn-block btn-info">Read Reviews</a>
			</div>
			<div class="col-6 col-md-3 col-lg-2">
				<a href="<?php bloginfo('url'); ?>/reviews" class="btn btn-sm btn-block btn-secondary">Write a Review</a>
			</div>
		</div>

	</div>
	
	<div class="overlay"></div>
</div><!-- /#bar-reviews -->