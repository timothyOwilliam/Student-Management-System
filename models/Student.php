<?php
require_once __DIR__ . '/../core/Database.php';

class Student {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->db->prepare("CALL sp_GetAllStudents()");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($data) {
        $stmt = $this->db->prepare("CALL sp_CreateStudent(?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['course_id'],
            $data['admission_number'],
            $data['first_name'],
            $data['last_name'],
            $data['email']
        ]);
        return true;
    }
}
?>
