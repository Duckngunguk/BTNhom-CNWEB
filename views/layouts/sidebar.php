<aside class="sidebar">
<ul>
<?php if($_SESSION['user']['role'] == 2): ?>
<li><a href="?controller=admin&action=dashboard">Dashboard</a></li>
<li><a href="?controller=admin&action=users">Người dùng</a></li>
<li><a href="?controller=admin&action=categories">Danh mục</a></li>
<li><a href="?controller=admin&action=statistics">Thống kê</a></li>
<?php elseif($_SESSION['user']['role'] == 1): ?>
<li><a href="?controller=instructor&action=dashboard">Khóa học của tôi</a></li>
<li><a href="?controller=instructor&action=create">Tạo khóa học</a></li>
<?php else: ?>
<li><a href="?controller=home&action=index">Trang chủ</a></li>
<li><a href="?controller=student&action=myCourses">Khóa học đã đăng ký</a></li>
<?php endif; ?>
</ul>
</aside>