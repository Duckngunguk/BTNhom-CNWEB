<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Danh mục khóa học</h2>

<a href="/onlinecourse/admin/createCategory">+ Thêm danh mục</a>
<a href="/onlinecourse/admin/editCategory?id=<?= $cat['id'] ?>">✏️ Edit</a>
<ul>
<?php foreach ($categories as $cat): ?>
    <li><?= $cat['name'] ?></li>
<?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
