<?php
/**
 * Clever Theme Helper Functions
 */

if (!function_exists('clever_post_meta')) {
    function clever_post_meta() {
        echo '<div class="post-meta">';
        echo '<span class="post-date">' . get_the_date() . '</span>';
        echo '</div>';
    }
}

if (!function_exists('clever_read_more_link')) {
    function clever_read_more_link() {
        echo '<a href="' . esc_url(get_permalink()) . '" class="read-more">';
        echo esc_html__('Read More', 'clever');
        echo '</a>';
    }
}

function case_study_cpt() {
    register_post_type('case_study', array(
        'labels' => array(
            'name'               => 'Case Studies',
            'singular_name'      => 'Case Study',
            'add_new'            => 'Add New Case Study',
            'add_new_item'       => 'Add New Case Study',
            'edit_item'          => 'Edit Case Study',
            'new_item'           => 'New Case Study',
            'view_item'          => 'View Case Study',
            'search_items'       => 'Search Case Studies',
            'not_found'          => 'No Case Studies Found',
            'not_found_in_trash' => 'No Case Studies found in Trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Case Studies',
        ),
        'public'            => true,
        'has_archive'       => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'supports'          => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite'           => array('slug' => 'case-studies'),
        'hierarchical'      => false,
    ));
}
add_action('init', 'case_study_cpt');
