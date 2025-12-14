<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<h2>Tạo bài học</h2>

<form method="post">
    <input type="hidden" name="course_id" value="<?= $_GET['course_id'] ?>">

    <input type="text" name="title" placeholder="Tiêu đề bài học" required>

    <textarea name="content" placeholder="Nội dung bài học"></textarea>

    <input type="text" name="video_url" placeholder="Link video (YouTube)">

    <input type="number" name="order" placeholder="Thứ tự bài" required>

    <button type="submit">Lưu</button>
</form>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
