<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 *
 * @package WordPress
 * @since start 1.0
 */

get_header(); ?>

        <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			get_template_part( 'post-formats/content', 'page' );

			start_popular_posts();

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
			endwhile;
		?>

    <?php get_sidebar(); ?>

        </section>
        <!-- end main -->

        <?php get_footer(); ?>