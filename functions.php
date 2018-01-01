<?php
/**
 * This file calls the various Function files from inc-functions/
 */
require_once locate_template('/inc-functions/theme-support.php');
//require_once locate_template('/inc-functions/after-setup.php');
require_once locate_template('/inc-functions/scripts-fonts.php');
require_once locate_template('/inc-functions/hooks.php');
require_once locate_template('/inc-functions/related-posts.php');
require_once locate_template('/inc-functions/navigation.php');
require_once locate_template('/inc-functions/widgets.php');

// Call the the customiser files from the customiser folder
// These are basic files
require get_template_directory() . '/customizer/customizer.php';
?>