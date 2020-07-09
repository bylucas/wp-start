<?php
//************* COMMENT LAYOUT *********************
//Alter the way the comments look, remove this file to use default

// Comments Layout
function start_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class( ''); ?>>
		<article>
			<header class="comment-author vcard">
				<?php
        echo get_avatar($comment,$size='55',$default='' );
        
        printf( '<cite class="fn">%1$s %2$s</cite>',
            get_comment_author_link(),
            // If current post author is also comment author, make it known visually.
            ( $comment->user_id === $comment->post_author ) ? '<span><span class="hidden">' . __( 'Post author', 'start' ) . '</span></span>' : '' );
edit_comment_link( __( 'Edit' ), '  ', '' ); 
    
    printf( '<time datetime="%2$s">%3$s</time>',
            esc_url( get_comment_link( $comment->comment_ID ) ),
            get_comment_time( 'c' ),
            /* translators: 1: date, 2: time */
            sprintf( __( '%1$s at %2$s', 'start' ), get_comment_date(), get_comment_time() )
          ); ?>

			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p>
						<?php _e( 'Your comment is awaiting moderation.', 'start' ) ?>
					</p>
				</div>
				<?php endif; ?>
					<section class="comment-content">
						<?php comment_text() ?>
					</section>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>

		</article>

		<?php
}
