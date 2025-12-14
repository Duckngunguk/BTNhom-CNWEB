<?php
require_once __DIR__ . '/../config/Database.php';

class Lesson {
    private $conn;
    private $table = "lessons";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getByCourse($courseId) {
        $sql = "SELECT * FROM lessons
                WHERE course_id = :course_id
                ORDER BY `order` ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['course_id' => $courseId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO lessons
            (course_id, title, content, video_url, `order`, created_at)
            VALUES
            (:course_id, :title, :content, :video_url, :order, NOW())";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM lessons WHERE id=:id");
        return $stmt->execute(['id' => $id]);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lessons WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
