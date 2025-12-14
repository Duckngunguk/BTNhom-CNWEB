<?php
require_once "models/Enrollment.php";
require_once __DIR__ . '/../helpers/Auth.php';
require_once __DIR__ . '/../models/Course.php';
class StudentController {

    public function my_courses() {
        if (!isset($_SESSION['user'])) {
            header("Location: /onlinecourse/auth/login");
            exit;
        }

        $enrollment = new Enrollment();
        $courses = $enrollment->getByStudent($_SESSION['user']['id']);

        require_once "views/student/my_courses.php";
    }
    public function dashboard() {
        requireRole(0);
        require_once "views/student/dashboard.php";
    }
}
