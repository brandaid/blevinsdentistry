<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

<?php get_template_part('styles'); ?>

<?php if (is_ios()) : ?>
	<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ios.css" rel="stylesheet" media="screen">
<?php endif; ?>
<?php if (is_mobile()) : ?>
	<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/mobile.css" rel="stylesheet" media="screen">
<?php endif; ?>

<!-- Animations -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/animation.css" rel="stylesheet" media="screen">
<meta name="google-site-verification" content="HF2E_QKRv5BBTGVhoxsdCgTpw8TtcBPysnyveSsRdpw" />

<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "Dentist",
  "name": "<?php bloginfo('name'); ?>",
  "url": "<?php bloginfo('url'); ?>",
  "logo": "<?php echo get_theme_mod( 'themeslug_logo' ); ?>",
  "description": "At Blevins Dentistry in Mullins, South Carolina, we take pride in delivering excellent dentistry with compassion and integrity. We believe that all of our patients should have the opportunity to experience optimal oral health in regards to comfort, function, and esthetics. Our desire is to build long-term relationships with patients who appreciate quality care and service. Patients travel to our Mullins office from Florence, Loris, Aynor, Dillon, Latta, Marion, Conway, North Myrtle & Myrtle Beach, Longs, Little River and other surrounding areas for cosmetic, general, and restorative dental services.",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "622 South Main St",
    "addressLocality": "Mullins",
    "addressRegion": "SC",
    "postalCode": "29574",
    "addressCountry": "USA"
  },
  "openingHours": "Mo, We 09:00-17:00 Tu 08:00-14:00 Th 09:00-17:30 Fr 09:00-13:00",
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "Patient Services / New Appointments",
    "telephone": "<?php echo get_theme_mod( 'themeslug_phone' ); ?>"
  }
}
 </script>

</head>

<body <?php body_class(); ?>>

<?php if (get_theme_mod ( 'themeslug_hide_slide_out_form') == 'value2'  ) : ?>
	<?php get_template_part('popout'); ?>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_hide_appointment_tab') == 'value2'  ) : ?>	
	<a href="#call-to-action" class="anchored hidden-xs"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/appointment-button.png" alt="" id="appointment-button" /></a>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_hide_number_popup') == 'value2'  ) : ?>		
	<div id="bottom-call-out" class="hidden-xs slideDown">
		<i class="fa fa-phone"></i> We're here to answer your questions! <strong><?php echo get_theme_mod( 'themeslug_phone' ); ?></strong> <span class="close-callout">X</span>
	</div><!-- /.botom-call-out -->
<?php endif; ?>

	<!--<div id="bottom-call-out-right" class="hidden-xs slideUp">
		<a href="<?php echo get_theme_mod( 'themeslug_anchor-post-url' ); ?>"><i class="fa fa-comments"></i> <?php echo get_theme_mod( 'themeslug_anchor-post-title' ); ?></a> <span class="close-callout-right">X</span>
	</div> /.botom-call-out -->
	
<?php get_template_part('modals'); ?>
	
<div id="main-container">
<div id="page" class="hfeed site">
	
<!-- NAVBAR
================================================== -->
  <div class="navbar-wrapper">
	  
	<nav class="navbar">
		
		<?php if (is_front_page()) : ?>
			<div class="navbar-inner texture-border texture-border--bottom texture-border-reverse-bottom">
		<?php else : ?>
			<div class="navbar-inner texture-border texture-border--bottom texture-border-reverse-bottom-tan">		
		<?php endif; ?>
			<div id="hello-bar" class="text-center texture-tan">
				<a href="<?php bloginfo('url'); ?>/11-reasons-to-choose-blevins-dentistry-in-mullins-sc/">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-th-list fa-stack-1x fa-inverse"></i>
					</span>
					11 Reasons to Choose Blevins Dentistry in Mullins, SC</a>
			</div>
			<div id="top-bar" class="hidden-xs">
				<div class="container text-right">
					<a href="#myModal1" class="modal-trigger" data-toggle="modal"><i class="fa fa-map-marker"></i> <?php echo get_theme_mod( 'themeslug_address' ); ?></a> &nbsp;|&nbsp; <a href="<?php bloginfo('url'); ?>/blog">Blog</a> &nbsp;|&nbsp; <a href="<?php bloginfo('url'); ?>/contact">Contact</a> &nbsp;|&nbsp; <a href="https://www.smilereminder.com/sr/limelight/anon.do?id=435d0b439017a305" target="_blank">Schedule an Appointment</a>
				</div><!-- /.container -->
			</div><!-- /#top-bar -->
			
			<div class="container">
	            <div class="navbar-header">
	
				  	<div class="col-xs-3">
						<button type="button" class="nav-toggle collapsed navbar-btn btn-default btn-lg visible-xs" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<i class="fa fa-bars"></i>
						</button>
				  	</div>
				  	<div class="col-xs-6">
					  	<!-- Mobile logo -->
						<?php if ( get_theme_mod( 'themeslug_mobile_logo' ) ) : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="visible-xs"></a>
						  <?php else : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="visible-xs"></a>
						<?php endif; ?>
				  	</div>
				  	<div class="col-xs-3">
					  	<div class="btn-group search-btn btn-group-lg visible-xs" role="group">
							<a href="#" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								  <i class="fa fa-search"></i></a>
								  <ul class="dropdown-menu dropdown-menu-right" role="menu">
									  <li role="presentation" class="mobile-search-container">
									  	<form action="<?php bloginfo('url'); ?>" method="get">
							  				<label class="sr-only" for="s">Keyword(s)</label> <input id="s" class="text" name="s" type="text" value="" placeholder="Search for Keyword" /><button class="submit btn btn-primary btn-xs" name="submit" type="submit">Search</button>
							  			</form>
									  </li>
								  </ul>
						  </div>
				  	</div>
	              
		            <div class="col-sm-3">
						<!-- Desktop logo -->
			            <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="hidden-xs"></a>
						<?php else : ?>
							<a href="<?php bloginfo('url'); ?>" id="logo" class="brand hidden-xs"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
						<?php endif; ?>
		            </div><!-- /.col3 -->
		            <div class="col-sm-9 text-right">
			            <div id="navbar" class="navbar-collapse collapse">
			              <?php /* wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>' )); */ ?>
			              <?php get_template_part('mega-menu'); ?>
			        	</div>
		            </div><!-- /.col9 -->
	            </div><!-- /.navbar-header -->
	              
			</div><!-- /.container -->
		</div><!-- /.navbar-inner -->
    </nav>
	
  </div><!-- /.navbar-wrapper -->
  
  <?php if (is_front_page()) : ?>
	<?php get_template_part('carousel'); ?>
  <?php endif; ?>

<div class="main-content texture-border texture-border--top texture-border-reverse-top">

<div id="mobile-contact-buttons" class="texture-darker-blue visible-xs">
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<a href="tel:<?php echo get_theme_mod( 'themeslug_phone' ); ?>" class="btn btn-default" role="button"><i class="fa fa-phone"></i> Call</a>
		<a href="mailto:<?php echo get_theme_mod( 'themeslug_mobile_email' ); ?>" class="btn btn-default" role="button"><i class="fa fa-envelope"></i> Email</a>
		<div class="btn-group" role="group">
			<a href="<?php echo get_theme_mod( 'themeslug_mobile_map' ); ?>" class="btn btn-default"><i class="fa fa-map-marker" target="_blank"></i> Map</a>
		</div>
	</div><!-- end btn-group-->
</div><!-- /#mobile-contact-buttons -->
	    
	<div id="main" class="wrapper">