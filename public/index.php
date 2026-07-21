<?php
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/StudentController.php';
require_once '../app/controllers/CourseController.php';
require_once '../app/controllers/UserController.php';

$action = $_GET['action'] ?? 'login';

if ($action === 'login') {
    (new AuthController())->showLogin();
} elseif ($action === 'login_submit') {
    (new AuthController())->login();
} elseif ($action === 'logout') {
    (new AuthController())->logout();
} elseif ($action === 'dashboard') {
    session_start();
    if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
    require_once '../app/views/dashboard.php';
} elseif ($action === 'view_students') {
    (new StudentController())->index();
} elseif ($action === 'add_student') {
    (new StudentController())->create();
} elseif ($action === 'add_student_submit') {
    (new StudentController())->submit();
} elseif ($action === 'view_courses') {
    (new CourseController())->index();
} elseif ($action === 'add_course') {
    (new CourseController())->create();
} elseif ($action === 'add_course_submit') {
    (new CourseController())->submit();
} elseif ($action === 'add_user') {
    (new UserController())->create();
} elseif ($action === 'add_user_submit') {
    (new UserController())->submit();
} elseif ($action === 'help') {
    session_start();
    if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
    require_once '../app/views/misc/help.php';
} else {
    header("Location: index.php?action=login");
}
?>
