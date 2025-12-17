<?php

class Report extends Database {

    public function stats() {
        return [
            'users' => $this->conn->query("SELECT COUNT(*) FROM users")->fetchColumn(),
            'courses' => $this->conn->query("SELECT COUNT(*) FROM courses")->fetchColumn(),
            'enrollments' => $this->conn->query("SELECT COUNT(*) FROM enrollments")->fetchColumn(),
        ];
    }
}
