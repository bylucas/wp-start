<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <?php get_template_part('templates/head-meta'); ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <div class="wrapper">

            <a class="skip-link screen-reader-text" href="#content">
            <?php _e( 'Skip to content', 'start' ); ?>
            </a>

            <header id="masthead" class="site-header" role="banner">

            <?php // the custom logo introduced in WordPress 4.5
                the_custom_logo();
            
                // For SEO purposes only show the site title in h1 tags on the front/home page
                // On post pages the post title is wrapped with h1 tags
                    
                    if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    
                    <?php else : ?>
                    
                    <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                    <?php endif; ?>

                    <p class="site-description">
                    <?php bloginfo( 'description' ); ?>
                    </p>


             <div class="menu-wrap">

                <?php get_template_part('templates/primary-menu'); ?>
                <?php get_template_part('templates/social-menu'); ?>
            </div>

        </header>
        
            <section id="top" class="main">