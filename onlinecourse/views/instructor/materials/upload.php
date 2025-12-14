<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Upload tài liệu</h2>

<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="lesson_id" value="<?= $_GET['lesson_id'] ?>">
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
