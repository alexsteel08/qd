<?php
if (!defined('ABSPATH')) {
    exit;
}
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if (is_plugin_active('advanced-custom-fields-pro/acf.php')) {
    $layouts = [
        'hero',
        'product',
        'slider',
        'feautures',
        'special_gift',
        'payment_and_delivery',
        'guarantees',
        'history',
        'text_block',
        'gallery'
    ];

    if (have_rows('content')):
        while (have_rows('content')):
            the_row();
            $layout = get_row_layout();
            if (in_array($layout, $layouts)):
                get_template_part('template-parts/blocks/' . $layout);
            endif;
        endwhile;
    endif;
}
?>