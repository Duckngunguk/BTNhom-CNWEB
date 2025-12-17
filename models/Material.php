<?php
require_once "config/Database.php";

class Material extends Database {

    public function getByLesson($lesson_id) {
        $sql = "SELECT * FROM materials WHERE lesson_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$lesson_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function upload($data) {
        $sql = "INSERT INTO materials(lesson_id, filename, file_path, file_type, uploaded_at)
                VALUES (?,?,?,?,NOW())";
        return $this->conn->prepare($sql)->execute($data);
    }
}
