<?php

/**
 * Repository pattern
 * All database access lives here
 * Controllers NEVER talk directly to $wpdb
 */
class TCG_SAN_Repository {

    private $table;

    public function __construct() {
        global $wpdb;
        $this->table = $wpdb->prefix . 'tcg_admin_notes';
    }

    public function paginate($per_page, $offset) {
        global $wpdb;

        return $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM {$this->table}
                 ORDER BY created_at DESC
                 LIMIT %d OFFSET %d",
                $per_page,
                $offset
            )
        );
    }

    public function count() {
        global $wpdb;
        return (int) $wpdb->get_var("SELECT COUNT(*) FROM {$this->table}");
    }

    public function find($id) {
        global $wpdb;

        return $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$this->table} WHERE id = %d",
                $id
            )
        );
    }

    public function create($data) {
        global $wpdb;

        return $wpdb->insert($this->table, [
            'title'      => sanitize_text_field($data['title']),
            'note'       => wp_kses_post($data['note']),
            'created_at' => current_time('mysql'),
        ]);
    }

    public function update($id, $data) {
        global $wpdb;

        return $wpdb->update($this->table, [
            'title' => sanitize_text_field($data['title']),
            'note'  => wp_kses_post($data['note']),
        ], ['id' => $id]);
    }

    public function delete($id) {
        global $wpdb;
        return $wpdb->delete($this->table, ['id' => $id]);
    }
}
