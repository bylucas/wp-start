<?php
/**
 * The template for displaying all single posts and attachments (post-formats)
 *
 * @package WordPress
 * @since start 1.0
 */

get_header(); ?>

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. 
             */
            get_template_part( '/post-formats/content', get_post_format() );

            start_post_navigation();

            start_related_posts();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        // End the loop.
        endwhile; ?>

    <?php get_sidebar(); ?>

        </section>
        <!-- end main -->

        <?php get_footer(); ?>