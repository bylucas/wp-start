<?php
/**
 * Register widget area.
 *
 * @since start 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function start_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'start' ),
		'id' => 'sidebar1',
		'description' => __( 'Appears on templates with sidebar activated', 'start' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// Footer sidebars

	register_sidebar( array(
		'name' => __( 'Footer Sidebar1', 'start' ),
		'id' => 'sidebar2',
		'description' => __( 'Footer sidebar 1 Appears on templates with footer sidebar activated, allows widgets in the footer area', 'start' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar2', 'start' ),
		'id' => 'sidebar3',
		'description' => __( 'Footer sidebar 2 Appears on templates with footer sidebar activated, allows widgets in the footer area', 'start' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Sidebar3', 'start' ),
		'id' => 'sidebar4',
		'description' => __( 'Footer sidebar 3 Appears on templates with footer sidebar activated, allows widgets in the footer area', 'start' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}
add_action( 'widgets_init', 'start_widgets_init' );

?>