<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage start
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

 <article class="post">

    <header class="post-not-found-header">

        <h1><span><?php _e( 'Oops!', 'start' ); ?></span><br>
			<?php _e( 'That page can&rsquo;t be found', 'start' ); ?>
		</h1>

    </header>

    <section class="post-not-found-body">

        <p>
            <?php _e( 'Apologies, but no results were found. Perhaps another search will help or see the latest Articles below...', 'start' ); ?>
        </p>

        <div class="noresults-search-box">

            <?php get_search_form(); ?>

        </div>

        <h3><?php _e('Check out the latest articles', 'start'); ?></h3>

        <ul>

        <?php
    	    $recentPosts = new WP_Query();
    	    $recentPosts->query('showposts=10');?>

                <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

            <li>

                <a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?>
                </a>

            </li>

        <?php endwhile; ?>

        </ul>

    </section>

</article>
</section><!-- main -->

<?php get_footer();
