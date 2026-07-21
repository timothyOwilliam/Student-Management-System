<?php
require_once __DIR__ . '/../core/Controller.php';

class UserController extends Controller {
    public function create() {
        session_start();
        if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
        require_once '../app/views/users/create.php';
    }

    public function submit() {
        session_start();
        if (!isset($_SESSION['user_id'])) { header("Location: index.php?action=login"); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');
            $userModel->register($_POST['username'], $_POST['password'], $_POST['role']);
            header("Location: index.php?action=dashboard");
        }
    }
}
?>
