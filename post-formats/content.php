<?php
/**
 * The default template for displaying content
 *
 * Used for single.
 *
 * @package WordPress
 * @since start 1.0
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php
		// Post thumbnail.
		start_post_thumbnail();
	?>

            <header class="post-header">
                <?php the_title( '<h1>', '</h1>' ); ?>
            </header>
            <!-- .post-header -->

            <div class="post-content">
                <?php
			
            the_content();

		 start_page_links();

		?>
            </div>
            <!-- .post-content -->

            <?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			
			get_template_part( 'templates/author-bio' );

			get_template_part( 'templates/social-menu' );

		endif;
	?>

                <footer class="post-footer">

                    <?php start_post_meta(); ?>

                        <?php
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'start' ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
        ?>

                </footer>
                <!-- .entry-footer -->

    </article>
    <!-- #post-## -->