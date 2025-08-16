<?php
namespace Simple_Logo_Slider;

class Carousel_CPT {
    public function __construct() {
        add_action('init', [$this, 'register_cpt']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    }

    public function register_cpt() {
        $labels = [
            'name'                  => _x('Carousel Logos', 'Post Type General Name', 'simple-logo-slider'),
            'singular_name'         => _x('Carousel Logo', 'Post Type Singular Name', 'simple-logo-slider'),
            'menu_name'             => __('Logo Slider', 'simple-logo-slider'),
            'all_items'             => __('All Logos', 'simple-logo-slider'),
            // Add more labels as needed
        ];

        $args = [
            'label'                 => __('Carousel Logo', 'simple-logo-slider'),
            'labels'                => $labels,
            'supports'              => ['title', 'thumbnail'],
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 20,
            'menu_icon'             => 'dashicons-images-alt2',
            'show_in_admin_bar'     => false,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'          => false,
            'exclude_from_search'   => true,
            'publicly_queryable'   => false,
            'capability_type'       => 'post',
        ];

        register_post_type('sls_carousel', $args);
    }

    public function enqueue_admin_assets($hook) {
        if ('post.php' !== $hook && 'post-new.php' !== $hook) {
            return;
        }

        $screen = get_current_screen();
        if ('sls_carousel' !== $screen->post_type) {
            return;
        }

        wp_enqueue_style(
            'sls-admin-css',
            SLS_PLUGIN_URL . 'assets/css/sls-admin.css',
            [],
            SLS_PLUGIN_VERSION
        );
    }
}