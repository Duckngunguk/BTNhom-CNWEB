<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Danh sách khóa học</h2>

<form method="get">
    <input type="hidden" name="controller" value="courses">
    <input type="text" name="keyword" placeholder="Tìm kiếm...">
    <button type="submit">Tìm</button>
</form>

<div class="course-list">
<?php foreach ($courses as $course): ?>
    <div class="course-item">
        <h3><?= htmlspecialchars($course['title']) ?></h3>
        <p>Giảng viên: <?= $course['instructor'] ?></p>
        <p>Danh mục: <?= $course['category'] ?></p>
        <p>Giá: <?= number_format($course['price']) ?>đ</p>

        <a href="/onlinecourse/courses/detail?id=<?= $course['id'] ?>">
            Xem chi tiết
        </a>
    </div>
<?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
