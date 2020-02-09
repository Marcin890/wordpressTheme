<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
<nav class="navbar navbar-expand-md navbar-light " role="navigation">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
            aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php bieszczady_menu()?>
        <?php get_search_form(); ?></div>
</nav>
<?php endif; ?>