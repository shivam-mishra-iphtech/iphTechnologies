<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class IPHTech_Image_Optimizer {

    public function __construct() {
        add_filter('the_content', [$this, 'lazy_load_images']);
        add_filter('wp_get_attachment_image_attributes', [$this, 'force_lazy'], 10, 2);
    }

    // Lazy load in content
    public function lazy_load_images($content) {
        return preg_replace('/<img(.*?)>/', '<img loading="lazy"$1>', $content);
    }

    // Force lazy load in WP functions
    public function force_lazy($attr, $attachment) {
        $attr['loading'] = 'lazy';
        return $attr;
    }
}
