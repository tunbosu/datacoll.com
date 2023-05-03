<?php
/**
 * Team options.
 *
 * @package Kuza Corporate
 */

$default = kuza_corporate_get_default_theme_options();

// Team Section
$wp_customize->add_section( 'section_home_team',
	array(
		'title'      => __( 'Team Section', 'kuza-corporate' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kuza_corporate_team_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_team_section]',
	array(
		'default'           => $default['disable_team_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[disable_team_section]',
    array(
		'label' 			=> __('Enable/Disable Team Section', 'kuza-corporate'),
		'section'    		=> 'section_home_team',
		 'settings'  		=> 'theme_options[disable_team_section]',
		'on_off_label' 		=> kuza_corporate_switch_options(),
    )
) );


//Team Section title
$wp_customize->add_setting('theme_options[team_title]', 
	array(
	'default'           => $default['team_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[team_title]', 
	array(
	'label'       => __('Section Title', 'kuza-corporate'),
	'section'     => 'section_home_team',   
	'settings'    => 'theme_options[team_title]',
	'active_callback' => 'kuza_corporate_team_active',		
	'type'        => 'text'
	)
);

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[team_content_enable]', array(
	'default'           => $default['team_content_enable'],
	'sanitize_callback' => 'kuza_corporate_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[team_content_enable]', array(
	'label'             => esc_html__( 'Enable Team Content', 'kuza-corporate' ),
	'section'           => 'section_home_team',
	'type'              => 'checkbox',
	'active_callback' => 'kuza_corporate_team_active',
) );


$number_of_items = kuza_corporate_get_option( 'number_of_items' );

for( $i=1; $i<=$number_of_items; $i++ ){



	// Additional Information First Post
	$wp_customize->add_setting('theme_options[team_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kuza_corporate_dropdown_posts'
		)
	);
	$wp_customize->add_control( new Kuza_Corporate_Dropdown_Chooser( $wp_customize,'theme_options[team_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'kuza-corporate'), $i),
		'section'     => 'section_home_team',  
		'settings'    => 'theme_options[team_post_'.$i.']',	
		'choices'			=> kuza_corporate_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'kuza_corporate_team_active',
		)
	));

	// team title setting and control
	$wp_customize->add_setting( 'theme_options[team_custom_position_' . $i . ']', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[team_custom_position_' . $i . ']', array(
		'label'           	=> sprintf( __( 'Position %d', 'kuza-corporate' ), $i ),
		'section'        	=> 'section_home_team',
		'settings'    		=> 'theme_options[team_custom_position_'.$i.']',	
		'active_callback' 	=> 'kuza_corporate_team_active',
		'type'				=> 'text',
	) );

	// team hr setting and control
	$wp_customize->add_setting( 'theme_options[team_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Kuza_Corporate_Customize_Horizontal_Line( $wp_customize, 'theme_options[team_hr_'. $i .']',
		array(
			'label'             => __( '<hr style="width: 100%; border: 2px #bcb1b1 solid;"/>', 'kuza-corporate' ),
			'section'         => 'section_home_team',
			'active_callback' => 'kuza_corporate_team_active',
			'type'			  => 'hr',
	) ) );
}
