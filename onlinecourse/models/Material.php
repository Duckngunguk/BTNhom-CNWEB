<?php
require_once __DIR__ . '/../config/Database.php';

class Material {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($data) {
        $sql = "INSERT INTO materials
            (lesson_id, filename, file_path, file_type, uploaded_at)
            VALUES
            (:lesson_id, :filename, :file_path, :file_type, NOW())";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function getByLesson($lessonId) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM materials WHERE lesson_id=:id"
        );
        $stmt->execute(['id' => $lessonId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
