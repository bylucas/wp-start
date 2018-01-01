<?php
/*********************
NAVIGATION
*********************/

/******* PAGE NAVIGATION *********/

function phone1st_pagination() {
the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'phone1st' ),
                'next_text'          => __( 'Next page', 'phone1st' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'phone1st' ) . ' </span>',
            ) );
}

/****** POST NAVIGATION ********/

function phone1st_post_navigation() {

    // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="nav-right" aria-hidden="true">' . __( 'Next', 'phone1st' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'phone1st' ) . '</span> ' .
                    '<span class="title-right">%title</span>',
                
                'prev_text' => '<span class="nav-left" aria-hidden="true">' . __( 'Previous', 'phone1st' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'phone1st' ) . '</span> ' .
                    '<span class="title-left">%title</span>',
            ) );
}

/****** COMMENT NAVIGATION ********/

function phone1st_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'phone1st' ); ?></h2>
        <div class="nav-links">
            <?php
                if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'phone1st' ) ) ) :
                    printf( '<div class="nav-previous">%s</div>', $prev_link );
                endif;

                if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'phone1st' ) ) ) :
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


/*************************************************************
PAGE LINKS as seen on the posts/pages with more than one page
**************************************************************/

function phone1st_page_links() {

    wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'phone1st' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'phone1st' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
}
?>