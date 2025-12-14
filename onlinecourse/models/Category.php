<?php
require_once __DIR__ . '/../config/Database.php';

class Category {
    private $conn;
    private $table = "categories";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->conn->query($sql);
    }
    public function create($data) {
        $sql = "INSERT INTO categories (name, description, created_at)
            VALUES (:name, :description, NOW())";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }
    public function find($id) {
        $stmt = $this->conn->prepare(
        "SELECT * FROM categories WHERE id=:id"
    );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE categories
            SET name=:name, description=:description
            WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }
}
