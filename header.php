<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<header id="masthead" class="site-header">
    <nav class=" menu-container
      position-relative
      col-12
      d-flex
      align-items-center
      justify-content-between
    ">
        <div class="nav-left">
            <a class="navbar-brand d-flex align-items-center" href="/eb/home"><img id="logoimg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logohvid.png" alt=""></a>
        </div>
        <div class="nav-right d-none d-md-flex">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'my_custom_nav_menu',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'navbar-nav'
                )
            ); ?>

        </div>
        <div class=" some-container d-none d-md-block">
            <?php $infoContainerLoop = new WP_Query(array("post_type" => "social-link", "posts_per_page" => -1)) ?>
            <?php while ($infoContainerLoop->have_posts()) : $infoContainerLoop->the_post() ?>
                <a href="<?php the_field("social_media_link") ?>">
                    <i class="<?php echo the_field("social_media_icon") ?>"></i>
                </a>
            <?php endwhile ?>

        </div>
        <div class="hamburger-container d-flex d-md-none justify-content-end z-index-555">
            <button id="menu-btn" class="hamburger d-md-none">
                <span class="hamburger-top"></span>
                <span class="hamburger-middle"></span>
                <span class="hamburger-bottom"></span>
            </button>
        </div>
        <div class="d-md-none ">
            <div id="menu" class="
            mobile-menu
            d-none
            position-absolute
            d-flex flex-column
            align-items-center
            align-self-end
            justify-content-center
            py-8
            mt-10
            col-12 
            start-0
        ">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'my_custom_nav_menu',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'navbar-nav'
                    )
                ); ?>
                <div class="some-container">
                    <?php $infoContainerLoop = new WP_Query(array("post_type" => "social-link", "posts_per_page" => -1)) ?>
                    <?php while ($infoContainerLoop->have_posts()) : $infoContainerLoop->the_post() ?>
                        <a href="<?php the_field("social_media_link") ?>">
                            <i class="<?php echo the_field("social_media_icon") ?>"></i>
                        </a>
                    <?php endwhile ?>

                </div>
            </div>
        </div>
    </nav>

</header>

<body <?php body_class(); ?>>