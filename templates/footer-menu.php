<?php
 // =======================
 // Footer Links Template
 // =======================
 
?>
    <h3 class="menu-title-remove">Footer Menu</h3><!-- remove - for show only -->
    <?php if ( has_nav_menu( 'footer-links' ) ) : ?>
        <nav class="footer-links" role="navigation">
            <?php
        // footer links navigation menu.
        wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'footer-links',
            'depth'          => 1,
            'link_after' => '</a><span class="spacer">|</span>',
        ) );
    ?>
        </nav>
        <?php endif; ?>