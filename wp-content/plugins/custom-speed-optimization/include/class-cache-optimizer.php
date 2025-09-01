<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class IPHTech_Cache_Optimizer {

    public function __construct() {
        add_action('init', [$this, 'enable_gzip']);
        add_action('send_headers', [$this, 'set_headers']);
    }

    // Enable GZIP
    public function enable_gzip() {
        if (!ob_start("ob_gzhandler")) ob_start();
    }

    // Cache headers
    public function set_headers() {
        header("Cache-Control: public, max-age=31536000");
    }
}
