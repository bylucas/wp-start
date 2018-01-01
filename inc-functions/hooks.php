<?php

/*************************************************************
POSTMETA - TAGS - POST THUMBNAIL - EXCERPT
*************************************************************/

/************* POST META *****************/


  if ( ! function_exists( 'phone1st_post_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 */
// Featured sticker appears on featured post on the index/all-post-page
function phone1st_post_meta() {
  if ( is_sticky() && is_home() && ! is_paged() ) {
    printf( '<span class="feature">%s</span>', __( 'Featured', 'phone1st' ) );
  }
 
     printf( '<span class="by-author"><span class="screen-reader-text">%1$s </span><a class="url" href="%2$s">%3$s</a></span>',
        _x( 'Author', 'Used before post author name.', 'phone1st' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );

     printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
      _x( 'Posted on', 'Used before publish date.', 'phone1st' ),
      esc_url( get_permalink() ),
      get_the_date()
    );

    $categories_list = get_the_category_list( _x( ' | ', 'Used between list items, there is a space after the bar.', 'phone1st' ) );
    if ( $categories_list ) {
      printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
        _x( 'Categories', 'Used before category names.', 'phone1st' ),
        $categories_list
      );
    }

    $tags_list = get_the_tag_list( '', _x( ' | ', 'Used between list items, there is a space after the bar.', 'phone1st' ) );
    if ( $tags_list ) {
      printf( '<span class="tags"><span class="screen-reader-text">%1$s </span>%2$s</span>',
        _x( 'Tags', 'Used before tag names.', 'phone1st' ),
        $tags_list
      );
    }

  if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="comments-link">';
    /* translators: %s: post title */
    comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'phone1st' ), get_the_title() ) );
    echo '</span>';
  }
}

endif;

/************* POST THUMBNAIL *****************/

if ( ! function_exists( 'phone1st_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 */
function phone1st_post_thumbnail() {
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }

  if ( is_singular() ) :
  ?>

    <div class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
    </div>

    <?php else : ?>

        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">

            <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
        </a>

        <?php endif; // End is_singular()
}
endif;


/************* EXCERPT *****************/

/**
 * Replaces "[...]" (appended to automatically and user generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since phone1st 1.0
 *
 * phone1st_excerpt_more combined below for automatic and user generated excerpts
 */
function phone1st_excerpt_more( $more ) {
  
  return ' ';
}

function phone1st_excerpt_length($length) {
  return 25;
}

function phone1st_global_excerpt($output) {
  global $post;

  return $output . sprintf( ' &hellip; <a href="%1$s" class="more-link">%2$s</a>',
    esc_url( get_permalink( get_the_ID() ) ),
    /* translators: %s: Name of current post */
    sprintf( __( 'Continue reading %s', 'phone1st' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
    );
}

function phone1st_excerpt() {
  
  add_filter( 'excerpt_more', 'phone1st_excerpt_more' );
  add_filter( 'excerpt_length', 'phone1st_excerpt_length' );
  add_filter( 'the_excerpt', 'phone1st_global_excerpt' );
  return the_excerpt();
}

// To keep the excerpt_more as part of the exerpt take away the auto <p> wordpress generates
// use <p><?php echo phone1st_excerpt(); </p> - in your template
// To separate the excerpt more from the excerpt, comment out the line below and leave the <p> off the excerpt - <?php echo phone1st_excerpt(); - in your template

 remove_filter('the_excerpt', 'wpautop');