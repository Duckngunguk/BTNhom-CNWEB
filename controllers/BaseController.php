<?php
class BaseController {

    protected function requireLogin() {
        if (!isset($_SESSION['user'])) {
            header("Location: ?controller=auth&action=login");
            exit;
        }
    }

    protected function requireRole($role) {
        if ($_SESSION['user']['role'] != $role) {
            die("Bạn không có quyền truy cập");
        }
    }
}
