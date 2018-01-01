<?php
/**
 *
 * Used for pages that show the excerpt.
 *
 * @package WordPress
 * @since phone1st 1.0
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php
		// Post thumbnail.
		phone1st_post_thumbnail();
	?>

            <header class="index-header">
                <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>
            <!-- .index-header -->

            <div class="index-content">

                <p>
                    <?php echo phone1st_excerpt(); ?>
                </p>

            </div>
            <!-- .post-content -->

            <footer class="index-footer">

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
            <!-- .post-footer -->

    </article>
    <!-- #post-## -->