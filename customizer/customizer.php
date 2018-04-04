<?php
/**
 * start Customizer
 * Sets up the WordPress core custom header and custom background features.
 * A very basic customizer to alter, destroy or build-on 
 */

function start_custom_header_and_background() {

    $default_background_color = get_background_color();

    add_theme_support( 'custom-background', array(
        'default-color' => $default_background_color,
    ) );
    
    // The header image is a background image
    add_theme_support( 'custom-header', array(
        'default-text-color'     => '#333',
        'width'                  => 1200,
        'height'                 => 300,
        'flex-height'            => true,
        'wp-head-callback'       => 'start_header_style',
    ) );
}
add_action( 'after_setup_theme', 'start_custom_header_and_background' );

if ( ! function_exists( 'start_header_style' ) ) :

function start_header_style() {

   $header_image = get_header_image();

    // If no custom options for text are set, lets go away.
    if ( empty( $header_image ) && display_header_text() ) {
        return;
    }

    // We may have a header background.
    ?>
    <style type="text/css" id="start-header-css">
        <?php // Has a Custom Header been added?
        if ( ! empty( $header_image)): ?> .site-header {
            background-image: url(<?php header_image();
            ?>);
            background-repeat: no-repeat;
            background-position: center 0;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        
        <?php endif;
        // Has the text been hidden?
        if ( ! display_header_text()): ?> .site-title,
        .site-description {
            clip: rect(1px, 1px, 1px, 1px);
            position: absolute;
        }
        
        <?php endif;
        ?>
    </style>
    <?php
}
endif; // start_header_style


function start_sanitize_input( $input ) {
    return strip_tags( stripslashes( $input ) );
} // end start_sanitize_input


/**
 * Adds postMessage support for site title, description and color scheme for the Customizer.
 */
function start_customize_register( $wp_customize ) {
    

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // Remove the core header textcolor control, and background color.
    $wp_customize->remove_control( 'header_textcolor' );

}
add_action( 'customize_register', 'start_customize_register', 11 );


// Call the script for live preview
function start_customize_preview_js() {
    wp_enqueue_script( 'start-customize-preview', get_template_directory_uri() . '/js/min/customize-preview-min.js', array( 'customize-preview' ), '20150922', true );
}
add_action( 'customize_preview_init', 'start_customize_preview_js' );