<?php
require_once "models/Course.php";
require_once "models/Category.php";
require_once "helpers/Auth.php";

class InstructorController {

    public function my_courses() {
        requireRole(1);

        $courseModel = new Course();
        $courses = $courseModel->getByInstructor($_SESSION['user']['id']);

        require_once "views/instructor/my_courses.php";
    }

    public function create() {
        requireRole(1);

        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseModel = new Course();

            $courseModel->create([
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'instructor_id' => $_SESSION['user']['id'],
                'category_id' => $_POST['category_id'],
                'price' => $_POST['price'],
                'duration_weeks' => $_POST['duration_weeks'],
                'level' => $_POST['level'],
                'image' => ''
            ]);

            header("Location: /onlinecourse/instructor/my_courses");
            exit;
        }

        require_once "views/instructor/course/create.php";
    }

    public function delete() {
        requireRole(1);

        $courseModel = new Course();
        $courseModel->delete($_GET['id']);

        header("Location: /onlinecourse/instructor/my_courses");
        exit;
    }
    public function dashboard() {
        requireRole(1);
        require_once "views/instructor/dashboard.php";
    }
}
