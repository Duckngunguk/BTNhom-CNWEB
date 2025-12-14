<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Admin Dashboard</h2>
<ul>
    <li><a href="/onlinecourse/admin/users">Quản lý users</a></li>
    <li><a href="/onlinecourse/admin/categories">Danh mục</a></li>
    <li><a href="/onlinecourse/admin/approveCourses">Duyệt khóa học</a></li>
    <li><a href="/onlinecourse/admin/statistics">Thống kê</a></li>
</ul>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
<h3>Thống kê</h3>
<ul>
    <li>Tổng người dùng: <?= $data['users'] ?></li>
    <li>Tổng khóa học: <?= $data['courses'] ?></li>
    <li>Lượt đăng ký: <?= $data['enrollments'] ?></li>
</ul>
