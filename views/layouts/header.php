<!DOCTYPE html>
<html>
<head>
    <title>Online Course</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="logo">🎓 OnlineCourse</div>
    <nav>
        <a href="index.php">Trang chủ</a>
        <a href="?controller=course&action=index">Khóa học</a>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="?controller=auth&action=logout">Đăng xuất</a>
        <?php else: ?>
            <a href="?controller=auth&action=login">Đăng nhập</a>
        <?php endif; ?>
    </nav>
</header>

<main>
