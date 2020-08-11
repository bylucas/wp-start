<?php
// NAVIGATION

//PAGE NAVIGATION
function start_pagination() {
the_posts_pagination( array(
    'prev_text' => __( 'Previous page', 'start' ),
    'next_text' => __( 'Next page', 'start' ),
    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'start' ) . ' </span>',
    ) );
}

//POST NAVIGATION
function start_post_navigation() {

    // Previous/next post navigation.
    the_post_navigation( array(
     'next_text' => '<span class="nav-right" aria-hidden="true">' . __( 'Next', 'start' ) . '</span> ' .
     '<span class="screen-reader-text">' . __( 'Next post:', 'start' ) . '</span> ' .
     '<span class="title-right">%title</span>',
                
     'prev_text' => '<span class="nav-left" aria-hidden="true">' . __( 'Previous', 'start' ) . '</span> ' .
     '<span class="screen-reader-text">' . __( 'Previous post:', 'start' ) . '</span> ' .
     '<span class="title-left">%title</span>',
    ) );
}

//COMMENT NAVIGATION
function start_comment_nav() {
// Are there comments to navigate through?
 if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'start' ); ?></h2>
        <div class="nav-links">
            <?php
                if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'start' ) ) ) :
                    printf( '<div class="nav-previous">%s</div>', $prev_link );
                endif;

                if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'start' ) ) ) :
                    printf( '<div class="nav-next">%s</div>', $next_link );
                endif;
            ?>
        </div>
        <!-- .nav-links -->
    </nav>
    <!-- .comment-navigation -->
    <?php
    endif;
}


//PAGE LINKS as seen on the posts/pages with more than one page
//HORRIBLE
function start_page_links() {

 wp_link_pages( array(
     'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'start' ) . '</span>',
     'after'       => '</div>',
     'link_before' => '<span>',
     'link_after'  => '</span>',
     'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'start' ) . ' </span>%',
     'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
 }
?>