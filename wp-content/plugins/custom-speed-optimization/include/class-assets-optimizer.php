<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class IPHTech_Assets_Optimizer {

    public function __construct() {
        add_filter('script_loader_tag', [$this, 'defer_js'], 10, 2);
        add_action('wp_enqueue_scripts', [$this, 'async_google_fonts'], 20);
        add_action('wp_head', [$this, 'preload_assets'], 1);
        add_action('init', [$this, 'disable_emojis']);
        add_action('init', [$this, 'disable_embeds']);
        add_action('init', [$this, 'disable_unused_assets']);
        add_action('wp_default_scripts', [$this, 'remove_jquery_migrate']);
        add_filter('wp_resource_hints', [$this, 'resource_hints'], 10, 2);
    }

    // Defer JS (exclude critical)
    public function defer_js($tag, $handle) {
        if (is_admin()) return $tag;

        $exclude = ['jquery-core', 'jquery-migrate'];
        if (in_array($handle, $exclude)) return $tag;

        if (strpos($tag, ' src') !== false) {
            return str_replace(' src', ' defer src', $tag);
        }
        return $tag;
    }

    // Async Google Fonts
    public function async_google_fonts() {
        wp_enqueue_style(
            'iphtech-google-fonts',
            'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap',
            [],
            null
        );
    }

    // Preload Google Fonts
    public function preload_assets() {
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
        echo '<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">';
    }

    // Disable emojis
    public function disable_emojis() {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }

    // Disable embeds
    public function disable_embeds() {
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_head', 'wp_oembed_add_host_js');
    }

    // Disable unused assets (dashicons, feeds, REST API for guests)
    public function disable_unused_assets() {
        if (!is_user_logged_in()) {
            wp_deregister_style('dashicons');
        }
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);

        add_filter('rest_authentication_errors', function($result) {
            if (!empty($result)) return $result;
            if (!is_user_logged_in()) {
                return new WP_Error('rest_cannot_access', __('REST API restricted.'), ['status' => 401]);
            }
            return $result;
        });
    }

    // Remove jQuery Migrate
    public function remove_jquery_migrate($scripts) {
        if (!is_admin() && isset($scripts->registered['jquery'])) {
            $scripts->registered['jquery']->deps = array_diff(
                $scripts->registered['jquery']->deps,
                ['jquery-migrate']
            );
        }
    }

    // Resource hints (preconnect / dns-prefetch)
    public function resource_hints($urls, $relation_type) {
        if ('preconnect' === $relation_type) {
            $urls[] = 'https://fonts.gstatic.com';
            $urls[] = 'https://fonts.googleapis.com';
        }
        return $urls;
    }
}
