<?php
require_once __DIR__ . '/../core/Database.php';

class Course {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->db->prepare("CALL sp_GetAllCourses()");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($data) {
        $stmt = $this->db->prepare("CALL sp_CreateCourse(?, ?, ?)");
        $stmt->execute([
            $data['course_code'],
            $data['title'],
            $data['department']
        ]);
        return true;
    }
}
?>
