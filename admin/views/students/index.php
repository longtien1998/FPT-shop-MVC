<?php include_once(realpath('') . '\\views\\layouts\\begin.php'); ?>
<h1>Quản lý sinh viên</h1>
<a href="index.php?studentCreate">Thêm mới sinh viên</a>
<table border="1">
    <tr>
        <th>Mã Sinh viên</th>
        <th>Tên sinh viên</th>
        <th>Điểm</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($students as $stu) { ?>
        <tr>
            <td><?php echo $stu['Id']; ?></td>
            <td><?php echo $stu['Name']; ?></td>
            <td><?php echo $stu['Point']; ?></td>
            <td>
                <a href="index.php?studentUpdate&<?php echo $stu['Id']; ?>">Sửa</a> |
                <a href="index.php?studentDelete&<?php echo $stu['Id']; ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php include_once(realpath('') . '\\views\\layouts\\end.php'); ?>
