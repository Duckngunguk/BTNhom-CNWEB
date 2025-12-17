<h1>ADMIN DASHBOARD</h1>

<p>Xin chào, <b><?= $_SESSION['user']['username'] ?></b></p>

<ul>
    <li>Email: <?= $_SESSION['user']['email'] ?></li>
    <li>Vai trò: Admin</li>
</ul>

<hr>

<ul>
    <li><a href="?controller=admin&action=users">Quản lý người dùng</a></li>
    <li><a href="?controller=admin&action=categories">Quản lý danh mục</a></li>
    <li><a href="?controller=admin&action=statistics">Thống kê</a></li>
    <li><a href="?controller=auth&action=logout">Đăng xuất</a></li>
</ul>
