<?php
/*********************
SCRIPTS & FONTS
Scripts are minified via CodeKit - you will need to set your preprocessor to do the same or use the un-minified versions in the js folder and alter the script paths below
*********************/

function add_google_fonts() {
 wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i|Source+Code+Pro', false );
 }
 add_action( 'wp_enqueue_scripts', 'add_google_fonts' );


/*********** Scripts and styles *****************/

  function start_scripts_and_styles() {
            

// Theme stylesheet.
    wp_enqueue_style( 'start-style', get_template_directory_uri() . '/css/style.css', array());



// comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

//skip-link-fix
     wp_enqueue_script( 'start-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix.js', array(), '20151215', true );

//main-script
    wp_enqueue_script( 'start-js', get_template_directory_uri() . '/js/min/app.js', array( 'jquery' ), '', true );


// if code is needed enqueue the highlight code style and script if is single page
  if ( is_single() ) {

    wp_enqueue_style( 'start-highlightcode-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/github.min.css', array(), '' );

    wp_enqueue_script( 'start-highlightcode', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js', array('jquery'), '9.1.0', true );
}
}

    add_action('wp_enqueue_scripts', 'start_scripts_and_styles');



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