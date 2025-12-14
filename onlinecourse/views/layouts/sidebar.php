<aside class="sidebar">
    <ul>
        <?php if($_SESSION['role']==0): ?>
            <!-- Học viên -->
            <li><a href="?controller=home&action=dashboard">Dashboard</a></li>
            <li><a href="?controller=course&action=index">Danh sách khóa học</a></li>
            <li><a href="?controller=course&action=enrolled">Khóa học đã đăng ký</a></li>
            <li><a href="?controller=course&action=progress">Tiến độ học tập</a></li>
        <?php elseif($_SESSION['role']==1): ?>
            <!-- Giảng viên -->
            <li><a href="?controller=home&action=dashboard">Dashboard</a></li>
            <li><a href="?controller=course&action=my_courses">Khóa học của tôi</a></li>
            <li><a href="?controller=lesson&action=manage">Quản lý bài học</a></li>
            <li><a href="?controller=material&action=upload">Tải tài liệu</a></li>
            <li><a href="?controller=student&action=list">Danh sách học viên</a></li>
        <?php else: ?>
            <!-- Admin -->
            <li><a href="?controller=home&action=dashboard">Dashboard</a></li>
            <li><a href="?controller=admin&action=users">Quản lý người dùng</a></li>
            <li><a href="?controller=admin&action=categories">Quản lý danh mục</a></li>
            <li><a href="?controller=admin&action=statistics">Thống kê</a></li>
        <?php endif; ?>
        <li><a href="?controller=auth&action=logout">Đăng xuất</a></li>
    </ul>
</aside>
