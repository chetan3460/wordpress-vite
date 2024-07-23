<?php
/*
=============================================================
1.0 - Theme Enqueue
=============================================================
*/

function theme_enqueue_scripts() {
if ( is_admin() ) return false;
    // Config version cache
    $json_file_path = __DIR__ . '/../config/version.json';
    $data = file_get_contents($json_file_path);
    $data = json_decode($data, true);
    $fileversion = $data['version'];
    $fileversion = json_decode(file_get_contents(__DIR__ . '/../config/version.json'), true)['version'];


//  Styles
wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/app.min.css', '', $fileversion);








// Scripts
// wp_enqueue_script( 'FontAwesome', 'https://kit.fontawesome.com/c6e0cd704f.js');

// wp_enqueue_script('app-script', get_template_directory_uri() . '/dist/js/app-' . $fileversion . '.min.js', array('jquery'), $fileversion, true);


wp_localize_script('app-script', 'adminajax', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('load_more_nonce')
));

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );




// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  
    
/*
 * VITE & Tailwind JIT development
 * Inspired by https://github.com/andrefelipe/vite-php-setup
 *
 */

// dist subfolder - defined in vite.config.json
define('DIST_DEF', 'dist');

// defining some base urls and paths
define('DIST_URI', get_template_directory_uri() . '/' . DIST_DEF);
define('DIST_PATH', get_template_directory() . '/' . DIST_DEF);

// js enqueue settings
define('JS_DEPENDENCY', array()); // array('jquery') as example
define('JS_LOAD_IN_FOOTER', true); // load scripts in footer?

// deafult server address, port and entry point can be customized in vite.config.json
define('VITE_SERVER', 'http://localhost:5173');
define('VITE_ENTRY_POINT', '/src/js/app.js');

// enqueue hook
add_action( 'wp_enqueue_scripts', function() {
    
    if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {

        // insert hmr into head for live reload
        function vite_head_module_hook() {
            echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
        }
        add_action('wp_head', 'vite_head_module_hook');        
    
    } else {
    
        // production version, 'npm run build' must be executed in order to generate assets
        // ----------
    
        // read manifest.json to figure out what to enqueue
        $manifest = json_decode( file_get_contents( DIST_PATH . '/manifest.json'), true );
        
        // is ok
        if (is_array($manifest)) {
                
            // enqueue CSS files
            $css_file = $manifest['app.min.css']['file'];
            if ( ! empty($css_file)) {
                wp_enqueue_style( 'app', DIST_URI . '/' . $css_file );
            }
            
            // enqueue main JS file
            $js_file = $manifest['app.min.js']['file'];
            if ( ! empty($js_file)) {
                wp_enqueue_script( 'app', DIST_URI . '/' . $js_file, JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER );
            }
    
        }
    
    }

});