<?php
require_once __DIR__ . '/../config/Database.php';

class Enrollment {
    private $conn;
    private $table = "enrollments";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function enroll($courseId, $studentId) {
        $sql = "INSERT INTO {$this->table}
            (course_id, student_id, enrolled_date, status, progress)
            VALUES (:course_id, :student_id, NOW(), 'active', 0)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'course_id' => $courseId,
            'student_id' => $studentId
        ]);
    }

    public function getByStudent($studentId) {
        $sql = "
            SELECT c.*, e.progress, e.status
            FROM enrollments e
            JOIN courses c ON e.course_id = c.id
            WHERE e.student_id = :student_id
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['student_id' => $studentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isEnrolled($courseId, $studentId) {
        $sql = "SELECT id FROM {$this->table}
                WHERE course_id = :course_id
                AND student_id = :student_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'course_id' => $courseId,
            'student_id' => $studentId
        ]);
        return $stmt->fetch();
    }
}
