<?php
require_once "models/Enrollment.php";

class StudentController {

    public function myCourses() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 0) {
            die("Không có quyền");
        }

        $enrollModel = new Enrollment();
        $courses = $enrollModel->getByStudent($_SESSION['user']['id']);

        require_once "views/student/my_courses.php";
    }
}
