<?php
/**
 * Category options.
 *
 * @package Kuza
 */

$default = kuza_corporate_get_default_theme_options();

// Category Author Section
$wp_customize->add_section( 'section_home_layout',
	array(
		'title'      => __( 'Homepage Layout', 'kuza-corporate' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[homepage_layout_options]', array(
	'default'           => $default['homepage_layout_options'],
	'sanitize_callback' => 'kuza_corporate_sanitize_select',
	'type'				=> 'theme_mod',
) );

$wp_customize->add_control( 'theme_options[homepage_layout_options]', array(
	'label'             => esc_html__( 'Choose HomePage Color Layout', 'kuza-corporate' ),
	'section'           => 'section_home_layout',
	'type'              => 'radio',
	'choices'				=> array( 
		'lite-layout'     => esc_html__( 'Lite HomePage', 'kuza-corporate' ), 
		'dark-layout'     => esc_html__( 'Dark HomePage', 'kuza-corporate' ),
		)
) );



$wp_customize->add_setting('theme_options[homepage_design_layout_options]', 
	array(
	'default' 			=> $default['homepage_design_layout_options'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kuza_corporate_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[homepage_design_layout_options]', 
	array(
	'label'             => esc_html__( 'Choose HomePage Layout', 'kuza-corporate' ),
	'description' => __('Save & Refresh the customizer to see its effect.', 'kuza-corporate'),
	'section'     => 'section_home_layout',   
	'settings'    => 'theme_options[homepage_design_layout_options]',		
	'type'        => 'select',
	'choices'	  => array(  
		'home-fitness'     => esc_html__( 'Fitness HomePage', 'kuza-corporate' ),
		'home-medical'     => esc_html__( 'Medical HomePage', 'kuza-corporate' ), 
		'home-education'     => esc_html__( 'Education HomePage', 'kuza-corporate' ), 
		'home-nature'     => esc_html__( 'Slider HomePage', 'kuza-corporate' ), 
		'home-magazine'     => esc_html__( 'Magazine HomePage', 'kuza-corporate' ),
		'home-blog'     => esc_html__( 'Blog HomePage', 'kuza-corporate' ),
		'home-business'     => esc_html__( 'Business HomePage', 'kuza-corporate' ),
		'home-normal-magazine'     => esc_html__( 'Normal Magazine HomePage', 'kuza-corporate' ), 
		'home-corporate'     => esc_html__( 'Corporate HomePage', 'kuza-corporate' ),  
		'home-normal-blog'     => esc_html__( 'Normal Blog HomePage', 'kuza-corporate' ),  
		'home-minimal-blog'     => esc_html__( 'Minimal Blog HomePage', 'kuza-corporate' ), 
		'home-classic-blog'     => esc_html__( 'Classic Blog HomePage', 'kuza-corporate' ),
		),
	)
);

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[homepage_sidebar_position]', array(
	'default'           => $default['homepage_sidebar_position'],
	'sanitize_callback' => 'kuza_corporate_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[homepage_sidebar_position]', array(
	'label'             => esc_html__( 'Choose HomePage sidebar Layout', 'kuza-corporate' ),
	'section'           => 'section_home_layout',
	'type'              => 'radio',
	'active_callback'	=> 'kuza_corporate_home_magazine_enable',
	'choices'				=> array( 
		'home-no-sidebar'     => esc_html__( 'No Sidebar', 'kuza-corporate' ), 
		'home-right-sidebar'     => esc_html__( 'Right Sidebar', 'kuza-corporate' ),
		)
) );

