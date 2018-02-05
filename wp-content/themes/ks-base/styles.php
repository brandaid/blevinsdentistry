<style>
/******************* Colors *******************/
	a {
		color: <?php echo get_theme_mod( 'a_color' ); ?>;
	}
	a:hover {
		color: <?php echo get_theme_mod( 'ah_color' ); ?>;
	}
	#page h1 {
		color: <?php echo get_theme_mod( 'h1_color' ); ?>;
	}
	#page h2,
	#page h3,
	#page h4,
	#page h5,
	#page h6 {
		color: <?php echo get_theme_mod( 'h2_color' ); ?>;
	}
	.btn-primary {
		background-color: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
		border-color: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	}
	.btn-primary:hover,
	.btn-primary:focus {
		background-color: <?php echo get_theme_mod( 'prim_btn_hover' ); ?>;
		border-color: <?php echo get_theme_mod( 'prim_btn_hover' ); ?>;
	}
	.btn-secondary {
		background-color: <?php echo get_theme_mod( 'second_btn_color' ); ?>;
		border-color: <?php echo get_theme_mod( 'second_btn_color' ); ?>;
	}
	.btn-secondary:hover {
		background-color: <?php echo get_theme_mod( 'second_btn_hover' ); ?>;
		border-color: <?php echo get_theme_mod( 'second_btn_hover' ); ?>;
	}
	.btn-info {
		background-color: <?php echo get_theme_mod( 'ter_btn_color' ); ?>;
		border-color: <?php echo get_theme_mod( 'ter_btn_color' ); ?>;
	}
	.btn-info:hover {
		background-color: <?php echo get_theme_mod( 'ter_btn_hover' ); ?>;
		border-color: <?php echo get_theme_mod( 'ter_btn_hover' ); ?>;
	}
	.btn-clear-dark {
		border: 1px solid <?php echo get_theme_mod( 'second_btn_color' ); ?>;
		color: <?php echo get_theme_mod( 'second_btn_color' ); ?>;
	}
	.btn-clear-light:hover,
	.btn-clear-dark:hover {
		border: 1px solid <?php echo get_theme_mod( 'ter_btn_color' ); ?>;
		background: <?php echo get_theme_mod( 'ter_btn_color' ); ?>;
		color: #fff;
	}
	.c-hamburger,
	.btn-round {
		border: 1px solid <?php echo get_theme_mod( 'themeslug_nav_main_hamburger_menu_color' ); ?>;
	}
	.c-hamburger span,
	.c-hamburger span::before,
	.c-hamburger span::after {
		background-color: <?php echo get_theme_mod( 'themeslug_nav_main_hamburger_menu_color' ); ?>;
	}
	.btn-round {
		color: <?php echo get_theme_mod( 'themeslug_nav_main_hamburger_menu_color' ); ?>;
	}
	.c-hamburger--htx.is-active {
	  background-color: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	  border-color: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	}
	#feature-boxes h5 {
		color: <?php echo get_theme_mod( 'fbox_text_color' ); ?>;
	}
	.flex-col-color {
		background: <?php echo get_theme_mod( 'ter_btn_color' ); ?>;
	}
	.modal .fa-map-marker {
		color: <?php echo get_theme_mod( 'second_btn_color' ); ?>;
	}
	#feature-boxes .overlay {
		background: <?php echo get_theme_mod( 'themeslug_fbox_overlay_color' ); ?>;
		opacity: <?php echo get_theme_mod( 'themeslug_fbox_color_opacity' ); ?>;
	}
	.fbox-img-overlay a h5 {
		background: <?php echo get_theme_mod( 'fbox_text_bg_color' ); ?>;
	}
	.fbox-img-overlay a:hover h5 {
		background: <?php echo get_theme_mod( 'fbox_text_bg_hover_color' ); ?>;
	}
	.entry-content span.num {
		background: <?php echo get_theme_mod( 'second_btn_color' ); ?>;
	}
	.arrows.arrowsFixed a {
		background: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	}
	.arrows.arrowsFixed a:hover {
		background: <?php echo get_theme_mod( 'prim_btn_hover' ); ?>;
	}
	#bubble-phone {
		border: 2px solid <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	}
	#bubble-phone:after {
		border-color: <?php echo get_theme_mod( 'prim_btn_color' ); ?> transparent;;
	}
	#call-to-action {
		background: <?php echo get_theme_mod( 'themeslug_cta_bg_color' ); ?>;
		
		<?php if (get_theme_mod ( 'themeslug_cta_bg_img') ) : ?>
			background: url(<?php echo get_theme_mod( 'themeslug_cta_bg_img' ); ?>) no-repeat center center; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		<?php endif; ?>
	}
	#call-to-action h2 {
		color: <?php echo get_theme_mod( 'themeslug_cta_h2_color' ); ?>;
	}
	#call-to-action,
	#call-to-action p {
		color: <?php echo get_theme_mod( 'themeslug_cta_text_color' ); ?>;
	}
	#call-to-action .overlay {
		background: <?php echo get_theme_mod( 'themeslug_cta_overlay_color' ); ?>;
		opacity: <?php echo get_theme_mod( 'themeslug_cta_overlay_opacity' ); ?>;
	}
	#call-to-action .fa-stack-1x {
		color: <?php echo get_theme_mod( 'h1_color' ); ?>;
	}
	footer#colophon {
		background: <?php echo get_theme_mod( 'themeslug_footer_bg_color' ); ?>;
		color: <?php echo get_theme_mod( 'themeslug_footer_text_color' ); ?>;
	}
	footer#colophon .widget-title {
		color: <?php echo get_theme_mod( 'themeslug_footer_text_color' ); ?>;
	}
	footer#colophon a {
		color: <?php echo get_theme_mod( 'themeslug_footer_a_color' ); ?>;
	}
	footer i {
		color: <?php echo get_theme_mod( 'second_btn_color' ); ?>;
	}
	.page-item.active .page-link {
		background-color: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
		border-color: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	}
	.page-link {
		color: <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	}
	.bypostauthor .comment-body {
		border-left: 3px solid <?php echo get_theme_mod( 'prim_btn_color' ); ?>;
	}


