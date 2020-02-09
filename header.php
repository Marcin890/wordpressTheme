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
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="site">
        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php get_template_part('content/header/social') ?>
                        <div class="logo-container">
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                    rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php get_template_part('content/navigation/menu-main') ?>
                    </div>
                </div>
            </div>
        </header>