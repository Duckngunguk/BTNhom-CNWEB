<?php
require_once "models/Lesson.php";
require_once "models/Material.php";

class LessonController {

    public function index() {
        if (!isset($_SESSION['user'])) die("Chưa đăng nhập");

        $course_id = $_GET['course_id'];

        $lessonModel = new Lesson();
        $lessons = $lessonModel->getByCourse($course_id);

        require_once "views/student/lessons.php";
    }
    public function manage() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
        die("Không có quyền");
    }

    $lessonModel = new Lesson();
    $lessons = $lessonModel->getByCourse($_GET['course_id']);

    require_once "views/instructor/lessons/manage.php";
    }
}