/******************* Fonts *******************/	
	
	h1,h2,h3,h4,h5,h6{
		
		<?php if (get_theme_mod('themeslug_typography_primary_link_on') == 'value1') : ?>
		
			<?php if (get_theme_mod('themeslug_typography_primary') == 'value1') : ?>
		
			  font-family: 'Lato', sans-serif;
			  
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value2') : ?>
			
			  font-family: 'Open Sans', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value3') : ?>
			
			  font-family: 'Roboto', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value4') : ?>
			
			  font-family: 'Raleway', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value5') : ?>
			
			  font-family: 'Oswald', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value6') : ?>
			
			  font-family: 'Josefin Sans', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value7') : ?>
			
			  font-family: 'Montserrat', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value8') : ?>
			
			  font-family: 'Nunito', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value9') : ?>
			
			  font-family: 'PT Sans', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value10') : ?>
			
			  font-family: 'Ubuntu', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value11') : ?>
			
			  font-family: 'Didact Gothic', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value12') : ?>
			
			  font-family: 'Dosis', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value13') : ?>
			
			  font-family: 'Playfair Display', serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value14') : ?>
			
			  font-family: 'Pacifico', cursive;
			
			<?php elseif (get_theme_mod('themeslug_typography_primary') == 'value15') : ?>
			
			  font-family: 'Lobster', cursive;
			
			<?php endif; ?>
			
		<?php else : ?>		
		
			<?php echo get_theme_mod('themeslug_typography_primary_link_css') ?>
			
		<?php endif; ?>
	}
	
	p, a, .btn {
		<?php if (get_theme_mod('themeslug_typography_secondary_link_on') == 'value1') : ?>

			<?php if (get_theme_mod('themeslug_typography_secondary') == 'value1') : ?>
		
			  font-family: 'Lato', sans-serif;
			  
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value2') : ?>
			
			  font-family: 'Open Sans', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value3') : ?>
			
			  font-family: 'Roboto', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value4') : ?>
			
			  font-family: 'Raleway', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value5') : ?>
			
			  font-family: 'Oswald', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value6') : ?>
			
			  font-family: 'Josefin Sans', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value7') : ?>
			
			  font-family: 'Montserrat', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value8') : ?>
			
			  font-family: 'Nunito', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value9') : ?>
			
			  font-family: 'PT Sans', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value10') : ?>
			
			  font-family: 'Ubuntu', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value11') : ?>
			
			  font-family: 'Didact Gothic', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value12') : ?>
			
			  font-family: 'Dosis', sans-serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value13') : ?>
			
			  font-family: 'Playfair Display', serif;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value14') : ?>
			
			  font-family: 'Pacifico', cursive;
			
			<?php elseif (get_theme_mod('themeslug_typography_secondary') == 'value15') : ?>
			
			  font-family: 'Lobster', cursive;
			
			<?php endif; ?>
			
		<?php else : ?>		
		
			<?php echo get_theme_mod('themeslug_typography_secondary_link_css') ?>
			
		<?php endif; ?>	
	}	

