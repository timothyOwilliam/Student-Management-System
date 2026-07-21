<?php
require_once __DIR__ . '/../core/Controller.php';

class StudentController extends Controller {
    public function index() {
        $studentModel = $this->model('Student');
        $students = $studentModel->getAll();
        header('Content-Type: application/json');
        echo json_encode($students);
    }
}
?>
