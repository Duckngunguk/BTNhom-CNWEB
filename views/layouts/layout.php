<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Online Course</title>
<link rel="stylesheet" href="public/css/style.css">
<script src="public/js/script.js" defer></script>
</head>
<body>


<?php require "views/layouts/header.php"; ?>


<div class="app">
<?php require "views/layouts/sidebar.php"; ?>


<main class="content">
<?php require $view; ?>
</main>
</div>


<?php require "views/layouts/footer.php"; ?>


</body>
</html>