<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

global $wpdb;
$table = $wpdb->prefix . 'tcg_admin_notes';
$wpdb->query("DROP TABLE IF EXISTS $table");