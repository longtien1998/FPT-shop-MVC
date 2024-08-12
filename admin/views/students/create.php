<?php include_once(realpath('') . '\\views\\layouts\\begin.php'); ?>
<h1>Quản lý sinh viên</h1>
<h1>Thêm mới sinh viên</h1>
<form action="index.php?studentCreate" method="post">
    <input type="text" name="id" placeholder="Mời nhập mã sinh viên"><br>
    <input type="text" name="name" placeholder="Mời nhập tên sinh viên"><br>
    <label>Điểm: </label><input step="any" type="number" name="point"><br>
    <button>Thêm mới</button>
</form>
<?php include_once(realpath('') . '\\views\\layouts\\end.php'); ?>
