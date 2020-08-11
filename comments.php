<?php
/*
The comments page
*/
// don't load it if you can't comment
if ( post_password_required() ) {
return;
}
?>
  <?php // You can start editing here. ?>
    <?php if ( have_comments() ) : ?>
      <section id="comments" class="commentlist">
        <h3 class="comments-title"><?php printf( _nx( 'One Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'start' ),
  number_format_i18n( get_comments_number() ), get_the_title() ); ?>
  </h3>

        <?php
  wp_list_comments( array(
  'style'             => 'div',
  'short_ping'        => true,
  'avatar_size'       => '',
  'callback'          => 'start_comments',
  'type'              => 'all',
  'reply_text'        => 'Reply',
  'page'              => '',
  'per_page'          => '',
  'reverse_top_level' => null,
  'reverse_children'  => ''
  ) );
  ?>

  <?php //start_comment_nav(); ?>
    <?php if ( ! comments_open() ) : ?>
      <p class="no-comments">
        <?php _e( 'Comments are closed.' , 'start' ); ?>
      </p>
    <?php endif; ?>
      <?php endif; ?>

  <?php // remove this section to use default comment form
  $comments_args = array(
  'fields' => apply_filters(
  'comment_form_default_fields', array(
  
  'author' => '<input class="comment-form-author" id="author" placeholder="Your Name" name="author" type="text" value="' .
  esc_attr( $commenter['comment_author'] ) . '" size="30"' . '_s' . ' />' . ( $req ? '' : '' ),
  'email'  => '<input class="comment-form-email" id="email" placeholder="your-email@example.com" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
  '" size="30"' . '_s' . ' />'  . ( $req ? '' : '' ))),
  'comment_field' => '<textarea class="comment-form-comment" id="comment" name="comment" placeholder="Your thoughts feedback, click here & start typing" cols="45" rows="8" aria-required="true"></textarea>',
  'comment_notes_before' => '<p class="comment-notes">We won\'t publish your email address. All boxes are required.</p>',
  'comment_notes_after' => '',
  'title_reply' => 'Your Comments & Reviews'
  );
  comment_form($comments_args);
  ?>
    </section>