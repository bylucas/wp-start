<footer class="footer" role="contentinfo">

    <?php get_sidebar('footer'); ?>

        <!-- // the theme uses a footer menu - footer-links -->
        <?php get_template_part('templates/footer-menu'); ?>
            <hr>
            <p class="footer-info">
                <?php do_action( 'phone1st_credits' ); ?>
                    &copy;
                    <?php echo date('Y'); ?> |
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a> |
                        <?php printf( __( 'Powered by %s', 'phone1st' ), '<a href="https://wordpress.org/">WordPress</a>' ); ?>
            </p>


</footer>
<!-- end footer -->

</div>
<!-- end .site -->

<?php wp_footer(); ?>

    </body>

    </html>