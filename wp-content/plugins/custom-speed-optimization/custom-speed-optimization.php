<?php
/**
 * Plugin Name: Custom Speed Optimizer
 * Description: Advanced dynamic speed optimization for WordPress (JS/CSS minify, lazy load, caching, defer/async).
 * Version: 1.0.0
 * Author: Shivam Mishra
 * Text Domain: custome-speed-optimizer
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Define constants
define('IPHTECH_PO_PATH', plugin_dir_path(__FILE__));
define('IPHTECH_PO_URL', plugin_dir_url(__FILE__));

// Include helpers
require_once IPHTECH_PO_PATH . 'include/helpers.php';

// Autoload optimizers
foreach (glob(IPHTECH_PO_PATH . "include/class-*.php") as $file) {
    require_once $file;
}

// Initialize
// add_action('plugins_loaded', function() {
//     new IPHTech_Assets_Optimizer();
//     new IPHTech_Cache_Optimizer();
//     new IPHTech_HTML_Optimizer();
//     new IPHTech_Image_Optimizer();
//     // new Divi_Optimizer();
// });
// // Initialize
add_action('plugins_loaded', function() {
   // Run only on frontend and only if user is NOT logged in
    if ( ! is_admin() && ! is_user_logged_in() ) {
        new IPHTech_Assets_Optimizer();
        new IPHTech_Cache_Optimizer();
        new IPHTech_HTML_Optimizer();
        new IPHTech_Image_Optimizer();
        // new Divi_Optimizer();
    }
});

