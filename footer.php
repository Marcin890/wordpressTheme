<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php if ( is_active_sidebar( 'footer' ) ) : ?>
                <div class="footer-widget">
                    <?php dynamic_sidebar( 'footer' ); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_template_part('content/navigation/menu-footer') ?></div>
            <div class="col-md-4">
                <h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
                <p>&copy; <?php echo currentYear(); ?> Marcin Kośka</p>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- END site -->

</body>

</html>