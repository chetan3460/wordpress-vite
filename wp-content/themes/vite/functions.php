<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  

// require_once get_theme_file_path('/inc/enqueue.php');

include "inc/inc.vite.php";


function my_theme_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    $theme_directory = get_template_directory_uri();

    // Enqueue Vite-built CSS
    wp_enqueue_style('my-theme-styles', $theme_directory . '/dist/assets/main.css', array(), $theme_version);

    // Enqueue Vite-built JS
    wp_enqueue_script('my-theme-scripts', $theme_directory . '/dist/assets/main.js', array(), $theme_version, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');