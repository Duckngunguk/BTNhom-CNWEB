<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Tạo khóa học mới</h2>

<form method="post">
    <input type="text" name="title" placeholder="Tên khóa học" required>

    <textarea name="description" placeholder="Mô tả"></textarea>

    <select name="category_id">
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>">
                <?= $cat['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="number" name="price" placeholder="Giá">
    <input type="number" name="duration_weeks" placeholder="Số tuần">
    
    <select name="level">
        <option>Beginner</option>
        <option>Intermediate</option>
        <option>Advanced</option>
    </select>

    <button type="submit">Tạo</button>
</form>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
