<?php
 // =======================
 // Primary Menu Template
 // =======================
 
?>
    <h3 class="menu-title-remove">Main Menu</h3><!-- remove - for show only -->
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
       <nav id="main-menu" class="main-menu" role="navigation">
            <?php wp_nav_menu( array(
               'theme_location' => 'primary',
               'container' => 'false',
               'menu_id' => 'main-menu',
               'menu_class' => 'main-menu'
               ) );
               ?>


        </nav>
        <!-- .main-navigation -->
        <?php endif; ?>