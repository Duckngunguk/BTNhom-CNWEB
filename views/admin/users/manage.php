<h2>Quản lý người dùng</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Họ tên</th>
    <th>Email</th>
    <th>Role</th>
</tr>

<?php foreach ($users as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['fullname'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= $u['role'] ?></td>
</tr>
<?php endforeach; ?>
</table>
