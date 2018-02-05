<div class="slide-wrapper slide8">
	<div class="slide-title">
		<div class="container">
			<div class="row">
							
				<!-- Align Text - Left -->
				<?php if (get_theme_mod('themeslug_slide8_text_align') == 'value1') { ?>
					<div class="col-7 col-sm-6">
			
				<!-- Align Text - Center -->
				<?php } elseif (get_theme_mod('themeslug_slide8_text_align') == 'value2') { ?>
					<div class="col-8 offset-2 col-sm-6 offset-sm-3 text-center">
			
				<!-- Align Text - Right -->
				<?php } elseif (get_theme_mod('themeslug_slide8_text_align') == 'value3') { ?>
					<div class="col-7 offset-5 col-sm-6 offset-sm-6 text-right">
		
				<?php } ?>
									
					<?php if (get_theme_mod ( 'themeslug_slide8_title')) : ?>				
						<h1 <?php if (get_theme_mod ( 'themeslug_slide8_add_htag_bg') == 'value1'  ) : ?>class="htag-bg"<?php endif; ?>><?php echo get_theme_mod( 'themeslug_slide8_title' ); ?></h1>
					<?php endif; ?>
					
					<?php if (get_theme_mod ( 'themeslug_slide8_descr')) : ?>				
						<p><?php echo get_theme_mod( 'themeslug_slide8_descr' ); ?></p>
					<?php endif; ?>
					                
					<?php if (get_theme_mod ( 'themeslug_slide8_btn_text')) : ?>
					    <a href="<?php echo get_theme_mod( 'themeslug_slide8_btn_link' ); ?>" class="btn btn-primary btn-lg hidden-md-down"><?php echo get_theme_mod( 'themeslug_slide8_btn_text' ); ?> <i class="fa fa-angle-right"></i></a>
					    <a href="<?php echo get_theme_mod( 'themeslug_slide8_btn_link' ); ?>" class="btn btn-primary btn-sm hidden-lg-up"><?php echo get_theme_mod( 'themeslug_slide8_btn_text' ); ?> <i class="fa fa-angle-right"></i></a>
				<?php endif; ?>
					                
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.slide-title -->
	<div class="overlay"></div>
	<img src="<?php echo get_theme_mod( 'themeslug_slide8_pic' ); ?>" alt="" class="hidden-md-down" />
</div><!-- /.slide -->