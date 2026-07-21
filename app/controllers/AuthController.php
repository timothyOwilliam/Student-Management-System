<?php
require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller {
    
    public function showLogin($error = null) {
        require_once '../app/views/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $userModel = $this->model('User');
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: index.php?action=dashboard");
                exit;
            } else {
                $this->showLogin("Invalid username or password.");
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
?>
