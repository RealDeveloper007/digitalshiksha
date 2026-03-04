# Digital Shiksha

Digital Shiksha is a CodeIgniter-based web platform for mock tests, exam management, results, blog/content, and user administration across Student, Teacher, Admin, and Super Admin roles.

## Overview

The platform supports:
- Role-based authentication and dashboard access
- Mock test creation and participation
- Result evaluation, detailed result views, and PDF certificate download
- Study/content modules (blog, syllabus, noticeboard, FAQ)
- User lifecycle management and profile controls

## Architecture

### 1. Runtime Architecture

- **Framework**: CodeIgniter 3 (custom application folder: `digitalshiksha/`)
- **Entry Point**: `index.php`
- **App Layer**: `digitalshiksha/`
- **Core Framework**: `system/`
- **Static Assets**: `assets/`
- **User Uploads**: `uploads/`

### 2. Application Layering

The project follows classic CI MVC:

- **Controllers** (`digitalshiksha/controllers`)
  - Route handling, auth checks, orchestration
- **Models** (`digitalshiksha/models`)
  - Database queries and business data operations
- **Views** (`digitalshiksha/views`)
  - HTML/PHP rendering for admin and frontend screens

### 3. Major Functional Modules

- **Auth & Access**
  - `Login_control.php`, `User_authentication.php`, `User_control.php`
  - Session-driven role access and protected routes

- **Exam & Result Engine**
  - `Exam_control.php`, `Exam_model.php`
  - Exam lifecycle: create -> attempt -> evaluate -> publish result -> PDF

- **Admin Operations**
  - `Admin_control.php`, `controllers/admin/System_control.php`, `Settings.php`
  - User, settings, profile, and platform-level operations

- **Content & Communication**
  - `Blog.php`, `Noticeboard.php`, `Faqs.php`, `Syllabus_control.php`, `Message_control.php`

- **API Surface**
  - `digitalshiksha/controllers/api/`

### 4. Data/Request Flow

1. Request enters through `index.php`
2. CI Router resolves URL to controller method
3. Controller validates auth/role/session
4. Controller calls model(s) for data
5. Model interacts with DB and returns dataset
6. Controller composes view data + layout parts
7. View renders final HTML
8. For PDF actions, HTML is rendered and converted through DOMPDF (`digitalshiksha/libraries/Pdf.php`)

## Project Structure (Key Paths)

- `index.php` - bootstrap entry
- `digitalshiksha/config/` - app configuration (`database.php`, `routes.php`, etc.)
- `digitalshiksha/controllers/` - core controllers
- `digitalshiksha/controllers/admin/` - admin-specific controllers
- `digitalshiksha/controllers/api/` - API controllers
- `digitalshiksha/models/` - data/business models
- `digitalshiksha/views/` - view templates
- `digitalshiksha/libraries/` - custom libraries (including DOMPDF wrapper)
- `assets/` - CSS, JS, fonts, images
- `uploads/` - uploaded files and media

## Local Setup

### Prerequisites

- PHP (compatible with CI3 app; project currently runs in legacy-compatible mode)
- Apache/Nginx with PHP support
- MySQL/MariaDB
- Composer (for optional vendor dependency sync)

### Steps

1. Clone project into web root.
2. Configure DB credentials in `digitalshiksha/config/database.php`.
3. Configure base URL in `digitalshiksha/config/config.php`.
4. Ensure writable permissions for:
   - `digitalshiksha/cache/`
   - `digitalshiksha/logs/`
   - `uploads/`
5. Import database dump from `db/` (if provided for your environment).
6. Open app URL in browser.

## Media & File Path Conventions

- Brand and static images: `assets/images/`
- Uploaded media: `uploads/`
- User avatars: `uploads/user-avatar/`

## CI/CD

A GitHub Actions workflow exists at:
- `.github/workflows/ci.yml`

Use it as the base for lint/test/build automation updates.

## Notes for Contributors

- Keep controller methods thin; move query/data logic to models.
- Reuse existing role/session checks before adding new routes.
- Keep upload paths aligned with `uploads/` conventions.
- Validate PDF changes against real result data and multilingual titles.
