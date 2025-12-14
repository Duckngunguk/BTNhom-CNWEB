<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Đăng ký</h2>

<form method="POST" action="<?= BASE_URL ?>/auth/register">
    <input type="text" name="fullname" placeholder="Họ tên" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng ký</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
