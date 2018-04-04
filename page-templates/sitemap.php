<?php
//Template Name: Sitemap
//
// I find these sitemaps more useful than the main menu sometimes. Don't forget to use a plugin to make and submit to search engines a sitemap.xml file
// ========================================
// To show all pages, categories and posts
// ========================================
?>

    <?php get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="page-header">
                    <?php the_title( '<h1>', '</h1>' ); ?>
                </header>
                <!-- .post-header -->

                <section class="sitemap-body">

                    <p>
                        <?php _e('Every page, post and category is listed on this page. If you can&rsquo;t find what your looking for here please contact', 'start'); ?> <a href="mailto:<?php echo get_option('admin_email'); ?>?subject=sitemap">[your email]</a>
                            <?php _e('so that I can be of more assistance.', 'start'); ?>
                    </p>


                        <div class="sitemap-left">

                            <h3><?php _e('Pages', 'start'); ?></h3>

                            <ul>

                                <?php wp_list_pages('title_li='); ?>

                            </ul>
                            <!-- end page-ul -->

                            <h3><?php _e('Archives', 'start'); ?></h3>

                            <ul>

                                <?php wp_get_archives('type=monthly'); ?>

                            </ul>

                            <h3><?php _e('Categories', 'start'); ?></h3>

                            <ul class="page-ul">

                                <?php wp_list_categories('title_li='); ?>

                            </ul>
                            <!-- end page-ul -->

                        </div>
                        <!-- end site_left -->


                        <div class="sitemap-right">

                            <h3><?php _e('Articles', 'start'); ?></h3>

                            <ul>

                                <?php $recentPosts = new WP_Query();
						$recentPosts->query('showposts=1000&cat=-8'); ?>

                                    <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>

                                        <li>
                                            <?php echo get_post_meta($post->ID, 'top-title', true); ?><span>&nbsp;</span>
                                                <a href="<?php the_permalink() ?>" rel="bookmark">
                                                    <?php the_title(); ?>
                                                </a>
                                        </li>

                                        <?php endwhile; ?>

                            </ul>
                            <!-- end page-ul -->

                        </div>
                        <!-- end site_right -->

                </section>
                <!-- sitemap-body -->

            </article>
            <!-- post -->

            <?php endwhile; ?>

                    </section>
                    <!-- end main -->

                    <?php get_footer(); ?>