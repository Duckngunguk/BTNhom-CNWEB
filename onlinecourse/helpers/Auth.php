<?php
function requireLogin() {
    if (!isset($_SESSION['user'])) {
        header("Location: " . BASE_URL . "/auth/login");
        exit;
    }
}

function requireRole($role) {
    requireLogin();
    if ($_SESSION['user']['role'] != $role) {
        die("Bạn không có quyền truy cập");
    }
}
