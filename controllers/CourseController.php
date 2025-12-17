<?php
require_once "models/Course.php";

class CourseController {

    public function index() {
        $courseModel = new Course();
        $courses = $courseModel->getAll();

        require_once "views/courses/index.php";
    }

    public function detail() {
        $id = $_GET['id'];

        $courseModel = new Course();
        $course = $courseModel->find($id);

        require_once "views/courses/detail.php";

        $courseModel = new Course();
        $course = $courseModel->find($id);
        require_once "views/courses/detail.php";
    }
    public function create() {
    require_once "views/instructor/course/create.php";
    }

    public function store() {
    Course::create([
        $_POST['title'],
        $_POST['description'],
        $_SESSION['user']['id'],
        $_POST['category_id'],
        $_POST['price'],
        $_POST['duration_weeks'],
        $_POST['level']
    ]);
    header("Location: index.php?controller=instructor&action=myCourses");
    }
    public function search() {
    $keyword = $_GET['q'] ?? '';

    $courseModel = new Course();
    $courses = $courseModel->search($keyword);

    require_once "views/courses/index.php";
}
}
