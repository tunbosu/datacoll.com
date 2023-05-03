<?php
    $testimonial_title       =kuza_corporate_get_option( 'testimonial_title' );
    $testimonial_subtitle       =kuza_corporate_get_option( 'testimonial_subtitle' );
    $testimonial_side_image       =kuza_corporate_get_option( 'testimonial_side_image' );
    $testimonial_viewall_text       =kuza_corporate_get_option( 'testimonial_viewall_text' );
    $testimonial_btn_url       =kuza_corporate_get_option( 'testimonial_btn_url' );
    $testimonial_content_type     = kuza_corporate_get_option( 'testimonial_content_type' );
    $enable_category     = kuza_corporate_get_option( 'testimonial_category_enable' );
    $enable_content     = kuza_corporate_get_option( 'testimonial_content_enable' );
    $enable_posted_on     = kuza_corporate_get_option( 'testimonial_posted_on_enable' );
    $testimonial_dots  = kuza_corporate_get_option( 'testimonial_dots_enable' );
    $testimonial_arrow  = kuza_corporate_get_option( 'testimonial_arrow_enable' );
    $number_of_testimonial_items  = kuza_corporate_get_option( 'number_of_testimonial_items' );
    $testimonial_category = kuza_corporate_get_option( 'testimonial_category' );
    $testimonial_layout = kuza_corporate_get_option('testimonial_layout_option');
    $testimonial_header_font_size =kuza_corporate_get_option( 'testimonial_title_font_size');
    $testimonial_content_font_size =kuza_corporate_get_option( 'testimonial_content_font_size');
    $testimonial_subtitle_font_size =kuza_corporate_get_option( 'testimonial_subtitle_font_size');
    $testimonial_section_header_font_size =kuza_corporate_get_option( 'testimonial_section_header_font_size');
    $testimonial_section_header_font_size =kuza_corporate_get_option( 'testimonial_section_header_font_size');
    $home_layout = kuza_corporate_get_option( 'homepage_design_layout_options');
    $excerpt_length =kuza_corporate_get_option( 'testimonial_excerpt_length');

    for( $i=1; $i<=$number_of_testimonial_items; $i++ ) :
        $testimonial_page_posts[] = absint(kuza_corporate_get_option( 'testimonial_page_'.$i ) );
        $testimonial_post_posts[] = absint(kuza_corporate_get_option( 'testimonial_post_'.$i ) );
    endfor;
?>
    <style>
        <?php if ($testimonial_subtitle_font_size != 0): ?>
            #testimonial .section-subtitle{
                font-size:<?php echo esc_html($testimonial_subtitle_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($testimonial_section_header_font_size != 0): ?>
            #testimonial .section-title{
                font-size:<?php echo esc_html($testimonial_section_header_font_size); ?>px;
            }
        <?php endif ?>

        <?php if ($testimonial_header_font_size != 0): ?>
            #testimonial .entry-title{
                font-size:<?php echo esc_html($testimonial_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($testimonial_content_font_size != 0): ?>
            #testimonial .entry-content p{
                font-size:<?php echo esc_html($testimonial_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
<div class="section-header-wrapper clear">
    <div class="section-header">
        <?php if( !empty($testimonial_title)):?>
            <h2 class="section-title"><?php echo esc_html($testimonial_title);?></h2>
        <?php endif;?>
        <?php if( !empty($testimonial_subtitle)):?>
            <h2 class="section-subtitle"><?php echo esc_html($testimonial_subtitle);?></h2>
        <?php endif;?>
    </div>
</div><!-- .section-header-wrapper -->
<div class="testimonial-slider <?php echo (($home_layout=='home-medical') ) ? 'modern-testimonial': 'default-testimonial'; ?> " data-slick='{"slidesToShow": <?php echo (($home_layout== 'home-medical') ) ? '1': '3'; ?>, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": <?php if( true== $testimonial_dots){ echo 'true'; } else{ echo 'false'; } ?>, "arrows":<?php if( true== $testimonial_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, "autoplay": true, "fade": false }' >
    <?php 
        $args = array (
            'post_type'     => 'post',
            'post_per_page' => count( $testimonial_post_posts ),
            'post__in'      => $testimonial_post_posts,
            'orderby'       =>'post__in', 
            'ignore_sticky_posts' => true, 
        ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>  
                <article >                        
                    <?php if ($home_layout=='home-education'): ?>
                        <div class="featured-image">
                            <img src="<?php the_post_thumbnail_url( 'full');?>">
                        </div><!-- .featured-image -->
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
                    <?php endif ?>
                    <div class="entry-container">
                        <?php if ( ($enable_content==true)): ?>
                            <div class="entry-content">
                                <?php 
                                    $excerpt = kuza_corporate_the_excerpt( $excerpt_length );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        <?php endif; ?>
                        <?php if ($home_layout !='home-corporate'): ?>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
                    <?php endif; ?>
                    </div><!-- .entry-container -->
                    <?php if ($home_layout !='home-education'): ?>
                        <div class="featured-image">
                            <img src="<?php the_post_thumbnail_url( 'full');?>">
                            <?php if ($home_layout=='home-corporate'): ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>
                            <?php endif ?>
                        </div><!-- .featured-image -->
                    <?php  endif ?>
                </article>         
            <?php endwhile;?>
        <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>