<?php if (get_theme_mod ( 'themeslug_bar_hello_on') == 'value1'  ) : ?>	
/******************* Bar - Hello *******************/
	#bar-hello {
		background: <?php echo get_theme_mod( 'themeslug_bar_hello_bg' ); ?>;
		padding: <?php echo get_theme_mod( 'themeslug_bar_hello_padding' ); ?> 0;
		font-size: <?php echo get_theme_mod( 'themeslug_bar_hello_font_size' ); ?>;
		
		/* text align */
		<?php if (get_theme_mod('themeslug_bar_hello_text_align') == 'value1') { ?>
			text-align: left;
		<?php } elseif (get_theme_mod('themeslug_bar_hello_text_align') == 'value2') { ?>
			text-align: center;
		<?php } elseif (get_theme_mod('themeslug_bar_hello_text_align') == 'value3') { ?>
			text-align: right;
		<?php } ?>
		
		/* text-transform */
		<?php if (get_theme_mod ( 'themeslug_bar_hello_text_transform') == 'value2'  ) : ?>
			text-transform: none;
		<?php else : ?>
			text-transform: uppercase;
		<?php endif; ?>
		
	}
	#bar-hello a {
		color: <?php echo get_theme_mod( 'themeslug_bar_hello_a_color' ); ?>
	}
	#bar-hello .btn {
		color: <?php echo get_theme_mod( 'themeslug_bar_hello_btn_text_color' ); ?>;
		background: <?php echo get_theme_mod( 'themeslug_bar_hello_btn_bg' ); ?>;
		border-color: <?php echo get_theme_mod( 'themeslug_bar_hello_btn_bg' ); ?>;
	}
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_bar_reviews_on') == 'value1'  ) : ?>
/******************* Bar - Reviews *******************/
	#bar-reviews {
		color: <?php echo get_theme_mod( 'themeslug_bar_reviews_color' ); ?>;
	}
	#bar-reviews .overlay {
		background: <?php echo get_theme_mod( 'themeslug_bar_reviews_bg' ); ?>;
		opacity: <?php echo get_theme_mod( 'themeslug_bar_reviews_bg_opacity' ); ?>;
	}
	#bar-reviews .fa-star {
		color: <?php echo get_theme_mod( 'themeslug_bar_reviews_star_color' ); ?>;
	}
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_bar_announcement_on') == 'value1'  ) : ?>
/******************* Bar - Announcement *******************/
	#bar-announcement {
		background: <?php echo get_theme_mod( 'themeslug_bar_announcement_bg' ); ?>;
		padding: <?php echo get_theme_mod( 'themeslug_bar_announcement_padding' ); ?> 0;
		font-size: <?php echo get_theme_mod( 'themeslug_bar_announcement_font_size' ); ?>;
		
		/* text align */
		<?php if (get_theme_mod('themeslug_bar_announcement_text_align') == 'value1') { ?>
			text-align: left;
		<?php } elseif (get_theme_mod('themeslug_bar_announcement_text_align') == 'value2') { ?>
			text-align: center;
		<?php } elseif (get_theme_mod('themeslug_bar_announcement_text_align') == 'value3') { ?>
			text-align: right;
		<?php } ?>
		
		/* text-transform */
		<?php if (get_theme_mod ( 'themeslug_bar_announcement_text_transform') == 'value2'  ) : ?>
			text-transform: none;
		<?php else : ?>
			text-transform: uppercase;
		<?php endif; ?>
		
	}
	#bar-announcement a {
		color: <?php echo get_theme_mod( 'themeslug_bar_announcement_a_color' ); ?>;
	}
	#bar-announcement .btn {
		color: <?php echo get_theme_mod( 'themeslug_bar_announcement_btn_text_color' ); ?>;
		background: <?php echo get_theme_mod( 'themeslug_bar_announcement_btn_bg' ); ?>;
		border-color: <?php echo get_theme_mod( 'themeslug_bar_announcement_btn_bg' ); ?>;
	}
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_nav_top_on') == 'value1'  ) : ?>	
/******************* Nav - Top *******************/
	#nav-top {
		background: <?php echo get_theme_mod( 'themeslug_nav_top_bg' ); ?>;
		font-size: <?php echo get_theme_mod( 'themeslug_nav_top_text_size' ); ?>;
	}
	#nav-top a {
		color: <?php echo get_theme_mod( 'themeslug_nav_top_link_color' ); ?>;	
	}
