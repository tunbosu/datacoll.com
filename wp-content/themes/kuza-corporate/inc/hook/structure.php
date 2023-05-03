<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Kuza
 */

if ( ! function_exists( 'kuza_corporate_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function kuza_corporate_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'kuza_corporate_action_doctype', 'kuza_corporate_doctype', 10 );


if ( ! function_exists( 'kuza_corporate_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function kuza_corporate_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php
}
endif;
add_action( 'kuza_corporate_action_head', 'kuza_corporate_head', 10 );

if ( ! function_exists( 'kuza_corporate_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function kuza_corporate_page_start() { 
		$loader_enable = kuza_corporate_get_option( 'preloader_loader_enable' );
	?><div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'kuza-corporate' ); ?>
		</a>
		<?php if ($loader_enable==true): ?>
			<div id="loader">
				<div class="loader-container">
					<div id="preloader">
						<?php kuza_corporate_preloader(); ?>
					</div>
				</div>
			</div>
		<?php endif ?>
	<?php
	}
endif;

add_action( 'kuza_corporate_action_before', 'kuza_corporate_page_start', 10 );

if ( ! function_exists( 'kuza_corporate_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function kuza_corporate_header_start() {

        $show_contact = kuza_corporate_get_option( 'show_header_contact_info' );
        $location     = kuza_corporate_get_option( 'header_location' );
        $email        = kuza_corporate_get_option( 'header_email' );
        $phone        = kuza_corporate_get_option( 'header_phone' ); 
        $class = 'col-1';
        $show_social =kuza_corporate_get_option('show_header_social_links');
        $header_social_link =kuza_corporate_get_option('header_social_link');
        $topbar_color =kuza_corporate_get_option('topbar_color');
        $topbar_background_color =kuza_corporate_get_option('topbar_background_color');
        $show_header_search =kuza_corporate_get_option('show_header_search'); 
        $homelayout     = kuza_corporate_get_option( 'homepage_design_layout_options' ); 
        $show_current_date     = kuza_corporate_get_option( 'show_current_date' ); 
        $topbar_date_contact     = kuza_corporate_get_option( 'topbar_layout_option' ); 

        if( ( (( ! empty( $email ) || ! empty( $phone ) || ! empty( $location ) ) && $show_contact==true)|| $show_current_date==true ) && ( $show_social==true ) && ($show_header_search==true)  ) {
            $class = 'col-3';
        } elseif(($show_contact==true && $show_social==true ) ||($show_contact==true && $show_header_search==true ) || ($show_header_search==true && $show_social==true)){
        	$class ='col-2';
        } else{
        	$class = 'col-1';
        }


        if(( $show_social==true ) || ($show_header_search==true) || ($topbar_date_contact != 'topbar-none' ) ){ ?>
        	<style>
        		#top-bar .widget_address_block ul li,
        		#top-bar .widget_address_block ul li a,
        		#top-bar .social-icons li a,
        		#top-bar .current-date{
        			color: <?php echo esc_attr($topbar_color); ?>;
        		}
        	</style>
    		<?php $topbar_background_color =kuza_corporate_get_option('topbar_background_color'); ?>
            <div id="top-bar" class="top-bar-widgets <?php echo esc_attr( $class ); ?>"style="background-color: <?php echo esc_attr($topbar_background_color); ?> ">
                <div class="wrapper">
                    <?php if( $show_current_date==true || $show_contact==true ) : ?>
                        
                        <div class="widget widget_address_block">
                            <ul>
                            	<?php if ($show_current_date==true && $topbar_date_contact=='current-date-option' ) {
				                     $current_date = date('l jS F Y'); ?>
				                    <div class="current-date" > 
				                        <?php echo $current_date ?> 
				                    </div>
				                <?php } ?>
				                <?php if ($show_contact==true && $topbar_date_contact=='contact-info-option' ) { ?>
	                                <?php 

	                                    if( ! empty( $location ) ){
	                                        echo '<li><i class="fa fa-map-marker"></i>'. esc_html( $location ) .'</li>';
	                                    }
	                                    if( ! empty( $phone ) ){
	                                        echo '<li><a href="tel: '. esc_attr( $phone ) .'"><i class="fa fa-phone"></i>'. esc_html( $phone ) .'</a></li>';
	                                    }
	                                    if( ! empty( $email ) ){
	                                        echo '<li><a href="' . esc_url('mailto:' . sanitize_email($email)) . '"><i class="fa fa-envelope"></i>'. esc_html( $email ) .'</a></li>';
	                                    }
	                                ?>
	                            <?php } ?>
                                
                            </ul>
                        </div><!-- .widget_address_block -->
                    <?php endif; 

                    if ( $show_social==true){ ?>
                       <div class="widget widget_social_icons">
                           <ul class="social-icons">
			                  <?php 
			                    for ($i=0; $i <=4 ; $i++) { 
			                      $show_socials  = kuza_corporate_get_option( 'header_social_link_' . $i );
			                        if ( isset( $show_socials ) ) { 
			                        ?>
			                            <li><a href=" <?php echo esc_url($show_socials); ?>" target="_blank"></a></li>
			                        <?php }  }?>
			              	</ul>  
                        </div><!-- .widget_social_icons -->
                    <?php } ?>
                    <?php if ( $show_header_search ==true ){ ?>
			            <div class="widget top-search">
			               <?php get_search_form( $echo = true ); ?>
			            </div><!-- .widget_social_icons -->
			        <?php } ?>
                </div><!-- .wrapper -->
            </div><!-- #top-bar -->
        <?php
        } ?>
		<header id="masthead" class="site-header nav-shrink" role="banner">
			<?php
	}
endif;
add_action( 'kuza_corporate_action_before_header', 'kuza_corporate_header_start' );

if ( ! function_exists( 'kuza_corporate_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function kuza_corporate_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'kuza_corporate_action_header', 'kuza_corporate_header_end', 15 );

if ( ! function_exists( 'kuza_corporate_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function kuza_corporate_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'kuza_corporate_action_before_content', 'kuza_corporate_content_start', 10 );

if ( ! function_exists( 'kuza_corporate_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function kuza_corporate_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === kuza_corporate_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><i class="fa fa-long-arrow-up"></i></div>
		<?php endif;
	} 
endif;
add_action( 'kuza_corporate_action_before_footer', 'kuza_corporate_footer_start' );


if ( ! function_exists( 'kuza_corporate_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function kuza_corporate_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'kuza_corporate_action_after_footer', 'kuza_corporate_footer_end', 100 );

