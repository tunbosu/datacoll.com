<?php
/**
 * The template for displaying home page.
 * @package Kuza
 */

if ( 'posts' == get_option( 'show_on_front' )  || 'posts' != get_option( 'show_on_front' )){ 
    get_header(); ?>
    <?php 
    $enabled_sections = kuza_corporate_get_sections();
    $homepage_design_layout     = kuza_corporate_get_option( 'homepage_design_layout_options' );
    if( is_array( $enabled_sections ) &&  $homepage_design_layout== 'home-magazine') {
        foreach( $enabled_sections as $section ) {
            if( $section['id'] == 'headlines' ) { ?>
                <?php $disable_headlines_section = kuza_corporate_get_option( 'disable_headlines_section' );
                if( true ==$disable_headlines_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section> 
            <?php endif; } ?>
            <?php if( $section['id'] == 'hero' ) { ?>
                <?php $disable_hero_section = kuza_corporate_get_option( 'disable_hero_section' );
                if( true ==$disable_hero_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section> 
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'portfolio' ) { ?>
                <?php $disable_portfolio_section = kuza_corporate_get_option( 'disable_portfolio_section' );
                if( true ==$disable_portfolio_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>  
            <?php endif; ?> 

            <?php } elseif( $section['id'] == 'galleryview' ) { ?>
                <?php $disable_galleryview_section = kuza_corporate_get_option( 'disable_galleryview_section' );
                $galleryview_layout = kuza_corporate_get_option( 'galleryview_layout' );
                if( true ==$disable_galleryview_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section <?php echo esc_attr($galleryview_layout); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>                    
                <?php endif; ?>
            <?php } ?>
        <?php } ?> 

        <div class="primary-content-sidebar wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php foreach( $enabled_sections as $section ) { ?>
                        <?php if( $section['id'] == 'recent' ) { ?>
                            <?php $disable_recent_section = kuza_corporate_get_option( 'disable_recent_section' );
                             if( true ==$disable_recent_section): ?>
                                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                                    <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                                </section>
                        <?php endif; ?>
                        
                        <?php } elseif( $section['id'] == 'ads' ) { ?>
                            <?php $disable_ads_section = kuza_corporate_get_option( 'disable_ads_section' );
                            if( true ==$disable_ads_section): ?>
                                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                                    <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                                </section>
                        <?php endif; ?>
                        
                        <?php } elseif( $section['id'] == 'trending' ) { ?>
                            <?php $disable_trending_section = kuza_corporate_get_option( 'disable_trending_section' );
                            if( true ==$disable_trending_section): ?>
                                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                                    <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                                </section>
                        <?php endif; ?>
                        <?php } elseif( $section['id'] == 'categorynews' ) { ?>
                            <?php $disable_categorynews_section = kuza_corporate_get_option( 'disable_categorynews_section' );
                             if( true ==$disable_categorynews_section): ?>
                                <?php   $number_of_categorynews_column = kuza_corporate_get_option('number_of_categorynews_column'); ?>
                                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section col-<?php echo esc_attr($number_of_categorynews_column); ?>">
                                    <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                                </section>
                        <?php endif; ?>
                        <?php } elseif ( $section['id'] == 'travel' ) { ?>
                        <?php $disable_travel_section = kuza_corporate_get_option( 'disable_travel_section' );
                        if( true === $disable_travel_section): ?>
                            <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                                    <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </section>
                        <?php endif; ?>
                    <?php } elseif( $section['id'] == 'adssec' ) { ?>
                            <?php $disable_adssec_section = kuza_corporate_get_option( 'disable_adssec_section' );
                            if( true ==$disable_adssec_section): ?>
                                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                                    <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                                </section>
                        <?php endif; ?>
                        <?php } elseif( $section['id'] == 'popular' ) { ?>
                            <?php $disable_popular_section = kuza_corporate_get_option( 'disable_popular_section' );
                             if( true ==$disable_popular_section): ?>
                                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section blog-posts">
                                    <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                                </section>
                        <?php endif; ?>
                        <?php } ?>
                    <?php } ?>

                </main>
            </div><!-- #primary-->
            <?php $homepage_sidebar = kuza_corporate_get_option( 'homepage_sidebar_position' ); ?>
            <?php if ( is_active_sidebar( 'homepage-sidebar' ) && $homepage_sidebar=='home-right-sidebar' ) { ?>
                <aside id="secondary" class="widget-area homepage-sidebar" role="complementary">
                    <?php dynamic_sidebar('homepage-sidebar'); ?>
                </aside>
            <?php } ?>
        </div><!-- .primary-content-sidebar -->  

        <?php foreach( $enabled_sections as $section ) {  ?>
            <?php if( $section['id'] == 'newsfeatured' ) { ?>
                <?php $disable_newsfeatured_section = kuza_corporate_get_option( 'disable_newsfeatured_section' );
                if( true ==$disable_newsfeatured_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section> 
            <?php endif; } ?>
            <?php if( $section['id'] == 'mustread' ) { ?>
                <?php $disable_mustread_section = kuza_corporate_get_option( 'disable_mustread_section' );
                if( true ==$disable_mustread_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] );  ?>" class="relative page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; ?> 
            <?php } ?>
        <?php } ?>
    <?php } elseif( is_array( $enabled_sections ) &&  $homepage_design_layout== 'home-corporate') { 
        foreach( $enabled_sections as $section ) { 
            $corporate_curve_shape = kuza_corporate_get_option('corporate_curve_shape_enable'); ?>
            <?php if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = kuza_corporate_get_option( 'disable_featured-slider_section' );
                if( true == $disable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php $slider_layout = kuza_corporate_get_option( 'slider_layout_option'); ?>
                        <?php if ($slider_layout=='default-slider'){ ?>
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        <?php } else {
                            get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); 
                        } ?>
                        <?php if ($homepage_design_layout=='home-corporate' && $corporate_curve_shape==true) : ?>
                            <div class="curve-shape">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z" class="kuza-curve shape-1"></path>   <path class="kuza-curve shape-2" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path><path class="kuza-curve shape-3" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path></svg>
                        </div>
                        <?php endif ?>
                        
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'message' ) { ?>
                <?php $disable_message_section = kuza_corporate_get_option( 'disable_message_section' );
                $background_information_section     = kuza_corporate_get_option( 'background_information_section' );
                if( true ==$disable_message_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section " style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-blue.png')?>');">
                        <?php if ($homepage_design_layout=='home-corporate' && $corporate_curve_shape==true) : ?>
                            <div class="msg-curve">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path class="kuza-curve" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path> </svg>
                            </div>
                        <?php endif; ?>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>                    
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'services' ) { ?>
                <?php $disable_services_section = kuza_corporate_get_option( 'disable_services_section' );
                 $services_background_image = kuza_corporate_get_option( 'services_background_image' );
                 $disable_services_background=kuza_corporate_get_option( 'disable_services_background' );
                if( true ==$disable_services_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" <?php if (!empty($services_background_image) && true==$disable_services_background){ ?> class=" enable-services-background" <?php } ?> >
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section> 
            <?php endif; ?>
            <?php } elseif( $section['id'] == 'portfolio' ) { ?>
                <?php $disable_portfolio_section = kuza_corporate_get_option( 'disable_portfolio_section' );
                if( true ==$disable_portfolio_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                        
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
                        
            <?php endif; ?> 
            <?php } elseif( $section['id'] == 'features' ) { ?>
                <?php $disable_features_section = kuza_corporate_get_option( 'disable_features_section' );
                if( true ==$disable_features_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-green.png')?>');">
                        <?php if ($corporate_curve_shape==true) : ?>
                            <div class="features-curve corporate-curve">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path class="kuza-curve" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path> </svg>
                            </div>
                        <?php endif; ?>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?> 
            <?php } elseif( $section['id'] == 'information' ) { ?>
                <?php $disable_information_section = kuza_corporate_get_option( 'disable_information_section' );
                $background_information_section     = kuza_corporate_get_option( 'background_information_section' );
                if( true ==$disable_information_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_information_section );?>');">
                        <?php if ($corporate_curve_shape==true) : ?>
                            <div class="information-curve corporate-curve">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path class="kuza-curve" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path> </svg>
                            </div>
                        <?php endif; ?>
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                    
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'team' ) { ?>
                <?php $disable_team_section = kuza_corporate_get_option( 'disable_team_section' );
                if( true ==$disable_team_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] );  ?>" class="relative page-section" >
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?> 
            <?php } elseif( $section['id'] == 'testimonial' ) { ?>
                <?php $disable_testimonial_section = kuza_corporate_get_option( 'disable_testimonial_section' );
                if( true ==$disable_testimonial_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section" >
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section> 
            <?php endif; ?> 
            <?php } elseif( $section['id'] == 'cta' ) { ?>
                <?php $disable_cta_section = kuza_corporate_get_option( 'disable_cta_section' );
                $background_cta_section = kuza_corporate_get_option( 'background_cta_section' );
                if( true ==$disable_cta_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_cta_section );?>');">
                        <?php if ($corporate_curve_shape==true) : ?>
                            <div class="testimonial-curve corporate-curve">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path class="kuza-curve" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path> </svg>
                            </div>
                        <?php endif; ?>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?> 
            <?php } elseif( $section['id'] == 'pricing' ) { ?>
                <?php $disable_pricing_section = kuza_corporate_get_option( 'disable_pricing_section' );
                if( true ==$disable_pricing_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-blue.png')?>');" >
                        <?php if ($corporate_curve_shape==true) : ?>
                            <div class="pricing-curve corporate-curve">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path class="kuza-curve" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path> </svg>
                            </div>
                        <?php endif; ?>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                        <?php if ($corporate_curve_shape==true) : ?>
                            <div class="pricing-curve-2 corporate-curve">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path class="kuza-curve" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path> </svg>
                            </div>
                        <?php endif; ?>
                    </section> 
            <?php endif; ?>
            <?php  } elseif( $section['id'] == 'client' ) { ?>
                <?php $disable_client_section = kuza_corporate_get_option( 'disable_client_section' );
                
                if( true ==$disable_client_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'mustread' ) { ?>
                <?php $disable_mustread_section = kuza_corporate_get_option( 'disable_mustread_section' );
                if( true ==$disable_mustread_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] );  ?>" class="relative page-section">
                        <?php if ($corporate_curve_shape==true) : ?>
                            <div class="mustread-curve corporate-curve">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path class="kuza-curve" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path> </svg>
                            </div>
                        <?php endif; ?>
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?> 
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <?php $disable_homepage_content_section = kuza_corporate_get_option( 'disable_homepage_content_section' );
    if('posts' == get_option( 'show_on_front' )){ ?>
       <?php include( get_home_template() ); ?>
    <?php } elseif(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) { ?>
        <div class="wrapper">
           <?php include( get_page_template() ); ?>
        </div>
     <?php  }
    get_footer();
} ?>