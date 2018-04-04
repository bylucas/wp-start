<?php
/***************************************
RELATED POSTS AND POPULAR POSTS FUNCTION
****************************************/

// Related Posts Function (call using start_related_posts(); )

function start_related_posts()  {

    if (is_single() )  {

    global $post;

    $orig_post = $post;
    
    $categories = get_the_category($post->ID);
    
    if ($categories) {
    
    $category_ids = array();
    
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    
    $args=array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 3, // Number of related posts that will be shown.
        'ignore_sticky_posts'=> 1
);
    $my_query = new wp_query( $args );
    
    if( $my_query->have_posts() ) {
        
        echo '<div class="related-post-wrap">';
        echo '<h3>You may also like ...</h3>';
    
    while( $my_query->have_posts() ) {

    $my_query->the_post(); ?>

    <div class="related-post">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('related'); ?>
        </a>
        <h4><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
        <p>
            <?php echo start_excerpt(); ?>
        </p>
    </div>

    <?php
}
echo '</div>';
}
}
$post = $orig_post;
wp_reset_query();

}
} /* end start related posts function */


/////////////////

// Popular Posts Function (call using start_popular_posts(); ) for use on pages

function start_popular_posts() {

    if (is_page() ) { 
    

$args=array(
        'orderby'=>"post_date",
        'posts_per_page' => 3,
        'ignore_sticky_posts'=> 1
);

$the_query = new WP_Query( $args );

if( $the_query->have_posts() ) {
    
    echo '<div class="popular-post-wrap">';

    echo '<h3>Popular...</h3>';

    while ( $the_query->have_posts() ) {
        $the_query->the_post(); ?>

        <div class="popular-post">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('related'); ?>
            </a>
            <h4><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
        </div>
        <?php
}
    echo '</div>';
}
wp_reset_query();
}

} /* end start popular posts function */
?>