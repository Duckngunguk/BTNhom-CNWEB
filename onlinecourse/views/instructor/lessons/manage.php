<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Quản lý bài học</h2>

<a href="/onlinecourse/lesson/create?course_id=<?= $_GET['course_id'] ?>">
    + Thêm bài học
</a>

<ul>
<?php foreach ($lessons as $lesson): ?>
    <li>
        <?= $lesson['order'] ?>.
        <?= $lesson['title'] ?>
        <a href="/onlinecourse/lesson/delete?id=<?= $lesson['id'] ?>">❌</a>
    </li>
<?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
