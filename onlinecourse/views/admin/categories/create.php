<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Thêm danh mục</h2>

<form method="post">
    <input type="text" name="name" placeholder="Tên danh mục" required>
    <textarea name="description" placeholder="Mô tả"></textarea>
    <button type="submit">Lưu</button>
</form>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
