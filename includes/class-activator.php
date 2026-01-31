<?php

/**
 * Handles plugin activation logic
 * Equivalent to a Laravel migration
 */
class TCG_SAN_Activator {

    public static function activate() {
        global $wpdb;

        $table = $wpdb->prefix . 'tcg_admin_notes';
        $charset = $wpdb->get_charset_collate();

        /**
         * dbDelta allows safe table creation and updates
         * WordPress compares schema and alters if needed
         */
        $sql = "CREATE TABLE $table (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            note LONGTEXT NOT NULL,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id)
        ) $charset;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
}
