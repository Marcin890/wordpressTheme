<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <title><?php echo bloginfo('name'); ?></title>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/6c674ea077.js" crossorigin="anonymous"></script>
    <!-- css stylesheets -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="social d-flex justify-content-end">
                        <a href="#"> <i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#"> <i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                    <div class="logo-container">

                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-md navbar-light " role="navigation">
                        <div class="container justify-content-center">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php
        wp_nav_menu( array(
            'theme_location'    => 'menu-1',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse justify-content-center',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>