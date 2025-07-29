<?php
/**
 * Plugin Name: Popup
 * Description: Fullscreen popup with testimonial carousel and form using Bootstrap 5.
 * Version: 1.3
 * Author: Shivam Mishra
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Enqueue CSS & JS
add_action('wp_enqueue_scripts', 'fsp_enqueue_assets');
function fsp_enqueue_assets() {
    if ( is_user_logged_in() ) {
        //wp_enqueue_style('fsp-style', plugin_dir_url(__FILE__) . 'assets/style.css');
        wp_enqueue_style('fsp-style', plugin_dir_url(__FILE__) . 'assets/style.css', array(), '1.0.0');
        wp_enqueue_script('fsp-script', plugin_dir_url(__FILE__) . 'assets/script.js', [], false, true);
    }
}

// Shortcode
add_shortcode('divi_global_popup', 'fsp_render_popup');
function fsp_render_popup() {
    if ( ! is_user_logged_in() ) return '';
    ob_start();
    include plugin_dir_path(__FILE__) . 'includes/template.php';
    return ob_get_clean();
}

add_action('wp_footer', 'fsp_output_popup_global');
function fsp_output_popup_global() {
    if ( is_user_logged_in() ) {
        echo do_shortcode('[divi_global_popup]');
    }
}
