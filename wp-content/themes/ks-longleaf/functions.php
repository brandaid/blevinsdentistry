<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140711', true );

	$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
	$font_url = twentytwelve_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears when selecting a page template with a sidebar.', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'First row of footer widgets. Only one space is available in this row.', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-inner">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-3',
		'description' => __( 'Second row of footer widgets. Three spaces avaiable.', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-inner">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();
	
	if ( is_page_template( 'page-templates/front-page.php' ) )
		$classes[] = 'front-page-template';
		
	if ( is_page_template( 'page-templates/with-sidebar.php' ) )
		$classes[] = 'with-sidebar';
		
	if ( is_page_template( 'page-templates/front-page-with-sidebar.php' ) )
		$classes[] = 'front-page-with-sidebar';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
/***************************************** Header Sections (Theme Customizer) *****************************************/
/** Custom logo upload **/
function themeslug_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Header - Logo', 'themeslug' ),
    'priority'    => 20,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'themeslug_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
    'priority'    => 1
) ) );


/***************************************** Contact Info (Theme Customizer) *****************************************/
$wp_customize->add_section( 'themeslug_contact_section' , array(
    'title'       => __( 'Contact Info', 'themeslug' ),
    'priority'    => 24,
    'description' => 'Phone, address, hours',
) );
$wp_customize->add_setting( 
	'themeslug_phone',
	array (
		'default' => '123-456-7890',
		) );
