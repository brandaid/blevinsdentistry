<!-- Carousel
    ================================================== -->
<div id="featureHeader" class="carousel slide" data-ride="carousel">

	<!-- Indicators -->
	<ol class="carousel-indicators">
        <li data-target="#featureHeader" data-slide-to="0" class="active"></li>
        <li data-target="#featureHeader" data-slide-to="1"></li>
        
        <?php if (get_theme_mod ( 'themeslug_slide3_pic') ) : ?>
        	<li data-target="#featureHeader" data-slide-to="2"></li>
        <?php endif; ?> 
        
        <?php if (get_theme_mod ( 'themeslug_slide4_pic') ) : ?>
        	<li data-target="#featureHeader" data-slide-to="3"></li>
        <?php endif; ?>
        
        <?php if (get_theme_mod ( 'themeslug_slide5_pic') ) : ?>
        	<li data-target="#featureHeader" data-slide-to="4"></li>
        <?php endif; ?>
        
        <?php if (get_theme_mod ( 'themeslug_slide6_pic') ) : ?>
        	<li data-target="#featureHeader" data-slide-to="5"></li>
        <?php endif; ?> 
        
        <?php if (get_theme_mod ( 'themeslug_slide7_pic') ) : ?>
        	<li data-target="#featureHeader" data-slide-to="6"></li>
        <?php endif; ?>  
        
        <?php if (get_theme_mod ( 'themeslug_slide8_pic') ) : ?>
        	<li data-target="#featureHeader" data-slide-to="7"></li>
        <?php endif; ?> 
             
    </ol>

    <div class="carousel-inner" role="listbox">
	     
		<!-- SLIDE 1 -->			
		<div class="carousel-item active">
			
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value1') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
			
	    </div><!-- /.item -->
        
		<!-- SLIDE 2 -->			
		<div class="carousel-item">
			
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value2') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
			
	    </div><!-- /.item -->
	    
	    <?php if (get_theme_mod ( 'themeslug_slide3_pic') ) : ?>
		    <!-- SLIDE 3 -->			
			<div class="carousel-item">
				
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value3') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
				
		    </div><!-- /.item -->
	    <?php endif; ?>
	    
	    <?php if (get_theme_mod ( 'themeslug_slide4_pic') ) : ?>
		    <!-- SLIDE 4 -->			
			<div class="carousel-item">
				
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value4') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
				
		    </div><!-- /.item -->
	    <?php endif; ?>
	    
	    <?php if (get_theme_mod ( 'themeslug_slide5_pic') ) : ?>
		    <!-- SLIDE 5 -->			
			<div class="carousel-item">
				
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value5') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
				
		    </div><!-- /.item -->
	    <?php endif; ?>
	    
	    <?php if (get_theme_mod ( 'themeslug_slide6_pic') ) : ?>
		    <!-- SLIDE 6 -->			
			<div class="carousel-item">
				
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value6') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
				
		    </div><!-- /.item -->
	    <?php endif; ?>
	    
	    <?php if (get_theme_mod ( 'themeslug_slide7_pic') ) : ?>
		    <!-- SLIDE 7 -->			
			<div class="carousel-item">
				
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value7') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
				
		    </div><!-- /.item -->
	    <?php endif; ?>
	    
	    <?php if (get_theme_mod ( 'themeslug_slide8_pic') ) : ?>
		    <!-- SLIDE 8 -->			
			<div class="carousel-item">
				
			<?php if (get_theme_mod('themeslug_slide1_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide1'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide2_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide2'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide3_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide3'); ?>

			<?php } elseif (get_theme_mod('themeslug_slide4_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide4'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide5_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide5'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide6_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide6'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide7_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide7'); ?>
				
			<?php } elseif (get_theme_mod('themeslug_slide8_order') == 'value8') { ?>
				<?php get_template_part( 'partials/carousel', 'slide8'); ?>
				
			<?php } ?>
				
		    </div><!-- /.item -->
	    <?php endif; ?>
                
    </div><!-- /.carousel-inner -->
	<a class="carousel-control-prev hidden-sm-down" href="#featureHeader" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next hidden-sm-down" href="#featureHeader" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	</a>
	
</div><!-- /.carousel -->
