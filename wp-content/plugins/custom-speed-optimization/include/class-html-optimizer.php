<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class IPHTech_HTML_Optimizer {

    public function __construct() {
        add_action('get_header', [$this, 'start_minify']);
        add_action('wp_footer', [$this, 'end_minify']);
    }

    public function sanitize_output($buffer) {
        $search = [
            '/>\s+/s',
            '/\s+</s',
            '/(\s)+/s'
        ];
        $replace = ['>', '<', '\\1'];
        return preg_replace($search, $replace, $buffer);
    }

    public function start_minify() {
        ob_start([$this, 'sanitize_output']);
    }

    public function end_minify() {
        if (ob_get_length()) ob_end_flush();
    }
}
