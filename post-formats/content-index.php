<?php
/**
 *
 * Used for pages that show the excerpt.
 *
 * @package WordPress
 * @since start 1.0
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php // Post thumbnail.
		start_post_thumbnail(); ?>

            <header class="index-header">
                <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>
            <!-- .index-header -->

            <div class="index-content">

                <p>
                    <?php echo start_excerpt(); ?>
                </p>

            </div>
            <!-- .post-content -->

            <footer class="index-footer">

                <?php start_post_meta(); ?>

                <p class="reading-time"><?php printf( __( 'Reading time about <span class="reading-number">%s</span>', 'start' ), start_estimated_reading_time() )?></p>

                <?php edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'start' ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            ); ?>

            </footer>
            <!-- .post-footer -->

    </article>
    <!-- #post-## -->