=== Tcg Simple Admin Notes ===
Contributors: your-wp-username
Tags: admin, notes, rest-api
Requires at least: 6.0
Tested up to: 6.4
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Enterprise-grade admin notes plugin using the WordPress REST API.

== Description ==

Tcg Simple Admin Notes is a WordPress admin plugin designed to demonstrate modern plugin architecture.

Features include:
* REST API-based CRUD operations
* Custom database table
* Pagination
* Secure permission handling
* Decoupled JavaScript frontend using Fetch API

This plugin intentionally avoids admin-ajax.php in favour of the WordPress REST API to encourage scalable and maintainable development patterns.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin through the WordPress admin
3. Access **Admin Notes** from the dashboard menu

== Frequently Asked Questions ==

= Does this plugin use admin-ajax.php? =
No. All create, update, and delete actions are handled using the WordPress REST API.

= Is this plugin suitable for production use? =
Yes, but it is primarily intended as a demonstration of modern WordPress plugin architecture.

== Screenshots ==

1. Admin notes listing page
2. Create and manage notes form

== Changelog ==

= 1.1.0 =
* Refactored to REST API architecture
* Added pagination
* Improved security and code structure

== Upgrade Notice ==

= 1.1.0 =
Major architectural update using REST API.
