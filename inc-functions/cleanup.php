<?php
/* AFTER THEME SETUP - Remove un-wanted files from WordPress
WordPress adds some unnecessary files to the head
This is a personal opinion and may horrify some of the WordPress community
@since start 1.0 */

 function start_after_setup () {
  
    // removes the “generator” meta tag from the document header.
    remove_action('wp_head', 'wp_generator');

    // remove really simple discovery link
    remove_action('wp_head', 'rsd_link');

    // remove wlwmanifest.xml (needed to support windows live writer)
    remove_action('wp_head', 'wlwmanifest_link');

    // Removes a link to the next and previous post from the document header. This has nothing to do with the “next/previous” post.
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

    // remove link to index page
    remove_action('wp_head', 'index_rel_link');

    // disable shortlinks
    remove_action('wp_head', 'wp_shortlink_wp_head'); 

    // Removes the generator name from the RSS feeds.
    add_filter('the_generator', '__return_false');

    // Removes WP 4.2 emoji styles and JS.
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

    remove_action( 'wp_print_styles', 'print_emoji_styles' );

// remove WP version from scripts and styles
function start_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

    add_filter( 'style_loader_src', 'start_remove_wp_ver_css_js', 9999 );
    
    add_filter( 'script_loader_src', 'start_remove_wp_ver_css_js', 9999 );

// remove injected CSS for recent comments widget
function start_remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}

add_filter( 'wp_head', 'start_remove_wp_widget_recent_comments_style', 1 );

// clean up comment styles in the head
function start_remove_recent_comments_style() {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
}

add_action('wp_head', 'start_remove_recent_comments_style', 1);
}