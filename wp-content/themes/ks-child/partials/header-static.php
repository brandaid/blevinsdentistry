<div id="featureHeader" class="carousel slide" data-ride="carousel">
	
	<?php get_template_part( 'partials/nav', 'sub-menu' ); ?>
	
    <div class="carousel-inner" role="listbox">
		<div class="item header-static">
			<div class="slide-wrapper">
				<div class="slide-title">
					<div class="container">
						<div class="row">
							
							<!-- Align Text - Left -->
							<?php if (get_theme_mod('themeslug_static_text_align') == 'value1') { ?>
								<div class="col-7 col-sm-6">
			
							<!-- Align Text - Center -->
							<?php } elseif (get_theme_mod('themeslug_static_text_align') == 'value2') { ?>
								<div class="col-8 offset-2 col-sm-6 offset-sm-3 text-center">
			
							<!-- Align Text - Right -->
							<?php } elseif (get_theme_mod('themeslug_static_text_align') == 'value3') { ?>
								<div class="col-7 offset-5 col-sm-6 offset-sm-6 text-right">
		
							<?php } ?>
					                
								</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div><!-- /.slide-title -->
				<div class="overlay"></div>
				<img src="<?php echo get_theme_mod( 'themeslug_static_pic' ); ?>" alt="" class="hidden-md-down" />
			</div><!-- /.slide-wrapper -->
        </div><!-- /.item -->       
    </div><!-- /.carousel-inner -->
</div><!-- /.carousel -->