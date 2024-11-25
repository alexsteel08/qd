<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
add_theme_support('post-thumbnails');
add_editor_style();
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');

function customtheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'customtheme_add_woocommerce_support');
function add_default_value_to_image_field($field)
{
    acf_render_field_setting(
        $field,
        array(
            'label' => 'Default Image',
            'instructions' => 'Appears when creating a new post',
            'type' => 'image',
            'name' => 'default_value',
        )
    );
}

//register menus
function register_my_menus()
{
    register_nav_menus(
        array(
            'primary' => __('Primary', 'tattos'),
        )
    );
}
add_action('init', 'register_my_menus');

// Disable Gutenberg.
if ('disable_gutenberg') {
    add_filter('use_block_editor_for_post_type', '__return_false', 100);

    // Move the Privacy Policy help notice back under the title field.
    add_action('admin_init', function () {
        remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
        add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
    });
}
// Disable Gutenberg end


//widget
// Включення підтримки віджетів
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'          => __('Sitebar', 'tattos'),
        'id'            => 'sidebar-1',
        'description'   => __('Descr sitebar', 'tattos'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

//



// pagination
function pagination_bar($custom_query)
{
    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

// pagination end

// Remove author name
function remove_comment_author_class($classes)
{
    foreach ($classes as $key => $class) {
        if (strstr($class, "comment-author-")) {
            unset($classes[$key]);
        }
    }
    return $classes;
}
add_filter('comment_class', 'remove_comment_author_class');

// Remove author name end


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Global Settings',
            'menu_title' => 'Global Settings',
            'parent_slug' => 'theme-general-settings',
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Theme Header Settings',
            'menu_title' => 'Header',
            'parent_slug' => 'theme-general-settings',
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Theme Footer Settings',
            'menu_title' => 'Footer',
            'parent_slug' => 'theme-general-settings',
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Shop page',
            'menu_title' => 'Shop page',
            'parent_slug' => 'theme-general-settings',
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Dimensional grid',
            'menu_title' => 'Dimensional grid',
            'parent_slug' => 'theme-general-settings',
        )
    );

}


// auto add alt text to image
function change_empty_alt_to_title($response)
{
    if (!$response['alt']) {
        $response['alt'] = sanitize_text_field($response['title']);
    }
    return $response;
}

add_filter('wp_prepare_attachment_for_js', 'change_empty_alt_to_title');

/* hide css version */
function vc_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

// paragraph_remove

//rus to lat
function rutranslit($title)
{
    $chars = array(
//rus
        "А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D",
        "Е" => "E", "Ё" => "YO", "Ж" => "ZH",
        "З" => "Z", "И" => "I", "Й" => "Y", "К" => "K", "Л" => "L",
        "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R",
        "С" => "S", "Т" => "T", "У" => "U", "Ф" => "F", "Х" => "KH",
        "Ц" => "C", "Ч" => "CH", "Ш" => "SH", "Щ" => "SHH", "Ъ" => "",
        "Ы" => "Y", "Ь" => "", "Э" => "YE", "Ю" => "YU", "Я" => "YA",
        "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d",
        "е" => "e", "ё" => "yo", "ж" => "zh",
        "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
        "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "kh",
        "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "shh", "ъ" => "",
        "ы" => "y", "ь" => "", "э" => "ye", "ю" => "yu", "я" => "ya",
//spec
        "—" => "-", "«" => "", "»" => "", "…" => "", "№" => "N",
        "—" => "-", "«" => "", "»" => "", "…" => "",
        "!" => "", "@" => "", "#" => "", "$" => "", "%" => "", "^" => "", "&" => "",
//ukr
        "Ї" => "Yi", "ї" => "i", "Ґ" => "G", "ґ" => "g",
        "Є" => "Ye", "є" => "ie", "І" => "I", "і" => "i",
    );
    if (seems_utf8($title)) $title = urldecode($title);
    $title = preg_replace('/\.+/', '.', $title);
    $r = strtr($title, $chars);
    return $r;
}

add_filter('sanitize_file_name', 'rutranslit');
add_filter('sanitize_title', 'rutranslit');
//rus to lat end
add_filter('upload_mimes', 'bike_svg_upload_mimes');
function bike_svg_upload_mimes($mimes)
{
    // it is recommended to uncomment these lines for security reasons
    // if( ! current_user_can( 'administrator' ) ) {
    // 	return $mimes;
    // }
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('wp_check_filetype_and_ext', 'bike_svg_filetype_ext', 10, 5);
function bike_svg_filetype_ext($data, $file, $filename, $mimes, $real_mime)
{
    if (!$data['type']) {
        $filetype = wp_check_filetype($filename, $mimes);
        $type = $filetype['type'];
        $ext = $filetype['ext'];
        if ($type && 0 === strpos($type, 'image/') && 'svg' !== $ext) {
            $ext = false;
            $type = false;
        }
        $data = array(
            'ext' => $ext,
            'type' => $type,
            'proper_filename' => $data['proper_filename'],
        );
    }
    return $data;
}
