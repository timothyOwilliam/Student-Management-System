<?php
require_once __DIR__ . '/../core/Controller.php';

class CourseController extends Controller {
    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
        
        $courseModel = $this->model('Course');
        $courses = $courseModel->getAll();
        
        require_once '../app/views/courses/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
        require_once '../app/views/courses/create.php';
    }

    public function submit() {
        session_start();
        if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseModel = $this->model('Course');
            $courseModel->create($_POST);
            header("Location: index.php?action=view_courses");
        }
    }
}
?>
