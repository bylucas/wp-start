<?php
/*********************
SCRIPTS & FONTS
Scripts are minified via CodeKit - you will need to set your preprocessor to do the same or use the un-minified versions in the js folder and alter the script paths below
*********************/

function google_fonts() {
    $query_args = array(
        'family' => 'Oswald',
        'subset' => 'latin,latin-ext',
        );
    wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }
            
add_action('wp_enqueue_scripts', 'google_fonts');


/*********** Scripts and styles *****************/

  function phone1st_scripts_and_styles() {
            

// Theme stylesheet. In the root.
    wp_enqueue_style( 'phone1st-style', get_template_directory_uri() . '/css/style.css', array());



// comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'phone1st-js', get_template_directory_uri() . '/js/min/scripts-min.js', array( 'jquery' ), '', true );


// enqueue the highlight code style and script if is single page
  if ( is_single() ) {

    wp_enqueue_style( 'phone1st-highlightcode-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/github.min.css', array(), '' );

    wp_enqueue_script( 'phone1st-highlightcode', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js', array('jquery'), '9.1.0', true );
}
}

    add_action('wp_enqueue_scripts', 'phone1st_scripts_and_styles');



// Google Analytics: change UA-XXXXX-X to be your site's ID.

    function add_googleanalytics() { ?>
    <script>
        (function (b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function () {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X');
        ga('send', 'pageview');
    </script>

    <?php }

 add_action('wp_footer', 'add_googleanalytics');
?>