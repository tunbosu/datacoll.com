<?php
/**
 * Testimonial options.
 *
 * @package Kuza Corporate
 */

$default = kuza_corporate_get_default_theme_options();

// Testimonial Section
$wp_customize->add_section( 'section_home_testimonial',
	array(
		'title'      => __( 'Testimonial Section', 'kuza-corporate' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kuza_corporate_testimonial_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_testimonial_section]',
	array(
		'default'           => $default['disable_testimonial_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[disable_testimonial_section]',
    array(
		'label' 			=> __('Enable/Disable Testimonial Section', 'kuza-corporate'),
		'section'    		=> 'section_home_testimonial',
		 'settings'  		=> 'theme_options[disable_testimonial_section]',
		'on_off_label' 		=> kuza_corporate_switch_options(),
    )
) );


//About Section title
$wp_customize->add_setting('theme_options[testimonial_title]', 
	array(
	'default'           => $default['testimonial_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[testimonial_title]', 
	array(
	'label'       => __('Section Title', 'kuza-corporate'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_title]',
	'active_callback' => 'kuza_corporate_testimonial_active',		
	'type'        => 'text'
	)
);


$number_of_testimonial_items = kuza_corporate_get_option( 'number_of_testimonial_items' );

for( $i=1; $i<=$number_of_testimonial_items; $i++ ){


	// Posts
	$wp_customize->add_setting('theme_options[testimonial_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kuza_corporate_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[testimonial_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'kuza-corporate'), $i),
		'section'     => 'section_home_testimonial',   
		'settings'    => 'theme_options[testimonial_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => kuza_corporate_post_choices(),
		'active_callback' => 'kuza_corporate_testimonial_active',
		)
	);

	
}