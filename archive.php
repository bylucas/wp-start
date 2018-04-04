<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package WordPress
 * @since start 1.0
 */
?>

    <?php get_header(); ?>

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <?php
					the_archive_title( '<h1>', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
                </header>
                <!-- .page-header -->

                <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'post-formats/content', 'index' );

			// End the loop.
			endwhile;

			start_pagination();

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'post-formats/content', 'none' );

		endif;
		?>

        <?php get_sidebar(); ?>

            </section>
            <!-- main -->

            <?php get_footer(); ?>