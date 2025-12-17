<?php
class Database {
    protected $conn;

    public function __construct() {
        $this->conn = new PDO(
            "mysql:host=localhost;dbname=onlinecourse;charset=utf8",
            "root",
            ""
        );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
