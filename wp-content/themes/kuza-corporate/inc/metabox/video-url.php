<?php
/**
 * Subtitle metabox file.
 *
 * @package BlogMelody
 * @since Kuza Corporate 1.0
 */

if ( ! function_exists( 'kuza_corporate_video_url_callback' ) ) :
    /** 
     * Outputs the content of the Video Url
     */
    function kuza_corporate_video_url_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'kuza_corporate_nonce' );
        $video_url = get_post_meta( $post->ID, 'kuza-corporate-video-url', true );
        ?>
        <p>
         <label for="kuza-corporate-video-url" class="kuza-corporate-row-title"><?php esc_html_e( 'Video Url', 'kuza-corporate' )?></label>
         <input class="widefat" type="url" name="kuza-corporate-video-url" id="kuza-corporate-video-url" value="<?php echo esc_url( $video_url ); ?>"/>     
        </p>

        <?php
    }
endif;

if ( ! function_exists( 'kuza_corporate_video_url_save' ) ) :
    /**
     * Saves the Video Url input
     */
    function kuza_corporate_video_url_save( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'kuza_corporate_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'kuza_corporate_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'kuza-corporate-video-url' ] ) ) {
            update_post_meta( $post_id, 'kuza-corporate-video-url', sanitize_text_field( wp_unslash( $_POST[ 'kuza-corporate-video-url' ] ) ) );
        }

    }
endif;
add_action( 'save_post', 'kuza_corporate_video_url_save' );

