<?php
/*******************************************************************************************
AFTER THEME SETUP - Remove un-wanted files from WordPress
********************************************************************************************
*
* WordPress adds some unnecessary files to the head and unnecessary <p> tags to the post body.
* @since start 1.0
*/
 
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

// Media cleanup
  
  // clean up gallery output in wp
  function start_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}
  add_filter('gallery_style', 'start_gallery_style');


  // remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

// For some reason WordPress adds explicit width to the figure tag. That inhibits our responsive layout and the only way around that is to rewrite the entire img_caption_shortcode function.
  
  function start_img_caption_shortcode ( $empty, $attr, $content ) {
    $attr = shortcode_atts( array(
        'id'      => '',
        'align'   => 'alignnone',
        'width'   => '',
        'caption' => '',
        'class'   => ''
    ), $attr, 'caption' );

    if ( 1 > (int)$attr['width'] || empty( $attr['caption'] ) ) {
        return $content;
    }

    if ( $attr['id'] ) {
        $attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '"';
    }

    $attr['class'] = 'class="' . esc_attr( trim( $attr['align'] . ' ' . $attr['class'] ) ) . '"';

    return '<figure ' . $attr['id'] . ' ' . $attr['class'] . '>'
        . do_shortcode( $content )
        . '<figcaption>' . $attr['caption'] . '</figcaption>'
        . '</figure>';
}

  add_filter( 'img_caption_shortcode', 'start_img_caption_shortcode', 10, 3 );

add_action('after_setup_theme', 'start_after_setup');
?>