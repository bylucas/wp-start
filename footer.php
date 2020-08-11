</section><!-- end main -->

<footer class="footer" role="contentinfo">

    <?php get_sidebar('footer'); ?>

    <!-- // the theme uses a footer menu - footer-links -->
    <?php get_template_part('templates/footer-menu'); ?>
    <hr>
        <p class="footer-info">
         <?php do_action( 'start_credits' ); ?> &copy;
         <?php echo date('Y'); ?> |
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
            </a> | <a href="mailto:<?php bloginfo( 'admin_email' ); ?>"><?php bloginfo( 'admin_email' ); ?></a>
        </p>
</footer><!-- end footer -->

</div><!-- end .site -->

<?php wp_footer(); ?>

</body>

</html>