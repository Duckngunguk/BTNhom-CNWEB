<?php
require_once "models/Lesson.php";
require_once "helpers/Auth.php";

class LessonController {

    public function manage() {
        requireRole(1);

        $lessonModel = new Lesson();
        $lessons = $lessonModel->getByCourse($_GET['course_id']);

        require_once "views/instructor/lessons/manage.php";
    }

    public function create() {
        requireRole(1);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lessonModel = new Lesson();
            $lessonModel->create([
                'course_id' => $_POST['course_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'video_url' => $_POST['video_url'],
                'order' => $_POST['order']
            ]);

            header("Location: /onlinecourse/lesson/manage?course_id=".$_POST['course_id']);
            exit;
        }

        require_once "views/instructor/lessons/create.php";
    }

    public function delete() {
        requireRole(1);

        $lessonModel = new Lesson();
        $lessonModel->delete($_GET['id']);

        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }
}
