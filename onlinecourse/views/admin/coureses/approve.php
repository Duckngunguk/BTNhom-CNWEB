<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Duyệt khóa học</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Tên khóa học</th>
    <th>Giảng viên</th>
    <th>Hành động</th>
</tr>

<?php foreach ($courses as $course): ?>
<tr>
    <td><?= $course['title'] ?></td>
    <td><?= $course['fullname'] ?></td>
    <td>
        <a href="/onlinecourse/admin/approveCourse?id=<?= $course['id'] ?>">
            ✅ Duyệt
        </a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
