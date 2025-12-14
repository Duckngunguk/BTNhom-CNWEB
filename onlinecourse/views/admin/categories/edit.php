<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Chỉnh sửa danh mục</h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">

    <input type="text" name="name"
           value="<?= $category['name'] ?>" required>

    <textarea name="description"><?= $category['description'] ?></textarea>

    <button type="submit">Cập nhật</button>
</form>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
