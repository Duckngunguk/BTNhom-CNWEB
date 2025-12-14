<?php
require_once __DIR__ . '/../config/Database.php';

class AdminStats {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function count($table) {
        return $this->conn->query("SELECT COUNT(*) FROM $table")
                          ->fetchColumn();
    }
    public function coursesByStatus() {
        return $this->conn->query(
        "SELECT status, COUNT(*) total
         FROM courses GROUP BY status"
    )->fetchAll(PDO::FETCH_ASSOC);
}

}
