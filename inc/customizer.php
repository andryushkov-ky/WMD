<?php
/**
 * MaterialDesignBlog Theme Customizer
 *
 * @package MaterialDesignBlog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mdb_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Title & Tagline
	

	$wp_customize->add_setting( 'site_logo',
		array(
			'capability' => 'manage_options'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
	    'label'    => __( 'Site Logo', 'materialdesignblog' ),
	    'section'  => 'title_tagline',
	    'settings' => 'site_logo',
	) ) );

	$wp_customize->add_setting( 'site_logo_top_nav',
		array(
			'capability' => 'manage_options'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo_top_nav', array(
	    'label'    => __( 'Site Logo at Top Navigation', 'materialdesignblog' ),
	    'section'  => 'title_tagline',
	    'settings' => 'site_logo_top_nav',
	) ) );

	$wp_customize->add_setting( 'site_logo_drawer',
		array(
			'capability' => 'manage_options'
		)
	);

	// Social
	$wp_customize->add_section( 'social',
		array(
			'title' 	=> __( 'Social', 'materialdesignblog' ),
			'priority' 	=> 60
		)
	);

	$wp_customize->add_setting( 'twitter_url',
		array(
			'default' 	=> 'http://twitter.com/materialdesignblog',
			'type' 		=> 'option',
			'capability' => 'manage_options'
		)
	);

	$wp_customize->add_control( 'twitter_url',
		array(
			'label' 	=> __( 'Twitter URL', 'materialdesignblog' ),
			'section' 	=> 'social'
		)
	);

	$wp_customize->add_setting( 'facebook_url',
		array(
			'default' 	=> 'http://facebook.com/materialdesignblog',
			'type' 		=> 'option',
			'capability' => 'manage_options'
		)
	);

	$wp_customize->add_control( 'facebook_url',
		array(
			'label' 	=> __( 'Facebook URL', 'materialdesignblog' ),
			'section' 	=> 'social'
		)
	);

	$wp_customize->add_setting( 'googleplus_url',
		array(
			'default' 	=> 'http://google.com/+/materialdesignblog',
			'type' 		=> 'option',
			'capability' => 'manage_options'
		)
	);

	$wp_customize->add_control( 'googleplus_url',
		array(
			'label' 	=> __( 'Google URL', 'materialdesignblog' ),
			'section' 	=> 'social'
		)
	);
}
add_action( 'customize_register', 'mdb_customize_register' );