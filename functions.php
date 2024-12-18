<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
define('WTHEME_THEME_URI', get_template_directory_uri() . '/');
// URI to css folder
define('WTHEME_CSS_URI', WTHEME_THEME_URI . 'assets/css/');
// URI to js forlder
define('WTHEME_JS_URI', WTHEME_THEME_URI . 'assets/js/');
// URI to image forlder
define('WTHEME_IMG_URI', WTHEME_THEME_URI . 'assets/images/');
// URI to templates
define('WTHEME_TEMPLATES_URI', WTHEME_THEME_URI . 'template-parts/');

// Path to theme
define('WTHEME_THEME_PATH', get_template_directory() . '/');
// Path to image forlder
define('WTHEME_IMG_PATH', WTHEME_THEME_PATH . 'assets/images/');
// Path to inc forlder
define('WTHEME_INC_PATH', WTHEME_THEME_PATH . 'inc/');
// Path to templates
define('WTHEME_TEMPLATES_DIR', '/template-parts/');

/**
 * Theme functions
 */
require WTHEME_INC_PATH . 'functions/functions.inc.php';

add_filter('woocommerce_checkout_fields', 'remove_company_name_field');

function remove_company_name_field($fields) {
    unset($fields['billing']['billing_company']); // Видаляє поле "Company Name" у секції Billing
    return $fields;
}