$wp_customize->add_control( 'themeslug_phone', array(
    'label'    => __( 'Phone', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 1
) );
$wp_customize->add_setting( 
	'themeslug_address',
	array (
		'default' => '123 Fake St, Atlanta, GA 30022',
		) );
$wp_customize->add_control( 'themeslug_address', array(
    'label'    => __( 'Address', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_hours',
	array (
		'default' => 'Mon - Fri: 8:00am - 5:00pm',
		 ) );
$wp_customize->add_control( 'themeslug_hours', array(
    'label'    => __( 'Hours', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 3
) );

/** Google Map **/
$wp_customize->add_setting( 'themeslug_gmap',
	array (
		'default' => '&nbsp;', 
		) );
$wp_customize->add_control( 'themeslug_gmap', array(
    'label'    => __( 'Google Map Embed Link', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 4,
 ) );
$wp_customize->add_setting( 'themeslug_gmap-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_gmap-off', array(
    'label'    => __( 'Hide the Google Map', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'checkbox',
    'priority'    => 5,
) );

/***************************************** Feature Header (Theme Customizer) *****************************************/

$wp_customize->add_section( 'themeslug_fheader_section' , array(
    'title'       => __( 'Feature Header', 'themeslug' ),
    'priority'    => 28,
    'description' => 'aka "The Slider"',
) );
$wp_customize->add_setting( 'themeslug_fheader-title',
	array (
		'default' => 'This is a default feature title.', 
		) );
$wp_customize->add_control( 'themeslug_fheader-title', array(
    'label'    => __( 'Feature Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_fheader-descr',
	array (
		'default' => 'This is the feature description.', 
		) );
$wp_customize->add_control( 'themeslug_fheader-descr', array(
    'label'    => __( 'Feature description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_fheader-button',
	array (
		'default' => 'Learn More', 
) );
$wp_customize->add_control( 'themeslug_fheader-button', array(
    'label'    => __( 'Button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 3
) );
$wp_customize->add_setting( 'themeslug_fheader-link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_fheader-link', array(
    'label'    => __( 'Button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_fheader-pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_fheader-pic', array(
    'label'    => __( 'Feature Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_fheader-pic',
    'priority'    => 5
) ) );
$wp_customize->add_setting( 'themeslug_change_to_slider' );
$wp_customize->add_control( 'themeslug_change_to_slider', array(
    'label'    => __( 'Change to animated slider', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_slide1_title',
	array (
		'default' => 'This is the first slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide1_title', array(
    'label'    => __( 'Slide 1 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_slide1_descr',
	array (
		'default' => 'This is the description for the first slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide1_descr', array(
    'label'    => __( 'Slide 1 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 8
) );

$wp_customize->add_setting( 'themeslug_slide1_link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_slide1_link', array(
    'label'    => __( 'Slide 1 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_slide1_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide1_pic', array(
    'label'    => __( 'Slide 1 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide1_pic',
    'priority'    => 11
) ) );
$wp_customize->add_setting( 'themeslug_hide_slide1' );
$wp_customize->add_control( 'themeslug_hide_slide1', array(
    'label'    => __( 'Hide Slide 1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 12
) );
$wp_customize->add_setting( 'themeslug_slide2_title',
	array (
		'default' => 'This is the second slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide2_title', array(
    'label'    => __( 'Slide 2 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 13
) );
$wp_customize->add_setting( 'themeslug_slide2_descr',
	array (
		'default' => 'This is the description for the second slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide2_descr', array(
    'label'    => __( 'Slide 2 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 14
) );

$wp_customize->add_setting( 'themeslug_slide2_link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_slide2_link', array(
    'label'    => __( 'Slide 2 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 16
) );
$wp_customize->add_setting( 'themeslug_slide2_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide2_pic', array(
    'label'    => __( 'Slide 2 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide2_pic',
    'priority'    => 17
) ) );
$wp_customize->add_setting( 'themeslug_hide_slide2' );
$wp_customize->add_control( 'themeslug_hide_slide2', array(
    'label'    => __( 'Hide Slide 2', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 18
) );
$wp_customize->add_setting( 'themeslug_slide3_title',
	array (
		'default' => 'This is the third slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide3_title', array(
    'label'    => __( 'Slide 3 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 19
) );
$wp_customize->add_setting( 'themeslug_slide3_descr',
	array (
		'default' => 'This is the description for the third slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide3_descr', array(
    'label'    => __( 'Slide 3 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 20
) );

$wp_customize->add_setting( 'themeslug_slide3_link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_slide3_link', array(
    'label'    => __( 'Slide 3 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 22
) );
$wp_customize->add_setting( 'themeslug_slide3_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide3_pic', array(
    'label'    => __( 'Slide 3 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide3_pic',
    'priority'    => 23
) ) );
$wp_customize->add_setting( 'themeslug_hide_slide3' );
$wp_customize->add_control( 'themeslug_hide_slide3', array(
    'label'    => __( 'Hide Slide 3', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 24
) );
$wp_customize->add_setting( 'themeslug_slide4_title',
	array (
		'default' => 'This is the fourth slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide4_title', array(
    'label'    => __( 'Slide 4 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 25
) );
$wp_customize->add_setting( 'themeslug_slide4_descr',
	array (
		'default' => 'This is the description for the fourth slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide4_descr', array(
    'label'    => __( 'Slide 4 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 26
) );

$wp_customize->add_setting( 'themeslug_slide4_link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_slide4_link', array(
    'label'    => __( 'Slide 4 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 28
) );
$wp_customize->add_setting( 'themeslug_slide4_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide4_pic', array(
    'label'    => __( 'Slide 4 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide4_pic',
    'priority'    => 29
) ) );
$wp_customize->add_setting( 'themeslug_hide_slide4' );
$wp_customize->add_control( 'themeslug_hide_slide4', array(
    'label'    => __( 'Hide Slide 4', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 30
) );
$wp_customize->add_setting( 'themeslug_slide5_title',
	array (
		'default' => 'This is the fifth slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide5_title', array(
    'label'    => __( 'Slide 5 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 31
) );
$wp_customize->add_setting( 'themeslug_slide5_descr',
	array (
		'default' => 'This is the description for the fifth slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide5_descr', array(
    'label'    => __( 'Slide 5 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 32
) );

$wp_customize->add_setting( 'themeslug_slide5_link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_slide5_link', array(
    'label'    => __( 'Slide 5 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 34
) );
$wp_customize->add_setting( 'themeslug_slide5_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide5_pic', array(
    'label'    => __( 'Slide 5 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide5_pic',
    'priority'    => 35
) ) );
$wp_customize->add_setting( 'themeslug_hide_slide5' );
$wp_customize->add_control( 'themeslug_hide_slide5', array(
    'label'    => __( 'Hide Slide 5', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 36
) );
$wp_customize->add_setting( 'themeslug_slide6_title',
	array (
		'default' => 'This is the sixth slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide6_title', array(
    'label'    => __( 'Slide 6 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 37
) );
$wp_customize->add_setting( 'themeslug_slide6_descr',
	array (
		'default' => 'This is the description for the sixth slide.', 
		) );
$wp_customize->add_control( 'themeslug_slide6_descr', array(
    'label'    => __( 'Slide 6 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 38
) );

$wp_customize->add_setting( 'themeslug_slide6_link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_slide6_link', array(
    'label'    => __( 'Slide 6 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 39
) );
$wp_customize->add_setting( 'themeslug_slide6_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide6_pic', array(
    'label'    => __( 'Slide 6 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide6_pic',
    'priority'    => 40
) ) );
$wp_customize->add_setting( 'themeslug_hide_slide6' );
$wp_customize->add_control( 'themeslug_hide_slide6', array(
    'label'    => __( 'Hide Slide 6', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 41
) );

/***************************************** Anchor Post *****************************************/
$wp_customize->add_section( 'themeslug_anchor-post_section' , array(
    'title'       => __( 'Headline / Anchor Post', 'themeslug' ),
    'priority'    => 29,
    'description' => 'Headline / Anchor Post',
) );
$wp_customize->add_setting( 'themeslug_anchor-post-title',
	array (
		'default' => 'Headline / Anchor Post title', 
		) );
$wp_customize->add_control( 'themeslug_anchor-post-title', array(
    'label'    => __( 'Anchor Post Title', 'themeslug' ),
    'section'  => 'themeslug_anchor-post_section',
    'type' => 'text',
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_anchor-post-url' );
$wp_customize->add_control( 'themeslug_anchor-post-url', array(
    'label'    => __( 'Headline / Anchor Post Link', 'themeslug' ),
    'section'  => 'themeslug_anchor-post_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_anchor-post-off' );
$wp_customize->add_control( 'themeslug_anchor-post-off', array(
    'label'    => __( 'Hide Headline / Anchor Post', 'themeslug' ),
    'section'  => 'themeslug_anchor-post_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 3
) );

/***************************************** Feature Boxes (Theme Customizer) *****************************************/

$wp_customize->add_section( 'themeslug_fboxes_section' , array(
    'title'       => __( 'Feature Boxes', 'themeslug' ),
    'priority'    => 31,
    'description' => '3 Feature Boxes',
) );
$wp_customize->add_setting( 'themeslug_fboxes-off');
$wp_customize->add_control( 'themeslug_fboxes-off', array(
    'label'    => __( 'Hide 3 Feature Boxes', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );

$wp_customize->add_setting( 'themeslug_fboxes-count');
$wp_customize->add_control( 'themeslug_fboxes-count', array(
    'label'    => __( 'Select Number of Boxes', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'select',
    'default' => '3 Boxes',
    'choices' => array(
    	'value1' => '3 Boxes',
    	'value2' => '4 Boxes',
    	),
    'priority'    => 3
) );

/** Box One **/
$wp_customize->add_setting( 'themeslug_box-one-title',
	array (
		'default' => 'Default Box Title 1', 
		) );
$wp_customize->add_control( 'themeslug_box-one-title', array(
    'label'    => __( 'Box 1 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_box-one-pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_box-one-pic', array(
    'label'    => __( 'Box 1 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_box-one-pic',
    'priority'    => 5
) ) ); 
$wp_customize->add_setting( 'themeslug_box-one-link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_box-one-link', array(
    'label'    => __( 'Box 1 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_box-one-descr',
	array (
		'default' => 'This is a description.', 
		) );
$wp_customize->add_control( 'themeslug_box-one-descr', array(
    'label'    => __( 'Box 1 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 7
 ) );

/** Box Two **/
$wp_customize->add_setting( 'themeslug_box-two-title',
	array (
		'default' => 'Default Box Title 2', 
		) );
$wp_customize->add_control( 'themeslug_box-two-title', array(
    'label'    => __( 'Box 2 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 8
) );
$wp_customize->add_setting( 'themeslug_box-two-pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_box-two-pic', array(
    'label'    => __( 'Box 2 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_box-two-pic',
    'priority'    => 9
) ) );
$wp_customize->add_setting( 'themeslug_box-two-link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_box-two-link', array(
    'label'    => __( 'Box 2 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_box-two-descr',
	array (
		'default' => 'This is a description.', 
		) );
$wp_customize->add_control( 'themeslug_box-two-descr', array(
    'label'    => __( 'Box 2 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 11
 ) );

/** Box Three **/
$wp_customize->add_setting( 'themeslug_box-three-title',
	array (
		'default' => 'Default Box Title 3', 
		) );
$wp_customize->add_control( 'themeslug_box-three-title', array(
    'label'    => __( 'Box 3 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 12
) );
$wp_customize->add_setting( 'themeslug_box-three-pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_box-three-pic', array(
    'label'    => __( 'Box 3 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_box-three-pic',
    'priority'    => 13
) ) );
$wp_customize->add_setting( 'themeslug_box-three-link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_box-three-link', array(
    'label'    => __( 'Box 3 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 14
) );
$wp_customize->add_setting( 'themeslug_box-three-descr',
	array (
		'default' => 'This is a description.', 
		) );
$wp_customize->add_control( 'themeslug_box-three-descr', array(
    'label'    => __( 'Box 3 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 15
 ) );
 
 /** Box Four **/
$wp_customize->add_setting( 'themeslug_box-four-title',
	array (
		'default' => 'Default Box Title 4', 
		) );
$wp_customize->add_control( 'themeslug_box-four-title', array(
    'label'    => __( 'Box 4 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 16
) );
$wp_customize->add_setting( 'themeslug_box-four-pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_box-four-pic', array(
    'label'    => __( 'Box 4 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_box-four-pic',
    'priority'    => 17
) ) );
$wp_customize->add_setting( 'themeslug_box-four-link',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_box-four-link', array(
    'label'    => __( 'Box 4 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 18
) );
$wp_customize->add_setting( 'themeslug_box-four-descr',
	array (
		'default' => 'This is a description.', 
		) );
$wp_customize->add_control( 'themeslug_box-four-descr', array(
    'label'    => __( 'Box 4 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 19
 ) );
 
/***************************************** Other Elements (Theme Customizer) *****************************************/

$wp_customize->add_section( 'themeslug_other_elements_section' , array(
    'title'       => __( 'Other Elements', 'themeslug' ),
    'priority'    => 32,
    'description' => 'Other elements',
) );
$wp_customize->add_setting( 'themeslug_hide_number_popup');
$wp_customize->add_control( 'themeslug_hide_number_popup', array(
    'label'    => __( 'Hide Phone number popup', 'themeslug' ),
    'section'  => 'themeslug_other_elements_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );

$wp_customize->add_setting( 'themeslug_hide_slide_out_form');
$wp_customize->add_control( 'themeslug_hide_slide_out_form', array(
    'label'    => __( 'Hide slide out Ask a Question form', 'themeslug' ),
    'section'  => 'themeslug_other_elements_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 2
) );
 
/***************************************** Footer (Theme Customizer) *****************************************/

$wp_customize->add_section( 'themeslug_footer-about_section' , array(
    'title'       => __( 'Footer - About', 'themeslug' ),
    'priority'    => 33,
    'description' => 'About text in footer.',
) );

class HBC_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    }
}

/* About Text */
$wp_customize->add_setting( 'themeslug_about-text',
	array (
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut placerat lorem tortor, eget interdum quam. Ut sit amet urna nunc, sed gravida nisi. Vivamus in elit eget nisl egestas egestas et nec lectus.', 
		) );
$wp_customize->add_control( new HBC_Customize_Textarea_Control( $wp_customize, 'themeslug_footer-about_section', array(
    'label'   => 'Content',
    'section' => 'themeslug_footer-about_section',
    'settings'   => 'themeslug_about-text',
) ) );
/* Footer Disclaimer */
$wp_customize->add_section( 'themeslug_disclaimer_section' , array(
    'title'       => __( 'Footer - Disclaimer', 'themeslug' ),
    'priority'    => 35,
    'description' => 'Footer Disclaimer',
) );
$wp_customize->add_setting( 'themeslug_disclaimer',
	array (
		'default' => '&nbsp;', 
		) );
$wp_customize->add_control( 'themeslug_disclaimer', array(
    'label'    => __( 'Footer Disclaimer', 'themeslug' ),
    'section'  => 'themeslug_disclaimer_section',
    'type' => 'text',
    'priority'    => 1,
 ) );
$wp_customize->add_setting( 'themeslug_disclaimer-off' );
$wp_customize->add_control( 'themeslug_disclaimer-off', array(
    'label'    => __( 'Hide Disclaimer', 'themeslug' ),
    'section'  => 'themeslug_disclaimer_section',
    'type' => 'checkbox',
    'priority'    => 2,
) );

/***************************************** Social Buttons (Theme Customizer) *****************************************/

$wp_customize->add_section( 'themeslug_social_section' , array(
    'title'       => __( 'Footer - Social URLs', 'themeslug' ),
    'priority'    => 36,
    'description' => 'Social button URLs',
) );
$wp_customize->add_setting( 'themeslug_facebook',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_facebook', array(
    'label'    => __( 'Facebook URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 1,
 ) );
$wp_customize->add_setting( 'themeslug_facebook-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_facebook-off', array(
    'label'    => __( 'Hide Facebok', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 2,
) );
 
/*** Google Plus (Theme Customizer) ***/
$wp_customize->add_setting( 'themeslug_gplus',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_gplus', array(
    'label'    => __( 'Google+ URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 3,
 ) );
$wp_customize->add_setting( 'themeslug_gplus-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_gplus-off', array(
    'label'    => __( 'Hide Google+', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 4,
) );

/*** Twitter (Theme Customizer) ***/
$wp_customize->add_setting( 'themeslug_twitter',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_twitter', array(
    'label'    => __( 'Twitter URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 5,
 ) );
$wp_customize->add_setting( 'themeslug_twitter-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_twitter-off', array(
    'label'    => __( 'Hide Twitter', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 6,
) );
 
/*** Instagram (Theme Customizer) ***/
$wp_customize->add_setting( 'themeslug_instagram',
	array (
		'default' => '#',
		 ) );
$wp_customize->add_control( 'themeslug_instagram', array(
    'label'    => __( 'Instagram URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 7,
) );
$wp_customize->add_setting( 'themeslug_instagram-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_instagram-off', array(
    'label'    => __( 'Hide Instagram', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 8,
) );

/*** LinkedIn (Theme Customizer) ***/
$wp_customize->add_setting( 'themeslug_linkedin',
	array (
		'default' => '#',
		 ) );
$wp_customize->add_control( 'themeslug_linkedin', array(
    'label'    => __( 'LinkedIn URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 9,
) );
$wp_customize->add_setting( 'themeslug_linkedin-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_linkedin-off', array(
    'label'    => __( 'Hide LinkedIn', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 10,
) );

/*** Pinterest (Theme Customizer) ***/
$wp_customize->add_setting( 'themeslug_pinterest',
	array (
		'default' => '#',
		 ) );
$wp_customize->add_control( 'themeslug_pinterest', array(
    'label'    => __( 'Pinterest URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 11,
) );
$wp_customize->add_setting( 'themeslug_pinterest-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_pinterest-off', array(
    'label'    => __( 'Hide Pinterest', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 12,
) );

/*** YouTube (Theme Customizer) ***/
$wp_customize->add_setting( 'themeslug_youtube',
	array (
		'default' => '#',
		 ) );
$wp_customize->add_control( 'themeslug_youtube', array(
    'label'    => __( 'YouTube URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 13,
) );
$wp_customize->add_setting( 'themeslug_youtube-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_youtube-off', array(
    'label'    => __( 'Hide YouTube', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 14,
) );

/*** FourSquare (Theme Customizer) ***/
$wp_customize->add_setting( 'themeslug_foursquare',
	array (
		'default' => '#',
		 ) );
$wp_customize->add_control( 'themeslug_foursquare', array(
    'label'    => __( 'FourSquare URL', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'text',
    'priority'    => 15,
) );
$wp_customize->add_setting( 'themeslug_foursquare-off',
	array (
		'default' => '#', 
) );
$wp_customize->add_control( 'themeslug_foursquare-off', array(
    'label'    => __( 'Hide FourSquare', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 16,
) );

/***************************************** Mobile Options (Theme Customizer) *****************************************/

$wp_customize->add_section( 'themeslug_mobile_section' , array(
    'title'       => __( 'Mobile Options', 'themeslug' ),
    'priority'    => 37,
    'description' => 'Options for mobile',
) );
$wp_customize->add_setting( 'themeslug_mobile_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_mobile_logo', array(
    'label'    => __( 'Mobile Logo', 'themeslug' ),
    'section'  => 'themeslug_mobile_section',
    'settings' => 'themeslug_mobile_logo',
    'priority'    => 1
) ) );
$wp_customize->add_setting( 'themeslug_mobile_email',
	array (
		'default' => 'info@killersharkmarketing.com',
		 ) );
$wp_customize->add_control( 'themeslug_mobile_email', array(
    'label'    => __( 'Email button link', 'themeslug' ),
    'section'  => 'themeslug_mobile_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_mobile_map',
	array (
		'default' => '#',
		 ) );
$wp_customize->add_control( 'themeslug_mobile_map', array(
    'label'    => __( 'Map button link', 'themeslug' ),
    'section'  => 'themeslug_mobile_section',
    'type' => 'text',
    'priority'    => 3
) );

/***************************************** Review Us (Theme Customizer) *****************************************/

$wp_customize->add_section( 'themeslug_reviews_section' , array(
    'title'       => __( 'Review Us links', 'themeslug' ),
    'priority'    => 38,
    'description' => 'Links to review sites the client is listed on. Users will see these when they use the Rate Us function and select 4 stars or higher.',
) );
$wp_customize->add_setting( 'themeslug_gplus_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_gplus_rev', array(
    'label'    => __( 'Google+ Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 1,
 ) );
$wp_customize->add_setting( 'themeslug_gplus_rev_off' );
$wp_customize->add_control( 'themeslug_gplus_rev_off', array(
    'label'    => __( 'Hide Google+', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 2,
) );
$wp_customize->add_setting( 'themeslug_fb_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_fb_rev', array(
    'label'    => __( 'Facebook Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 3,
 ) );
$wp_customize->add_setting( 'themeslug_fb_rev_off' );
$wp_customize->add_control( 'themeslug_fb_rev_off', array(
    'label'    => __( 'Hide Facebook', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 4,
) );
$wp_customize->add_setting( 'themeslug_yelp_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_yelp_rev', array(
    'label'    => __( 'Yelp Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 5,
 ) );
$wp_customize->add_setting( 'themeslug_yelp_rev_off' );
$wp_customize->add_control( 'themeslug_yelp_rev_off', array(
    'label'    => __( 'Hide Yelp', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 6,
) );
$wp_customize->add_setting( 'themeslug_kudzu_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_kudzu_rev', array(
    'label'    => __( 'Kudzu Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 7,
 ) );
$wp_customize->add_setting( 'themeslug_kudzu_rev_off' );
$wp_customize->add_control( 'themeslug_kudzu_rev_off', array(
    'label'    => __( 'Hide Kudzu', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 8,
) );
$wp_customize->add_setting( 'themeslug_insiderpages_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_insiderpages_rev', array(
    'label'    => __( 'InsiderPages Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 9,
 ) );
$wp_customize->add_setting( 'themeslug_insiderpages_rev_off' );
$wp_customize->add_control( 'themeslug_insiderpages_rev_off', array(
    'label'    => __( 'Hide InsiderPages', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 10,
) );
$wp_customize->add_setting( 'themeslug_citysearch_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_citysearch_rev', array(
    'label'    => __( 'CitySearch Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 11,
 ) );
$wp_customize->add_setting( 'themeslug_citysearch_rev_off' );
$wp_customize->add_control( 'themeslug_citysearch_rev_off', array(
    'label'    => __( 'Hide CitySearch', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 12,
) );
$wp_customize->add_setting( 'themeslug_healthgrades_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_healthgrades_rev', array(
    'label'    => __( 'HealthGrades Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 13,
 ) );
$wp_customize->add_setting( 'themeslug_healthgrades_rev_off' );
$wp_customize->add_control( 'themeslug_healthgrades_rev_off', array(
    'label'    => __( 'Hide HealthGrades', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 14,
) );
$wp_customize->add_setting( 'themeslug_ratemds_rev',
	array (
		'default' => '#', 
		) );
$wp_customize->add_control( 'themeslug_ratemds_rev', array(
    'label'    => __( 'RateMDs Review URL', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'text',
    'priority'    => 15,
 ) );
$wp_customize->add_setting( 'themeslug_ratemds_rev_off' );
$wp_customize->add_control( 'themeslug_ratemds_rev_off', array(
    'label'    => __( 'Hide RateMDs', 'themeslug' ),
    'section'  => 'themeslug_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 16,
) );


/******** Colors *********/
$wp_customize->add_setting(
    'top-bar-header-color',
    array(
        'default' => '#f2f2f2',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'top-bar-color',
        array(
            'label' => 'Top bar background color',
            'section' => 'colors',
            'settings' => 'top-bar-header-color',
            'priority'    => 1
        )
    )
);
$wp_customize->add_setting(
    'prim-button-color',
    array(
        'default' => '#2e6da4',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'prim-button-color',
        array(
            'label' => 'Primary Button color',
            'section' => 'colors',
            'settings' => 'prim-button-color',
            'priority'    => 4
        )
    )
);
$wp_customize->add_setting(
    'prim-btn-hover',
    array(
        'default' => '#286090',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'prim-btn-hover',
        array(
            'label' => 'Primary Button hover color',
            'section' => 'colors',
            'settings' => 'prim-btn-hover',
            'priority'    => 5
        )
    )
);
$wp_customize->add_setting(
    'second-button-color',
    array(
        'default' => '#5bc0de',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'second-button-color',
        array(
            'label' => 'Secondary Button color',
            'section' => 'colors',
            'settings' => 'second-button-color',
            'priority'    => 6
        )
    )
);
$wp_customize->add_setting(
    'sec-btn-hover',
    array(
        'default' => '#289abc',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sec-btn-hover',
        array(
            'label' => 'Secondary Button hover color',
            'section' => 'colors',
            'settings' => 'sec-btn-hover',
            'priority'    => 7
        )
    )
);
$wp_customize->add_setting(
    'ter-button-color',
    array(
        'default' => '#d43f3a',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'ter-button-color',
        array(
            'label' => 'Feature/Slider header button color',
            'section' => 'colors',
            'settings' => 'ter-button-color',
            'priority'    => 8
        )
    )
);
$wp_customize->add_setting(
    'ter-button-color-hover',
    array(
        'default' => '#c9302c',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'ter-button-color-hover',
        array(
            'label' => 'Feature/Slider header button hover color',
            'section' => 'colors',
            'settings' => 'ter-button-color-hover',
            'priority'    => 9
        )
    )
);
$wp_customize->add_setting(
    'h1-color',
    array(
        'default' => '#444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'h1-color',
        array(
            'label' => 'H1 color',
            'section' => 'colors',
            'settings' => 'h1-color',
            'priority'    => 10
        )
    )
);
$wp_customize->add_setting(
    'h2-color',
    array(
        'default' => '#919191',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'h2-color',
        array(
            'label' => 'Other Header tag color (h2, h3, etc)',
            'section' => 'colors',
            'settings' => 'h2-color',
            'priority'    => 11
        )
    )
);
$wp_customize->add_setting(
    'a-color',
    array(
        'default' => '#006dcc',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'a-color',
        array(
            'label' => 'Content link color',
            'section' => 'colors',
            'settings' => 'a-color',
            'priority'    => 12
        )
    )
);
$wp_customize->add_setting(
    'ah-color',
    array(
        'default' => '#0658a0',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'ah-color',
        array(
            'label' => 'Content link hover color',
            'section' => 'colors',
            'settings' => 'ah-color',
            'priority'    => 13
        )
    )
);


}
add_action('customize_register', 'themeslug_theme_customizer');