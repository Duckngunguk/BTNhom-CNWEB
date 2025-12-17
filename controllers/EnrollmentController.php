<?php
require_once "models/Enrollment.php";

class EnrollmentController {

    public function enroll() {
        Enrollment::enroll($_GET['course_id'], $_SESSION['user']['id']);
        header("Location: index.php?controller=student&action=myCourses");
    }
    public function register() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 0) {
            die("Bạn không có quyền");
        }

        $course_id = $_POST['course_id'];
        $student_id = $_SESSION['user']['id'];

        $enrollModel = new Enrollment();
        $enrollModel->create($course_id, $student_id);

        header("Location: ?controller=student&action=myCourses");
        exit;
    }
}
