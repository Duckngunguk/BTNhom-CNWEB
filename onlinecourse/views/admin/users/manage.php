<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Quản lý người dùng</h2>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Họ tên</th>
    <th>Email</th>
    <th>Role</th>
</tr>

<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= $user['fullname'] ?></td>
    <td><?= $user['email'] ?></td>
    <td>
        <?= $user['role'] == 0 ? 'Học viên' : ($user['role'] == 1 ? 'Giảng viên' : 'Admin') ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
