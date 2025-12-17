<?php
require_once "config/Database.php";

class Lesson extends Database {

    public function getByCourse($course_id) {
        $sql = "SELECT * FROM lessons WHERE course_id = ? ORDER BY `order`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$course_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO lessons(course_id, title, content, video_url, `order`)
                VALUES (?,?,?,?,?)";
        return $this->conn->prepare($sql)->execute($data);
    }

    public function delete($id) {
        return $this->conn->prepare("DELETE FROM lessons WHERE id=?")->execute([$id]);
    }
}
