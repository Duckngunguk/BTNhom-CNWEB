<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Bài học trong khóa học</h2>

<ul>
<?php foreach ($lessons as $lesson): ?>
    <li>
        <h4><?= $lesson['title'] ?></h4>
        <p><?= $lesson['content'] ?></p>

        <?php if ($lesson['video_url']): ?>
            <iframe width="560" height="315"
                src="<?= $lesson['video_url'] ?>"
                frameborder="0" allowfullscreen>
            </iframe>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>

<?php
require_once "models/Material.php";
$materialModel = new Material();
$materials = $materialModel->getByLesson($lesson['id']);
?>

<ul>
<?php foreach ($materials as $m): ?>
    <li>
        <a href="/onlinecourse/<?= $m['file_path'] ?>" target="_blank">
            📎 <?= $m['filename'] ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
