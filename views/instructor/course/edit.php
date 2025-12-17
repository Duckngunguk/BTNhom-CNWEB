<h2>Sửa khóa học</h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $course['id'] ?>">

    <input type="text" name="title" value="<?= $course['title'] ?>" required>
    <textarea name="description"><?= $course['description'] ?></textarea>

    <button type="submit">Lưu</button>
</form>
