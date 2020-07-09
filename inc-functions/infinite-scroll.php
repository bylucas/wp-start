<?php

/**
 * Javascript for Load More
 *
 */
function start_load_more_js() {

	global $wp_query;
	$args = array(
		'nonce' => wp_create_nonce( 'start-load-more-nonce' ),
		'url'   => admin_url( 'admin-ajax.php' ),
		'query' => $wp_query->query,
	);
if ( is_home() | is_archive() ) {			
	wp_enqueue_script( 'start-load-more', get_stylesheet_directory_uri() . '/js/min/load-more.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'start-load-more', 'startloadmore', $args );
	
}
}
add_action( 'wp_enqueue_scripts', 'start_load_more_js' );

/**
 * AJAX Load More 
 *
 */
function start_ajax_load_more() {
	check_ajax_referer( 'start-load-more-nonce', 'nonce' );
    
	$args = isset( $_POST['query'] ) ? $_POST['query'] : array();
	$args['post_type'] = isset( $args['post_type'] ) ? $args['post_type'] : 'post';
	$args['paged'] = $_POST['page'];
	$args['post_status'] = 'publish';

	ob_start();
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
		get_template_part( 'post-formats/content', 'index' );
		//start_post_summary();
	endwhile; endif; wp_reset_postdata();
	$data = ob_get_clean();
	wp_send_json_success( $data );
}
add_action( 'wp_ajax_start_ajax_load_more', 'start_ajax_load_more' );
add_action( 'wp_ajax_nopriv_start_ajax_load_more', 'start_ajax_load_more' );