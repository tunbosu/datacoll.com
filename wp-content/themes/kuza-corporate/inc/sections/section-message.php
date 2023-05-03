<?php 
/**
 * Template part for displaying Author Section
 *
 *@package Kuza Corporate
 */
    $message_content_type     = kuza_corporate_get_option( 'message_content_type' );
    $message_content_enable       = kuza_corporate_get_option( 'message_content_enable' );
    $message_excerpt_enable       = kuza_corporate_get_option( 'message_excerpt_enable' );
    $message_header_font_size = kuza_corporate_get_option( 'message_font_size');
    $message_content_font_size = kuza_corporate_get_option( 'message_content_font_size');
    $excerpt_length =kuza_corporate_get_option( 'message_excerpt_length');
    $author_show_social =kuza_corporate_get_option( 'author_social_link');
    $number_of_about_counter_items = kuza_corporate_get_option('number_of_about_counter_items');
    $home_layout = kuza_corporate_get_option( 'homepage_design_layout_options');
    $message_background_img = kuza_corporate_get_option( 'message_background_img');
    $message_background_sec_img = kuza_corporate_get_option( 'message_second_background_img');

?>
    <style>
        <?php if ($message_header_font_size != 0): ?>
            #message .entry-title{
                font-size:<?php echo esc_html($message_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($message_content_font_size != 0): ?>
            #message .section-content{
                font-size:<?php echo esc_html($message_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
    <?php 
        $message_id = kuza_corporate_get_option( 'message_page' );
            $args = array (
            'post_type'     => 'page',
            'posts_per_page' => 1,
            'p' => $message_id,
            
        ); 
           
        $the_query = new WP_Query( $args );

        // The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>  
            <div class="section-content">
               <?php if(has_post_thumbnail()) : ?>
                    <div class="author-thumbnail" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url( 'full' ))?>');">
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                        <?php if ((!empty($message_background_img) && $home_layout=='home-classic-blog')) {  ?>
                            <div class="author-first-thumbnail" style="background-image: url('<?php echo esc_url($message_background_img); ?>');">
                            </div><!-- .author-thumbnail -->
                        <?php } ?> 
                        <?php if ((!empty($message_background_sec_img) && $home_layout=='home-classic-blog')) {  ?>
                            <div class="author-second-thumbnail" style="background-image: url('<?php echo esc_url($message_background_sec_img); ?>');">
                            </div><!-- .author-thumbnail -->
                        <?php } ?> 
                    </div><!-- .author-thumbnail -->
                <?php endif; ?>
                <div class="entry-container">
                    <div class="message-entry-content">
                        <div class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h2>
                        </div><!-- .section-header -->

                        <div class="entry-content">
                            <?php  
                                $excerpt = kuza_corporate_the_excerpt( $excerpt_length );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->

                        <div class="separator"></div>

                        <?php  
                         if ( ! empty( $author_show_social ) ) : ?>
                            <div class="share-message">
                                <ul class="social-icons">
                                    <?php
                                        
                                        $show_social_links = ! empty( $author_show_social ) ? explode( '|', ( $author_show_social ) ) : array();
                                        foreach ($show_social_links as $show_social_link ) { 
                                            if ( isset( $show_social_link ) ) { 
                                            ?>
                                                <li><a href=" <?php echo esc_url($show_social_link); ?>"></a></li>
                                            <?php }  
                                        } ?>
                                </ul>
                            </div><!-- .share-message -->
                        <?php endif; ?>
                        <?php if ($home_layout=='home-corporate'|| $home_layout=='home-medical') {  ?>
                            <div class="counter-section-content col-3">
                                <?php   
                                    for( $i=1; $i<=$number_of_about_counter_items; $i++ ) :
                                        $about_counter_value  = kuza_corporate_get_option( 'about_counter_value_'. $i );
                                        $about_counter_text  = kuza_corporate_get_option( 'about_counter_text_'.$i );
                                ?>
                                    <article class="inner">
                                        <div class="about-counter-item">
                                            <?php if (!empty($about_counter_value)): ?>
                                                 <span><?php echo esc_html($about_counter_value);  ?></span>
                                            <?php endif ?>
                                           <?php if (!empty($about_counter_text)): ?>
                                               <h4><?php echo esc_html($about_counter_text); ?></h4>
                                           <?php endif ?>
                                        </div><!-- .about-counter-item --> 
                                    </article>
                                <?php  endfor;?>     
                            </div><!-- .section-content -->
                        <?php } ?>
                    </div>
                </div>
            </div><!-- .section-content -->  
        <?php endwhile; ?>
       