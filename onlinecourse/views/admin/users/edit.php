<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Chỉnh sửa người dùng</h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">

    <label>Role:</label>
    <select name="role">
        <option value="0" <?= $user['role']==0?'selected':'' ?>>Học viên</option>
        <option value="1" <?= $user['role']==1?'selected':'' ?>>Giảng viên</option>
        <option value="2" <?= $user['role']==2?'selected':'' ?>>Admin</option>
    </select>

    <button type="submit">Cập nhật</button>
</form>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
