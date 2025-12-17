<?php require "views/layouts/header.php"; ?>

<h2>📚 Khóa học của tôi</h2>

<?php if (empty($courses)): ?>
    <p>Bạn chưa đăng ký khóa học nào.</p>
<?php else: ?>
    <div class="course-grid">
        <?php foreach ($courses as $c): ?>
            <div class="course-card">
                <h3><?= $c['title'] ?></h3>
                <p>Tiến độ: <?= $c['progress'] ?>%</p>

                <a href="?controller=course&action=detail&id=<?= $c['id'] ?>">
                    Xem chi tiết
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require "views/layouts/footer.php"; ?>
