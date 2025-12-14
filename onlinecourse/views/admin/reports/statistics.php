<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Thống kê hệ thống</h2>

<ul>
    <li>Tổng người dùng: <?= $data['users'] ?></li>
    <li>Tổng khóa học: <?= $data['courses'] ?></li>
    <li>Lượt đăng ký: <?= $data['enrollments'] ?></li>
</ul>

<h3>Trạng thái khóa học</h3>

<table border="1" cellpadding="8">
<tr>
    <th>Trạng thái</th>
    <th>Số lượng</th>
</tr>

<?php foreach ($data['courseStatus'] as $row): ?>
<tr>
    <td><?= $row['status'] ?></td>
    <td><?= $row['total'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
