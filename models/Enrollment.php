<?php
require_once "config/Database.php";

class Enrollment extends Database {

    // Học viên đăng ký khóa học
    public function create($course_id, $student_id) {
        $sql = "INSERT INTO enrollments(course_id, student_id, enrolled_date, status, progress)
                VALUES (?, ?, NOW(), 'active', 0)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$course_id, $student_id]);
    }

    // Học viên xem khóa học của mình
    public function getByStudent($student_id) {
        $sql = "SELECT c.*, e.progress
                FROM enrollments e
                JOIN courses c ON e.course_id = c.id
                WHERE e.student_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Giảng viên xem danh sách học viên của 1 khóa
    public function studentsByCourse($course_id) {
        $sql = "SELECT u.fullname, u.email, e.progress, e.status
                FROM enrollments e
                JOIN users u ON e.student_id = u.id
                WHERE e.course_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$course_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cập nhật tiến độ học
    public function updateProgress($course_id, $student_id, $progress) {
        $sql = "UPDATE enrollments
                SET progress = ?
                WHERE course_id = ? AND student_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$progress, $course_id, $student_id]);
    }
}
