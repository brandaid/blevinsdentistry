<div class="container nav-container" >
	<div class="navbar-header">
		
		<div class="row nav-row align-items-center">
				<?php if (get_theme_mod('themeslug_logo_size') == 'value1') { ?>
					<div class="col-4 hidden-lg-up">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value2') { ?>
					<div class="col-3 hidden-lg-up">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value3') { ?>
					<div class="col-2 col-md-3 hidden-lg-up">
				<?php } ?>
				
						<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
						<button class="c-hamburger c-hamburger--htx" type="button" data-toggle="collapse-side" data-target=".collapse" data-target-2="#main-content" aria-controls="navbarNav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span>toggle menu</span>
						</button>
				
					</div>
									
				<?php if (get_theme_mod('themeslug_logo_size') == 'value1') { ?>
					<div class="col-4 col-lg-2">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value2') { ?>
					<div class="col-6 col-lg-3">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value3') { ?>
					<div class="col-8 col-md-6 col-lg-4">
				<?php } ?>
					
					<?php if (is_front_page()) : ?>
					
						<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="hidden-lg-up"></a>
							
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo-square.png' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="hidden-md-down"></a>
						<?php else : ?>
							<a href="<?php bloginfo('url'); ?>" id="logo" class="brand"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
						<?php endif; ?>
					
					<?php else : ?>
					
						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo"></a>
					
					<?php endif; ?>
					
				</div>
				
				<?php if (get_theme_mod('themeslug_logo_size') == 'value1') { ?>
					<div class="col-4 hidden-lg-up text-right">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value2') { ?>
					<div class="col-3 hidden-lg-up text-right">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value3') { ?>
					<div class="col-2 col-md-3 hidden-lg-up text-right">
				<?php } ?>
						<a href="tel:<?php echo get_theme_mod( 'themeslug_phone' ); ?>" class="mobile-phone-button btn-round pull-right hidden-lg-up"><span><i class="fa fa-phone fa-2x"></i></span></a>
					</div>
									
				<?php if (get_theme_mod('themeslug_logo_size') == 'value1') { ?>
					<div class="col-6 col-sm-10 nav-column">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value2') { ?>
					<div class="col-6 col-sm-9 nav-column">
				<?php } elseif (get_theme_mod('themeslug_logo_size') == 'value3') { ?>
					<div class="col-6 col-sm-8 nav-column">
				<?php } ?>
					<?php get_template_part( 'partials/nav', 'mega-menu'); ?>	
				</div>
		</div>
	</div>
</div> <!-- .container -->