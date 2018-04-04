<?php
/**
 * The template for displaying search page
 *
 * @package WordPress
 * @since start 1.0
 */
?>

    <article class="search">


        <header class="search-header">
            <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </header>
        <!-- .index-header -->

        <div class="search-content">

            <p>
                <?php echo start_excerpt(); ?>
            </p>

        </div>
        <!-- .search-content -->

    </article>
    <!-- .search-## -->