<?php endif; ?>
	
/******************* Logo *******************/
	#logo {
		margin-top: <?php echo get_theme_mod( 'themeslug_logo_top_margin' ); ?>;
		margin-bottom: <?php echo get_theme_mod( 'themeslug_logo_bottom_margin' ); ?>;
		
		/* titlt */
		<?php if (get_theme_mod('themeslug_logo_tilt') == 'value1') { ?>
			-ms-transform: rotate(0deg); /* IE 9 */
		    -webkit-transform: rotate(0deg); /* Chrome, Safari, Opera */
		    transform: rotate(0deg);
		<?php } elseif (get_theme_mod('themeslug_logo_tilt') == 'value2') { ?>
			-ms-transform: rotate(-5deg); /* IE 9 */
		    -webkit-transform: rotate(-5deg); /* Chrome, Safari, Opera */
		    transform: rotate(-5deg);
		<?php } elseif (get_theme_mod('themeslug_logo_tilt') == 'value3') { ?>
			-ms-transform: rotate(5deg); /* IE 9 */
		    -webkit-transform: rotate(5deg); /* Chrome, Safari, Opera */
		    transform: rotate(5deg);
		<?php } ?>
	}
	
/******************* Nav - Main *******************/
	.wrapper-navbar {
		background: <?php echo get_theme_mod( 'themeslug_nav_main_bg_color' ); ?>;
	}
	#navbarNav {
		background: <?php echo get_theme_mod( 'themeslug_nav_main_mobile_nav_bg' ); ?>;
		font-size: <?php echo get_theme_mod( 'themeslug_nav_main_text_size' ); ?>;
		padding: <?php echo get_theme_mod( 'themeslug_nav_main_padding' ); ?> 0;
		
		/* text-transform */
		<?php if (get_theme_mod ( 'themeslug_nav_main_text_transform') == 'value2'  ) : ?>
			text-transform: none;
		<?php else : ?>
			text-transform: uppercase;
		<?php endif; ?>
		
		/* Logo Left, Nav Right */
		<?php if (get_theme_mod('themeslug_logo_position') == 'value1') { ?>
			top: 12px;
	
		/* Logo Right, Nav Left */
		<?php } elseif (get_theme_mod('themeslug_logo_position') == 'value2') { ?>
			top: 12px;
	
		/* Logo Above, Nav Below */
		<?php } elseif (get_theme_mod('themeslug_logo_position') == 'value3') { ?>
			top: 0;
	
		/* Logo Below, Nav Above */
		<?php } elseif (get_theme_mod('themeslug_logo_position') == 'value4') { ?>
			top: 0;
		<?php } ?>
	}
	#navbarNav .dropdown-menu {
		font-size: <?php echo get_theme_mod( 'themeslug_nav_main_text_size' ); ?>;
	}
	#navbarNav .nav-item a {
		color: <?php echo get_theme_mod( 'themeslug_nav_main_link_color' ); ?>;
	}
	#navbarNav .dropdown.show > a,
	#navbarNav .nav-item:hover {
		background: <?php echo get_theme_mod( 'themeslug_nav_main_link_hover_bg_color' ); ?>;
	}
	#navbarNav .dropdown.show > a,
	#navbarNav .nav-item:hover > a,
	#navbarNav .dropdown-menu a {
		color: <?php echo get_theme_mod( 'themeslug_nav_main_link_hover_color' ); ?>;
	}
	#navbarNav .dropdown-menu {
		background: <?php echo get_theme_mod( 'themeslug_nav_main_dropdown_bg_color' ); ?>;
	}
	#navbarNav .dropdown-menu a {
		color: <?php echo get_theme_mod( 'themeslug_nav_main_dropdown_a_color' ); ?>;
	}
	#navbarNav .nav-item .btn,
	#navbarNav .nav-item .btn:hover {
		<?php if (get_theme_mod ( 'themeslug_nav_main_btn_style') == 'value1'  ) : ?>
			color: #444444;
		<?php else : ?>
			color: #ffffff;
		<?php endif; ?>
	}

