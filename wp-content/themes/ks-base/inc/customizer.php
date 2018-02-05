<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'understrap_theme_layout_options', array(
			'title'       => __( '8. Blog Settings', 'understrap' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'understrap' ),
			'priority'    => 8,
		) );

		$wp_customize->add_setting( 'understrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'understrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'understrap' ),
					'description' => __( "Set sidebar's position. Can either be: right, left, both or none",
					'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'    => '20',
				)
			) );

		// How to display posts index page (home.php).
		$wp_customize->add_setting( 'understrap_posts_index_style', array(
			'default'           => 'default',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_posts_index_style', array(
					'label'       => __( 'Posts Index Style', 'understrap' ),
					'description' => __( 'Choose how to display latest posts', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_posts_index_style',
					'type'        => 'select',
					'choices'     => array(
						'default' => __( 'Default', 'understrap' ),
						'masonry' => __( 'Masonry', 'understrap' ),
						'grid'    => __( 'Grid', 'understrap' ),
					),
					'priority'    => '30',
				)
			) );

		// Columns setup for grid posts.
		/**
		 * Function and callback to check when grid is enabled.
		 *
		 * @return bool
		 */
		function is_grid_enabled() {
			return 'grid' == get_theme_mod( 'understrap_posts_index_style' );
		}

		// How many columns to use each grid post.
		$wp_customize->add_setting( 'understrap_grid_post_columns', array(
			'default'    => '6',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_grid_post_columns', array(
					'label'       => __( 'Grid Post Columns', 'understrap' ),
					'description' => __( 'Choose how many columns to use', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_grid_post_columns',
					'type'        => 'select',
					'choices' => array(
					'6' => '2',
					'4' => '3',
					'3' => '4',
					'2' => '6',
					'12' => '1',
					),
					'default'     => 2,
					'priority'    => '30',
					'transport'   => 'refresh',
				)
			) );

		// hook to auto-hide/show depending the understrap_posts_index_style option.
		$wp_customize->get_control( 'understrap_grid_post_columns' )->active_callback = 'is_grid_enabled';

	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );


register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'ks-base' ),
) );

// Remove emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



