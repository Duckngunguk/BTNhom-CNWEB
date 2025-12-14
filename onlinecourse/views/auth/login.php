<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Đăng nhập</h2>

<?php if (!empty($error)): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="<?= BASE_URL ?>/auth/login">
    <input type="text" name="username" placeholder="Username hoặc Email" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
