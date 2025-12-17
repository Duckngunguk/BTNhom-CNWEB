<?php
require_once "config/Database.php";

class Course extends Database {

    public function getByInstructor($instructor_id) {
        $sql = "SELECT * FROM courses WHERE instructor_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$instructor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "
            INSERT INTO courses(title, description, instructor_id)
            VALUES (?,?,?)
        ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }
     public function getAll() {
        $sql = "SELECT * FROM courses";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $sql = "SELECT * FROM courses WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function search($keyword) {
        $sql = "SELECT * FROM courses WHERE title LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($data) {
    $sql = "UPDATE courses SET title=?, description=? WHERE id=?";
    return $this->conn->prepare($sql)->execute($data);
}
public function delete($id) {
    $sql = "DELETE FROM courses WHERE id=?";
    return $this->conn->prepare($sql)->execute([$id]);
}
}
