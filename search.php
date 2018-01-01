<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @since Phone1st 1.0
 */

get_header(); ?>


        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1><?php printf( __( 'Search Results for: %s', 'phone1st' ), get_search_query() ); ?></h1>
            </header>
            <!-- .page-header -->

            <?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

                <?php
				/*
				 * Run the loop for the search to output the results.
				 */
				get_template_part( 'post-formats/content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
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