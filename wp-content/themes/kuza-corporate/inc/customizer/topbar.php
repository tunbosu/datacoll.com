<?php

$default = kuza_corporate_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'kuza-corporate' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );



/** Header contact info section */
$wp_customize->add_section(
    'top_bar_current_date_contact',
    array(
        'title'    => __( 'Date or Contact Information', 'kuza-corporate' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
        
    )
); 

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[topbar_layout_option]', array(
    'default'           => $default['topbar_layout_option'],
    'sanitize_callback' => 'kuza_corporate_sanitize_select',
    'type'              => 'theme_mod',
) );

$wp_customize->add_control( 'theme_options[topbar_layout_option]', array(
    'label'             => esc_html__( 'Choose Date or Contact Information', 'kuza-corporate' ),
    'section'           => 'top_bar_current_date_contact',
    'type'              => 'radio',
    'choices'               => array( 
        'topbar-none'     => esc_html__( 'None', 'kuza-corporate' ), 
        'contact-info-option'     => esc_html__( 'Contact Info', 'kuza-corporate' ), 
        'current-date-option'     => esc_html__( ' Current Date ', 'kuza-corporate' ),
        )
) );

// Header contact enable control and setting
$wp_customize->add_setting( 'theme_options[show_current_date]', array(
    'default'           =>  $default['show_current_date'],
    'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[show_current_date]', array(
    'label'             => __( 'Show Contact Info', 'kuza-corporate' ),
    'section'           => 'top_bar_current_date',
    'settings'         => 'theme_options[show_current_date]',
    'on_off_label'      => kuza_corporate_switch_options(),
    'active_callback' => 'topbar_current_date_option',
) ) );


// Header contact enable control and setting
$wp_customize->add_setting( 'theme_options[show_header_contact_info]', array(
    'default'           =>  $default['show_header_contact_info'],
    'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[show_header_contact_info]', array(
    'label'             => __( 'Show Contact Info', 'kuza-corporate' ),
    'section'           => 'top_bar_current_date_contact',
    'settings'         => 'theme_options[show_header_contact_info]',
    'on_off_label'      => kuza_corporate_switch_options(),    
    'active_callback' => 'topbar_contact_info_option',
) ) );

/** Location */
$wp_customize->add_setting( 'theme_options[header_location]', array(
    'default'           => $default['header_location'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_location]',
    array(
        'label'           => __( 'Location', 'kuza-corporate' ),
        'description'     => __( 'Enter Location.', 'kuza-corporate' ),
        'section'         => 'top_bar_current_date_contact',
        'active_callback' => 'topbar_contact_info_option',
    )
);

/** Phone */
$wp_customize->add_setting( 'theme_options[header_phone]', array(
    'default'           => $default['header_phone'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_phone]',
    array(
        'label'           => __( 'Phone', 'kuza-corporate' ),
        'description'     => __( 'Enter phone number.', 'kuza-corporate' ),
        'section'         => 'top_bar_current_date_contact',
        'active_callback' => 'topbar_contact_info_option',
    )
);

/** Email */
$wp_customize->add_setting( 
    'theme_options[header_email]', 
    array(
        'default'           => $default['header_email'],
        'sanitize_callback' => 'sanitize_email',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_email]',
    array(
        'label'           => __( 'Email', 'kuza-corporate' ),
        'description'     => __( 'Enter valid email address.', 'kuza-corporate' ),
        'section'         => 'top_bar_current_date_contact',
        'active_callback' => 'topbar_contact_info_option',
    )
);


/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'kuza-corporate' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 'theme_options[show_header_social_links]',
    array(
        'default'           =>  $default['show_header_social_links'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
    )
);
$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[show_header_social_links]',
    array(
        'label'             => __('Show Social Links', 'kuza-corporate'),
        'section'           => 'header_social_links_section',
         'settings'         => 'theme_options[show_header_social_links]',
        'on_off_label'      => kuza_corporate_switch_options(),
    )
) );

for( $i=1; $i<=4; $i++ ){

    // Setting social_links.
    $wp_customize->add_setting('theme_options[header_social_link_'.$i.']', array(
            'sanitize_callback' => 'esc_url_raw',
        ) );

    $wp_customize->add_control('theme_options[header_social_link_'.$i.']', array(
        'label'             => esc_html__( 'Social Links', 'kuza-corporate' ),
        'section'           => 'header_social_links_section',
        'type'              => 'url',
    ) );
}


/** Header social links section */
$wp_customize->add_section(
    'header_search_section',
    array(
        'title'    => __( 'Search Form', 'kuza-corporate' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 'theme_options[show_header_search]',
    array(
        'default'           =>  $default['show_header_search'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'kuza_corporate_sanitize_switch_control',
    )
);
$wp_customize->add_control( new Kuza_Corporate_Switch_Control( $wp_customize, 'theme_options[show_header_search]',
    array(
        'label'             => __('Show Search', 'kuza-corporate'),
        'section'           => 'header_search_section',
         'settings'         => 'theme_options[show_header_search]',
        'on_off_label'      => kuza_corporate_switch_options(),
    )
) );
