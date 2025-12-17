<h2>Quản lý danh mục</h2>

<a href="?controller=admin&action=createCategory">➕ Thêm danh mục</a>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['name'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="?controller=admin&action=dashboard">← Về dashboard</a>