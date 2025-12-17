<?php
require_once __DIR__ . "/BaseController.php";
require_once "models/Report.php";
require_once "models/Category.php";
require_once "models/User.php";

class AdminController extends BaseController {

    public function __construct() {
        $this->requireLogin();
        $this->requireRole(2); // admin
    }

    public function dashboard() {
        $view = "views/admin/dashboard.php";
        require "views/layouts/layout.php";
    }
    public function users() {
        $userModel = new User();
        $users = $userModel->getAll();
        require "views/admin/users/manage.php";
    }

    public function statistics() {
        $r = new Report();
        $stats = $r->stats();
        require "views/admin/reports/statistics.php";
    }

    public function categories() {
        $cat = new Category();
        $categories = $cat->getAll();
        require "views/admin/categories/list.php";
    }

    public function createCategory() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cat = new Category();
        $cat->create($_POST['name']);
        header("Location: ?controller=admin&action=categories");
        exit;
    }
    // GET → hiển thị form
    require "views/admin/categories/create.php";
    }
}
