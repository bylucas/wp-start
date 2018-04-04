<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @since lightstart 1.0
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php start_post_thumbnail(); ?>

            <header class="post-header">
                <?php the_title( '<h1>', '</h1>' ); ?>
            </header>
            <!-- .post-header -->

            <section class="post-content">

                <?php the_content(); ?>

                    <?php start_page_links(); ?>

            </section>
            <!-- .post-content -->

            <footer class="page-footer">

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

    </article>
    <!-- #post-## -->