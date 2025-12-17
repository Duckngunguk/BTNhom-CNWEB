<h2><?= $course['title'] ?></h2>
<p><?= $course['description'] ?></p>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0): ?>
    <form method="post" action="?controller=enrollment&action=register">
        <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
        <button type="submit">Đăng ký khóa học</button>
    </form>
<?php else: ?>
    <p><i>Đăng nhập học viên để đăng ký</i></p>
<?php endif; ?>
