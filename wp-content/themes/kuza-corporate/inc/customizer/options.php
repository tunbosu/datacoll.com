<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function kuza_corporate_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kuza-corporate' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'kuza_corporate_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function kuza_corporate_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'kuza-corporate' ),
            'off'       => esc_html__( 'Disable', 'kuza-corporate' )
        );
        return apply_filters( 'kuza_corporate_switch_options', $arr );
    }
endif;

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function kuza_corporate_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'kuza-corporate' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}
if ( ! function_exists( 'kuza_corporate_get_woo_product' ) ) {
    /**
     * Get product.
     */
    function kuza_corporate_get_woo_product() {
        $args = array(
            'posts_per_page' => -1,
        );
         
        $choices = array( '' => esc_html__( '--Select--', 'kuza-corporate' ) );
        $products = wc_get_products( $args );
        foreach ( $products as $product ) {
            $id = $product->get_id();
            $title = $product->get_name();
            $choices[ $id ] = $title;
        }
        return $choices;
    }
}




 /**
 * Get an array of google fonts.
 * 
 */
function kuza_corporate_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'kuza-corporate' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'kuza_corporate_font_choices', $font_family_arr );
}

if ( ! function_exists( 'kuza_corporate_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kuza_corporate_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kuza-corporate' ),
            'header-font-1'   => esc_html__( 'Raleway', 'kuza-corporate' ),
            'header-font-2'   => esc_html__( 'Poppins', 'kuza-corporate' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'kuza-corporate' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'kuza-corporate' ),
            'header-font-5'   => esc_html__( 'Lato', 'kuza-corporate' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'kuza-corporate' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'kuza-corporate' ),
            'header-font-8'   => esc_html__( 'Lora', 'kuza-corporate' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'kuza-corporate' ),
            'header-font-10'   => esc_html__( 'Muli', 'kuza-corporate' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'kuza-corporate' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'kuza-corporate' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'kuza-corporate' ),
            'header-font-14'   => esc_html__( 'Cairo', 'kuza-corporate' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'kuza-corporate' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'kuza-corporate' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'kuza-corporate' ),
            'header-font-18'   => esc_html__( 'Fredericka', 'kuza-corporate' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'kuza-corporate' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'kuza-corporate' ),
        );

        $output = apply_filters( 'kuza_corporate_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'kuza_corporate_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function kuza_corporate_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'kuza-corporate' ),
            'body-font-1'     => esc_html__( 'Raleway', 'kuza-corporate' ),
            'body-font-2'     => esc_html__( 'Poppins', 'kuza-corporate' ),
            'body-font-3'     => esc_html__( 'Roboto', 'kuza-corporate' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'kuza-corporate' ),
            'body-font-5'     => esc_html__( 'Lato', 'kuza-corporate' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'kuza-corporate' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'kuza-corporate' ),
            'body-font-8'   => esc_html__( 'Lora', 'kuza-corporate' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'kuza-corporate' ),
            'body-font-10'   => esc_html__( 'Muli', 'kuza-corporate' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'kuza-corporate' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'kuza-corporate' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'kuza-corporate' ),
            'body-font-14'   => esc_html__( 'Cairo', 'kuza-corporate' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'kuza-corporate' ),
        );

        $output = apply_filters( 'kuza_corporate_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>