/***************************************** Theme Customizer *****************************************/
function themeslug_theme_customizer( $wp_customize ) {

$wp_customize->add_panel( 'panel_1', array(
    'title' => '1. Global Settings',
    'description' => 'This panel contains header sections.',
    'priority' => 1,
) );
/***************************************** Site Identity *****************************************/
$wp_customize->add_section( 'title_tagline' , array(
    'title'       => __( 'Site Identity', 'themeslug' ),
    'priority'    => 10,
    'description' => 'Change the sites title and tagline.',
	'panel' => 'panel_1',
) );

/***************************************** Contact Info *****************************************/
$wp_customize->add_section( 'themeslug_contact_section' , array(
    'title'       => __( 'Contact Info', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Phone, address, hours',
    'panel' => 'panel_1',
) );
$wp_customize->add_setting( 'themeslug_schema_business_type' );
$wp_customize->add_control( 'themeslug_schema_business_type', array(
    'label'    => __( 'Schema Business Type', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'radio',
    'default' => 'LocalBusiness',
    'description' => 'Choose a business type that closest matches the client. Use LocalBusiness if nothing else comes close.',
    'choices' => array(
			'AccountingService' => 'AccountingService',
			'BankOrCreditUnion' => 'BankOrCreditUnion',
			'Dentist' => 'Dentist',
			'EmploymentAgency' => 'EmploymentAgency',
			'HealthAndBeautyBusiness' => 'HealthAndBeautyBusiness',
			'HomeAndConstructionBusiness' => 'HomeAndConstructionBusiness',
			'LocalBusiness' => 'LocalBusiness',
			'MedicalClinic' => 'MedicalClinic',
			'Optician' => 'Optician',
			'Physician' => 'Physician',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_hours',
	array (
		'default' => 'Mon - Fri: 8:00am - 5:00pm',
		 ) );
$wp_customize->add_control( 'themeslug_hours', array(
    'label'    => __( '-------------------------------------- Business Hours', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'These are the business hours that will be visible on the website.',
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_schema_hours_mon',
	array (
		'default' => '8:00 - 17:00',
		 ) );
$wp_customize->add_control( 'themeslug_schema_hours_mon', array(
    'label'    => __( '-------------------------------------- Schema Hours Monday', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'These are business hours for schema markup purposes. They are broken down by day. They must be entered in as 4 digit military time (08:00-17:00 -- do not enter am/pm). If the client is closed on a particular day, leave that day blank.',
    'priority'    => 3
) );
$wp_customize->add_setting( 'themeslug_schema_hours_tues',
	array (
		'default' => '8:00 - 17:00',
		 ) );
$wp_customize->add_control( 'themeslug_schema_hours_tues', array(
    'label'    => __( 'Schema Hours Tuesday', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'Enter military time',
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_schema_hours_weds',
	array (
		'default' => '8:00 - 17:00',
		 ) );
$wp_customize->add_control( 'themeslug_schema_hours_weds', array(
    'label'    => __( 'Schema Hours Wednesday', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'Enter military time',
    'priority'    => 5
) );
$wp_customize->add_setting( 'themeslug_schema_hours_thurs',
	array (
		'default' => '8:00 - 17:00',
		 ) );
$wp_customize->add_control( 'themeslug_schema_hours_thurs', array(
    'label'    => __( 'Schema Hours Thursday', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'Enter military time',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_schema_hours_fri',
	array (
		'default' => '8:00 - 17:00',
		 ) );
$wp_customize->add_control( 'themeslug_schema_hours_fri', array(
    'label'    => __( 'Schema Hours Friday', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'Enter military time',
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_schema_hours_sat',
	array (
		'default' => '8:00 - 17:00',
		 ) );
$wp_customize->add_control( 'themeslug_schema_hours_sat', array(
    'label'    => __( 'Schema Hours Saturday', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'Enter military time',
    'priority'    => 8
) );
$wp_customize->add_setting( 'themeslug_schema_hours_sun',
	array (
		'default' => '8:00 - 17:00',
		 ) );
$wp_customize->add_control( 'themeslug_schema_hours_sun', array(
    'label'    => __( 'Schema Hours Sunday', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'description' => 'Enter military time',
    'priority'    => 9
) );

/* Location 1 */
$wp_customize->add_setting(
	'themeslug_loc1_name',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc1_name', array(
    'label'    => __( '-------------------------------------- Location 1 - Name', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 10
) );
$wp_customize->add_setting(
	'themeslug_phone',
	array (
		'default' => '123-456-7890',
		) );
$wp_customize->add_control( 'themeslug_phone', array(
    'label'    => __( 'Location 1 - Phone', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 11
) );
$wp_customize->add_setting(
	'themeslug_address_street',
	array (
		'default' => '123 Fake St',
		) );
$wp_customize->add_control( 'themeslug_address_street', array(
    'label'    => __( 'Location 1 - Street Address', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 12
) );
$wp_customize->add_setting(
	'themeslug_address_city',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_address_city', array(
    'label'    => __( 'Location 1 - City', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 13
) );
$wp_customize->add_setting(
	'themeslug_address_state',
	array (
		'default' => 'GA',
		) );
$wp_customize->add_control( 'themeslug_address_state', array(
    'label'    => __( 'Location 1 - State', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 14
) );
$wp_customize->add_setting(
	'themeslug_address_zip',
	array (
		'default' => '30022',
		) );
$wp_customize->add_control( 'themeslug_address_zip', array(
    'label'    => __( 'Location 1 - ZIP', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 15
) );
$wp_customize->add_setting(
	'themeslug_gmap',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_gmap', array(
    'label'    => __( 'Location 1 - Google Map', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 16
) );
$wp_customize->add_setting(
	'themeslug_loc1_url',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc1_url', array(
    'label'    => __( 'Location 1 - URL', 'themeslug' ),
    'description' => 'Only necessary when the client has more than one location. This will populate the All Locations sidebar buttons on individual location pages.',
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 17
) );

/* Location 2 */
$wp_customize->add_setting(
	'themeslug_loc2_name',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc2_name', array(
    'label'    => __( '-------------------------------------- Location 2 - Name', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 18
) );
$wp_customize->add_setting(
	'themeslug_loc2_phone',
	array (
		'default' => '123-456-7890',
		) );
$wp_customize->add_control( 'themeslug_loc2_phone', array(
    'label'    => __( 'Location 2 - Phone', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 19
) );
$wp_customize->add_setting(
	'themeslug_loc2_address_street',
	array (
		'default' => '123 Fake St',
		) );
$wp_customize->add_control( 'themeslug_loc2_address_street', array(
    'label'    => __( 'Location 2 - Street Address', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 20
) );
$wp_customize->add_setting(
	'themeslug_loc2_address_city',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc2_address_city', array(
    'label'    => __( 'Location 2 - City', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 21
) );
$wp_customize->add_setting(
	'themeslug_loc2_address_state',
	array (
		'default' => 'GA',
		) );
$wp_customize->add_control( 'themeslug_loc2_address_state', array(
    'label'    => __( 'Location 2 - State', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 22
) );
$wp_customize->add_setting(
	'themeslug_loc2_address_zip',
	array (
		'default' => '30022',
		) );
$wp_customize->add_control( 'themeslug_loc2_address_zip', array(
    'label'    => __( 'Location 2 - ZIP', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 23
) );
$wp_customize->add_setting(
	'themeslug_loc2_gmap',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc2_gmap', array(
    'label'    => __( 'Location 2 - Google Map', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 24
) );
$wp_customize->add_setting(
	'themeslug_loc2_url',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc2_url', array(
    'label'    => __( 'Location 2 - URL', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 25
) );

/* Location 3 */
$wp_customize->add_setting(
	'themeslug_loc3_name',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc3_name', array(
    'label'    => __( '-------------------------------------- Location 3 - Name', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 26
) );
$wp_customize->add_setting(
	'themeslug_loc3_phone',
	array (
		'default' => '123-456-7890',
		) );
$wp_customize->add_control( 'themeslug_loc3_phone', array(
    'label'    => __( 'Location 3 - Phone', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 27
) );
$wp_customize->add_setting(
	'themeslug_loc3_address_street',
	array (
		'default' => '123 Fake St',
		) );
$wp_customize->add_control( 'themeslug_loc3_address_street', array(
    'label'    => __( 'Location 3 - Street Address', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 28
) );
$wp_customize->add_setting(
	'themeslug_loc3_address_city',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc3_address_city', array(
    'label'    => __( 'Location 3 - City', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 29
) );
$wp_customize->add_setting(
	'themeslug_loc3_address_state',
	array (
		'default' => 'GA',
		) );
$wp_customize->add_control( 'themeslug_loc3_address_state', array(
    'label'    => __( 'Location 3 - State', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 30
) );
$wp_customize->add_setting(
	'themeslug_loc3_address_zip',
	array (
		'default' => '30022',
		) );
$wp_customize->add_control( 'themeslug_loc3_address_zip', array(
    'label'    => __( 'Location 3 - ZIP', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 31
) );
$wp_customize->add_setting(
	'themeslug_loc3_gmap',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc3_gmap', array(
    'label'    => __( 'Location 3 - Google Map', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 32
) );
$wp_customize->add_setting(
	'themeslug_loc3_url',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc3_url', array(
    'label'    => __( 'Location 3 - URL', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 33
) );

/* Location 4 */
$wp_customize->add_setting(
	'themeslug_loc4_name',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc4_name', array(
    'label'    => __( '-------------------------------------- Location 4 - Name', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 34
) );
$wp_customize->add_setting(
	'themeslug_loc4_phone',
	array (
		'default' => '123-456-7890',
		) );
$wp_customize->add_control( 'themeslug_loc4_phone', array(
    'label'    => __( 'Location 4 - Phone', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 35
) );
$wp_customize->add_setting(
	'themeslug_loc4_address_street',
	array (
		'default' => '123 Fake St',
		) );
$wp_customize->add_control( 'themeslug_loc4_address_street', array(
    'label'    => __( 'Location 4 - Street Address', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 36
) );
$wp_customize->add_setting(
	'themeslug_loc4_address_city',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc4_address_city', array(
    'label'    => __( 'Location 4 - City', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 37
) );
$wp_customize->add_setting(
	'themeslug_loc4_address_state',
	array (
		'default' => 'GA',
		) );
$wp_customize->add_control( 'themeslug_loc4_address_state', array(
    'label'    => __( 'Location 4 - State', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 38
) );
$wp_customize->add_setting(
	'themeslug_loc4_address_zip',
	array (
		'default' => '30022',
		) );
$wp_customize->add_control( 'themeslug_loc4_address_zip', array(
    'label'    => __( 'Location 4 - ZIP', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 39
) );
$wp_customize->add_setting(
	'themeslug_loc4_gmap',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc4_gmap', array(
    'label'    => __( 'Location 4 - Google Map', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 40
) );
$wp_customize->add_setting(
	'themeslug_loc4_url',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc4_url', array(
    'label'    => __( 'Location 4 - URL', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 41
) );

/* Location 5 */
$wp_customize->add_setting(
	'themeslug_loc5_name',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc5_name', array(
    'label'    => __( '-------------------------------------- Location 5 - Name', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 42
) );
$wp_customize->add_setting(
	'themeslug_loc5_phone',
	array (
		'default' => '123-456-7890',
		) );
$wp_customize->add_control( 'themeslug_loc5_phone', array(
    'label'    => __( 'Location 5 - Phone', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 43
) );
$wp_customize->add_setting(
	'themeslug_loc5_address_street',
	array (
		'default' => '123 Fake St',
		) );
$wp_customize->add_control( 'themeslug_loc5_address_street', array(
    'label'    => __( 'Location 5 - Street Address', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 44
) );
$wp_customize->add_setting(
	'themeslug_loc5_address_city',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc5_address_city', array(
    'label'    => __( 'Location 5 - City', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 45
) );
$wp_customize->add_setting(
	'themeslug_loc5_address_state',
	array (
		'default' => 'GA',
		) );
$wp_customize->add_control( 'themeslug_loc5_address_state', array(
    'label'    => __( 'Location 5 - State', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 46
) );
$wp_customize->add_setting(
	'themeslug_loc5_address_zip',
	array (
		'default' => '30022',
		) );
$wp_customize->add_control( 'themeslug_loc5_address_zip', array(
    'label'    => __( 'Location 5 - ZIP', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 47
) );
$wp_customize->add_setting(
	'themeslug_loc5_gmap',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc5_gmap', array(
    'label'    => __( 'Location 5 - Google Map', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 48
) );
$wp_customize->add_setting(
	'themeslug_loc5_url',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc5_url', array(
    'label'    => __( 'Location 5 - URL', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 49
) );

/* Location 6 */
$wp_customize->add_setting(
	'themeslug_loc6_name',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc6_name', array(
    'label'    => __( '-------------------------------------- Location 6 - Name', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 50
) );
$wp_customize->add_setting(
	'themeslug_loc6_phone',
	array (
		'default' => '123-456-7890',
		) );
$wp_customize->add_control( 'themeslug_loc6_phone', array(
    'label'    => __( 'Location 6 - Phone', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 51
) );
$wp_customize->add_setting(
	'themeslug_loc6_address_street',
	array (
		'default' => '123 Fake St',
		) );
$wp_customize->add_control( 'themeslug_loc6_address_street', array(
    'label'    => __( 'Location 6 - Street Address', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 52
) );
$wp_customize->add_setting(
	'themeslug_loc6_address_city',
	array (
		'default' => 'Some Town',
		) );
$wp_customize->add_control( 'themeslug_loc6_address_city', array(
    'label'    => __( 'Location 6 - City', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 53
) );
$wp_customize->add_setting(
	'themeslug_loc6_address_state',
	array (
		'default' => 'GA',
		) );
$wp_customize->add_control( 'themeslug_loc6_address_state', array(
    'label'    => __( 'Location 6 - State', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 54
) );
$wp_customize->add_setting(
	'themeslug_loc6_address_zip',
	array (
		'default' => '30022',
		) );
$wp_customize->add_control( 'themeslug_loc6_address_zip', array(
    'label'    => __( 'Location 6 - ZIP', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 55
) );
$wp_customize->add_setting(
	'themeslug_loc6_gmap',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc6_gmap', array(
    'label'    => __( 'Location 6 - Google Map', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 56
) );
$wp_customize->add_setting(
	'themeslug_loc6_url',
	array (
		'default' => '',
		) );
$wp_customize->add_control( 'themeslug_loc6_url', array(
    'label'    => __( 'Location 6 - URL', 'themeslug' ),
    'section'  => 'themeslug_contact_section',
    'type' => 'text',
    'priority'    => 57
) );


/***************************************** Colors *****************************************/
$wp_customize->add_section( 'colors' , array(
    'title'       => __( 'Colors', 'themeslug' ),
    'priority'    => 50,
    'description' => 'Theme Colors',
	'panel' => 'panel_1',
) );
$wp_customize->add_setting(
    'prim_btn_color',
    array(
        'default' => '#2e6da4',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'prim_btn_color',
        array(
            'label' => 'Primary Button color',
            'section' => 'colors',
            'settings' => 'prim_btn_color',
            'priority'    => 4
        )
    )
);
$wp_customize->add_setting(
    'prim_btn_hover',
    array(
        'default' => '#286090',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'prim_btn_hover',
        array(
            'label' => 'Primary Button hover color',
            'section' => 'colors',
            'settings' => 'prim_btn_hover',
            'priority'    => 5
        )
    )
);
$wp_customize->add_setting(
    'second_btn_color',
    array(
        'default' => '#5bc0de',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'second_btn_color',
        array(
            'label' => 'Secondary Button color',
            'section' => 'colors',
            'settings' => 'second_btn_color',
            'priority'    => 6
        )
    )
);
$wp_customize->add_setting(
    'second_btn_hover',
    array(
        'default' => '#289abc',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'second_btn_hover',
        array(
            'label' => 'Secondary Button hover color',
            'section' => 'colors',
            'settings' => 'second_btn_hover',
            'priority'    => 7
        )
    )
);
$wp_customize->add_setting(
    'ter_btn_color',
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
            'label' => 'Tertiary button color',
            'section' => 'colors',
            'settings' => 'ter_btn_color',
            'priority'    => 8
        )
    )
);
$wp_customize->add_setting(
    'ter_btn_hover',
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
            'label' => 'Tertiary button hover color',
            'section' => 'colors',
            'settings' => 'ter_btn_hover',
            'priority'    => 9
        )
    )
);
$wp_customize->add_setting(
    'h1_color',
    array(
        'default' => '#444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'h1_color',
        array(
            'label' => 'H1 color',
            'section' => 'colors',
            'settings' => 'h1_color',
            'priority'    => 10
        )
    )
);
$wp_customize->add_setting(
    'h2_color',
    array(
        'default' => '#919191',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'h2_color',
        array(
            'label' => 'Other Header tag color (h2, h3, etc)',
            'section' => 'colors',
            'settings' => 'h2_color',
            'priority'    => 11
        )
    )
);
$wp_customize->add_setting(
    'a_color',
    array(
        'default' => '#006dcc',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'a_color',
        array(
            'label' => 'Content link color',
            'section' => 'colors',
            'settings' => 'a_color',
            'priority'    => 12
        )
    )
);
$wp_customize->add_setting(
    'ah_color',
    array(
        'default' => '#0658a0',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'ah_color',
        array(
            'label' => 'Content link hover color',
            'section' => 'colors',
            'settings' => 'ah_color',
            'priority'    => 13
        )
    )
);
/***************************************** Typography *****************************************/
$wp_customize->add_section( 'themeslug_typography' , array(
    'title'       => __( 'Typography', 'themeslug' ),
    'priority'    => 60,
    'description' => 'Theme Typography',
	'panel' => 'panel_1',
) );
$wp_customize->add_setting( 'themeslug_typography_primary' );
$wp_customize->add_control( 'themeslug_typography_primary', array(
    'label'    => __( 'Primary Font (headers)', 'themeslug' ),
    'section'  => 'themeslug_typography',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
			'value1' => 'Lato',
			'value2' => 'Open Sans',
			'value3' => 'Roboto',
			'value4' => 'Raleway',
			'value5' => 'Oswald',
			'value6' => 'Josefin Sans',
			'value7' => 'Montserrat',
			'value8' => 'Nunito',
			'value9' => 'PT Sans',
			'value10' => 'Ubuntu',
			'value11' => 'Didact Gothic',
			'value12' => 'Dosis',
			'value13' => 'Playfair Display',
			'value14' => 'Pacifico',
			'value15' => 'Lobster'
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_typography_primary_link_on' );
$wp_customize->add_control( 'themeslug_typography_primary_link_on', array(
    'label'    => __( '- Use Custom Font Link', 'themeslug' ),
    'section'  => 'themeslug_typography',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
			'value1' => 'No',
			'value2' => 'Yes',
    	),
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_typography_primary_link' );
$wp_customize->add_control( 'themeslug_typography_primary_link', array(
    'label'    => __( '-- Primary Custom Font Link', 'themeslug' ),
    'section'  => 'themeslug_typography',
    'type' => 'text',
    'default' => '',
    'priority'    => 5
) );
$wp_customize->add_setting( 'themeslug_typography_primary_link_css' );
$wp_customize->add_control( 'themeslug_typography_primary_link_css', array(
    'label'    => __( '--- Primary Custom Font Link CSS', 'themeslug' ),
    'section'  => 'themeslug_typography',
    'type' => 'text',
    'default' => '',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_typography_secondary' );
$wp_customize->add_control( 'themeslug_typography_secondary', array(
    'label'    => __( 'Secondary Font (paragraphs)', 'themeslug' ),
    'section'  => 'themeslug_typography',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
			'value1' => 'Lato',
			'value2' => 'Open Sans',
			'value3' => 'Roboto',
			'value4' => 'Raleway',
			'value5' => 'Oswald',
			'value6' => 'Josefin Sans',
			'value7' => 'Montserrat',
			'value8' => 'Nunito',
			'value9' => 'PT Sans',
			'value10' => 'Ubuntu',
			'value11' => 'Didact Gothic',
			'value12' => 'Dosis',
			'value13' => 'Playfair Display',
			'value14' => 'Pacifico',
			'value15' => 'Lobster'
    	),
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_typography_secondary_link_on' );
$wp_customize->add_control( 'themeslug_typography_secondary_link_on', array(
    'label'    => __( '- Use Custom Font Link', 'themeslug' ),
    'section'  => 'themeslug_typography',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
			'value1' => 'No',
			'value2' => 'Yes',
    	),
    'priority'    => 14
) );
$wp_customize->add_setting( 'themeslug_typography_secondary_link' );
$wp_customize->add_control( 'themeslug_typography_secondary_link', array(
	'label'    => __( '- Seconday Custom Font Link', 'themeslug' ),
	'section'  => 'themeslug_typography',
	'type' => 'text',
	'default' => '',
    'priority'    => 15
) );
$wp_customize->add_setting( 'themeslug_typography_secondary_link_css' );
$wp_customize->add_control( 'themeslug_typography_secondary_link_css', array(
    'label'    => __( '--- Secondary Custom Font Link CSS', 'themeslug' ),
    'section'  => 'themeslug_typography',
    'type' => 'text',
    'default' => '',
    'priority'    => 16
) );


/***************************************** Google Analytics *****************************************/

$wp_customize->add_section( 'themeslug_google_analytics_section' , array(
    'title'       => __( 'Google Analytics', 'themeslug' ),
    'priority'    => 70,
    'description' => 'Insert the full embed Google Analytics script. Include the script tags and all.',
		'panel' => 'panel_1',
) );
$wp_customize->add_setting( 'themeslug_google_analytics',
	array (
		'default' => '',
		) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'themeslug_google_analytics_section', array(
    'label'   => 'Google Analytics',
    'section' => 'themeslug_google_analytics_section',
    'settings'   => 'themeslug_google_analytics',
		'type'   => 'textarea',
) ) );
/***************************************** Other Elements *****************************************/

$wp_customize->add_section( 'themeslug_other_elements_section' , array(
    'title'       => __( 'Other Elements', 'themeslug' ),
    'priority'    => 80,
    'description' => 'Other elements',
    'panel' => 'panel_1',

) );
$wp_customize->add_setting( 'themeslug_show_bubble_phone');
$wp_customize->add_control( 'themeslug_show_bubble_phone', array(
    'label'    => __( 'Show Phone number bubble', 'themeslug' ),
    'section'  => 'themeslug_other_elements_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );

$wp_customize->add_setting( 'themeslug_show_slideout_form');
$wp_customize->add_control( 'themeslug_show_slideout_form', array(
    'label'    => __( 'Show slide out Ask a Question form', 'themeslug' ),
    'section'  => 'themeslug_other_elements_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_slideout_form_btn',
	array (
		'default' => 'Ask a Question',
	) );
$wp_customize->add_control( 'themeslug_slideout_form_btn', array(
    'label'    => __( 'Form Button Text', 'themeslug' ),
    'section'  => 'themeslug_other_elements_section',
    'type' => 'text',
    'priority'    => 3
) );
$wp_customize->add_setting( 'themeslug_slideout_form_header',
	array (
		'default' => 'We are here to answer your questions!',
	) );
$wp_customize->add_control( 'themeslug_slideout_form_header', array(
    'label'    => __( 'Form Header Text', 'themeslug' ),
    'section'  => 'themeslug_other_elements_section',
    'type' => 'text',
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_slideout_form_text',
	array (
		'default' => 'Fill out the form below and we will be in touch with shortly!',
	) );
$wp_customize->add_control( 'themeslug_slideout_form_text', array(
    'label'    => __( 'Form Text', 'themeslug' ),
    'section'  => 'themeslug_other_elements_section',
    'type' => 'text',
    'priority'    => 5
) );

/***************************************** Call to Action *****************************************/
$wp_customize->add_section( 'themeslug_cta_section' , array(
    'title'       => __( 'Call to Action', 'themeslug' ),
    'priority'    => 85,
    'panel' => 'panel_1',
) );
$wp_customize->add_setting( 'themeslug_cta_icon',
	array (
		'default' => 'commenting',
	) );
$wp_customize->add_control( 'themeslug_cta_icon', array(
    'label'    => __( 'Icon', 'themeslug' ),
    'section'  => 'themeslug_cta_section',
    'type' => 'text',
    'description' => 'enter an icon from fontawesome.io/icons',
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_cta_header_text',
	array (
		'default' => 'Schedule Your Appointment Now',
	) );
$wp_customize->add_control( 'themeslug_cta_header_text', array(
    'label'    => __( 'Header Text', 'themeslug' ),
    'section'  => 'themeslug_cta_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_cta_header_descr',
	array (
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut placerat lorem tortor, eget interdum quam. Ut sit amet urna nunc, sed gravida nisi.',
	) );
$wp_customize->add_control( 'themeslug_cta_header_descr', array(
    'label'    => __( 'Second line', 'themeslug' ),
    'section'  => 'themeslug_cta_section',
    'type' => 'text',
    'priority'    => 3
) );
$wp_customize->add_setting( 'themeslug_cta_btn_text',
	array (
		'default' => 'Make Your Appointment',
	) );
$wp_customize->add_control( 'themeslug_cta_btn_text', array(
    'label'    => __( 'Button Text', 'themeslug' ),
    'section'  => 'themeslug_cta_section',
    'type' => 'text',
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_cta_btn_url',
	array (
		'default' => '#',
	) );
$wp_customize->add_control( 'themeslug_cta_btn_url', array(
    'label'    => __( 'Button URL', 'themeslug' ),
    'section'  => 'themeslug_cta_section',
    'type' => 'text',
    'priority'    => 5
) );
$wp_customize->add_setting(
    'themeslug_cta_h2_color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_cta_h2_color',
        array(
            'label' => 'Header tag color',
            'section' => 'themeslug_cta_section',
            'settings' => 'themeslug_cta_h2_color',
            'priority'    => 6
        )
    )
);
$wp_customize->add_setting(
    'themeslug_cta_text_color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_cta_text_color',
        array(
            'label' => 'Text color',
            'section' => 'themeslug_cta_section',
            'settings' => 'themeslug_cta_text_color',
            'priority'    => 7
        )
    )
);
$wp_customize->add_setting(
    'themeslug_cta_bg_color',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_cta_bg_color',
        array(
            'label' => 'Background color',
            'section' => 'themeslug_cta_section',
            'settings' => 'themeslug_cta_bg_color',
            'priority'    => 8
        )
    )
);
$wp_customize->add_setting( 'themeslug_cta_bg_img' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_cta_bg_img', array(
    'label'    => __( 'Background Image', 'themeslug' ),
    'section'  => 'themeslug_cta_section',
    'settings' => 'themeslug_cta_bg_img',
    'priority'    => 9
) ) );
$wp_customize->add_setting(
    'themeslug_cta_overlay_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_cta_overlay_color',
        array(
            'label' => 'Overlay color',
            'section' => 'themeslug_cta_section',
            'settings' => 'themeslug_cta_overlay_color',
            'priority'    => 10
        )
    )
);
$wp_customize->add_setting( 'themeslug_cta_overlay_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_cta_overlay_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_cta_section',
    'type' => 'text',
    'priority'    => 11
) );


/***************************************** Background Image *****************************************/
$wp_customize->add_section( 'background_image' , array(
    'title'       => __( 'Background Image', 'themeslug' ),
    'priority'    => 90,
    'panel' => 'panel_1',
) );


/*
*
*
*
*
* 2. Header
*
*
*
*
*/
$wp_customize->add_panel( 'panel_2', array(
    'title' => '2. Header',
    'description' => 'This panel contains header sections.',
    'priority' => 2,
) );
/***************************************** Hello Bar *****************************************/
$wp_customize->add_section( 'themeslug_bar_hello_section' , array(
    'title'       => __( 'Hello Bar', 'themeslug' ),
    'priority'    => 1,
    'description' => 'for Important Announcements',
    'panel' => 'panel_2',
) );
$wp_customize->add_setting( 'themeslug_bar_hello_on' );
$wp_customize->add_control( 'themeslug_bar_hello_on', array(
    'label'    => __( 'Show Hello Bar', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting(
    'themeslug_bar_hello_bg',
    array(
        'default' => '#444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_hello_bg',
        array(
            'label' => 'Background Color',
            'section' => 'themeslug_bar_hello_section',
            'settings' => 'themeslug_bar_hello_bg',
            'priority'    => 2
        )
    )
);
$wp_customize->add_setting(
    'themeslug_bar_hello_a_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_hello_a_color',
        array(
            'label' => 'Link Color',
            'section' => 'themeslug_bar_hello_section',
            'settings' => 'themeslug_bar_hello_a_color',
            'priority'    => 3
        )
    )
);
$wp_customize->add_setting( 'themeslug_bar_hello_icon' );
$wp_customize->add_control( 'themeslug_bar_hello_icon', array(
    'label'    => __( 'Icon', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'select',
    'default' => 'Flag',
    'choices' => array(
    	'value1' => 'Flag',
    	'value2' => 'Bullhorn',
    	'value3' => 'Bell',
    	'value4' => 'Burst',
    	'value5' => 'Clock',
    	'value6' => 'Comment Bubble',
    	'value7' => 'Exclamation Point',
    	'value8' => 'Heart',
    	'value9' => 'Microphone',
    	'value10' => 'Shield'
    	),
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_bar_hello_text',
	array (
		'default' => 'An Important Announcement',
	) );
$wp_customize->add_control( 'themeslug_bar_hello_text', array(
    'label'    => __( 'Text Content', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'text',
    'priority'    => 5
) );
$wp_customize->add_setting( 'themeslug_bar_hello_url',
	array (
		'default' => '#',
	) );
$wp_customize->add_control( 'themeslug_bar_hello_url', array(
    'label'    => __( 'Link URL', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'text',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_bar_hello_padding',
	array (
		'default' => '6px',
	) );
$wp_customize->add_control( 'themeslug_bar_hello_padding', array(
    'label'    => __( 'Vertical Padding', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'text',
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_bar_hello_font_size',
	array (
		'default' => '12px',
) );
$wp_customize->add_control( 'themeslug_bar_hello_font_size', array(
    'label'    => __( 'Font Size', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'text',
    'priority'    => 8
) );
$wp_customize->add_setting( 'themeslug_bar_hello_text_transform',
	array (
		'default' => 'none',
) );
$wp_customize->add_control( 'themeslug_bar_hello_text_transform', array(
    'label'    => __( 'Text Align', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'text',
    'priority'    => 9
) );
$wp_customize->add_setting( 'themeslug_bar_hello_text_transform' );
$wp_customize->add_control( 'themeslug_bar_hello_text_transform', array(
    'label'    => __( 'Text Uppercase/Lowercase', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'select',
    'default' => 'Lowercase',
    'choices' => array(
    	'value1' => 'Uppercase',
    	'value2' => 'Lowercase',
    	),
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_bar_hello_text_align' );
$wp_customize->add_control( 'themeslug_bar_hello_text_align', array(
    'label'    => __( 'Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'select',
    'default' => 'Left',
    'choices' => array(
    	'value1' => 'Left',
    	'value2' => 'Center',
    	'value3' => 'Right',
    	),
    'priority'    => 11
) );
$wp_customize->add_setting( 'themeslug_bar_hello_btn_text',
	array (
		'default' => 'Go Here',
	) );
$wp_customize->add_control( 'themeslug_bar_hello_btn_text', array(
    'label'    => __( 'Button Text', 'themeslug' ),
    'section'  => 'themeslug_bar_hello_section',
    'type' => 'text',
    'priority'    => 13
) );
$wp_customize->add_setting(
    'themeslug_bar_hello_btn_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_hello_btn_text_color',
        array(
            'label' => 'Button Text Color',
            'section' => 'themeslug_bar_hello_section',
            'settings' => 'themeslug_bar_hello_btn_text_color',
            'priority'    => 14
        )
    )
);
$wp_customize->add_setting(
    'themeslug_bar_hello_btn_bg',
    array(
        'default' => '#c20000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_hello_btn_bg',
        array(
            'label' => 'Button Text Background Color',
            'section' => 'themeslug_bar_hello_section',
            'settings' => 'themeslug_bar_hello_btn_bg',
            'priority'    => 15
        )
    )
);

/***************************************** Bar - Reviews *****************************************/
$wp_customize->add_section( 'themeslug_bar_reviews_section' , array(
    'title'       => __( 'Reviews Bar', 'themeslug' ),
    'priority'    => 1,
    'panel' => 'panel_2',
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_on' );
$wp_customize->add_control( 'themeslug_bar_reviews_on', array(
    'label'    => __( 'Show Reviews Bar', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting(
    'themeslug_bar_reviews_bg',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_reviews_bg',
        array(
            'label' => 'Background Color',
            'section' => 'themeslug_bar_reviews_section',
            'settings' => 'themeslug_bar_reviews_bg',
            'priority'    => 2
        )
    )
);
$wp_customize->add_setting( 'themeslug_bar_reviews_bg_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_bar_reviews_bg_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'text',
    'priority'    => 3
) );
$wp_customize->add_setting(
    'themeslug_bar_reviews_color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_reviews_color',
        array(
            'label' => 'Text Color',
            'section' => 'themeslug_bar_reviews_section',
            'settings' => 'themeslug_bar_reviews_color',
            'priority'    => 4
        )
    )
);
$wp_customize->add_setting(
    'themeslug_bar_reviews_star_color',
    array(
        'default' => '#ff8447',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_reviews_star_color',
        array(
            'label' => 'Star Color',
            'section' => 'themeslug_bar_reviews_section',
            'settings' => 'themeslug_bar_reviews_star_color',
            'priority'    => 5
        )
    )
);
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_1',
	array (
		'default' => '',
) );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_1', array(
    'label'    => __( '-------------------------------------- Review 1 Text', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'text',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_1_stars' );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_1_stars', array(
    'label'    => __( 'Review 1 Star Count', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'select',
    'default' => '5',
    'choices' => array(
    	'value1' => '5',
    	'value2' => '4',
    	'value3' => '3'
    	),
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_2',
	array (
		'default' => '',
) );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_2', array(
    'label'    => __( '-------------------------------------- Review 2 Text', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'text',
    'priority'    => 8
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_2_stars' );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_2_stars', array(
    'label'    => __( 'Review 2 Star Count', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'select',
    'default' => '5',
    'choices' => array(
    	'value1' => '5',
    	'value2' => '4',
    	'value3' => '3'
    	),
    'priority'    => 9
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_3',
	array (
		'default' => '',
) );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_3', array(
    'label'    => __( '-------------------------------------- Review 3 Text', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'text',
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_3_stars' );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_3_stars', array(
    'label'    => __( 'Review 3 Star Count', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'select',
    'default' => '5',
    'choices' => array(
    	'value1' => '5',
    	'value2' => '4',
    	'value3' => '3'
    	),
    'priority'    => 11
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_4',
	array (
		'default' => '',
) );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_4', array(
    'label'    => __( '-------------------------------------- Review 4 Text', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'text',
    'priority'    => 12
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_4_stars' );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_4_stars', array(
    'label'    => __( 'Review 4 Star Count', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'select',
    'default' => '5',
    'choices' => array(
    	'value1' => '5',
    	'value2' => '4',
    	'value3' => '3'
    	),
    'priority'    => 13
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_5',
	array (
		'default' => '',
) );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_5', array(
    'label'    => __( '-------------------------------------- Review 5 Text', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'text',
    'priority'    => 14
) );
$wp_customize->add_setting( 'themeslug_bar_reviews_rev_5_stars' );
$wp_customize->add_control( 'themeslug_bar_reviews_rev_5_stars', array(
    'label'    => __( 'Review 5 Star Count', 'themeslug' ),
    'section'  => 'themeslug_bar_reviews_section',
    'type' => 'select',
    'default' => '5',
    'choices' => array(
    	'value1' => '5',
    	'value2' => '4',
    	'value3' => '3'
    	),
    'priority'    => 15
) );

/***************************************** Nav - Top *****************************************/
$wp_customize->add_section( 'themeslug_nav_top_section' , array(
    'title'       => __( 'Nav - Top', 'themeslug' ),
    'priority'    => 2,
    'description' => 'Extra Nav items that go above the main nav',
    'panel' => 'panel_2',
) );
$wp_customize->add_setting( 'themeslug_nav_top_on' );
$wp_customize->add_control( 'themeslug_nav_top_on', array(
    'label'    => __( 'Show Top Nav', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting(
    'themeslug_nav_top_bg',
    array(
        'default' => '#373a3c',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_top_bg',
        array(
            'label' => 'Background Color',
            'section' => 'themeslug_nav_top_section',
            'settings' => 'themeslug_nav_top_bg',
            'priority'    => 2
        )
    )
);
$wp_customize->add_setting( 'themeslug_nav_top_text_size',
	array (
		'default' => '14px',
) );
$wp_customize->add_control( 'themeslug_nav_top_text_size', array(
    'label'    => __( 'Text Size', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 3
) );
$wp_customize->add_setting(
    'themeslug_nav_top_link_color',
    array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_top_link_color',
        array(
            'label' => 'Link Color',
            'section' => 'themeslug_nav_top_section',
            'settings' => 'themeslug_nav_top_link_color',
            'priority'    => 3
        )
    )
);
$wp_customize->add_setting( 'themeslug_nav_top_left_on' );
$wp_customize->add_control( 'themeslug_nav_top_left_on', array(
    'title'         => __( 'Wematanye' , 'themeslug'),
    'label'    => __( '-------------------------------------- SHOW LEFT SIDE', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 4
) );

/* Left Item 1 */
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_url', array(
    'label'    => __( 'Left Item 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 5
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_text', array(
    'label'    => __( 'Left Item 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown1_url', array(
    'label'    => __( '----Item 1, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown1_text', array(
    'label'    => __( '----Item 1, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 8
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown2_url', array(
    'label'    => __( '----Item 1, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 9
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown2_text', array(
    'label'    => __( '----Item 1, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown3_url', array(
    'label'    => __( '----Item 1, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 11
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown3_text',
	array (
		'default' => 'Item 3',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown3_text', array(
    'label'    => __( '----Item 1, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 12
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown4_url', array(
    'label'    => __( '----Item 1, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 13
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown4_text', array(
    'label'    => __( '----Item 1, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 14
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown5_url', array(
    'label'    => __( '----Item 1, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 15
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown5_text', array(
    'label'    => __( '----Item 1, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 16
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown6_url', array(
    'label'    => __( '----Item 1, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 17
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item1_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item1_dropdown6_text', array(
    'label'    => __( '----Item 1, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 18
) );

/* Left Item 2 */
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_url', array(
    'label'    => __( 'Left Item 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 19
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_text', array(
    'label'    => __( 'Left Item 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 20
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown1_url', array(
    'label'    => __( '----Item 2, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 21
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown1_text', array(
    'label'    => __( '----Item 2, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 22
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown2_url', array(
    'label'    => __( '----Item 2, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 23
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown2_text', array(
    'label'    => __( '----Item 2, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 24
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown3_url', array(
    'label'    => __( '----Item 2, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 25
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown3_text',
	array (
		'default' => 'Item 3',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown3_text', array(
    'label'    => __( '----Item 2, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 26
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown4_url', array(
    'label'    => __( '----Item 2, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 27
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown4_text', array(
    'label'    => __( '----Item 2, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 28
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown5_url', array(
    'label'    => __( '----Item 2, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 29
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown5_text', array(
    'label'    => __( '----Item 2, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 30
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown6_url', array(
    'label'    => __( '----Item 2, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 31
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item2_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item2_dropdown6_text', array(
    'label'    => __( '----Item 2, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 32
) );

/* Left Item 3 */
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_url', array(
    'label'    => __( 'Left Item 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 33
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_text', array(
    'label'    => __( 'Left Item 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 34
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown1_url', array(
    'label'    => __( '----Item 3, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 35
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown1_text', array(
    'label'    => __( '----Item 3, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 36
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown2_url', array(
    'label'    => __( '----Item 3, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 37
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown2_text', array(
    'label'    => __( '----Item 3, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 38
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown3_url', array(
    'label'    => __( '----Item 3, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 39
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown3_text',
	array (
		'default' => 'Item 3',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown3_text', array(
    'label'    => __( '----Item 3, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 40
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown4_url', array(
    'label'    => __( '----Item 3, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 41
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown4_text', array(
    'label'    => __( '----Item 3, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 42
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown5_url', array(
    'label'    => __( '----Item 3, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 43
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown5_text', array(
    'label'    => __( '----Item 3, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 44
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown6_url', array(
    'label'    => __( '----Item 3, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 45
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item3_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item3_dropdown6_text', array(
    'label'    => __( '----Item 3, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 46
) );

/* Left Item 4 */
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_url', array(
    'label'    => __( 'Left Item 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 47
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_text', array(
    'label'    => __( 'Left Item 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 48
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown1_url', array(
    'label'    => __( '----Item 4, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 49
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown1_text', array(
    'label'    => __( '----Item 4, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 50
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown2_url', array(
    'label'    => __( '----Item 4, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 51
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown2_text', array(
    'label'    => __( '----Item 4, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 52
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown3_url', array(
    'label'    => __( '----Item 4, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 53
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown3_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown3_text', array(
    'label'    => __( '----Item 4, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 54
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown4_url', array(
    'label'    => __( '----Item 4, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 55
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown4_text', array(
    'label'    => __( '----Item 4, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 56
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown5_url', array(
    'label'    => __( '----Item 4, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 57
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown5_text', array(
    'label'    => __( '----Item 4, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 58
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown6_url', array(
    'label'    => __( '----Item 4, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 59
) );
$wp_customize->add_setting( 'themeslug_nav_top_left_item4_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_left_item4_dropdown6_text', array(
    'label'    => __( '----Item 4, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 60
) );

$wp_customize->add_setting( 'themeslug_nav_top_right_on' );
$wp_customize->add_control( 'themeslug_nav_top_right_on', array(
    'label'    => __( '-------------------------------------- SHOW RIGHT SIDE', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    ),
    'priority'    => 70
) );

/* Right Item 1 */
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_url', array(
    'label'    => __( 'right Item 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 71
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_text', array(
    'label'    => __( 'right Item 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 72
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown1_url', array(
    'label'    => __( '----Item 1, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 73
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown1_text', array(
    'label'    => __( '----Item 1, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 74
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown2_url', array(
    'label'    => __( '----Item 1, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 75
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown2_text', array(
    'label'    => __( '----Item 1, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 76
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown3_url', array(
    'label'    => __( '----Item 1, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 77
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown3_text',
	array (
		'default' => 'Item 3',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown3_text', array(
    'label'    => __( '----Item 1, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 78
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown4_url', array(
    'label'    => __( '----Item 1, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 79
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown4_text', array(
    'label'    => __( '----Item 1, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 80
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown5_url', array(
    'label'    => __( '----Item 1, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 81
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown5_text', array(
    'label'    => __( '----Item 1, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 82
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown6_url', array(
    'label'    => __( '----Item 1, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 83
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item1_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item1_dropdown6_text', array(
    'label'    => __( '----Item 1, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 84
) );

/* right Item 2 */
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_url', array(
    'label'    => __( 'right Item 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 85
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_text', array(
    'label'    => __( 'right Item 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 86
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown1_url', array(
    'label'    => __( '----Item 2, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 87
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown1_text', array(
    'label'    => __( '----Item 2, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 88
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown2_url', array(
    'label'    => __( '----Item 2, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 89
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown2_text', array(
    'label'    => __( '----Item 2, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 90
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown3_url', array(
    'label'    => __( '----Item 2, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 91
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown3_text',
	array (
		'default' => 'Item 3',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown3_text', array(
    'label'    => __( '----Item 2, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 92
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown4_url', array(
    'label'    => __( '----Item 2, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 93
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown4_text', array(
    'label'    => __( '----Item 2, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 94
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown5_url', array(
    'label'    => __( '----Item 2, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 95
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown5_text', array(
    'label'    => __( '----Item 2, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 96
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown6_url', array(
    'label'    => __( '----Item 2, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 97
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item2_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item2_dropdown6_text', array(
    'label'    => __( '----Item 2, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 98
) );

/* right Item 3 */
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_url', array(
    'label'    => __( 'right Item 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 99
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_text', array(
    'label'    => __( 'right Item 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 100
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown1_url', array(
    'label'    => __( '----Item 3, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 101
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown1_text', array(
    'label'    => __( '----Item 3, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 102
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown2_url', array(
    'label'    => __( '----Item 3, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 103
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown2_text', array(
    'label'    => __( '----Item 3, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 104
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown3_url', array(
    'label'    => __( '----Item 3, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 105
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown3_text',
	array (
		'default' => 'Item 3',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown3_text', array(
    'label'    => __( '----Item 3, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 106
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown4_url', array(
    'label'    => __( '----Item 3, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 107
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown4_text', array(
    'label'    => __( '----Item 3, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 108
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown5_url', array(
    'label'    => __( '----Item 3, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 109
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown5_text', array(
    'label'    => __( '----Item 3, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 110
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown6_url', array(
    'label'    => __( '----Item 3, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 111
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item3_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item3_dropdown6_text', array(
    'label'    => __( '----Item 3, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 112
) );

/* right Item 4 */
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_url', array(
    'label'    => __( 'right Item 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 113
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_text', array(
    'label'    => __( 'right Item 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 114
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown1_url', array(
    'label'    => __( '----Item 4, Dropdown 1 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 115
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown1_text',
	array (
		'default' => 'Item 1',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown1_text', array(
    'label'    => __( '----Item 4, Dropdown 1 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 116
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown2_url', array(
    'label'    => __( '----Item 4, Dropdown 2 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 117
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown2_text',
	array (
		'default' => 'Item 2',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown2_text', array(
    'label'    => __( '----Item 4, Dropdown 2 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 118
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown3_url', array(
    'label'    => __( '----Item 4, Dropdown 3 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 119
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown3_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown3_text', array(
    'label'    => __( '----Item 4, Dropdown 3 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 120
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown4_url', array(
    'label'    => __( '----Item 4, Dropdown 4 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 121
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown4_text',
	array (
		'default' => 'Item 4',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown4_text', array(
    'label'    => __( '----Item 4, Dropdown 4 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 122
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown5_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown5_url', array(
    'label'    => __( '----Item 4, Dropdown 5 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 123
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown5_text',
	array (
		'default' => 'Item 5',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown5_text', array(
    'label'    => __( '----Item 4, Dropdown 5 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 124
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown6_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown6_url', array(
    'label'    => __( '----Item 4, Dropdown 6 URL', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 125
) );
$wp_customize->add_setting( 'themeslug_nav_top_right_item4_dropdown6_text',
	array (
		'default' => 'Item 6',
) );
$wp_customize->add_control( 'themeslug_nav_top_right_item4_dropdown6_text', array(
    'label'    => __( '----Item 4, Dropdown 6 text', 'themeslug' ),
    'section'  => 'themeslug_nav_top_section',
    'type' => 'text',
    'priority'    => 126
) );

/***************************************** III. Logo *****************************************/
$wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 4,
    'description' => 'Upload a logo to replace the default site name and description in the header',
	'panel' => 'panel_2',
) );
$wp_customize->add_setting( 'themeslug_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
    'priority'    => 1
) ) );
$wp_customize->add_setting( 'themeslug_logo_size' );
$wp_customize->add_control( 'themeslug_logo_size', array(
    'label'    => __( 'Logo Size', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'type' => 'select',
    'default' => 'Medium',
    'choices' => array(
    	'value1' => 'Small',
    	'value2' => 'Medium',
    	'value3' => 'Large',
    	),
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_logo_position' );
$wp_customize->add_control( 'themeslug_logo_position', array(
    'label'    => __( 'Logo Position', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'type' => 'select',
    'default' => 'Logo Left, Nav Right',
    'choices' => array(
    	'value1' => 'Logo Left, Nav Right',
    	'value2' => 'Logo Right, Nav Left',
    	'value3' => 'Logo Above, Nav Below',
    	'value4' => 'Logo Below, Nav Above'
    	),
    'priority'    => 3
) );
$wp_customize->add_setting( 'themeslug_logo_top_margin',
	array (
		'default' => '0px',
	) );
$wp_customize->add_control( 'themeslug_logo_top_margin', array(
    'label'    => __( 'Top Margin', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'type' => 'text',
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_logo_bottom_margin',
	array (
		'default' => '0px',
	) );
$wp_customize->add_control( 'themeslug_logo_bottom_margin', array(
    'label'    => __( 'Bottom Margin', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'type' => 'text',
    'priority'    => 5
) );
$wp_customize->add_setting( 'themeslug_logo_tilt' );
$wp_customize->add_control( 'themeslug_logo_tilt', array(
    'label'    => __( 'Logo Tilt', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'type' => 'select',
    'default' => 'None',
    'choices' => array(
    	'value1' => 'None',
    	'value2' => '5 Degrees Left',
    	'value3' => '5 Degrees Right',
    	),
    'priority'    => 6
) );

/***************************************** Nav - Main *****************************************/
$wp_customize->add_section( 'themeslug_nav_main_section' , array(
    'title'       => __( 'Nav - Main', 'themeslug' ),
    'priority'    => 5,
    'description' => 'Navigation customizations',
	'panel' => 'panel_2',
) );
$wp_customize->add_setting( 'themeslug_nav_main_align' );
$wp_customize->add_control( 'themeslug_nav_main_align', array(
    'label'    => __( 'Alignment', 'themeslug' ),
    'section'  => 'themeslug_nav_main_section',
    'type' => 'select',
    'default' => 'Right',
    'choices' => array(
    	'value1' => 'Left',
    	'value2' => 'Center',
    	'value3' => 'Right',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_nav_main_padding',
	array (
		'default' => '0px',
	) );
$wp_customize->add_control( 'themeslug_nav_main_padding', array(
    'label'    => __( 'Vertical Padding', 'themeslug' ),
    'section'  => 'themeslug_nav_main_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_nav_main_text_size',
	array (
		'default' => '14px',
	) );
$wp_customize->add_control( 'themeslug_nav_main_text_size', array(
    'label'    => __( 'Text Size', 'themeslug' ),
    'section'  => 'themeslug_nav_main_section',
    'type' => 'text',
    'priority'    => 3
) );
$wp_customize->add_setting( 'themeslug_nav_main_text_transform' );
$wp_customize->add_control( 'themeslug_nav_main_text_transform', array(
    'label'    => __( 'Text Uppercase/Lowercase', 'themeslug' ),
    'section'  => 'themeslug_nav_main_section',
    'type' => 'select',
    'default' => 'Lowercase',
    'choices' => array(
    	'value1' => 'Uppercase',
    	'value2' => 'Lowercase',
    	),
    'priority'    => 4
) );
$wp_customize->add_setting(
    'themeslug_nav_main_bg_color',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_bg_color',
        array(
            'label' => 'Background Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_bg_color',
            'priority'    => 5
        )
    )
);
$wp_customize->add_setting(
    'themeslug_nav_main_link_color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_link_color',
        array(
            'label' => 'Link Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_link_color',
            'priority'    => 6
        )
    )
);
$wp_customize->add_setting(
    'themeslug_nav_main_link_hover_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_link_hover_color',
        array(
            'label' => 'Link Hover Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_link_hover_color',
            'priority'    => 7
        )
    )
);
$wp_customize->add_setting(
    'themeslug_nav_main_link_hover_bg_color',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_link_hover_bg_color',
        array(
            'label' => 'Link Hover Background Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_link_hover_bg_color',
            'priority'    => 8
        )
    )
);
$wp_customize->add_setting(
    'themeslug_nav_main_dropdown_bg_color',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_dropdown_bg_color',
        array(
            'label' => 'Dropdown Background Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_dropdown_bg_color',
            'priority'    => 9
        )
    )
);
$wp_customize->add_setting(
    'themeslug_nav_main_dropdown_a_color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_dropdown_a_color',
        array(
            'label' => 'Dropdown Link Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_dropdown_a_color',
            'priority'    => 10
        )
    )
);
$wp_customize->add_setting(
    'themeslug_nav_main_hamburger_menu_color',
    array(
        'default' => '#898989',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_hamburger_menu_color',
        array(
            'label' => 'Mobile Hamburger Menu Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_hamburger_menu_color',
            'priority'    => 11
        )
    )
);
$wp_customize->add_setting(
    'themeslug_nav_main_mobile_nav_bg',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_nav_main_mobile_nav_bg',
        array(
            'label' => 'Mobile Nav Background Color',
            'section' => 'themeslug_nav_main_section',
            'settings' => 'themeslug_nav_main_mobile_nav_bg',
            'priority'    => 12
        )
    )
);
$wp_customize->add_setting( 'themeslug_nav_main_btn_on' );
$wp_customize->add_control( 'themeslug_nav_main_btn_on', array(
    'label'    => __( 'Show Phone Number Button', 'themeslug' ),
    'section'  => 'themeslug_nav_main_section',
    'type' => 'select',
    'default' => 'Yes',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 13
) );
$wp_customize->add_setting( 'themeslug_nav_main_btn_style' );
$wp_customize->add_control( 'themeslug_nav_main_btn_style', array(
    'label'    => __( 'Button Style', 'themeslug' ),
    'section'  => 'themeslug_nav_main_section',
    'type' => 'select',
    'default' => 'Dark',
    'choices' => array(
    	'value1' => 'Dark',
    	'value2' => 'Light',
    	),
    'priority'    => 14
) );
$wp_customize->add_setting( 'themeslug_nav_main_btn_size' );
$wp_customize->add_control( 'themeslug_nav_main_btn_size', array(
    'label'    => __( 'Button Size', 'themeslug' ),
    'section'  => 'themeslug_nav_main_section',
    'type' => 'select',
    'default' => 'Medium',
    'choices' => array(
    	'value1' => 'Small',
    	'value2' => 'Medium',
    	'value3' => 'Large'
    	),
    'priority'    => 15
) );


/***************************************** II. Bar - Announcement *****************************************/
$wp_customize->add_section( 'themeslug_bar_announcement_section' , array(
    'title'       => __( 'Announcement Bar', 'themeslug' ),
    'priority'    => 10,
    'description' => 'for Important Announcements / Anchor Posts',
    'panel' => 'panel_3',
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_on' );
$wp_customize->add_control( 'themeslug_bar_announcement_on', array(
    'label'    => __( 'Show Announcement Bar', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting(
    'themeslug_bar_announcement_bg',
    array(
        'default' => '#444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_announcement_bg',
        array(
            'label' => 'Background Color',
            'section' => 'themeslug_bar_announcement_section',
            'settings' => 'themeslug_bar_announcement_bg',
            'priority'    => 2
        )
    )
);
$wp_customize->add_setting(
    'themeslug_bar_announcement_a_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_announcement_a_color',
        array(
            'label' => 'Link Color',
            'section' => 'themeslug_bar_announcement_section',
            'settings' => 'themeslug_bar_announcement_a_color',
            'priority'    => 3
        )
    )
);
$wp_customize->add_setting( 'themeslug_bar_announcement_icon' );
$wp_customize->add_control( 'themeslug_bar_announcement_icon', array(
    'label'    => __( 'Icon', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'select',
    'default' => 'Flag',
    'choices' => array(
    	'value1' => 'Flag',
    	'value2' => 'Bullhorn',
    	'value3' => 'Bell',
    	'value4' => 'Burst',
    	'value5' => 'Clock',
    	'value6' => 'Comment Bubble',
    	'value7' => 'Exclamation Point',
    	'value8' => 'Heart',
    	'value9' => 'Microphone',
    	'value10' => 'Shield'
    	),
    'priority'    => 4
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_text',
	array (
		'default' => 'An Important Announcement',
	) );
$wp_customize->add_control( 'themeslug_bar_announcement_text', array(
    'label'    => __( 'Text Content', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'text',
    'priority'    => 5
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_url',
	array (
		'default' => '#',
	) );
$wp_customize->add_control( 'themeslug_bar_announcement_url', array(
    'label'    => __( 'Link URL', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'text',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_padding',
	array (
		'default' => '6px',
	) );
$wp_customize->add_control( 'themeslug_bar_announcement_padding', array(
    'label'    => __( 'Vertical Padding', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'text',
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_font_size',
	array (
		'default' => '12px',
) );
$wp_customize->add_control( 'themeslug_bar_announcement_font_size', array(
    'label'    => __( 'Font Size', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'text',
    'priority'    => 8
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_text_transform' );
$wp_customize->add_control( 'themeslug_bar_announcement_text_transform', array(
    'label'    => __( 'Text Uppercase/Lowercase', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'select',
    'default' => 'Lowercase',
    'choices' => array(
    	'value1' => 'Uppercase',
    	'value2' => 'Lowercase',
    	),
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_text_align' );
$wp_customize->add_control( 'themeslug_bar_announcement_text_align', array(
    'label'    => __( 'Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'select',
    'default' => 'Left',
    'choices' => array(
    	'value1' => 'Left',
    	'value2' => 'Center',
    	'value3' => 'Right',
    	),
    'priority'    => 11
) );
$wp_customize->add_setting( 'themeslug_bar_announcement_btn_text',
	array (
		'default' => 'Go Here',
	) );
$wp_customize->add_control( 'themeslug_bar_announcement_btn_text', array(
    'label'    => __( 'Button Text', 'themeslug' ),
    'section'  => 'themeslug_bar_announcement_section',
    'type' => 'text',
    'priority'    => 13
) );
$wp_customize->add_setting(
    'themeslug_bar_announcement_btn_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_announcement_btn_text_color',
        array(
            'label' => 'Button Text Color',
            'section' => 'themeslug_bar_announcement_section',
            'settings' => 'themeslug_bar_announcement_btn_text_color',
            'priority'    => 14
        )
    )
);
$wp_customize->add_setting(
    'themeslug_bar_announcement_btn_bg',
    array(
        'default' => '#c20000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_bar_announcement_btn_bg',
        array(
            'label' => 'Button Text Background Color',
            'section' => 'themeslug_bar_announcement_section',
            'settings' => 'themeslug_bar_announcement_btn_bg',
            'priority'    => 15
        )
    )
);

/***************************************** II. Menus *****************************************/
/*
$wp_customize->add_section( 'nav' , array(
    'title'       => __( 'Menus', 'themeslug' ),
    'priority'    => 20,
    'panel' => 'panel_2',
) );
*/

/***************************************** III. Header Image *****************************************/
$wp_customize->add_section( 'header_image' , array(
    'title'       => __( 'Header Image', 'themeslug' ),
    'priority'    => 30,
    'panel' => 'panel_2',
) );

/*
*
*
*
*
* 3. Home Page
*
*
*
*
*/
$wp_customize->add_panel( 'panel_3', array(
    'title' => '3. Home Page',
    'description' => 'This panel contains header sections.',
    'priority' => 3,
) );

/***************************************** I. Feature Header *****************************************/

$wp_customize->add_section( 'themeslug_fheader_type_section' , array(
    'title'       => __( 'Feature Header Type & Height', 'themeslug' ),
    'priority'    => 0,
    'description' => 'Choose what type of header you want.',
    'panel' => 'panel_3',
) );
$wp_customize->add_setting( 'themeslug_fheader_select');
$wp_customize->add_control( 'themeslug_fheader_select', array(
    'label'    => __( 'Select Header Type', 'themeslug' ),
    'section'  => 'themeslug_fheader_type_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'Static',
    	'value2' => 'Slider',
    	'value3' => 'Video',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_fheader_height');
$wp_customize->add_control( 'themeslug_fheader_height', array(
    'label'    => __( 'Select Header Height', 'themeslug' ),
    'section'  => 'themeslug_fheader_type_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'Normal',
    	'value2' => 'Short',
    	),
    'priority'    => 2
) );
/***************************************** Feature Header - Static *****************************************/

$wp_customize->add_section( 'themeslug_fheader_static_section' , array(
    'title'       => __( 'Feature Header - Static', 'themeslug' ),
    'priority'    => 1,
    'description' => 'Static Feature Image',
    'panel' => 'panel_3',
) );
$wp_customize->add_setting( 'themeslug_static_title',
	array (
		'default' => 'Example Headline',
		) );
$wp_customize->add_control( 'themeslug_static_title', array(
    'label'    => __( 'Static Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_static_section',
    'type' => 'text',
    'priority'    => 5
) );
$wp_customize->add_setting( 'themeslug_static_descr',
	array (
		'default' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.',
		) );
$wp_customize->add_control( 'themeslug_static_descr', array(
    'label'    => __( 'Static description', 'themeslug' ),
    'section'  => 'themeslug_fheader_static_section',
    'type' => 'text',
    'priority'    => 10
) );
$wp_customize->add_setting(
    'themeslug_static_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_static_text_color',
        array(
            'label' => 'Text Color',
            'section' => 'themeslug_fheader_static_section',
            'settings' => 'themeslug_static_text_color',
            'priority'    => 12
        )
    )
);
$wp_customize->add_setting( 'themeslug_static_button_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_static_button_text', array(
    'label'    => __( 'Static button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_static_section',
    'type' => 'text',
    'priority'    => 15
) );
$wp_customize->add_setting( 'themeslug_static_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_static_link', array(
    'label'    => __( 'Static button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_static_section',
    'type' => 'text',
    'priority'    => 20
) );
$wp_customize->add_setting( 'themeslug_static_text_align' );
$wp_customize->add_control( 'themeslug_static_text_align', array(
    'label'    => __( 'Static Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_static_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 21
) );
$wp_customize->add_setting( 'themeslug_static_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_static_pic', array(
    'label'    => __( 'Static Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_static_section',
    'settings' => 'themeslug_static_pic',
    'priority'    => 25
) ) );
$wp_customize->add_setting(
    'themeslug_static_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_static_overlay_color',
        array(
            'label' => 'Static Image overlay color',
            'section' => 'themeslug_fheader_static_section',
            'settings' => 'themeslug_static_overlay_color',
            'priority'    => 30
        )
    )
);
$wp_customize->add_setting( 'themeslug_static_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_static_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_static_section',
    'type' => 'text',
    'priority'    => 35
) );

/***************************************** Feature Header - Carousel *****************************************/
$wp_customize->add_section( 'themeslug_fheader_section' , array(
    'title'       => __( 'Feature Header - Slider', 'themeslug' ),
    'priority'    => 3,
    'description' => 'The Slider',
    'panel' => 'panel_3',
) );

/*** Slide 1 ***/
$wp_customize->add_setting( 'themeslug_slide1_title',
	array (
		'default' => 'This is the first slide.',
) );
$wp_customize->add_control( 'themeslug_slide1_title', array(
    'label'    => __( 'Slide 1 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_slide1_descr',
	array (
		'default' => 'This is the description for the first slide.',
		) );
$wp_customize->add_control( 'themeslug_slide1_descr', array(
    'label'    => __( 'Slide 1 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting(
    'themeslug_slide1_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide1_text_color',
        array(
            'label' => 'Slide 1 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide1_text_color',
            'priority'    => 3
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide1_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide1_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 4
) );
$wp_customize->add_setting(
    'themeslug_slide1_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide1_htag_bg',
        array(
            'label' => 'Slide 1 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide1_htag_bg',
            'priority'    => 5
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide1_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide1_btn_text', array(
    'label'    => __( 'Slide 1 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_slide1_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide1_btn_link', array(
    'label'    => __( 'Slide 1 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_slide1_text_align' );
$wp_customize->add_control( 'themeslug_slide1_text_align', array(
    'label'    => __( 'Slide 1 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 8
) );
$wp_customize->add_setting( 'themeslug_slide1_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide1_pic', array(
    'label'    => __( 'Slide 1 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide1_pic',
    'priority'    => 9
) ) );
$wp_customize->add_setting(
    'themeslug_slide1_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide1_overlay_color',
        array(
            'label' => 'Slide 1 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide1_overlay_color',
            'priority'    => 10
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide1_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide1_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 11
) );
$wp_customize->add_setting( 'themeslug_slide1_order' );
$wp_customize->add_control( 'themeslug_slide1_order', array(
    'label'    => __( 'Slide 1 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 12
) );

/*** Slide 2 ***/
$wp_customize->add_setting( 'themeslug_slide2_title',
	array (
		'default' => 'This is the second slide.',
		) );
$wp_customize->add_control( 'themeslug_slide2_title', array(
    'label'    => __( '-------------------------------------- Slide 2 Title', 'themeslug' ),
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
$wp_customize->add_setting(
    'themeslug_slide2_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide2_text_color',
        array(
            'label' => 'Slide 2 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide2_text_color',
            'priority'    => 15
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide2_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide2_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 16
) );
$wp_customize->add_setting(
    'themeslug_slide2_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide2_htag_bg',
        array(
            'label' => 'Slide 2 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide2_htag_bg',
            'priority'    => 17
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide2_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide2_btn_text', array(
    'label'    => __( 'Slide 2 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 18
) );
$wp_customize->add_setting( 'themeslug_slide2_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide2_btn_link', array(
    'label'    => __( 'Slide 2 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 19
) );
$wp_customize->add_setting( 'themeslug_slide2_text_align' );
$wp_customize->add_control( 'themeslug_slide2_text_align', array(
    'label'    => __( 'Slide 2 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 20
) );
$wp_customize->add_setting( 'themeslug_slide2_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide2_pic', array(
    'label'    => __( 'Slide 2 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide2_pic',
    'priority'    => 21
) ) );
$wp_customize->add_setting(
    'themeslug_slide2_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide2_overlay_color',
        array(
            'label' => 'Slide 2 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide2_overlay_color',
            'priority'    => 22
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide2_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide2_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 23
) );
$wp_customize->add_setting( 'themeslug_slide2_order' );
$wp_customize->add_control( 'themeslug_slide2_order', array(
    'label'    => __( 'Slide 2 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 24
) );

/*** Slide 3 ***/
$wp_customize->add_setting( 'themeslug_slide3_title',
	array (
		'default' => 'This is the third slide.',
		) );
$wp_customize->add_control( 'themeslug_slide3_title', array(
    'label'    => __( '-------------------------------------- Slide 3 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 25
) );
$wp_customize->add_setting( 'themeslug_slide3_descr',
	array (
		'default' => 'This is the description for the third slide.',
		) );
$wp_customize->add_control( 'themeslug_slide3_descr', array(
    'label'    => __( 'Slide 3 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 26
) );
$wp_customize->add_setting(
    'themeslug_slide3_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide3_text_color',
        array(
            'label' => 'Slide 3 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide3_text_color',
            'priority'    => 27
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide3_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide3_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 28
) );
$wp_customize->add_setting(
    'themeslug_slide3_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide3_htag_bg',
        array(
            'label' => 'Slide 3 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide3_htag_bg',
            'priority'    => 29
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide3_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide3_btn_text', array(
    'label'    => __( 'Slide 3 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 30
) );
$wp_customize->add_setting( 'themeslug_slide3_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide3_btn_link', array(
    'label'    => __( 'Slide 3 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 31
) );
$wp_customize->add_setting( 'themeslug_slide3_text_align' );
$wp_customize->add_control( 'themeslug_slide3_text_align', array(
    'label'    => __( 'Slide 3 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 32
) );
$wp_customize->add_setting( 'themeslug_slide3_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide3_pic', array(
    'label'    => __( 'Slide 3 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide3_pic',
    'priority'    => 33
) ) );
$wp_customize->add_setting(
    'themeslug_slide3_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide3_overlay_color',
        array(
            'label' => 'Slide 3 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide3_overlay_color',
            'priority'    => 34
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide3_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide3_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 35
) );
$wp_customize->add_setting( 'themeslug_slide3_order' );
$wp_customize->add_control( 'themeslug_slide3_order', array(
    'label'    => __( 'Slide 3 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 36
) );

/*** Slide 4 ***/
$wp_customize->add_setting( 'themeslug_slide4_title',
	array (
		'default' => 'This is the fourth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide4_title', array(
    'label'    => __( '-------------------------------------- Slide 4 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 37
) );
$wp_customize->add_setting( 'themeslug_slide4_descr',
	array (
		'default' => 'This is the description for the fourth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide4_descr', array(
    'label'    => __( 'Slide 4 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 38
) );
$wp_customize->add_setting(
    'themeslug_slide4_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide4_text_color',
        array(
            'label' => 'Slide 4 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide4_text_color',
            'priority'    => 39
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide4_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide4_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 40
) );
$wp_customize->add_setting(
    'themeslug_slide4_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide4_htag_bg',
        array(
            'label' => 'Slide 4 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide4_htag_bg',
            'priority'    => 41
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide4_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide4_btn_text', array(
    'label'    => __( 'Slide 4 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 42
) );
$wp_customize->add_setting( 'themeslug_slide4_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide4_btn_link', array(
    'label'    => __( 'Slide 4 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 43
) );
$wp_customize->add_setting( 'themeslug_slide4_text_align' );
$wp_customize->add_control( 'themeslug_slide4_text_align', array(
    'label'    => __( 'Slide 4 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 44
) );
$wp_customize->add_setting( 'themeslug_slide4_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide4_pic', array(
    'label'    => __( 'Slide 4 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide4_pic',
    'priority'    => 45
) ) );
$wp_customize->add_setting(
    'themeslug_slide4_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide4_overlay_color',
        array(
            'label' => 'Slide 4 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide4_overlay_color',
            'priority'    => 46
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide4_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide4_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 47
) );
$wp_customize->add_setting( 'themeslug_slide4_order' );
$wp_customize->add_control( 'themeslug_slide4_order', array(
    'label'    => __( 'Slide 4 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 48
) );

/*** Slide 5 ***/
$wp_customize->add_setting( 'themeslug_slide5_title',
	array (
		'default' => 'This is the fifth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide5_title', array(
    'label'    => __( '-------------------------------------- Slide 5 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 49
) );
$wp_customize->add_setting( 'themeslug_slide5_descr',
	array (
		'default' => 'This is the description for the fifth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide5_descr', array(
    'label'    => __( 'Slide 5 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 50
) );
$wp_customize->add_setting(
    'themeslug_slide5_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide5_text_color',
        array(
            'label' => 'Slide 5 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide5_text_color',
            'priority'    => 51
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide5_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide5_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 52
) );
$wp_customize->add_setting(
    'themeslug_slide5_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide5_htag_bg',
        array(
            'label' => 'Slide 5 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide5_htag_bg',
            'priority'    => 53
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide5_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide5_btn_text', array(
    'label'    => __( 'Slide 5 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 54
) );
$wp_customize->add_setting( 'themeslug_slide5_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide5_btn_link', array(
    'label'    => __( 'Slide 5 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 55
) );
$wp_customize->add_setting( 'themeslug_slide5_text_align' );
$wp_customize->add_control( 'themeslug_slide5_text_align', array(
    'label'    => __( 'Slide 5 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 56
) );
$wp_customize->add_setting( 'themeslug_slide5_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide5_pic', array(
    'label'    => __( 'Slide 5 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide5_pic',
    'priority'    => 57
) ) );
$wp_customize->add_setting(
    'themeslug_slide5_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide5_overlay_color',
        array(
            'label' => 'Slide 5 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide5_overlay_color',
            'priority'    => 58
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide5_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide5_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 54
) );
$wp_customize->add_setting( 'themeslug_slide5_order' );
$wp_customize->add_control( 'themeslug_slide5_order', array(
    'label'    => __( 'Slide 5 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 59
) );

/*** Slide 6 ***/
$wp_customize->add_setting( 'themeslug_slide6_title',
	array (
		'default' => 'This is the sixth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide6_title', array(
    'label'    => __( '-------------------------------------- Slide 6 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 60
) );
$wp_customize->add_setting( 'themeslug_slide6_descr',
	array (
		'default' => 'This is the description for the sixth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide6_descr', array(
    'label'    => __( 'Slide 6 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 61
) );
$wp_customize->add_setting(
    'themeslug_slide6_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide6_text_color',
        array(
            'label' => 'Slide 6 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide6_text_color',
            'priority'    => 62
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide6_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide6_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 63
) );
$wp_customize->add_setting(
    'themeslug_slide6_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide6_htag_bg',
        array(
            'label' => 'Slide 6 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide6_htag_bg',
            'priority'    => 64
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide6_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide6_btn_text', array(
    'label'    => __( 'Slide 6 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 65
) );
$wp_customize->add_setting( 'themeslug_slide6_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide6_btn_link', array(
    'label'    => __( 'Slide 6 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 66
) );
$wp_customize->add_setting( 'themeslug_slide6_text_align' );
$wp_customize->add_control( 'themeslug_slide6_text_align', array(
    'label'    => __( 'Slide 6 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 67
) );
$wp_customize->add_setting( 'themeslug_slide6_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide6_pic', array(
    'label'    => __( 'Slide 6 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide6_pic',
    'priority'    => 68
) ) );
$wp_customize->add_setting(
    'themeslug_slide6_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide6_overlay_color',
        array(
            'label' => 'Slide 6 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide6_overlay_color',
            'priority'    => 69
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide6_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide6_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 70
) );
$wp_customize->add_setting( 'themeslug_slide6_order' );
$wp_customize->add_control( 'themeslug_slide6_order', array(
    'label'    => __( 'Slide 6 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 71
) );

/*** Slide 7 ***/
$wp_customize->add_setting( 'themeslug_slide7_title',
	array (
		'default' => 'This is the seventh slide.',
		) );
$wp_customize->add_control( 'themeslug_slide7_title', array(
    'label'    => __( '-------------------------------------- Slide 7 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 72
) );
$wp_customize->add_setting( 'themeslug_slide7_descr',
	array (
		'default' => 'This is the description for the seventh slide.',
		) );
$wp_customize->add_control( 'themeslug_slide7_descr', array(
    'label'    => __( 'Slide 7 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 73
) );
$wp_customize->add_setting(
    'themeslug_slide7_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide7_text_color',
        array(
            'label' => 'Slide 7 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide7_text_color',
            'priority'    => 74
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide7_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide7_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 75
) );
$wp_customize->add_setting(
    'themeslug_slide7_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide7_htag_bg',
        array(
            'label' => 'Slide 7 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide7_htag_bg',
            'priority'    => 76
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide7_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide7_btn_text', array(
    'label'    => __( 'Slide 7 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 77
) );
$wp_customize->add_setting( 'themeslug_slide7_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide7_btn_link', array(
    'label'    => __( 'Slide 7 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 78
) );
$wp_customize->add_setting( 'themeslug_slide7_text_align' );
$wp_customize->add_control( 'themeslug_slide7_text_align', array(
    'label'    => __( 'Slide 7 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 79
) );
$wp_customize->add_setting( 'themeslug_slide7_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide7_pic', array(
    'label'    => __( 'Slide 7 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide7_pic',
    'priority'    => 80
) ) );
$wp_customize->add_setting(
    'themeslug_slide7_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide7_overlay_color',
        array(
            'label' => 'Slide 7 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide7_overlay_color',
            'priority'    => 81
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide7_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide7_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 82
) );
$wp_customize->add_setting( 'themeslug_slide7_order' );
$wp_customize->add_control( 'themeslug_slide7_order', array(
    'label'    => __( 'Slide 7 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 83
) );

/*** Slide 8 ***/
$wp_customize->add_setting( 'themeslug_slide8_title',
	array (
		'default' => 'This is the eighth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide8_title', array(
    'label'    => __( '-------------------------------------- Slide 8 Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 84
) );
$wp_customize->add_setting( 'themeslug_slide8_descr',
	array (
		'default' => 'This is the description for the eighth slide.',
		) );
$wp_customize->add_control( 'themeslug_slide8_descr', array(
    'label'    => __( 'Slide 8 description', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 85
) );
$wp_customize->add_setting(
    'themeslug_slide8_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide8_text_color',
        array(
            'label' => 'Slide 8 Text Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide8_text_color',
            'priority'    => 86
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide8_add_htag_bg');
$wp_customize->add_control( 'themeslug_slide8_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 87
) );
$wp_customize->add_setting(
    'themeslug_slide8_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide8_htag_bg',
        array(
            'label' => 'Slide 8 H1 Background Color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide8_htag_bg',
            'priority'    => 88
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide8_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_slide8_btn_text', array(
    'label'    => __( 'Slide 8 button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 89
) );
$wp_customize->add_setting( 'themeslug_slide8_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_slide8_btn_link', array(
    'label'    => __( 'Slide 8 button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 90
) );
$wp_customize->add_setting( 'themeslug_slide8_text_align' );
$wp_customize->add_control( 'themeslug_slide8_text_align', array(
    'label'    => __( 'Slide 8 Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 91
) );
$wp_customize->add_setting( 'themeslug_slide8_pic' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_slide8_pic', array(
    'label'    => __( 'Slide 8 Image', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'settings' => 'themeslug_slide8_pic',
    'priority'    => 92
) ) );
$wp_customize->add_setting(
    'themeslug_slide8_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_slide8_overlay_color',
        array(
            'label' => 'Slide 8 overlay color',
            'section' => 'themeslug_fheader_section',
            'settings' => 'themeslug_slide8_overlay_color',
            'priority'    => 93
        )
    )
);
$wp_customize->add_setting( 'themeslug_slide8_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_slide8_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'text',
    'priority'    => 94
) );
$wp_customize->add_setting( 'themeslug_slide8_order' );
$wp_customize->add_control( 'themeslug_slide8_order', array(
    'label'    => __( 'Slide 8 Order', 'themeslug' ),
    'section'  => 'themeslug_fheader_section',
    'type' => 'select',
    'default' => '1',
    'choices' => array(
    	'value1' => '1',
    	'value2' => '2',
    	'value3' => '3',
    	'value4' => '4',
    	'value5' => '5',
    	'value6' => '6',
    	'value7' => '7',
    	'value8' => '8'
    	),
    'priority'    => 95
) );


/***************************************** Feature Header - Video *****************************************/

$wp_customize->add_section( 'themeslug_fheader_video_section' , array(
    'title'       => __( 'Feature Header - Video', 'themeslug' ),
    'priority'    => 4,
    'panel' => 'panel_3',
) );
$wp_customize->add_setting( 'themeslug_video_title',
	array (
		'default' => 'This is the video header.',
) );
$wp_customize->add_control( 'themeslug_video_title', array(
    'label'    => __( 'Video Title', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'type' => 'text',
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_video_descr',
	array (
		'default' => 'This is some text.',
		) );
$wp_customize->add_control( 'themeslug_video_descr', array(
    'label'    => __( 'Video description', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'type' => 'text',
    'priority'    => 2
) );
$wp_customize->add_setting(
    'themeslug_video_text_color',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_video_text_color',
        array(
            'label' => 'Video Text Color',
            'section' => 'themeslug_fheader_video_section',
            'settings' => 'themeslug_video_text_color',
            'priority'    => 3
        )
    )
);
$wp_customize->add_setting( 'themeslug_video_add_htag_bg');
$wp_customize->add_control( 'themeslug_video_add_htag_bg', array(
    'label'    => __( 'Add Background to H1', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 4
) );
$wp_customize->add_setting(
    'themeslug_video_htag_bg',
    array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_video_htag_bg',
        array(
            'label' => 'Video H1 Background Color',
            'section' => 'themeslug_fheader_video_section',
            'settings' => 'themeslug_video_htag_bg',
            'priority'    => 5
        )
    )
);
$wp_customize->add_setting( 'themeslug_video_btn_text',
	array (
		'default' => 'Learn More',
) );
$wp_customize->add_control( 'themeslug_video_btn_text', array(
    'label'    => __( 'Video button button text', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'type' => 'text',
    'priority'    => 6
) );
$wp_customize->add_setting( 'themeslug_video_btn_link',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_video_btn_link', array(
    'label'    => __( 'Video button link', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'type' => 'text',
    'priority'    => 7
) );
$wp_customize->add_setting( 'themeslug_video_text_align' );
$wp_customize->add_control( 'themeslug_video_text_align', array(
    'label'    => __( 'Video Text Alignment', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'left',
    	'value2' => 'center',
    	'value3' => 'right',
    	),
    'priority'    => 8
) );
$wp_customize->add_setting(
    'themeslug_video_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_video_overlay_color',
        array(
            'label' => 'video overlay color',
            'section' => 'themeslug_fheader_video_section',
            'settings' => 'themeslug_video_overlay_color',
            'priority'    => 10
        )
    )
);
$wp_customize->add_setting( 'themeslug_video_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_video_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'type' => 'text',
    'priority'    => 11
) );
$wp_customize->add_setting( 'themeslug_video_webm' );
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'themeslug_video_webm', array(
    'label'    => __( 'Video .webm upload', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'settings' => 'themeslug_video_webm',
    'priority'    => 12
) ) );
$wp_customize->add_setting( 'themeslug_video_mp4' );
$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'themeslug_video_mp4', array(
    'label'    => __( 'Video .mp4 upload', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'settings' => 'themeslug_video_mp4',
    'priority'    => 13
) ) );
$wp_customize->add_setting( 'themeslug_video_poster' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_video_poster', array(
    'label'    => __( 'Video Poster', 'themeslug' ),
    'section'  => 'themeslug_fheader_video_section',
    'settings' => 'themeslug_video_poster',
    'priority'    => 14
) ) );


/***************************************** Credential Logos *****************************************/

$wp_customize->add_section( 'themeslug_bar_logos_section' , array(
    'title'       => __( 'Logo Bar', 'themeslug' ),
    'priority'    => 20,
    'description' => 'Bar of logos that will sit below the Feature/Slider area',
    'panel' => 'panel_3',
) );
$wp_customize->add_setting( 'themeslug_bar_logos_on' );
$wp_customize->add_control( 'themeslug_bar_logos_on', array(
    'label'    => __( 'Show logo bar', 'themeslug' ),
    'section'  => 'themeslug_bar_logos_section',
    'type' => 'select',
    'default' => 'Yes',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_bar_logos' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_bar_logos', array(
    'label'    => __( 'Logos image', 'themeslug' ),
    'section'  => 'themeslug_bar_logos_section',
    'settings' => 'themeslug_bar_logos',
    'priority'    => 2
) ) );


/***************************************** Feature Boxes *****************************************/

$wp_customize->add_section( 'themeslug_fboxes_section' , array(
    'title'       => __( 'Feature Boxes', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Feature Boxes',
    'panel' => 'panel_3',
) );
$wp_customize->add_setting( 'themeslug_fboxes_on');
$wp_customize->add_control( 'themeslug_fboxes_on', array(
    'label'    => __( 'Show Feature Boxes', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );

$wp_customize->add_setting( 'themeslug_fboxes_format');
$wp_customize->add_control( 'themeslug_fboxes_format', array(
    'label'    => __( 'Select Box Format', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'select',
    'default' => 'Text Overlay, Image Under',
    'choices' => array(
    	'value1' => 'Text Overlay, Image Under',
    	'value2' => 'Image Above, Text Under',
    	),
    'priority'    => 2
) );

$wp_customize->add_setting( 'themeslug_fboxes_count');
$wp_customize->add_control( 'themeslug_fboxes_count', array(
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

$wp_customize->add_setting( 'themeslug_fbox_img_style');
$wp_customize->add_control( 'themeslug_fbox_img_style', array(
    'label'    => __( 'Select Image Style', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'select',
    'default' => 'Squared',
    'choices' => array(
    	'value1' => 'Squared Corners',
    	'value2' => 'Rounded Corners',
    	'value3' => 'Circle'
    	),
    'priority'    => 4
) );
$wp_customize->add_setting(
    'fbox_text_color',
    array(
        'default' => '#2e6da4',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fbox_text_color',
        array(
            'label' => 'Feature Boxes Text color',
            'section' => 'themeslug_fboxes_section',
            'settings' => 'fbox_text_color',
            'priority'    => 5
        )
    )
);
$wp_customize->add_setting(
    'fbox_text_bg_color',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fbox_text_bg_color',
        array(
            'label' => 'Feature Boxes Text Background color',
            'section' => 'themeslug_fboxes_section',
            'settings' => 'fbox_text_bg_color',
            'priority'    => 6
        )
    )
);
$wp_customize->add_setting(
    'fbox_text_bg_hover_color',
    array(
        'default' => '#f9f9f9',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fbox_text_bg_hover_color',
        array(
            'label' => 'Feature Boxes Text Background hover color',
            'section' => 'themeslug_fboxes_section',
            'settings' => 'fbox_text_bg_hover_color',
            'priority'    => 7
        )
    )
);
$wp_customize->add_setting(
    'themeslug_fbox_overlay_color',
    array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_fbox_overlay_color',
        array(
            'label' => 'Featured Box overlay color',
            'section' => 'themeslug_fboxes_section',
            'settings' => 'themeslug_fbox_overlay_color',
            'priority'    => 8
        )
    )
);
$wp_customize->add_setting( 'themeslug_fbox_color_opacity',
	array (
		'default' => '0.1',
) );
$wp_customize->add_control( 'themeslug_fbox_color_opacity', array(
    'label'    => __( 'Overlay color opacity (0.0 - 1.0)', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 9
) );

/** Box One **/
$wp_customize->add_setting( 'themeslug_fbox_1_title',
	array (
		'default' => 'Box 1 Title',
		) );
$wp_customize->add_control( 'themeslug_fbox_1_title', array(
    'label'    => __( 'Box 1 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_fbox_1_img' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_fbox_1_img', array(
    'label'    => __( 'Box 1 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_fbox_1_img',
    'priority'    => 11
) ) );
$wp_customize->add_setting( 'themeslug_fbox_1_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_fbox_1_url', array(
    'label'    => __( 'Box 1 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 12
) );
$wp_customize->add_setting( 'themeslug_fbox_1_descr',
	array (
		'default' => 'This is a description.',
		) );
$wp_customize->add_control( 'themeslug_fbox_1_descr', array(
    'label'    => __( 'Box 1 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 13
) );
$wp_customize->add_setting( 'themeslug_fbox_1_btn',
	array (
		'default' => 'Button 2 text',
		) );
$wp_customize->add_control( 'themeslug_fbox_1_btn', array(
    'label'    => __( 'Box 1 Button', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 14
 ) );

 /** Box Two **/
$wp_customize->add_setting( 'themeslug_fbox_2_title',
	array (
		'default' => 'Box 2 Title',
		) );
$wp_customize->add_control( 'themeslug_fbox_2_title', array(
    'label'    => __( '-------------------------------------- Box 2 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 15
) );
$wp_customize->add_setting( 'themeslug_fbox_2_img' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_fbox_2_img', array(
    'label'    => __( 'Box 2 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_fbox_2_img',
    'priority'    => 16
) ) );
$wp_customize->add_setting( 'themeslug_fbox_2_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_fbox_2_url', array(
    'label'    => __( 'Box 2 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 17
) );
$wp_customize->add_setting( 'themeslug_fbox_2_descr',
	array (
		'default' => 'This is a description.',
		) );
$wp_customize->add_control( 'themeslug_fbox_2_descr', array(
    'label'    => __( 'Box 2 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 18
 ) );
 $wp_customize->add_setting( 'themeslug_fbox_2_btn',
	array (
		'default' => 'Button 2 text',
		) );
$wp_customize->add_control( 'themeslug_fbox_2_btn', array(
    'label'    => __( 'Box 2 Button', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 19
 ) );

 /** Box Three **/
$wp_customize->add_setting( 'themeslug_fbox_3_title',
	array (
		'default' => 'Box 3 Title',
		) );
$wp_customize->add_control( 'themeslug_fbox_3_title', array(
    'label'    => __( '-------------------------------------- Box 3 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 20
) );
$wp_customize->add_setting( 'themeslug_fbox_3_img' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_fbox_3_img', array(
    'label'    => __( 'Box 3 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_fbox_3_img',
    'priority'    => 21
) ) );
$wp_customize->add_setting( 'themeslug_fbox_3_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_fbox_3_url', array(
    'label'    => __( 'Box 3 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 22
) );
$wp_customize->add_setting( 'themeslug_fbox_3_descr',
	array (
		'default' => 'This is a description.',
		) );
$wp_customize->add_control( 'themeslug_fbox_3_descr', array(
    'label'    => __( 'Box 3 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 23
) );
$wp_customize->add_setting( 'themeslug_fbox_3_btn',
	array (
		'default' => 'Button 3 text',
		) );
$wp_customize->add_control( 'themeslug_fbox_3_btn', array(
    'label'    => __( 'Box 3 Button', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 24
 ) );

 /** Box Four **/
$wp_customize->add_setting( 'themeslug_fbox_4_title',
	array (
		'default' => 'Box 4 Title',
		) );
$wp_customize->add_control( 'themeslug_fbox_4_title', array(
    'label'    => __( '-------------------------------------- Box 4 Title', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 25
) );
$wp_customize->add_setting( 'themeslug_fbox_4_img' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_fbox_4_img', array(
    'label'    => __( 'Box 4 Image', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'settings' => 'themeslug_fbox_4_img',
    'priority'    => 26
) ) );
$wp_customize->add_setting( 'themeslug_fbox_4_url',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_fbox_4_url', array(
    'label'    => __( 'Box 4 Link', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 27
) );
$wp_customize->add_setting( 'themeslug_fbox_4_descr',
	array (
		'default' => 'This is a description.',
		) );
$wp_customize->add_control( 'themeslug_fbox_4_descr', array(
    'label'    => __( 'Box 4 Description', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 28
) );
$wp_customize->add_setting( 'themeslug_fbox_4_btn',
	array (
		'default' => 'Button 4 text',
		) );
$wp_customize->add_control( 'themeslug_fbox_4_btn', array(
    'label'    => __( 'Box 4 Button', 'themeslug' ),
    'section'  => 'themeslug_fboxes_section',
    'type' => 'text',
    'priority'    => 29
) );


/***************************************** IV. Static Front Page *****************************************/
$wp_customize->add_section( 'static_front_page' , array(
   'panel' => 'panel_3',
   'title'       => __( 'Static Front Page', 'themeslug' ),
   'priority'    => 40,
) );

/*
*
*
*
*
* 4. Footer
*
*
*
*
*/
$wp_customize->add_panel( 'panel_4', array(
    'title' => '4. Footer',
    'description' => 'This panel contains header sections.',
    'priority' => 4,
) );

/* Footer Colors */
$wp_customize->add_section( 'themeslug_footer_colors_section' , array(
    'title'       => __( 'Footer Colors', 'themeslug' ),
    'priority'    => 2,
    'panel' => 'panel_4',
) );
$wp_customize->add_setting(
    'themeslug_footer_bg_color',
    array(
        'default' => '#f7f7f7',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_footer_bg_color',
        array(
            'label' => 'Footer background color',
            'section' => 'themeslug_footer_colors_section',
            'settings' => 'themeslug_footer_bg_color',
            'priority'    => 1
        )
    )
);
$wp_customize->add_setting(
    'themeslug_footer_text_color',
    array(
        'default' => '#444444',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_footer_text_color',
        array(
            'label' => 'Footer text color',
            'section' => 'themeslug_footer_colors_section',
            'settings' => 'themeslug_footer_text_color',
            'priority'    => 2
        )
    )
);
$wp_customize->add_setting(
    'themeslug_footer_a_color',
    array(
        'default' => '#0275d8',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'themeslug_footer_a_color',
        array(
            'label' => 'Footer link color',
            'section' => 'themeslug_footer_colors_section',
            'settings' => 'themeslug_footer_a_color',
            'priority'    => 3
        )
    )
);

/* About Text */
$wp_customize->add_section( 'themeslug_footer_about_section' , array(
    'title'       => __( 'About Text', 'themeslug' ),
    'priority'    => 3,
    'description' => 'About text in footer.',
   'panel' => 'panel_4',
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
$wp_customize->add_setting( 'themeslug_footer_about_text',
	array (
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut placerat lorem tortor, eget interdum quam. Ut sit amet urna nunc, sed gravida nisi. Vivamus in elit eget nisl egestas egestas et nec lectus.',
		) );
$wp_customize->add_control( new HBC_Customize_Textarea_Control( $wp_customize, 'themeslug_footer_about_section', array(
    'label'   => 'Content',
    'section' => 'themeslug_footer_about_section',
    'settings'   => 'themeslug_footer_about_text',
) ) );

/* Footer Photos */
$wp_customize->add_section( 'themeslug_footer_photos_section' , array(
    'title'       => __( 'Footer Photos', 'themeslug' ),
    'priority'    => 4,
    'description' => 'Please use photos of the same size/aspect ratio. Do not upload hi resolution photos here.',
    'panel' => 'panel_4',
) );
$wp_customize->add_setting( 'themeslug_show_footer_pics');
$wp_customize->add_control( 'themeslug_show_footer_pics', array(
    'label'    => __( 'Show Footer Photos', 'themeslug' ),
    'section'  => 'themeslug_footer_photos_section',
    'type' => 'select',
    'default' => 'No',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_footer_img1' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_footer_img1', array(
    'label'    => __( 'Footer Image 1', 'themeslug' ),
    'section'  => 'themeslug_footer_photos_section',
    'settings' => 'themeslug_footer_img1',
    'priority'    => 2
) ) );
$wp_customize->add_setting( 'themeslug_footer_img2' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_footer_img2', array(
    'label'    => __( 'Footer Image 2', 'themeslug' ),
    'section'  => 'themeslug_footer_photos_section',
    'settings' => 'themeslug_footer_img2',
    'priority'    => 3
) ) );
$wp_customize->add_setting( 'themeslug_footer_img3' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_footer_img3', array(
    'label'    => __( 'Footer Image 3', 'themeslug' ),
    'section'  => 'themeslug_footer_photos_section',
    'settings' => 'themeslug_footer_img3',
    'priority'    => 4
) ) );

/* Footer Disclaimer */
$wp_customize->add_section( 'themeslug_disclaimer_section' , array(
    'title'       => __( 'Disclaimer, Privacy Policy, Sitemap', 'themeslug' ),
    'priority'    => 5,
    'description' => 'Footer Links',
   'panel' => 'panel_4',
) );
$wp_customize->add_setting( 'themeslug_show_priv');
$wp_customize->add_control( 'themeslug_show_priv', array(
    'label'    => __( 'Show Privacy Policy Link', 'themeslug' ),
    'section'  => 'themeslug_disclaimer_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_show_disclaimer');
$wp_customize->add_control( 'themeslug_show_disclaimer', array(
    'label'    => __( 'Show Disclaimer Link', 'themeslug' ),
    'section'  => 'themeslug_disclaimer_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 2
) );
$wp_customize->add_setting( 'themeslug_show_sitemap');
$wp_customize->add_control( 'themeslug_show_sitemap', array(
    'label'    => __( 'Show Sitemap Link', 'themeslug' ),
    'section'  => 'themeslug_disclaimer_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'Yes',
    	'value2' => 'No',
    	),
    'priority'    => 3
) );
$wp_customize->add_setting( 'themeslug_show_addl_disclaimer' );
$wp_customize->add_control( 'themeslug_show_addl_disclaimer', array(
    'label'    => __( 'Show Additional Disclaimer Text', 'themeslug' ),
    'section'  => 'themeslug_disclaimer_section',
    'type' => 'checkbox',
    'priority'    => 10
) );
$wp_customize->add_setting( 'themeslug_disclaimer',
	array (
		'default' => '&nbsp;',
) );
$wp_customize->add_control( 'themeslug_disclaimer', array(
    'label'    => __( 'Additional Footer Disclaimer Text', 'themeslug' ),
    'section'  => 'themeslug_disclaimer_section',
    'type' => 'text',
    'priority'    => 11
 ) );

/* Footer Powered by link */
$wp_customize->add_section( 'themeslug_powered_section' , array(
    'title'       => __( '"Powered by" link', 'themeslug' ),
    'priority'    => 6,
    'description' => 'You can change the "Powered by" from Killer Shark to something else for white label clients.',
   'panel' => 'panel_4',
) );
$wp_customize->add_setting( 'themeslug_powered_type');
$wp_customize->add_control( 'themeslug_powered_type', array(
    'label'    => __( 'Killer Shark or White Label?', 'themeslug' ),
    'section'  => 'themeslug_powered_section',
    'type' => 'select',
    'default' => 'value1',
    'choices' => array(
    	'value1' => 'Killer Shark',
    	'value2' => 'White Label',
    	),
    'priority'    => 1
) );
$wp_customize->add_setting( 'themeslug_powered_wl_text',
	array (
		'default' => 'Site by White Label Inc',
) );
$wp_customize->add_control( 'themeslug_powered_wl_text', array(
    'label'    => __( 'White Label Client text', 'themeslug' ),
    'section'  => 'themeslug_powered_section',
    'type' => 'text',
    'priority'    => 2
 ) );
 $wp_customize->add_setting( 'themeslug_powered_wl_a',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_powered_wl_a', array(
    'label'    => __( 'White Label Client link', 'themeslug' ),
    'section'  => 'themeslug_powered_section',
    'type' => 'text',
    'priority'    => 3
 ) );
 
 /* Footer Scripts */
$wp_customize->add_section( 'themeslug_footer_scripts_section' , array(
    'title'       => __( 'Footer Scripts', 'themeslug' ),
    'priority'    => 7,
    'description' => 'Place any scripts that need to go in the footer',
   'panel' => 'panel_4',
) );

$wp_customize->add_setting( 'themeslug_footer_scripts',
	array (
		'default' => '',
		) );
$wp_customize->add_control( new HBC_Customize_Textarea_Control( $wp_customize, 'themeslug_footer_scripts_section', array(
    'label'   => 'Content',
    'section' => 'themeslug_footer_scripts_section',
    'settings'   => 'themeslug_footer_scripts',
) ) );

 
/*
*
*
*
*
* 5. Social
*
*
*
*
*/
$wp_customize->add_panel( 'panel_5', array(
    'title' => '5. Social',
    'description' => 'This panel contains header sections.',
    'priority' => 5,
) );
/***************************************** Social Buttons *****************************************/

$wp_customize->add_section( 'themeslug_social_section' , array(
    'title'       => __( 'Social URLs', 'themeslug' ),
    'priority'    => 10,
    'description' => 'Social button URLs',
    'panel' => 'panel_5',
) );

/*** Facebook ***/
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
$wp_customize->add_setting( 'themeslug_show_facebook',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_facebook', array(
    'label'    => __( 'Show Facebok', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 2,
) );

/*** Google Plus ***/
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
$wp_customize->add_setting( 'themeslug_show_gplus',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_gplus', array(
    'label'    => __( 'Show Google+', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 4,
) );

/*** Twitter ***/
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
$wp_customize->add_setting( 'themeslug_show_twitter',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_twitter', array(
    'label'    => __( 'Show Twitter', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 6,
) );

/*** Instagram ***/
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
$wp_customize->add_setting( 'themeslug_show_instagram',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_instagram', array(
    'label'    => __( 'Show Instagram', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 8,
) );

/*** LinkedIn ***/
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
$wp_customize->add_setting( 'themeslug_show_linkedin',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_linkedin', array(
    'label'    => __( 'Show LinkedIn', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 10,
) );

/*** Pinterest ***/
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
$wp_customize->add_setting( 'themeslug_show_pinterest',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_pinterest', array(
    'label'    => __( 'Show Pinterest', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 12,
) );

/*** YouTube ***/
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
$wp_customize->add_setting( 'themeslug_show_youtube',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_youtube', array(
    'label'    => __( 'Show YouTube', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 14,
) );

/*** FourSquare ***/
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
$wp_customize->add_setting( 'themeslug_show_foursquare',
	array (
		'default' => '#',
) );
$wp_customize->add_control( 'themeslug_show_foursquare', array(
    'label'    => __( 'Show FourSquare', 'themeslug' ),
    'section'  => 'themeslug_social_section',
    'type' => 'checkbox',
    'priority'    => 16,
) );

/*
*
*
*
*
* 6. Widgets
*
*
*
*
*/
$wp_customize->add_panel( 'widgets', array(
    'title' => '6. Widgets',
    'description' => 'This panel contains footer and sidebar widgets.',
    'priority' => 6,
) );


}
add_action('customize_register', 'themeslug_theme_customizer');


function my_customizer_script(){
?>
<script type="text/javascript">
jQuery(document).ready(function ($) {

	/* Hiding/showing Top Nav Left Side */
	var themeslug_nav_top_left_item1_on = $( '#customize-control-themeslug_nav_top_left_item1_on' );

	/* on page load, hide or show Item 1 option */
	if( $( '#customize-control-themeslug_nav_top_left_on select' ).prop( "checked" ) ){
		themeslug_nav_top_left_item1_on.show();
	}
	else{
		themeslug_nav_top_left_item1_on.hide();
	}

	/* on change, hide or show Item 1 option */
	$( '#customize-control-themeslug_nav_top_left_on select' ).change(function(){
		if($(this).val() == 'value1'){
			themeslug_nav_top_left_item1_on.show();
		} else {
			themeslug_nav_top_left_item1_on.hide();
		}
	});
});
</script>
<?php
}

add_action( 'customize_controls_print_footer_scripts', 'my_customizer_script' );
