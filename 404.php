<?php get_header() ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="error">
                <h2 class="error-code">404</h2>
                <p class="error-message">Podana strona nie istnieje</p>
                <p class="error-link"><a href="<?php echo esc_url(home_url('/')) ?>">Przejdź na stronę główną</a></p>
            </div>           
        </div>
    </div>
</div>

<?php get_footer();?>