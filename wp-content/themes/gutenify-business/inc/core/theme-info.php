<?php
/**
 * Add theme page
 */
function gutenify_business_menu() {
	add_theme_page( esc_html__( 'Gutenify Business', 'gutenify-business' ), esc_html__( 'Gutenify Theme', 'gutenify-business' ), 'edit_theme_options', 'gutenify-business-info', 'gutenify_business_theme_page_display' );
}
add_action( 'admin_menu', 'gutenify_business_menu' );

/**
 * Display About page
 */
function gutenify_business_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	}

	include_once 'templates/theme-info.php';
}

function gutenify_business_admin_plugin_notice() {
	$hide_notice_bar = get_user_meta( get_current_user_id(), 'gutenify_business_hide_theme_info_noticebar', true );
	if ( '1' !== $hide_notice_bar ) {
		wp_enqueue_style( 'gutenify-business-admin-style' );
		wp_enqueue_script( 'gutenify-business-admin' );
		include 'templates/admin-plugin-notice.php';
	}
}
add_action( 'admin_notices', 'gutenify_business_admin_plugin_notice' );


function gutenify_business_hide_theme_info_noticebar() {
	check_ajax_referer( 'gutenify_business-nonce', 'gutenify_business-nonce-name' );
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( -1 );
	}

	update_user_meta( get_current_user_id(), 'gutenify_business_hide_theme_info_noticebar', 1 );

	wp_die( 1 );
}
add_action( 'wp_ajax_gutenify_business_hide_theme_info_noticebar', 'gutenify_business_hide_theme_info_noticebar' );
