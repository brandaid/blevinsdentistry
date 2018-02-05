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
	<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
		<div class="dropdown-menu">
			<ul>
				<li><a class="nav-link" href="<?php bloginfo('url'); ?>/dr-blevins">Meet Dr. Blevins</a></li>
				<li><a class="nav-link" href="<?php bloginfo('url'); ?>/meet-our-staff">Meet Our Team</a></li>
				<li><a class="nav-link" href="<?php bloginfo('url'); ?>/social">Social</a></li>
			</ul>
		</div>
	</li>
	<li class="nav-item"><a class="nav-link" href="<?php bloginfo('url'); ?>/dental-implants">Dental Implants</a></li>
	<li class="nav-item"><a class="nav-link" href="<?php bloginfo('url'); ?>/single-visit-veneers">Veneers</a></li>
	<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Care</a>
		<div class="mega-menu mega-menu-3-col dropdown-menu">
			<div class="row">
				<div class="col-lg-4">
					<strong class="nav-link">Preventative</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/thorough-dental-exams">Thorough Dental Examinations</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/professional-cleanings">Professional Cleanings</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/gum-disease-care">Gum Disease Care</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/digital-radiography">Digital Radiography</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/oral-cancer-screening">Oral Cancer Screening</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<strong class="nav-link">Restorative</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/crowns-and-bridges">Crowns &amp; Bridges</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/snap-in-dentures">Snap-In Dentures</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/tooth-colored-fillings">Tooth Colored Fillings</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/dental-implants">Dental Implants</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<strong class="nav-link">Cosmetic Dentistry</strong>
					<ul>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/smile-makeovers">Smile Makeovers</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/cosmetic-bonding">Cosmetic Bonding</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/teeth-whitening">Teeth Whitening</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/single-visit-veneers">Single Visit Veneers</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/full-mouth-rehab">Full Mouth Rehab</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/oral-appliance-therapy">Oral Appliance Therapy</a></li>
					</ul>
				</div>
			</div>
			
			<hr />
			
			<div class="row">
				<div class="col-lg-4">
					<strong class="nav-link">Endodontics</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/pulpotomy">Pulpotomy</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/root-canal-therapy">Root Canal Therapy</a></li>
					</ul>
					
					<hr />
					
					<strong class="nav-link">Periodontics</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/periodontics">Periodontics</a></li>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/oral-wellness">Oral Wellness</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<strong class="nav-link">Sedation</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/oral-sedation">Oral Sedation</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/nitrous-oxide">Nitrous Oxide</a></li>
					</ul>
				</div>
				<div class="col-lg-4">
					<strong class="nav-link">Oral Surgery</strong>
					<ul>
					    <li><a class="nav-link" href="<?php bloginfo('url'); ?>/bone-grafting">Bone Grafting</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/l-prf-for-faster-healing">L-PRF for Faster Healing</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/laser-therapy">Laser Therapy</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/extractions">Extractions</a></li>
						<li><a class="nav-link" href="<?php bloginfo('url'); ?>/gum-lift-contouring">Gum Lift Contouring</a></li>
					</ul>
				</div>
			</div>
		</div>
	</li>

	<li class="nav-item"><a class="nav-link" href="<?php bloginfo('url'); ?>/smile-gallery">Smile Gallery</a></li>
	
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
	
	<li class="nav-item hidden-lg-up"><span class="nav-link">NO MEDICAID / MEDICARE</span></li>
</ul>
</div><!-- /#navbarNav -->