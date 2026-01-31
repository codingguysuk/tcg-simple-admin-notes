# Tcg Simple Admin Notes

An enterprise-grade WordPress admin plugin demonstrating modern WordPress development practices, including REST API-based CRUD operations, clean architecture, and a decoupled frontend using the Fetch API.

This plugin was built as a learning and portfolio project to explore modern WordPress plugin architecture inspired by Laravel conventions.

---

## ✨ Features

- Custom database table for admin notes
- Create, edit, and delete notes
- Automatic timestamping (date & time)
- Paginated admin listing
- Secure REST API CRUD endpoints
- JavaScript Fetch API (no jQuery dependency)
- Repository pattern for data access
- Separation of concerns (Admin UI, API, Data Layer)

---

## 🧠 Architectural Overview

This plugin intentionally avoids `admin-ajax.php` in favour of the **WordPress REST API**.

### Why REST API?

- Cleaner separation between frontend and backend
- Better performance characteristics than `admin-ajax.php`
- Reusable endpoints for admin, frontend, or external clients
- Future-proof (headless / SPA / mobile-ready)
- Clear permission handling and HTTP semantics

The architecture loosely mirrors Laravel conventions:

| Concept | Implementation |
|------|---------------|
| Controller | REST Controller |
| Repository | Database abstraction layer |
| Routes | `register_rest_route()` |
| Views | PHP templates |
| Frontend | Fetch API |

---

## 📁 Folder Structure

tcg-simple-admin-notes/
├── assets/
│ └── js/
│ └── admin-notes.js
├── includes/
│ ├── class-activator.php
│ ├── class-repository.php
│ ├── class-rest-controller.php
│ └── class-admin-page.php
├── templates/
│ └── admin-page.php
├── tcg-simple-admin-notes.php
├── uninstall.php
└── README.md

---

## 🔌 REST API Endpoints

All endpoints are protected using WordPress capability checks.

| Method | Endpoint | Description |
|------|---------|------------|
| POST | `/wp-json/tcg/v1/notes` | Create a note |
| PUT | `/wp-json/tcg/v1/notes/{id}` | Update a note |
| DELETE | `/wp-json/tcg/v1/notes/{id}` | Delete a note |

Authentication is handled via WordPress nonces when used within the admin area.

---

## 🔐 Security Considerations

- Capability checks via `current_user_can()`
- REST nonce verification
- Input sanitisation using WordPress APIs
- No direct access to plugin files
- Prepared SQL statements

---

## 🚀 Installation

1. Clone or download the repository
2. Upload to `/wp-content/plugins/`
3. Activate **Tcg Simple Admin Notes**
4. Navigate to **Admin Notes** in the WordPress dashboard

---

## 🛠 Development Notes

- Database schema is created on plugin activation using `dbDelta`
- All database access is abstracted through a repository class
- No direct `$wpdb` usage outside the data layer
- JavaScript uses modern ES6 syntax and Fetch API

---

## 📌 Future Improvements

- Search and filtering
- Inline editing
- React-based admin UI
- Unit and integration tests
- Export / import functionality

---

## Experimental Features (In Progress)

- Search and filtering
- Inline editing
- Improved admin UX

These features are under active development in a feature branch and not yet part of the stable release.

---

## 📄 License


GPL-2.0-or-later
