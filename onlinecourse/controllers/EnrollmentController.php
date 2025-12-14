<?php
require_once "models/Enrollment.php";

class EnrollmentController {

    public function enroll() {
        if (!isset($_SESSION['user'])) {
            header("Location: /onlinecourse/auth/login");
            exit;
        }

        if (!isset($_GET['course_id'])) {
            die("Thiếu khóa học");
        }

        $enrollment = new Enrollment();

        // tránh đăng ký trùng
        if (!$enrollment->isEnrolled($_GET['course_id'], $_SESSION['user']['id'])) {
            $enrollment->enroll($_GET['course_id'], $_SESSION['user']['id']);
        }

        header("Location: /onlinecourse/student/my_courses");
        exit;
    }
}
