<?php include_once(realpath('') . '\\views\\layouts\\begin.php'); ?>
<h1>Quản lý sinh viên</h1>
<h1>Cập nhật thông tin sinh viên</h1>
<form action="index.php?studentUpdate" method="post">
    <input type="hidden" name="id" value="<?php echo $student['Id']; ?>">
    <input type="text" name="name" value="<?php echo $student['Name']; ?>" placeholder="Mời nhập tên sinh viên"><br>
    <label>Điểm: </label><input step="any" value="<?php echo $student['Point']; ?>" type="number" name="point"><br>
    <button>Chỉnh sửa</button>
</form>
<?php include_once(realpath('') . '\\views\\layouts\\end.php'); ?>
