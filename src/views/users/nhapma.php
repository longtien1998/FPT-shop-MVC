<?php $title = "Đăng ký"; ?>
<?php include_once(realpath('') . '\\src\\views\\layouts\\begin.php'); ?>

<div class="user">
    <div class="container ">
        <div>
        <?php  echo isset($data['messSuccess']) ? $data['messSuccess'] : (isset($data['messfail']) ? $data['messfail'] : "" );  ?>
        </div>
        <!-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                var successMessage = document.getElementById("successMessage");
            
                // Hiển thị thông báo thành công
                successMessage.classList.add("show");
            
                // Ẩn thông báo sau 3 giây
                setTimeout(function() {
                successMessage.classList.remove("show");
                }, 5000);
            }); -->
            </script>
        <div class="path ">
            <ul class="row list-unstyled m-0">
                <li><a class="text-decoration-none" href="index.php"><i class='bx bx-home'></i> Trang chủ</a></li>
                <li><i class='bx bxs-chevron-right'></i></li>
                <li><a class="text-decoration-none" href="index.php"><i class='bx bx-user'></i> Tài khoản</a></li>
                <li><i class='bx bxs-chevron-right'></i></li>
                <li><a class="text-decoration-none" href="index.php?usersregister"><i class='bx bx-user-plus'></i> Đăng ký</a></li>
            </ul>
        </div>
        <div class="login-form w3_form">
            <div class="login w3_login" >
                <h2 class="login-header w3_header">Nhập mã xác nhận</h2>
                <div class="w3l_grid">
                    <form class="login-container" action="index.php?submitcode<?php echo $data['code'];?>" method="post">
                        <input type="text" placeholder="Nhập Mã" Name="macode" required="">
                        <input type="submit" class="btn btn-danger" value="Đăng ký">
                    </form>
                    <div class="bottom-text w3_bottom_text">
                        <p>Bạn đã có tài khoản ?<a href="index.php?userslogin" id="setlogin">Đăng nhập</a></p>
                        <h4> <a href="index.php?usersforgot">Forgot your password?</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once(realpath('') . '\\src\\views\\layouts\\end.php'); ?>