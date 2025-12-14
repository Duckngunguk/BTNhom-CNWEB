<?php
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Category.php";
require_once __DIR__ . "/../models/Course.php";
require_once __DIR__ . "/../models/AdminStats.php";
require_once __DIR__ . "/../helpers/Auth.php";

class AdminController {

    public function dashboard() {
        requireRole(2);

        $stats = new AdminStats();
        $data = [
            'users' => $stats->count('users'),
            'courses' => $stats->count('courses'),
            'enrollments' => $stats->count('enrollments')
        ];

        require_once "views/admin/dashboard.php";
    }

    public function users() {
        requireRole(2);

        $userModel = new User();
        $users = $userModel->getAll();

        require_once "views/admin/users/manage.php";
    }

    public function categories() {
        requireRole(2);

        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        require_once "views/admin/categories/list.php";
    }

    public function statistics() {
        requireRole(2);

        $stats = new AdminStats();
        $data = [
            'users' => $stats->count('users'),
            'courses' => $stats->count('courses'),
            'enrollments' => $stats->count('enrollments'),
            'courseStatus' => $stats->coursesByStatus()
        ];

        require_once "views/admin/reports/statistics.php";
    }
}
