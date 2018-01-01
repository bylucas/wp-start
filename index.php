<?php
/**
 * The index template file
 * This is one of two files (style.css being the other), needed as a minimum in a WordPress theme.
 * This page is used to display the home/front page when no home/front.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @since Phone1st 1.0
 */

get_header(); ?>

        <?php if ( have_posts() ) : ?>

            <?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// content-index shows post excerpts
				// to show the full posts, call post-format/content.
				get_template_part( 'post-formats/content', 'index' );

			// End the loop.
			endwhile;

			phone1st_pagination();

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'post-formats/content', 'none' );

		endif;
		?>

    <?php get_sidebar(); ?>

        </section>
        <!-- end main -->

        <?php get_footer(); ?>