/******************* Feature Header *******************/	
	/* bottom margin turned off if 'bar-announcement' is turned on */
	<?php if (get_theme_mod ( 'themeslug_bar_announcement_on') == 'value1'  ) : ?>
		#featureHeader {
			margin-bottom: 0;
		}
	<?php else : ?>
		#featureHeader {
			margin-bottom: 2rem;
		}
	<?php endif; ?>
	
	/*** Static Image Header ***/
	.header-static .slide-wrapper {
		background: url('<?php echo get_theme_mod( 'themeslug_static_pic' ); ?>') no-repeat center center; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#page .header-static h1,
	.header-static p {
		color: <?php echo get_theme_mod( 'themeslug_static_text_color'); ?>;
	}
	.header-static .overlay {
		background: <?php echo get_theme_mod( 'themeslug_static_overlay_color'); ?>;
		opacity: <?php echo get_theme_mod( 'themeslug_static_color_opacity'); ?>;
	}
	
	/*** Slider Image Header ***/
	
	/** Slide 1 **/
	.slide1 {
		background: url('<?php echo get_theme_mod( 'themeslug_slide1_pic' ); ?>') no-repeat center center; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#page .slide1 h1,
	.slide1 p {
		color: <?php echo get_theme_mod( 'themeslug_slide1_text_color'); ?>;
	}
	<?php if (get_theme_mod ( 'themeslug_slide1_add_htag_bg') == 'value1'  ) : ?>
		.slide1 .htag-bg {
			background: <?php echo get_theme_mod( 'themeslug_slide1_htag_bg'); ?>;
			box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide1_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide1_htag_bg'); ?>;
		}
	<?php endif; ?>
	
	.slide1 .overlay {
		background: <?php echo get_theme_mod( 'themeslug_slide1_overlay_color'); ?>;
		opacity: <?php echo get_theme_mod( 'themeslug_slide1_color_opacity'); ?>;
	}
	
	<?php if (get_theme_mod ( 'themeslug_slide2_pic') ) : ?>
		/** Slide 2 **/
		.slide2 {
			background: url('<?php echo get_theme_mod( 'themeslug_slide2_pic' ); ?>') no-repeat center center; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		#page .slide2 h1,
		.slide2 p {
			color: <?php echo get_theme_mod( 'themeslug_slide2_text_color'); ?>;
		}
		<?php if (get_theme_mod ( 'themeslug_slide2_add_htag_bg') == 'value1'  ) : ?>
			.slide2 .htag-bg {
				background: <?php echo get_theme_mod( 'themeslug_slide2_htag_bg'); ?>;
				box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide2_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide2_htag_bg'); ?>;
			}
		<?php endif; ?>
		.slide2 .overlay {
			background: <?php echo get_theme_mod( 'themeslug_slide2_overlay_color'); ?>;
			opacity: <?php echo get_theme_mod( 'themeslug_slide2_color_opacity'); ?>;
		}
	<?php endif; ?> 
	
	<?php if (get_theme_mod ( 'themeslug_slide3_pic') ) : ?>
		/** Slide 3 **/
		<?php if (get_theme_mod ( 'themeslug_slide3_pic') ) : ?>
			.slide3 {
				background: url('<?php echo get_theme_mod( 'themeslug_slide3_pic' ); ?>') no-repeat center center; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			#page .slide3 h1,
			.slide3 p {
				color: <?php echo get_theme_mod( 'themeslug_slide3_text_color'); ?>;
			}
			<?php if (get_theme_mod ( 'themeslug_slide3_add_htag_bg') == 'value1'  ) : ?>
			.slide3 .htag-bg {
				background: <?php echo get_theme_mod( 'themeslug_slide3_htag_bg'); ?>;
				box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide3_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide3_htag_bg'); ?>;
			}
		<?php endif; ?>
			.slide3 .overlay {
				background: <?php echo get_theme_mod( 'themeslug_slide3_overlay_color'); ?>;
				opacity: <?php echo get_theme_mod( 'themeslug_slide3_color_opacity'); ?>;
			}
		<?php endif; ?>
	<?php endif; ?> 
	
	<?php if (get_theme_mod ( 'themeslug_slide4_pic') ) : ?>
		/** Slide 4 **/
		<?php if (get_theme_mod ( 'themeslug_slide4_pic') ) : ?>
			.slide4 {
				background: url('<?php echo get_theme_mod( 'themeslug_slide4_pic' ); ?>') no-repeat center center; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			#page .slide4 h1,
			.slide4 p {
				color: <?php echo get_theme_mod( 'themeslug_slide4_text_color'); ?>;
			}
			<?php if (get_theme_mod ( 'themeslug_slide4_add_htag_bg') == 'value1'  ) : ?>
				.slide4 .htag-bg {
					background: <?php echo get_theme_mod( 'themeslug_slide4_htag_bg'); ?>;
					box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide4_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide4_htag_bg'); ?>;
				}
			<?php endif; ?>
			.slide4 .overlay {
				background: <?php echo get_theme_mod( 'themeslug_slide4_overlay_color'); ?>;
				opacity: <?php echo get_theme_mod( 'themeslug_slide4_color_opacity'); ?>;
			}
		<?php endif; ?>
	<?php endif; ?> 
	
	<?php if (get_theme_mod ( 'themeslug_slide5_pic') ) : ?>
		/** Slide 5 **/
		<?php if (get_theme_mod ( 'themeslug_slide5_pic') ) : ?>
			.slide5 {
				background: url('<?php echo get_theme_mod( 'themeslug_slide5_pic' ); ?>') no-repeat center center; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			#page .slide5 h1,
			.slide5 p {
				color: <?php echo get_theme_mod( 'themeslug_slide5_text_color'); ?>;
			}
			<?php if (get_theme_mod ( 'themeslug_slide5_add_htag_bg') == 'value1'  ) : ?>
				.slide5 .htag-bg {
					background: <?php echo get_theme_mod( 'themeslug_slide5_htag_bg'); ?>;
					box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide5_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide5_htag_bg'); ?>;
				}
			<?php endif; ?>
			.slide5 .overlay {
				background: <?php echo get_theme_mod( 'themeslug_slide5_overlay_color'); ?>;
				opacity: <?php echo get_theme_mod( 'themeslug_slide5_color_opacity'); ?>;
			}
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if (get_theme_mod ( 'themeslug_slide6_pic') ) : ?>
		/** Slide 6 **/
		<?php if (get_theme_mod ( 'themeslug_slide6_pic') ) : ?>
			.slide6 {
				background: url('<?php echo get_theme_mod( 'themeslug_slide6_pic' ); ?>') no-repeat center center; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			#page .slide6 h1,
			.slide6 p {
				color: <?php echo get_theme_mod( 'themeslug_slide6_text_color'); ?>;
			}
			<?php if (get_theme_mod ( 'themeslug_slide6_add_htag_bg') == 'value1'  ) : ?>
				.slide6 .htag-bg {
					background: <?php echo get_theme_mod( 'themeslug_slide6_htag_bg'); ?>;
					box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide6_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide6_htag_bg'); ?>;
				}
			<?php endif; ?>
			.slide6 .overlay {
				background: <?php echo get_theme_mod( 'themeslug_slide6_overlay_color'); ?>;
				opacity: <?php echo get_theme_mod( 'themeslug_slide6_color_opacity'); ?>;
			}
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if (get_theme_mod ( 'themeslug_slide7_pic') ) : ?>
		/** Slide 7 **/
		<?php if (get_theme_mod ( 'themeslug_slide7_pic') ) : ?>
			.slide7 {
				background: url('<?php echo get_theme_mod( 'themeslug_slide7_pic' ); ?>') no-repeat center center; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			#page .slide7 h1,
			.slide7 p {
				color: <?php echo get_theme_mod( 'themeslug_slide7_text_color'); ?>;
			}
			<?php if (get_theme_mod ( 'themeslug_slide7_add_htag_bg') == 'value1'  ) : ?>
				.slide7 .htag-bg {
					background: <?php echo get_theme_mod( 'themeslug_slide7_htag_bg'); ?>;
					box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide7_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide7_htag_bg'); ?>;
				}
			<?php endif; ?>
			.slide7 .overlay {
				background: <?php echo get_theme_mod( 'themeslug_slide7_overlay_color'); ?>;
				opacity: <?php echo get_theme_mod( 'themeslug_slide7_color_opacity'); ?>;
			}
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if (get_theme_mod ( 'themeslug_slide8_pic') ) : ?>
		/** Slide 8 **/
		<?php if (get_theme_mod ( 'themeslug_slide8_pic') ) : ?>
			.slide8 {
				background: url('<?php echo get_theme_mod( 'themeslug_slide8_pic' ); ?>') no-repeat center center; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			#page .slide8 h1,
			.slide8 p {
				color: <?php echo get_theme_mod( 'themeslug_slide8_text_color'); ?>;
			}
			<?php if (get_theme_mod ( 'themeslug_slide8_add_htag_bg') == 'value1'  ) : ?>
				.slide8 .htag-bg {
					background: <?php echo get_theme_mod( 'themeslug_slide8_htag_bg'); ?>;
					box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_slide8_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_slide8_htag_bg'); ?>;
				}
			<?php endif; ?>
			.slide8 .overlay {
				background: <?php echo get_theme_mod( 'themeslug_slide8_overlay_color'); ?>;
				opacity: <?php echo get_theme_mod( 'themeslug_slide8_color_opacity'); ?>;
			}
		<?php endif; ?>
	<?php endif; ?>
	
	/*** Video Header ***/
	#page .header-video h1,
	.header-video p {
		color: <?php echo get_theme_mod( 'themeslug_video_text_color'); ?>;
	}
	<?php if (get_theme_mod ( 'themeslug_video_add_htag_bg') == 'value1'  ) : ?>
		.header-video .htag-bg {
			background: <?php echo get_theme_mod( 'themeslug_video_htag_bg'); ?>;
			box-shadow: 6px 0 0 <?php echo get_theme_mod( 'themeslug_video_htag_bg'); ?>, -6px 0 0 <?php echo get_theme_mod( 'themeslug_video_htag_bg'); ?>;
		}
	<?php endif; ?>
	.header-video .overlay {
		background: <?php echo get_theme_mod( 'themeslug_video_overlay_color'); ?>;
		opacity: <?php echo get_theme_mod( 'themeslug_video_color_opacity'); ?>;
	}
	.header-video {
		background: url(<?php echo get_theme_mod( 'themeslug_video_poster' ); ?>) no-repeat center center; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}

/******************* Feature Boxes *******************/
	.fbox-1-img {
		background: url(<?php echo get_theme_mod( 'themeslug_fbox_1_img' ); ?>) no-repeat center center; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.fbox-2-img {
		background: url(<?php echo get_theme_mod( 'themeslug_fbox_2_img' ); ?>) no-repeat center center; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.fbox-3-img {
		background: url(<?php echo get_theme_mod( 'themeslug_fbox_3_img' ); ?>) no-repeat center center; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.fbox-4-img {
		background: url(<?php echo get_theme_mod( 'themeslug_fbox_4_img' ); ?>) no-repeat center center; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
/******************* Pages *******************/
	.jumbotron-with-bg .overlay {
		background: <?php echo get_theme_mod( 'themeslug_slide1_overlay_color'); ?>;
	}
	
/* Minimum width of 768 pixels. */
	@media screen and (min-width: 768px) {
		<?php if (get_theme_mod ( 'themeslug_fheader_height') == 'value2'  ) : ?>
			#featureHeader .carousel-item {
				height: 400px;
			}
			.slide-title {
				top: 35%;
			}
		<?php endif; ?>
	}

	
/* Minimum width of 1200 pixels. */
	@media screen and (min-width: 1200px) {
		<?php if (get_theme_mod ( 'themeslug_fheader_height') == 'value2'  ) : ?>
			#featureHeader .carousel-item {
				height: 500px;
			}
		<?php endif; ?>
	}
	
</style>