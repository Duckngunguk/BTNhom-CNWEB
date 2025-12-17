<?php
require_once __DIR__ . "/BaseController.php";
require_once "models/Course.php";
require_once "models/Lesson.php";
require_once "models/Enrollment.php";

class InstructorController extends BaseController {

    public function dashboard() {
         if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            die("Không có quyền");
        }

        $courseModel = new Course();
        $courses = $courseModel->getByInstructor($_SESSION['user']['id']);

        $view = "views/instructor/dashboard.php";
        require "views/layouts/layout.php";
    }
    public function createCourse() {
        $this->requireLogin();
    $this->requireRole(1);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $courseModel = new Course();
        $courseModel->create([
            $_POST['title'],
            $_POST['description'],
            $_SESSION['user']['id']
        ]);

        header("Location: ?controller=instructor&action=dashboard");
        exit;
    }
    require_once "views/instructor/course/create.php";
    }
    public function editCourse() {
    $courseModel = new Course();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $courseModel->update([
            $_POST['title'],
            $_POST['description'],
            $_POST['id']
        ]);
        header("Location: ?controller=instructor&action=dashboard");
        exit;
    }

    $course = $courseModel->find($_GET['id']);
    require_once "views/instructor/course/edit.php";
    }

    public function deleteCourse() {
    $courseModel = new Course();
    $courseModel->delete($_GET['id']);

    header("Location: ?controller=instructor&action=dashboard");
    }
    public function lessons() {
    $course_id = $_GET['course_id'];
    $lessonModel = new Lesson();
    $lessons = $lessonModel->getByCourse($course_id);
    require "views/instructor/lessons/manage.php";
    }
    public function createLesson() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lessonModel = new Lesson();
        $lessonModel->create([
            $_POST['course_id'],
            $_POST['title'],
            $_POST['content'],
            $_POST['video_url'],
            $_POST['order']
        ]);
        header("Location: ?controller=instructor&action=lessons&course_id=".$_POST['course_id']);
    }
    }
    public function students() {
    $course_id = $_GET['course_id'];
    $enroll = new Enrollment();
    $students = $enroll->studentsByCourse($course_id);
    require "views/instructor/students/list.php";
    }
    public function uploadMaterial() {
    if ($_FILES['file']) {
        $name = $_FILES['file']['name'];
        $path = "assets/uploads/materials/".$name;
        move_uploaded_file($_FILES['file']['tmp_name'], $path);

        $m = new Material();
        $m->upload([
            $_POST['lesson_id'],
            $name,
            $path,
            pathinfo($name, PATHINFO_EXTENSION)
        ]);
        echo "Upload thành công";
    }
    }
}
