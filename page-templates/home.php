<?php
//Template Name: Home-page
//
// Home page template
// ========================================
// Home/Front page
// ========================================
?>

    <?php get_header(); ?>

     <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="page-header">
                    <?php the_title( '<h1>', '</h1>' ); ?>
                </header>
                <!-- .post-header -->
        
                    <section class="home-page-content">

                        <p>Welcome to your homepage.</p>         
           
                    </section>
            </article>
    <?php endwhile; ?>          
    <?php start_popular_posts(); ?>

    <?php get_footer(); ?>