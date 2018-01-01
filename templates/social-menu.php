<?php
 // ============================
 // Social Navigation Template
 // ============================
?>
    <h3 class="menu-title-remove">Social Menu</h3><!-- remove - for show only -->
    <?php if ( has_nav_menu( 'social' ) ) : ?>
        <nav id="social-navigation" class="social-navigation" role="navigation">
            <?php
                    // Social links navigation menu.
                    wp_nav_menu( array(
                        'theme_location' => 'social',
                        'depth'          => 1,
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span><span class="spacer">|</span>',
                        
                    ) );
                ?>
        </nav>
        <!-- .social-navigation -->
        <?php endif; ?>