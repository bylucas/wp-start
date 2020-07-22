 <?php

 if ( is_active_sidebar( 'sidebar1' ) ) {

?>
	
	<div id="sidebar" class="sidebar" role="complementary">

<h3 class="menu-title-remove">Sidebar</h3><!-- remove - for show only -->
   <?php dynamic_sidebar( 'sidebar1' ); ?>

	</div>

	<?php } ?>