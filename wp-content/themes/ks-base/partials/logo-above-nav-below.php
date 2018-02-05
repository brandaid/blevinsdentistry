<div class="navbar-header">

	<div class="container">
	
			<div class="row align-items-center">
				
					<?php if (get_theme_mod('themeslug_logo_size') == 'value1') { ?>
						<div class="col-4 hidden-lg-up">
					<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value2') { ?>
						<div class="col-3 hidden-lg-up">
					<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value3') { ?>
						<div class="col-2 hidden-lg-up">
					<?php } ?>
						<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
						<button class="c-hamburger c-hamburger--htx" type="button" data-toggle="collapse-side" data-target=".collapse" data-target-2="#main-content" aria-controls="navbarNav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span>toggle menu</span>
						</button>
				
					</div>
					
						<?php if (get_theme_mod('themeslug_logo_size') == 'value1') { ?>
							<div class="col-4 offset-lg-4">
						<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value2') { ?>
							<div class="col-6 offset-lg-3">
						<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value3') { ?>
							<div class="col-8 offset-lg-2">
						<?php } ?>
							
							<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
								<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="hidden-xs"></a>
							<?php else : ?>
								<a href="<?php bloginfo('url'); ?>" id="logo" class="brand hidden-xs"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
							<?php endif; ?>
						</div>
			
				<?php if (get_theme_mod('themeslug_logo_size') == 'value1') { ?>
					<div class="col-4 text-right hidden-lg-up">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value2') { ?>
					<div class="col-3 text-right hidden-lg-up">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value3') { ?>
					<div class="col-2 text-right hidden-lg-up">
				<?php } ?>	
				
					<a href="tel:<?php echo get_theme_mod( 'themeslug_phone' ); ?>" class="mobile-phone-button btn-round pull-right"><span><i class="fa fa-phone fa-2x"></i></span></a>
				</div>
				
			</div><!-- /.row -->
	</div><!-- /.container -->
	
	<div id="navWrapper">
		<div class="container nav-container">
			<div class="row nav-row">
				<?php get_template_part( 'partials/nav', 'mega-menu'); ?>
			</div>
		</div><!-- /.container -->
	</div><!-- /#navWrapper -->
	
</div><!-- /.navbar-header -->