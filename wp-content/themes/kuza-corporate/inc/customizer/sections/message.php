<?php
/**
 * Author options.
 *
 * @package Kuza Corporate
 */

$default = kuza_corporate_get_default_theme_options();
$home_layout = kuza_corporate_get_option( 'homepage_design_layout_options' );

// Author section
$wp_customize->add_section( 'section_home_message',
	array(
		'title'      => __( 'Author Section', 'kuza-corporate' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'kuza_corporate_message_design_enable',
		)
);


$wp_customize->add_setting( 'theme_options[disable_message_section]',
	array(
		'default'           => $default['disable_message_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[disable_message_section]',
    array(
		'label' 			=> __('Disable Author section', 'kuza-corporate'),
		'section'    		=> 'section_home_message',
		'on_off_label' 		=> kuza_corporate_switch_options(),
    )
) );

// Additional Information First Page
$wp_customize->add_setting('theme_options[message_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'kuza_corporate_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[message_page]', 
	array(
	'label'       => __('Select Page', 'kuza-corporate'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_page]',		
	'type'        => 'dropdown-pages',
	'active_callback' => 'kuza_corporate_message_active',
	)
);

if ($home_layout=='home-corporate' || $home_layout=='home-medical') {

	//About Counter

	// Number of items
	$wp_customize->add_setting('theme_options[number_of_about_counter_items]', 
		array(
		'default' 			=> $default['number_of_about_counter_items'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'kuza_corporate_sanitize_number_range',
		)
	);

	$wp_customize->add_control('theme_options[number_of_about_counter_items]', 
		array(
		'label'       => __('Number Of Counter', 'kuza-corporate'),
		'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'kuza-corporate'),
		'section'     => 'section_home_message',   
		'settings'    => 'theme_options[number_of_about_counter_items]',		
		'type'        => 'number',
		'active_callback' => 'kuza_corporate_message_active',
		'input_attrs' => array(
				'min'	=> 2,
				'max'	=> 3,
				'step'	=> 1,
			),
		)
	);

	$number_of_about_counter_items = kuza_corporate_get_option( 'number_of_about_counter_items' );

	for( $i=1; $i<=$number_of_about_counter_items; $i++ ){

		//Counter Section icon
		$wp_customize->add_setting('theme_options[about_counter_text_'.$i.']', 
			array(
			'default' 			=> $default['about_counter_text_'.$i],
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',	
			'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( 'theme_options[about_counter_text_' . $i . ']', array(
			'label'           	=> sprintf( __( 'Title %d', 'kuza-corporate' ), $i ),
			'section'        	=> 'section_home_message',	
			'active_callback' 	=> 'kuza_corporate_message_active',
			'type'				=> 'text',
		) );

		$wp_customize->add_setting( 'theme_options[about_counter_value_' . $i . ']', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' 			=> $default['about_counter_value_'.$i],
		) );

		$wp_customize->add_control( 'theme_options[about_counter_value_' . $i . ']', array(
			'label'           	=> sprintf( __( 'Value  %d', 'kuza-corporate' ), $i ),
			'section'        	=> 'section_home_message',	
			'active_callback' 	=> 'kuza_corporate_message_active',
			'type'				=> 'text',
		) );


	}
}
