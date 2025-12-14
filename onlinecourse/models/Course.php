<?php
require_once __DIR__ . '/../config/Database.php';

class Course {
    private $conn;
    private $table = "courses";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "
            SELECT c.*, u.fullname AS instructor, cat.name AS category
            FROM courses c
            JOIN users u ON c.instructor_id = u.id
            JOIN categories cat ON c.category_id = cat.id
            ORDER BY c.created_at DESC
            WHERE c.status = 'approved'
        ";
        return $this->conn->query($sql);
    }

    public function findById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getByInstructor($instructorId) {
        $sql = "SELECT * FROM courses WHERE instructor_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $instructorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO courses
        (title, description, instructor_id, category_id, price,
         duration_weeks, level, image, created_at)
        VALUES
        (:title, :description, :instructor_id, :category_id, :price,
         :duration_weeks, :level, :image, NOW())";

        $stmt = $this->conn->prepare($sql);
    }

    public function update($id, $data) {
        $sql = "UPDATE courses SET
        title=:title, description=:description,
        category_id=:category_id, price=:price,
        duration_weeks=:duration_weeks, level=:level,
        image=:image, updated_at=NOW()
        WHERE id=:id";

       $data['id'] = $id;
       $stmt = $this->conn->prepare($sql);
       return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id=:id");
        return $stmt->execute(['id' => $id]);
    }
    public function getPendingCourses() {
        $sql = "SELECT c.*, u.fullname 
            FROM courses c
            JOIN users u ON c.instructor_id = u.id
            WHERE status = 'pending'";
        return $this->conn->query($sql);
    }

    public function approve($id) {
        $stmt = $this->conn->prepare(
        "UPDATE courses SET status='approved' WHERE id=:id"
    );
        return $stmt->execute(['id' => $id]);
    }
}
