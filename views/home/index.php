<?php require "views/layouts/header.php"; ?>

<div class="hero">
    <h1>Online Course Platform</h1>
    <p>Học online – Nâng cao kỹ năng – Phát triển sự nghiệp</p>

    <a href="?controller=course&action=index" class="btn">
        Xem khóa học
    </a>

    <?php if (!isset($_SESSION['user'])): ?>
        <a href="?controller=auth&action=login" class="btn btn-outline">
            Đăng nhập
        </a>
    <?php endif; ?>
</div>

<?php require "views/layouts/footer.php"; ?>
