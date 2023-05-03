<?php
/**
 * Must Read options.
 *
 * @package Kuza Corporate
 */

$default = kuza_corporate_get_default_theme_options();

// Must Read Section
$wp_customize->add_section( 'section_home_mustread',
	array(
		'title'      => __( 'Must Read Posts', 'kuza-corporate' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kuza_corporate_mustread_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_mustread_section]',
	array(
		'default'           => $default['disable_mustread_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[disable_mustread_section]',
    array(
		'label' 			=> __('Enable/Disable Must Read Section', 'kuza-corporate'),
		'section'    		=> 'section_home_mustread',
		 'settings'  		=> 'theme_options[disable_mustread_section]',
		'on_off_label' 		=> kuza_corporate_switch_options(),
    )
) );


//Must Read Section title
$wp_customize->add_setting('theme_options[mustread_title]', 
	array(
	'default'           => $default['mustread_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[mustread_title]', 
	array(
	'label'       => __('Section Title', 'kuza-corporate'),
	'section'     => 'section_home_mustread',   
	'settings'    => 'theme_options[mustread_title]',
	'active_callback' => 'kuza_corporate_mustread_active',		
	'type'        => 'text'
	)
);


// Setting  Team Category.
$wp_customize->add_setting( 'theme_options[mustread_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Kuza_Corporate_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[mustread_category]',
		array(
		'label'    => __( 'Select Category', 'kuza-corporate' ),
		'section'  => 'section_home_mustread',
		'settings' => 'theme_options[mustread_category]',	
		'active_callback' => 'kuza_corporate_mustread_active',		
		)
	)
);
