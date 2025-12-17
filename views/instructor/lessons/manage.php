<h2>Quản lý bài học</h2>

<a href="?controller=lesson&action=create&course_id=<?= $_GET['course_id'] ?>">
    ➕ Thêm bài học
</a>

<?php foreach ($lessons as $l): ?>
    <div>
        <?= $l['title'] ?>
    </div>
<?php endforeach; ?>
<h2>Danh sách bài học</h2>

<form method="post" action="?controller=instructor&action=createLesson">
    <input type="hidden" name="course_id" value="<?= $_GET['course_id'] ?>">
    <input name="title" placeholder="Tiêu đề" required>
    <input name="video_url" placeholder="Link video">
    <input name="order" placeholder="Thứ tự" type="number">
    <textarea name="content" placeholder="Nội dung"></textarea>
    <button>Thêm bài học</button>
</form>

<hr>

<?php foreach ($lessons as $l): ?>
    <p><?= $l['order'] ?>. <?= $l['title'] ?></p>
<?php endforeach; ?>
