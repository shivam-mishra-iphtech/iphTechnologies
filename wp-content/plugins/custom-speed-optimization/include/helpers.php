<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function iphtech_log($msg) {
    if (WP_DEBUG === true) {
        error_log("[IPHTech Optimizer] " . print_r($msg, true));
    }
}
