<?php
/**
 * Plugin Name: Simple Logo Slider
 * Description: A minimal logo slider with hover pause functionality
 * Version: 1.0.0
 * Author: Imran
 * Text Domain: simple-logo-slider
 */

defined('ABSPATH') || exit;

define('SLS_PLUGIN_VERSION', '1.0.0');
define('SLS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('SLS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SLS_PLUGIN_BASENAME', plugin_basename(__FILE__));

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Simple_Logo_Slider\\') === 0) {
        $class_file = str_replace('Simple_Logo_Slider\\', '', $class_name);
        $class_file = str_replace('_', '-', strtolower($class_file));
        require_once SLS_PLUGIN_PATH . 'includes/class-' . $class_file . '.php';
    }
});

add_action('plugins_loaded', function() {
    load_plugin_textdomain(
        'simple-logo-slider',
        false,
        dirname(SLS_PLUGIN_BASENAME) . '/languages'
    );
    new Simple_Logo_Slider\Carousel_CPT();
    new Simple_Logo_Slider\Slider_Shortcode();
});