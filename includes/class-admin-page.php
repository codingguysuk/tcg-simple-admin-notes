<?php

/**
 * Handles admin UI
 * No business logic lives here
 */
class TCG_SAN_Admin_Page {

    private $repo;
    private $per_page = 5;

    public function __construct() {
        $this->repo = new TCG_SAN_Repository();

        add_action('admin_menu', [$this, 'menu']);
        add_action('admin_enqueue_scripts', [$this, 'assets']);
    }

    public function menu() {
        add_menu_page(
            'Admin Notes',
            'Admin Notes',
            'manage_options',
            'tcg-admin-notes',
            [$this, 'render'],
            'dashicons-welcome-write-blog'
        );
    }

    public function assets($hook) {
        if ($hook !== 'toplevel_page_tcg-admin-notes') {
            return;
        }

        wp_enqueue_script(
            'tcg-admin-notes',
            TCG_SAN_URL . 'assets/js/admin-notes.js',
            [],
            null,
            true
        );

        wp_localize_script('tcg-admin-notes', 'TCG_SAN', [
            'api'   => rest_url('tcg/v1/'),
            'nonce' => wp_create_nonce('wp_rest'),
        ]);
    }

    public function render() {
        $page   = max(1, intval($_GET['paged'] ?? 1));
        $offset = ($page - 1) * $this->per_page;

        $notes  = $this->repo->paginate($this->per_page, $offset);
        $total  = $this->repo->count();
        $pages  = ceil($total / $this->per_page);

        include TCG_SAN_PATH . 'templates/admin-page.php';
    }
}
