<?php $title = "Đăng ký"; ?>
<?php include_once(realpath('') . '\\src\\views\\layouts\\begin.php'); ?>

<div class="user">
    <div class="container ">
        <div>
            <?php echo isset($data['messSuccess']) ? $data['messSuccess'] : (isset($data['messfail']) ? $data['messfail'] : "" );  ?>
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
            });
            </script> -->
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
                <h2 class="login-header w3_header">Đăng ký</h2>
                <div class="w3l_grid">
                    <form class="login-container" action="index.php?submitregister" method="post">
                        <label for="Email: ">Email: </label>
                        <input type="email" placeholder="Email" Name="email"  disabled value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "";?>">
                        <label for="ho: ">Họ: </label>
                        <input type="text" placeholder="Họ" Name="ho" >
                        <label for="tenlot: ">Tên lót: </label>
                        <input type="text" placeholder="Tên lót" Name="tenlot" >
                        <label for="ten: ">Tên: </label>
                        <input type="text" placeholder="Tên" Name="ten" required="">
                        <label for="sdt: ">Số điện thoại: </label>
                        <input type="text" placeholder="Số điện thoại" Name="sdt" required="">
                        <div class="row justify-content-between m-0 mb-3">
                            <fieldset class="col-lg-5">
                                <legend>Giới tính</legend>
                                <input type="radio" value="nam" name="gioitinh" checked><i>Nam</i>
                                <input type="radio" value="nữ" name="gioitinh"><i>Nữ</i>
                            </fieldset>
                            <fieldset class="col-lg-6">
                                <legend for="">Ngày Sinh</legend>
                                <input type="date" placeholder="Ngày sinh" Name="ngaysinh" required="">
                            </fieldset>
                        </div>
                        <label for="password: ">Mật khẩu: </label>
                        <input type="password" placeholder="Mật khẩu" Name="password" required="">
                        <input type="submit" class="btn btn-danger" value="Đăng ký">
                    </form>
                    <div class="second-section w3_section">
                        <div class="bottom-header w3_bottom">
                            <h3>Hoặc</h3>
                        </div>
                        <div class="social-links w3_social">
                            <ul class="list-unstyled">
                                <!-- facebook -->
                                <li> <a class="facebook" href="#" target="blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <!-- twitter -->
                                <li> <a class="twitter" href="#" target="blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <!-- google plus -->
                                <li> <a class="googleplus" href="#" target="blank"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
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