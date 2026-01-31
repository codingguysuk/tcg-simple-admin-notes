<?php
/*
 * Plugin Name: Tcg Simple Admin Notes
 * Plugin URI: https://www.the-coding-guys.co.uk
 * Description: Enterprise-grade WordPress plugin using REST API and clean architecture.
 * Version: 1.1.0
 * Author: The Coding Guys
 * Author URI: https://www.the-coding-guys.co.uk
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */
 

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

/**
 * Define plugin-wide constants
 * These make paths and URLs reusable and avoid hardcoding
 */
define('TCG_SAN_PATH', plugin_dir_path(__FILE__));
define('TCG_SAN_URL', plugin_dir_url(__FILE__));

/**
 * Load required classes
 * Think of this like a very light service container
 */
require_once TCG_SAN_PATH . 'includes/class-activator.php';
require_once TCG_SAN_PATH . 'includes/class-repository.php';
require_once TCG_SAN_PATH . 'includes/class-rest-controller.php';
require_once TCG_SAN_PATH . 'includes/class-admin-page.php';

/**
 * Run database setup on activation
 */
register_activation_hook(__FILE__, ['TCG_SAN_Activator', 'activate']);

/**
 * Boot the plugin
 */
new TCG_SAN_Admin_Page();
new TCG_SAN_Rest_Controller();
