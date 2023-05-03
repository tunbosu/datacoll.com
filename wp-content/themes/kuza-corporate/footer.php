<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kuza
 */
    $homepage_design_layout     = kuza_corporate_get_option( 'homepage_design_layout_options' );
/**
 * Hooked - kuza_corporate_instagram_section -10
 */
if ((is_home() || is_front_page()) && ($homepage_design_layout=='home-normal-blog' || $homepage_design_layout=='home-minimal-blog' || $homepage_design_layout=='home-classic-blog')) {
	do_action( 'kuza_corporate_action_instagram' );
}

/**
 *
 * @hooked kuza_corporate_footer_start
 */
do_action( 'kuza_corporate_action_before_footer' );

/**
 * Hooked - kuza_corporate_footer_top_section -10
 * Hooked - kuza_corporate_footer_section -20
 */
do_action( 'kuza_corporate_action_footer' );

/**
 * Hooked - kuza_corporate_footer_end. 
 */
do_action( 'kuza_corporate_action_after_footer' );

wp_footer(); ?>

</body>  
</html>