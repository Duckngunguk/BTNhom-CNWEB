<h2>Dashboard Giảng viên</h2>

<a href="?controller=instructor&action=createCourse">
    ➕ Tạo khóa học
</a>

<?php foreach ($courses as $c): ?>
    <div style="border:1px solid #ccc; margin:10px; padding:10px">
        <h3><?= $c['title'] ?></h3>

        <a href="?controller=instructor&action=editCourse&id=<?= $c['id'] ?>">✏️ Sửa</a> |
        <a href="?controller=instructor&action=deleteCourse&id=<?= $c['id'] ?>"
           onclick="return confirm('Xóa khóa học?')">🗑️ Xóa</a> |
        <a href="?controller=lesson&action=manage&course_id=<?= $c['id'] ?>">📚 Bài học</a> |
        <a href="?controller=instructor&action=students&course_id=<?= $c['id'] ?>">👨‍🎓 Học viên</a>
    </div>
<?php endforeach; ?>
