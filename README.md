# Student Management System

A modular Student Management System built using PHP, MySQL, and the MVC architectural pattern.

## Project Summary

### 1. Database & Schema
*   **Defined Schema:** Created tables for `USERS`, `COURSES`, and `STUDENTS` with appropriate foreign key relationships.
*   **Stored Procedures:** Implemented robust CRUD stored procedures for all tables, including email validation using regex and partial update logic for key attributes.
*   **Seeding:** Created `seed.php` and `setup.php` scripts to help populate your initial database records securely.

### 2. Application Architecture (MVC)
*   **Migration:** Reorganized the project from a flat backend to a structured **Model-View-Controller (MVC)** pattern.
*   **Core Logic:** Built the base `Controller` and a secure `Database` wrapper using PDO for safe, prepared SQL execution.
*   **Business Logic:** Developed Models (`User`, `Student`, `Course`) and Controllers (`Auth`, `Student`, `Course`, `User`) to separate data handling from presentation.
*   **Routing:** Implemented a Front Controller pattern (`public/index.php`) to route requests centrally.

### 3. Authentication & Security
*   **Hashing:** Implemented secure password hashing using `password_hash()` (Bcrypt) during user registration.
*   **Verification:** Implemented `password_verify()` within the login flow to securely authenticate users.
*   **Session Management:** Built a session-based protection system that prevents unauthorized access to protected dashboard and student/course pages.
*   **Configuration Security:** Refactored the configuration system to use a `.env` template approach, ensuring sensitive credentials are never committed to version control.

### 4. UI & Presentation
*   **Layout:** Developed a Master Layout (`app/views/layout/master.php`) to ensure a consistent navigation and header/footer across the app.
*   **Styling:** Created a professional, vanilla CSS stylesheet (`public/css/style.css`).
*   **Pages:** Built and styled complete views for Login, Dashboard, View Students, Add Student, View Courses, Add Course, Add User, and Help.
