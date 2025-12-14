<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2><?= $course['title'] ?></h2>

<p><?= $course['description'] ?></p>

<ul>
    <li>Thời lượng: <?= $course['duration_weeks'] ?> tuần</li>
    <li>Trình độ: <?= $course['level'] ?></li>
    <li>Giá: <?= number_format($course['price']) ?>đ</li>
</ul>

<button>Đăng ký khóa học</button>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

<?php if (isset($_SESSION['user'])): ?>
    <a href="/onlinecourse/enrollment/enroll?course_id=<?= $course['id'] ?>">
        <button>Đăng ký khóa học</button>
    </a>
<?php else: ?>
    <a href="/onlinecourse/auth/login">
        <button>Đăng nhập để đăng ký</button>
    </a>
<?php endif; ?>
