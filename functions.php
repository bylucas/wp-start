<?php
/**
 * This file calls the various Function files from inc-functions/
 */
require get_template_directory() . '/inc-functions/theme-support.php';
require get_template_directory() . '/inc-functions/cleanup.php';
require get_template_directory() . '/inc-functions/scripts-fonts.php';
require get_template_directory() . '/inc-functions/hooks.php';
require get_template_directory() . '/inc-functions/comments-layout.php';
require get_template_directory() . '/inc-functions/infinite-scroll.php';
require get_template_directory() . '/inc-functions/related-posts.php';
require get_template_directory() . '/inc-functions/navigation.php';
require get_template_directory() . '/inc-functions/widgets.php';

// Call the the customiser files from the customiser folder
// These are basic files
require get_template_directory() . '/customizer/customizer.php';
?>