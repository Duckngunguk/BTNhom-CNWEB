<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Online Course</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <script src="<?= BASE_URL ?>/assets/js/script.js" defer></script>
</head>
<body>

<header class="header">
    <h1>Online Course Platform</h1>

    <nav>
    <a href="/onlinecourse/">Trang chủ</a>
    <a href="/onlinecourse/courses">Khóa học</a>

<?php if (isset($_SESSION['user'])): ?>
    <span>Xin chào, <?= $_SESSION['user']['fullname'] ?></span>
    <a href="/onlinecourse/auth/logout">Đăng xuất</a>
<?php else: ?>
    <a href="<?= BASE_URL ?>/auth/login">Đăng nhập</a>
    <a href="<?= BASE_URL ?>/auth/register">Đăng ký</a>
<?php endif; ?>
</nav>
</header>

<main class="container">

<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>
    <a href="/onlinecourse/instructor/my_courses">Giảng viên</a>
<?php endif; ?>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 2): ?>
    <a href="/onlinecourse/admin/dashboard">Admin</a>
<?php endif; ?>
<nav>
<?php if (!isset($_SESSION['user'])): ?>
    <a href="<?= BASE_URL ?>/auth/login">Đăng nhập</a>
    <a href="<?= BASE_URL ?>/auth/register">Đăng ký</a>

<?php else: ?>
    Xin chào <?= $_SESSION['user']['fullname'] ?> |

    <?php if ($_SESSION['user']['role'] == 2): ?>
        <a href="<?= BASE_URL ?>/admin/dashboard">Admin</a>
    <?php elseif ($_SESSION['user']['role'] == 1): ?>
        <a href="<?= BASE_URL ?>/instructor/dashboard">Giảng viên</a>
    <?php else: ?>
        <a href="<?= BASE_URL ?>/student/dashboard">Học viên</a>
    <?php endif; ?>

    <a href="<?= BASE_URL ?>/auth/logout">Đăng xuất</a>
<?php endif; ?>
</nav>


