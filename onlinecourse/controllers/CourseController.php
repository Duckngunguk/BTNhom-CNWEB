<?php
require_once "models/Course.php";
require_once "models/Category.php";

class CourseController {

    public function index() {
        $courseModel = new Course();
        $categoryModel = new Category();

        $courses = $courseModel->getAll();
        $categories = $categoryModel->getAll();

        require_once "views/courses/index.php";
    }

    public function detail() {
        if (!isset($_GET['id'])) {
            die("Thiếu ID khóa học");
        }

        $courseModel = new Course();
        $course = $courseModel->findById($_GET['id']);

        require_once "views/courses/detail.php";
    }
    public function lessons() {
        require_once "models/Lesson.php";

        $lessonModel = new Lesson();
        $lessons = $lessonModel->getByCourse($_GET['course_id']);

        require_once "views/student/course_progress.php";
    }
}
