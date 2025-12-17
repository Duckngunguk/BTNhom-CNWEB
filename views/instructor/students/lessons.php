<h2>Danh sách bài học</h2>

<?php foreach ($lessons as $l): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px">
        <h4><?= $l['title'] ?></h4>

        <?php
        $materialModel = new Material();
        $materials = $materialModel->getByLesson($l['id']);
        ?>

        <?php foreach ($materials as $m): ?>
            <p>
                📎 <a href="assets/uploads/materials/<?= $m['file_path'] ?>" target="_blank">
                    <?= $m['filename'] ?>
                </a>
            </p>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
