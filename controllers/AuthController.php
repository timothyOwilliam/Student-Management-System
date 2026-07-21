<?php
require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller {
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $userModel = $this->model('User');
            $user = $userModel->findByUsername($username);

            // Verify username exists and password hash matches
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect to the dashboard
                header("Location: dashboard.php");
                exit;
            } else {
                // Redirect back to login with error parameter
                header("Location: login.php?error=invalid_credentials");
                exit;
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
?>
