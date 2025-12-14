<?php
require_once __DIR__ . '/../config/Database.php';

class User {
    private $conn;
    private $table = "users";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->conn->query($sql);
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data) {
    $sql = "INSERT INTO users 
        (username, email, password, fullname, role, created_at)
        VALUES (:username, :email, :password, :fullname, :role, NOW())";

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($data);
    }

    public function findByUsernameOrEmail($value) {
        $sql = "SELECT * FROM users 
            WHERE username = :value OR email = :value 
            LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['value' => $value]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateRole($id, $role) {
        $stmt = $this->conn->prepare(
        "UPDATE users SET role=:role WHERE id=:id"
    );
    return $stmt->execute(['id' => $id, 'role' => $role]);
}


}
