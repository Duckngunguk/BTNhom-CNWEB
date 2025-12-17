<?php
require_once "config/Database.php";

class User extends Database {

    public function __construct() {
        parent::__construct(); // ⭐ CỰC KỲ QUAN TRỌNG
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "
            INSERT INTO users(username,email,password,fullname,role)
            VALUES (?,?,?,?,?)
        ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }
    public function getAll() {
    return $this->conn->query("SELECT id, fullname, email, role FROM users")
                      ->fetchAll(PDO::FETCH_ASSOC);
    }
}
