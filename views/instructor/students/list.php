<h2>Danh sách học viên</h2>

<table border="1">
<tr>
    <th>Họ tên</th>
    <th>Email</th>
    <th>Tiến độ</th>
    <th>Trạng thái</th>
</tr>

<?php foreach ($students as $s): ?>
<tr>
    <td><?= $s['fullname'] ?></td>
    <td><?= $s['email'] ?></td>
    <td><?= $s['progress'] ?>%</td>
    <td><?= $s['status'] ?></td>
</tr>
<?php endforeach; ?>
</table>
