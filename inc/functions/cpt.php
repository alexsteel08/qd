<?php
function create_custom_post_types()
{

    // Projects Post Type
    $projects_labels = array(
        'name' => _x('Projects', 'Post Type General Name', 'volunteer'),
        'singular_name' => _x('Project', 'Post Type Singular Name', 'volunteer'),
        'menu_name' => __('Projects', 'volunteer'),
        'name_admin_bar' => __('Project', 'volunteer'),
        'archives' => __('Project Archives', 'volunteer'),
        'attributes' => __('Project Attributes', 'volunteer'),
        'parent_item_colon' => __('Parent Project:', 'volunteer'),
        'all_items' => __('All Projects', 'volunteer'),
        'add_new_item' => __('Add New Project', 'volunteer'),
        'add_new' => __('Add New', 'volunteer'),
        'new_item' => __('New Project', 'volunteer'),
        'edit_item' => __('Edit Project', 'volunteer'),
        'update_item' => __('Update Project', 'volunteer'),
        'view_item' => __('View Project', 'volunteer'),
        'view_items' => __('View Projects', 'volunteer'),
        'search_items' => __('Search Project', 'volunteer'),
        'not_found' => __('Not found', 'volunteer'),
        'not_found_in_trash' => __('Not found in Trash', 'volunteer'),
        'featured_image' => __('Featured Image', 'volunteer'),
        'set_featured_image' => __('Set featured image', 'volunteer'),
        'remove_featured_image' => __('Remove featured image', 'volunteer'),
        'use_featured_image' => __('Use as featured image', 'volunteer'),
        'insert_into_item' => __('Insert into Project', 'volunteer'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'volunteer'),
        'items_list' => __('Projects list', 'volunteer'),
        'items_list_navigation' => __('Projects list navigation', 'volunteer'),
        'filter_items_list' => __('Filter Projects list', 'volunteer'),
    );
    $projects_args = array(
        'label' => __('Project', 'volunteer'),
        'description' => __('Project Description', 'volunteer'),
        'labels' => $projects_labels,
        'supports' => array('title'),
//        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-money-alt',
    );
    register_post_type('projects', $projects_args);
}

add_action('init', 'create_custom_post_types', 0);