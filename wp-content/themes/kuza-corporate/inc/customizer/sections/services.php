<?php
/**
 * Services options.
 *
 * @package Kuza Corporate
 */

$default = kuza_corporate_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_home_services',
	array(
		'title'      => __( 'Services Section', 'kuza-corporate' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kuza_corporate_services_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_services_section]',
	array(
		'default'           => $default['disable_services_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[disable_services_section]',
    array(
		'label' 			=> __('Enable/Disable Service Section', 'kuza-corporate'),
		'section'    		=> 'section_home_services',
		 'settings'  		=> 'theme_options[disable_services_section]',
		'on_off_label' 		=> kuza_corporate_switch_options(),
    )
) );


// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[disable_services_background]', array(
	'default'           => $default['disable_services_background'],
	'sanitize_callback' => 'kuza_corporate_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[disable_services_background]', array(
	'label'             => esc_html__( 'Enable Services Image', 'kuza-corporate' ),
	'description' => __('Enable for Image in Left Side/ Disable for Background', 'kuza-corporate'),
	'section'           => 'section_home_services',
	'type'              => 'checkbox',
	'active_callback' => 'kuza_corporate_services_active',
) );

// services title setting and control
$wp_customize->add_setting( 'theme_options[services_background_image]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[services_background_image]', array(
	 esc_html__( 'Select Background Image', 'kuza-corporate' ),
	'section'        	=> 'section_home_services',
	'settings'    		=> 'theme_options[services_background_image]',	
	'active_callback' 	=> 'kuza_corporate_services_active',
) ) );

//Services Section title
$wp_customize->add_setting('theme_options[services_title]', 
	array(
	'default'           => $default['services_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[services_title]', 
	array(
	'label'       => __('Section Title', 'kuza-corporate'),
	'section'     => 'section_home_services',   
	'settings'    => 'theme_options[services_title]',
	'active_callback' => 'kuza_corporate_services_active',		
	'type'        => 'text'
	)
);

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[disable_services_icon]', array(
	'default'           => $default['disable_services_icon'],
	'sanitize_callback' => 'kuza_corporate_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[disable_services_icon]', array(
	'label' 			=> __('Enable/Disable Service icons', 'kuza-corporate'),
	'description' => __('If Services icons is disable then features image is enable', 'kuza-corporate'),
	'section'    		=> 'section_home_services',
	'settings'  		=> 'theme_options[disable_services_icon]',
	'type'              => 'checkbox',
	'active_callback' => 'kuza_corporate_services_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[services_content_enable]', array(
	'default'           => $default['services_content_enable'],
	'sanitize_callback' => 'kuza_corporate_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[services_content_enable]', array(
	'label'             => esc_html__( 'Enable Services Content', 'kuza-corporate' ),
	'section'           => 'section_home_services',
	'type'              => 'checkbox',
	'active_callback' => 'kuza_corporate_services_active',
) );

$number_of_services_items = kuza_corporate_get_option( 'number_of_services_items' );

for( $i=1; $i<=$number_of_services_items; $i++ ){

		//Services Section icon
	$wp_customize->add_setting('theme_options[services_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[services_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Icon #%1$s', 'kuza-corporate'), $i),
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'kuza-corporate'), '<a href="' . esc_url( 'https://fontawesome.com/v4/icons/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_home_services',   
		'settings'    => 'theme_options[services_icon_'.$i.']',
		'active_callback' => 'kuza_corporate_services_active',		
		'type'        => 'text'
		)
	);

	// Additional Information First Post
	$wp_customize->add_setting('theme_options[services_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kuza_corporate_dropdown_posts'
		)
	);
	$wp_customize->add_control( new Kuza_Corporate_Dropdown_Chooser( $wp_customize,'theme_options[services_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'kuza-corporate'), $i),
		'section'     => 'section_home_services',  
		'settings'    => 'theme_options[services_post_'.$i.']',	
		'choices'			=> kuza_corporate_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'kuza_corporate_services_active',
		)
	));

	// services hr setting and control
	$wp_customize->add_setting( 'theme_options[services_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Kuza_Corporate_Customize_Horizontal_Line( $wp_customize, 'theme_options[services_hr_'. $i .']',
		array(
			'section'         => 'section_home_services',
			'active_callback' => 'kuza_corporate_services_active',
			'type'			  => 'hr',
	) ) );
}

