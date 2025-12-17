<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>ĐĂNG NHẬP</h2>

<form method="post">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Đăng nhập</button>
</form>

<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
</body>
</html>
