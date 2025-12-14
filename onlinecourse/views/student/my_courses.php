<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Khóa học của tôi</h2>

<?php if (empty($courses)): ?>
    <p>Bạn chưa đăng ký khóa học nào.</p>
<?php else: ?>
    <ul>
        <?php foreach ($courses as $course): ?>
            <li>
                <strong><?= $course['title'] ?></strong><br>
                Tiến độ: <?= $course['progress'] ?>%
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
