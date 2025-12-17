<h2>Danh sách khóa học</h2>

<form method="get">
    <input type="hidden" name="controller" value="course">
    <input type="hidden" name="action" value="search">

    <input type="text" name="q"
           placeholder="Tìm khóa học..."
           value="<?= $_GET['q'] ?? '' ?>">

    <button type="submit">Tìm</button>
</form>

<hr>

<?php foreach ($courses as $c): ?>
    <div style="border:1px solid #ccc; margin:10px; padding:10px">
        <h3><?= $c['title'] ?></h3>
        <p><?= $c['description'] ?></p>
        <a href="?controller=course&action=detail&id=<?= $c['id'] ?>">
            Xem chi tiết
        </a>
    </div>
<?php endforeach; ?>
