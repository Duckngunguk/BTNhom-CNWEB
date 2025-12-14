<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Khóa học tôi tạo</h2>

<a href="/onlinecourse/instructor/create">+ Tạo khóa học</a>

<ul>
<?php foreach ($courses as $course): ?>
    <li>
        <?= $course['title'] ?>
        <a href="/onlinecourse/instructor/delete?id=<?= $course['id'] ?>">❌ Xóa</a>
    </li>
<?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
