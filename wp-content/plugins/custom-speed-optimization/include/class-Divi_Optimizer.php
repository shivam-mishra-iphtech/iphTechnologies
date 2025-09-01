<?php
/**
 * Divi Optimizer Class
 * Dynamically optimizes Divi theme performance
 */

// if ( ! defined( 'ABSPATH' ) ) {
//     exit; // No direct access
// }

// class Divi_Optimizer {

//     public function __construct() {
//         // Lazy load images
//         add_filter('et_html_image_output', [$this, 'lazyload_images'], 10, 4);

//         // Async & Defer scripts
//         add_filter('script_loader_tag', [$this, 'async_defer_scripts'], 10, 3);

//         // Defer CSS above the fold
//         add_action('wp_enqueue_scripts', [$this, 'critical_css'], 999);

//         // Remove query strings
//         add_filter('script_loader_src', [$this, 'remove_query_strings'], 15, 1);
//         add_filter('style_loader_src', [$this, 'remove_query_strings'], 15, 1);

//         // Disable emojis
//         add_action('init', [$this, 'disable_emojis']);

//         // Output buffer optimization (minify HTML)
//         add_action('template_redirect', [$this, 'start_html_minify']);
//     }

//     /** ✅ Lazy load images */
//     public function lazyload_images($output, $args, $url, $id) {
//         if (strpos($output, 'loading=') === false) {
//             $output = str_replace('<img', '<img loading="lazy"', $output);
//         }
//         return $output;
//     }

//     /** ✅ Async & Defer scripts dynamically */
//     public function async_defer_scripts($tag, $handle, $src) {
//         if (is_admin()) return $tag;

//         $async_handles = ['et-builder-modules-script'];
//         $defer_handles = ['jquery-core', 'jquery-migrate'];

//         if (in_array($handle, $async_handles)) {
//             return str_replace(' src', ' async src', $tag);
//         }
//         if (in_array($handle, $defer_handles)) {
//             return str_replace(' src', ' defer src', $tag);
//         }

//         return $tag;
//     }

//     /** ✅ Load critical CSS inline & defer the rest */
//     public function critical_css() {
//         // Example: inline small CSS and defer full stylesheet
//         $critical_css = "
//             body { visibility: visible; }
//             .et_pb_section { opacity: 1; transition: opacity .3s ease-in; }
//         ";
//         wp_register_style('iph-critical-css', false);
//         wp_enqueue_style('iph-critical-css');
//         wp_add_inline_style('iph-critical-css', $critical_css);

//         // Defer Divi main stylesheet
//         global $wp_styles;
//         if (isset($wp_styles->registered['divi-style'])) {
//             $wp_styles->registered['divi-style']->extra['after'][] = "media='print' onload=\"this.media='all'\"";
//         }
//     }

//     /** ✅ Remove query strings from static resources */
//     public function remove_query_strings($src) {
//         if (strpos($src, '?ver=') !== false) {
//             $src = remove_query_arg('ver', $src);
//         }
//         return $src;
//     }

//     /** ✅ Disable emoji scripts */
//     public function disable_emojis() {
//         remove_action('wp_head', 'print_emoji_detection_script', 7);
//         remove_action('wp_print_styles', 'print_emoji_styles');
//     }

//     /** ✅ HTML minification */
//     public function start_html_minify() {
//         if (!is_admin() && !defined('DOING_AJAX')) {
//             ob_start([$this, 'minify_html']);
//         }
//     }

//     public function minify_html($html) {
//         $html = preg_replace('/\s+/', ' ', $html);
//         $html = str_replace(['> <', '>  <'], '><', $html);
//         return $html;
//     }
// }
