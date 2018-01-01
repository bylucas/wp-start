<?php
//
// =======================================
// Template for displaying Post Not Found
// =======================================
?>

    <article class="post">

        <header class="post-not-found-header">

            <h1><span><?php _e( 'Oops!', 'phone1st' ); ?></span><br>
				<?php _e( 'That post can&rsquo;t be found', 'phone1st' ); ?>
			</h1>

        </header>

        <section class="post-not-found-body">

            <p>
                <?php _e( 'Apologies, but no results were found. Perhaps another search will help or see the latest Articles below...', 'phone1st' ); ?>
            </p>

            <div class="noresults-search-box">

                <?php get_search_form(); ?>

            </div>

            <h3><?php _e('Check out the latest articles', 'phone1st'); ?></h3>

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