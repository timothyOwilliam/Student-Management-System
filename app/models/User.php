<?php
require_once __DIR__ . '/../core/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // CREATE: Signup with secure password hashing
    public function register($username, $plainPassword, $role) {
        // Hash the password securely using BCrypt before saving
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        // Call the stored procedure
        $stmt = $this->db->prepare("CALL sp_CreateUser(?, ?, ?)");
        return $stmt->execute([$username, $hashedPassword, $role]);
    }

    // READ: Find user details by username for login verification
    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM USERS WHERE username = ? LIMIT 1");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}
?>
