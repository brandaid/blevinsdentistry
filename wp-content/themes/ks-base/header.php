<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title"
	      content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">

	<!-- Facebook Open Graph -->  
	<meta property="og:title" content="<?php the_title(); ?>"/>
	<meta property="og:description" content="<?php if ( empty( $post->post_excerpt ) ) {
    	echo wp_kses_post( wp_trim_words( $post->post_content, 50 ) );
	} else {
	    echo get_the_excerpt(); 
	} ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
	<meta property="og:image" content="<?php the_post_thumbnail_url( $size ); ?>"/>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	
	<?php get_template_part( 'partials/list', 'schema' ); ?>
	<?php get_template_part( 'partials/list', 'fonts' ); ?>
	<?php get_template_part('styles'); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
	
	<?php get_template_part( 'partials/list', 'modals' ); ?>

	<?php if (get_theme_mod ( 'themeslug_bar_hello_on') == 'value1'  ) : ?>
		<?php get_template_part( 'partials/bar', 'hello' ); ?>
	<?php endif; ?>

	<?php if (get_theme_mod ( 'themeslug_nav_top_on') == 'value1'  ) : ?>
		<?php get_template_part( 'partials/nav', 'top' ); ?>
	<?php endif; ?>
	
	<?php if (get_theme_mod ( 'themeslug_show_facebook') == 'value1'  ) : ?>
		<div id="fixed-social" class="hidden-sm-down">
			<?php if (get_theme_mod ( 'themeslug_show_facebook') == 'value1'  ) : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_facebook' ); ?>" target="_blank" class="social-icon fb" title="Facebook">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			<?php endif; ?>
			
			<?php if (get_theme_mod ( 'themeslug_show_gplus') == 'value1'  ) : ?>		
				<a href="<?php echo get_theme_mod( 'themeslug_gplus' ); ?>" target="_blank" class="social-icon gplus" title="Google+">
					<span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
					</span>
				</a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar site-navigation navbar-toggleable-md" itemscope="itemscope"
		     itemtype="http://schema.org/SiteNavigationElement">

				<!-- Logo Left, Nav Right -->
				<?php if (get_theme_mod('themeslug_logo_position') == 'value1') { ?>
					<?php get_template_part( 'partials/logo', 'left-nav-right' ); ?>

				<!-- Logo Right, Nav Left -->
				<?php } elseif (get_theme_mod('themeslug_logo_position') == 'value2') { ?>
					<?php get_template_part( 'partials/logo', 'right-nav-left' ); ?>

				<!-- Logo Above, Nav Below -->
				<?php } elseif (get_theme_mod('themeslug_logo_position') == 'value3') { ?>
					<?php get_template_part( 'partials/logo', 'above-nav-below' ); ?>

				<!-- Logo Below, Nav Above -->
				<?php } elseif (get_theme_mod('themeslug_logo_position') == 'value4') { ?>
					<?php get_template_part( 'partials/logo', 'below-nav-above' ); ?>
				<?php } ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
	
	<div id="main-content">
		
		<?php if (!is_page('reviews')) : ?>
			<?php if (get_theme_mod ( 'themeslug_bar_reviews_on') == 'value1'  ) : ?>
				<?php get_template_part( 'partials/bar', 'reviews' ); ?>
			<?php endif; ?>	
		<?php endif; ?>