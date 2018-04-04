<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @since start 1.0
 */
?>

    <div class="author-info">

        <h2><?php _e( 'Published by', 'start' ); ?></h2>

        <div class="author-avatar">
            <?php
		
		$author_bio_avatar_size = apply_filters( 'start_author_bio_avatar_size', 80 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>

        </div>
        <!-- .author-avatar -->

        <div class="author-description">

            <h3><?php echo get_the_author(); ?></h3>

            <p>
                <?php the_author_meta( 'description' ); ?>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                        <?php printf( __( 'View all posts by %s', 'start' ), get_the_author() ); ?>
                    </a>
            </p>
            <!-- .author-bio -->

        </div>
        <!-- .author-description -->

    </div>
    <!-- .author-info -->