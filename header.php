<!doctype html>
<html lang="en">

<head <?php language_attributes(); ?>>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- BEGIN header -->

<header class="header" id="header">
    <div class="header_block ">
        <div class="header_content">
            <div class="header_logo">
                <?php
                $image = get_field('logo_header', 'option');
                if ($image): $url = $image['url'];
                    $title = $image['title']; ?>
                    <a href="<?php echo get_home_url(); ?>" title="<?php echo esc_attr($title); ?>">
                        <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($title); ?>"/>
                    </a>
                <?php endif; ?>
            </div>
            <nav class="navbar">
                <div class="header_btns">
                    <div class="header_phone">
                        <?php if( get_field('phone_text','option') ): ?>
                            <span>
                      <?php the_field('phone_text','option'); ?>
                   </span>
                        <?php endif; ?>
                        <?php if( get_field('header_phone','option') ): ?>
                            <a href="tel:<?php the_field('header_phone','option'); ?>"><?php the_field('header_phone','option'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="header_card">
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logo/cardlogo.svg" alt="Кошик"/>
                        </a>
                    </div>
                    <div class="burger" id="burger">
                        <span class="burger-line"></span>
                        <span class="burger-line"></span>
                        <span class="burger-line"></span>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="menu" id="menu">
    <div class="menu_block">
        <div class="burger" id="burger_close">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </div>
        <div class="menu_content">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'menu-inner',
            ));
            ?>
        </div>
    </div>
</div>
<!-- END header -->
<!-- BEGIN content -->
<main class="main">
