<?php
require_once "config/Database.php";

class Category extends Database {

    // Lấy tất cả danh mục
    public function getAll() {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục
    public function create($name) {
        $sql = "INSERT INTO categories(name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name]);
    }
}
