<?php
/**
 * Kuza Corporate metabox file.
 *
 * This is the template that includes all the other files for metaboxes of Kuza Corporate theme
 *
 * @package Kuza
 * @since Kuza Corporate 0.1
 */

// Include Post subtitle meta
require get_template_directory() . '/inc/metabox/about-meta.php'; 

// Include Post subtitle meta
require get_template_directory() . '/inc/metabox/video-url.php'; 




if ( ! function_exists( 'kuza_corporate_custom_meta' ) ) : 
    /**
     * Adds meta box to the post editing screen
     */
    function kuza_corporate_custom_meta() {
        $post_type = array( 'post', 'page' );

        // POST Subtitle 
        add_meta_box( 'kuza_corporate_video_url', esc_html__( 'Video Links', 'kuza-corporate' ), 'kuza_corporate_video_url_callback', $post_type );
               
    }
endif;
add_action( 'add_meta_boxes', 'kuza_corporate_custom_meta' );


if ( ! function_exists( 'kuza_corporate_about_meta' ) ) : 
    /**
     * Adds meta box to the post editing screen
     */
    function kuza_corporate_about_meta() {
        $post_type = array( 'post' );

        // POST Subtitle 
        add_meta_box( 'kuza_corporate_about_meta', esc_html__( 'About Meta', 'kuza-corporate' ), 'kuza_corporate_about_meta_callback', $post_type );
               
    }
endif;
add_action( 'add_meta_boxes', 'kuza_corporate_about_meta' );


