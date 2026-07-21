<?php
require_once __DIR__ . '/../core/Controller.php';

class StudentController extends Controller {
    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
        
        $studentModel = $this->model('Student');
        $students = $studentModel->getAll();
        require_once '../app/views/students/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
        
        $courseModel = $this->model('Course');
        $courses = $courseModel->getAll();
        require_once '../app/views/students/create.php';
    }

    public function submit() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $studentModel = $this->model('Student');
            $studentModel->create($_POST);
            header("Location: index.php?action=view_students");
        }
    }
}
?>
