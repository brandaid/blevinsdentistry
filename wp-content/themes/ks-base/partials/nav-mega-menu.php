<div id="navbarNav" class="collapse navbar-collapse
	
		<?php if (get_theme_mod('themeslug_nav_main_align') == 'value1') { ?>
			justify-content-start
		<?php } elseif (get_theme_mod('themeslug_nav_main_align') == 'value2') { ?>
			justify-content-center
		<?php } elseif (get_theme_mod('themeslug_nav_main_align') == 'value3') { ?>
			justify-content-end
		<?php } ?>
	
	">
<ul class="nav navbar-nav">
	<li class="nav-item"><a class="nav-link" href="<?php bloginfo('url'); ?>">Home</a></li>
	<li class="nav-item"><a class="nav-link" href="<?php bloginfo('url'); ?>/team">Team</a></li>
	<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Care</a>
		<div class="mega-menu mega-menu-3-col dropdown-menu">
			<div class="row">
				<div class="col-lg-4">
					<strong class="nav-link">Family</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/cleanings">Cleanings &amp; Oral Exams</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/oral-cancer-screening">Oral Cancer Screenings</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/digital-xrays">Digital X-Rays</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/fillings">Fillings</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/sealants">Sealants</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/laser-dentistry">Laser Dentistry</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/sedation-dentistry">Sedation Dentistry</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<strong class="nav-link">Restorative</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/diagnostic-imaging">Diagnostic Imaging</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/gum-disease">Gum Disease</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/tmj-disorder">TMJ Disorder</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/dental-implants">Dental Implants</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<strong class="nav-link">Cosmetic</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/teeth-whitening">Teeth Whitening</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/veneers">Veneers</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/crown-and-bridges">Crowns &amp; Bridges</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/six-month-smiles">Six Month Smiles</a></li>
					</ul>
				</div>
			</div>
		</div>
	</li>

	<li class="nav-item"><a class="nav-link" href="<?php bloginfo('url'); ?>/insurance">Insurance</a></li>
	<li class="nav-item"><a class="nav-link" href="<?php bloginfo('url'); ?>/contact">Appointments</a></li>
	
	<?php if (get_theme_mod ( 'themeslug_nav_top_on') == 'value1'  ) : ?>
		<?php get_template_part( 'partials/nav', 'top-mobile'); ?>
	<?php endif; ?>
	
	<?php if (get_theme_mod ( 'themeslug_nav_main_btn_on') == 'value1'  ) : ?>
		<li class="nav-item hidden-sm-down phone-btn"><a class="btn btn-primary
			
			<?php if (get_theme_mod('themeslug_nav_main_btn_size') == 'value1') { ?>
				btn-sm
			<?php } elseif (get_theme_mod('themeslug_nav_main_btn_size') == 'value2') { ?>
				
			<?php } elseif (get_theme_mod('themeslug_nav_main_btn_size') == 'value3') { ?>
				btn-lg
			<?php } ?>
			
			" href="tel:<?php echo get_theme_mod( 'themeslug_phone' ); ?>"><?php echo get_theme_mod( 'themeslug_phone' ); ?></a></li>
	<?php endif; ?>
</ul>
</div><!-- /#navbarNav -->