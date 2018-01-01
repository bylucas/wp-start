<?php
	//Sidebar footer set to three areas
?>
    
    <div id="sidebar-footer" class="footer-sidebar" role="complementary">
    <h3 class="menu-title-remove">Sidebar Footer</h3><!-- remove - for show only -->

        <div class="footer-sidebar1">

            <?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

                <?php dynamic_sidebar( 'sidebar2' ); ?>

                    <?php endif; ?>

        </div>
        <!-- end footer-sidebar1 -->


        <div class="footer-sidebar2">

            <?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

                <?php dynamic_sidebar( 'sidebar3' ); ?>

                    <?php endif; ?>

        </div>
        <!-- end footer-sidebar2 -->


        <div class="footer-sidebar3">

            <?php if ( is_active_sidebar( 'sidebar4' ) ) : ?>

                <?php dynamic_sidebar( 'sidebar4' ); ?>

                    <?php endif; ?>

        </div>
        <!-- end footer-sidebar3 -->

    </div>
    <!-- end sidebar-footer -->