<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Kuza Corporate

 */

    $team_title       = kuza_corporate_get_option( 'team_title' );
    $team_subtitle       = kuza_corporate_get_option( 'team_subtitle' );
    $number_of_column = kuza_corporate_get_option( 'number_of_column' );
    $number_of_items  = kuza_corporate_get_option( 'number_of_items' );
    $team_content_type     = kuza_corporate_get_option( 'team_content_type' );
    $team_category = kuza_corporate_get_option( 'team_category' );
    $team_content   = kuza_corporate_get_option( 'team_content_enable' );
    $team_header_font_size = kuza_corporate_get_option( 'team_font_size');
    $team_content_font_size = kuza_corporate_get_option( 'team_content_font_size');
    $team_subtitle_font_size = kuza_corporate_get_option( 'team_subtitle_font_size');
    $team_section_header_font_size = kuza_corporate_get_option( 'team_section_header_font_size');
    $home_layout = kuza_corporate_get_option( 'homepage_design_layout_options');

    for( $i=1; $i<=$number_of_items; $i++ ) :
        $team_page_posts[] = absint(kuza_corporate_get_option( 'team_page_'.$i ) );
        $team_post_posts[] = absint(kuza_corporate_get_option( 'team_post_'.$i ) );
        $team_position     = kuza_corporate_get_option( 'team_custom_position_'. $i );
        $social_link = kuza_corporate_get_option( 'social_link_' .$i );
    endfor;
    ?>
    <style>
        <?php if ($team_subtitle_font_size != 0): ?>
            #team .section-subtitle{
                font-size:<?php echo esc_html($team_subtitle_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($team_section_header_font_size != 0): ?>
            #team .section-title{
                font-size:<?php echo esc_html($team_section_header_font_size); ?>px;
            }
        <?php endif ?>

        <?php if ($team_header_font_size != 0): ?>
            #team .entry-title a{
                font-size:<?php echo esc_html($team_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($team_content_font_size != 0): ?>
            #team .entry-content p{
                font-size:<?php echo esc_html($team_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
    <div class=" team-section relative">
        <?php if (!empty($team_title) || !empty($team_subtitle)) : ?>
            
            <div class="section-header">
             <?php if(!empty($team_title)):?>
                <h2 class="section-title"><?php echo esc_html($team_title); ?></h2>                                  
                <div class="separator"></div>
            <?php endif;  ?>
            </div><!-- .section-header -->
        <?php endif;       
        ?>
                        
        <div class="section-content  <?php if ($home_layout !='home-corporate') {  ?>  col-<?php echo esc_attr( $number_of_column); } else{ ?> grid <?php }?>">
            <?php 
                $args = array (
                    'post_type'     => 'post',
                    'post_per_page' => count( $team_post_posts ),
                    'post__in'      => $team_post_posts,
                    'orderby'       =>'post__in', 
                    'ignore_sticky_posts' => true, 
                );  
            $loop = new WP_Query($args);                         
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    <article class="hentry <?php if ($home_layout =='home-corporate') { ?>  grid-item <?php } ?> ">
                        <div class="post-wrapper">
                            <div class="team-image" style="background-image: url('<?php the_post_thumbnail_url('kuza-team'); ?>');">
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link" ></a>
                                <div class="overlay"></div>
                                <?php if ($home_layout != 'home-medical'): ?>
                                    <?php $social_links = ! empty( kuza_corporate_get_option('social_link_' . $i ) ) ? explode( '|', kuza_corporate_get_option('social_link_' . $i ) ) : array();
                                    if (! empty( $social_links ) ) { ?>
                                        <div class="share-message">
                                            <ul class="social-icons">
                                                <?php 
                                                
                                                foreach ($social_links as $social_link ) { 
                                                    if ( isset( $social_link ) ) { 
                                                    ?>
                                                        <li><a href=" <?php echo esc_url($social_link); ?>"></a></li>
                                                    <?php }  
                                                } ?>
                                            </ul>
                                        </div><!-- .share-message -->
                                    <?php } ?>
                                <?php endif ?>
                            </div><!-- .team-image -->
                            <?php $team_position     = kuza_corporate_get_option( 'team_custom_position_'. $i ); ?> 
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                        <?php if ( !empty($team_position) && $home_layout == 'home-corporate') : ?>
                                            <span class="position">
                                                <?php echo esc_html( $team_position ); ?>
                                            </span>
                                        <?php endif; ?>
                                    </h2>
                                </header>
                                <?php if ($team_content == true): ?>
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = kuza_corporate_the_excerpt( 20 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->
                                <?php endif ?>
                                <?php if ( !empty($team_position) && $home_layout != 'home-corporate') : ?>
                                    <h6 class="position"><?php echo esc_html( $team_position ); ?></h6>
                                <?php endif; ?>
                                <?php if ($home_layout == 'home-medical'): ?>
                                    <?php $social_links = ! empty( kuza_corporate_get_option('social_link_' . $i ) ) ? explode( '|', kuza_corporate_get_option('social_link_' . $i ) ) : array();
                                    if (! empty( $social_links ) ) { ?>
                                        <div class="share-message">
                                            <ul class="social-icons">
                                                <?php 
                                                
                                                foreach ($social_links as $social_link ) { 
                                                    if ( isset( $social_link ) ) { 
                                                    ?>
                                                        <li><a href=" <?php echo esc_url($social_link); ?>"></a></li>
                                                    <?php }  
                                                } ?>
                                            </ul>
                                        </div><!-- .share-message -->
                                    <?php } ?>
                                <?php endif ?>
                            </div><!-- .entry-container -->
                            
                            
                        </div><!-- .post-wrapper -->
                    </article>
                    <?php endwhile;
                endif;
            wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    </div><!-- #team-posts -->
