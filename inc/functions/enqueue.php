<?php
/*
 *	ENQUEUE SCRIPTS AND STYLES
 *
 *****************************************************/

add_action('wp_enqueue_scripts', 'theme_front_end_styles');
function theme_front_end_styles()
{
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), false, 'all');
    wp_enqueue_style('header', WTHEME_CSS_URI . 'header.css', array(), false, 'all');
    wp_enqueue_style('footer', WTHEME_CSS_URI . 'footer.css', array(), false, 'all');
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'theme_front_end_script');
function theme_front_end_script()
{
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '', true);
    wp_enqueue_script('main', WTHEME_JS_URI . 'main.js', array('jquery'), '', true);
}


