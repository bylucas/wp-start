<?php
/**
 * The default template for displaying content
 *
 * Used for single.
 *
 * @package WordPress
 * @since Phone1st 1.0
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php
		// Post thumbnail.
		phone1st_post_thumbnail();
	?>

            <header class="post-header">
                <?php the_title( '<h1>', '</h1>' ); ?>
            </header>
            <!-- .post-header -->

            <div class="post-content">
                <?php
			
            the_content();

		 phone1st_page_links();

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

                    <?php phone1st_post_meta(); ?>

                        <?php
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'phone1st' ),
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