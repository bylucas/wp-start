<?php
/*********************
THEME SUPPORT
*********************/

// Adding WP Functions & Theme Support
	function start_theme_support() {

// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

// Let WordPress manage the document title.
// By adding theme support, we declare that this theme does not use a
// hard-coded <title> tag in the document head, and expect WordPress to
// provide it for us.

	add_theme_support( 'title-tag' );

// Allow editor style.
  	add_editor_style( 'css/editor-style.css' );

// Makes start available for translation.
// Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'start', get_template_directory() . '/languages' );

/*
* Enable support for Post Thumbnails on posts and pages.
* Set the thumbnail sizes including related posts size
* See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1020, 9999 );// phon1st_post_thumbnail() as seen on the posts
	add_image_size('related', 310, 118, true);// related and popular posts
	
// When using grids the content width is not usualy known so set it to the max-width or leave it out.
	if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // no title & short
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'start' ),
		'social'  => __( 'Social Links Menu', 'start' ),
		'footer-links' => __( 'Footer Menu', 'start' )
	) );

/**
 * Display descriptions in main navigation.
 */
function start_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'start_nav_description', 10, 4 );


/*********************
OTHER ITEMS
*********************/

// Switches default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'widgets'
	) );

// Add a `screen-reader-text` class to the search form's submit button.

function start_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'start_search_form_modify' );

// Remove the URL from the comment form
function start_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
 }
add_filter('comment_form_default_fields','start_disable_comment_url');

//Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 150,
		'flex-height' => true,
	) );

// Many times you don’t need the medium or the large size and even the thumbnail if you set your own size, so to prevent a cluttered image folder we could instruct WP to ignore them.
	
	function start_remove_default_image_sizes( $sizes) {
    // unset( $sizes['thumbnail']);
    // unset( $sizes['medium']);
    // unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'start_remove_default_image_sizes');

//WordPress 5 items
// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content
		add_theme_support( 'responsive-embeds' );


} //start_theme_support

add_action( 'after_setup_theme', 'start_theme_support' );

////////////////////////////////////////////////////////

// Add classes to the body to add more control
function start_body_classes( $classes ) {
	
// if the page is using a page-template color the background
	if (  is_page_template() ) {
		$classes[] = 'change-color';
	}

	return $classes;
}

add_filter( 'body_class', 'start_body_classes' );

//estimated reading time
function start_estimated_reading_time() {

  $post = get_post();

  $words = str_word_count( strip_tags( $post->post_content ) );
  $minutes = floor( $words / 170 );
  $seconds = floor( $words % 170 / ( 170 / 60 ) );

  if ( 1 <= $minutes ) {
    $estimated_time = sprintf( _n( '%d minute', '%d minutes', $minutes, 'start' ), $minutes );
  } else {
    $estimated_time = sprintf( _n( '%d second', '%d seconds', $seconds, 'start' ), $seconds );
  }

  $word_count = sprintf( _n( ' (%d word)', ' (%d words)', $words, 'start' ), $words  );
 
 return $estimated_time . $word_count;
}

//the cookie consent in the comments

function start_filter_comment_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    $fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">Save my name and email in this browser, I may come back.</label></p>';

    return $fields;
}

add_filter( 'comment_form_default_fields', 'start_filter_comment_fields', 20 );


// Customise the log-in page

function start_login_css() {
	wp_enqueue_style( 'start_login_css', get_template_directory_uri() . '/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function start_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function start_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'start_login_css', 10 );
add_filter('login_headerurl', 'start_login_url');
add_filter('login_headertitle', 'start_login_title');