<?php

/**
 * REST Controller
 * This is conceptually identical to a Laravel controller
 */
class TCG_SAN_Rest_Controller {

    private $repo;

    public function __construct() {
        $this->repo = new TCG_SAN_Repository();

        add_action('rest_api_init', [$this, 'routes']);
    }

    /**
     * Register API routes
     */
    public function routes() {

        register_rest_route('tcg/v1', '/notes', [
            'methods'  => 'POST',
            'callback' => [$this, 'store'],
            'permission_callback' => [$this, 'permissions'],
        ]);

        register_rest_route('tcg/v1', '/notes/(?P<id>\d+)', [
            'methods'  => 'PUT',
            'callback' => [$this, 'update'],
            'permission_callback' => [$this, 'permissions'],
        ]);

        register_rest_route('tcg/v1', '/notes/(?P<id>\d+)', [
            'methods'  => 'DELETE',
            'callback' => [$this, 'delete'],
            'permission_callback' => [$this, 'permissions'],
        ]);

        register_rest_route('tcg/v1', '/notes', [
            'methods'  => 'GET',
            'callback' => [$this, 'index'],
            'permission_callback' => [$this, 'permissions'],
        ]);
    }

    /**
     * Centralised permission check
     */
    public function permissions() {
        return current_user_can('manage_options');
    }

    public function store($request) {
        $this->repo->create($request->get_json_params());
        return rest_ensure_response(['success' => true]);
    }

    public function update($request) {
        $this->repo->update(
            (int) $request['id'],
            $request->get_json_params()
        );

        return rest_ensure_response(['success' => true]);
    }

    public function delete($request) {
        $this->repo->delete((int) $request['id']);
        return rest_ensure_response(['success' => true]);
    }
    public function index($request) {
        $page   = max(1, (int) $request->get_param('page'));
        $search = sanitize_text_field($request->get_param('search'));

        $per_page = 5;
        $offset   = ($page - 1) * $per_page;
        
        return rest_ensure_response([
            'data'  => $this->repo->paginate($per_page, $offset, $search),
            'total' => $this->repo->count(),
        ]);
    }
}
