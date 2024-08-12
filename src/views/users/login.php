<?php $title = "Dăng nhập"; ?>
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
            });
        </script> -->
        <div class="path ">
            <ul class="row list-unstyled m-0">
                <li><a class="text-decoration-none" href="index.php"><i class='bx bx-home'></i> Trang chủ</a></li>
                <li><i class='bx bxs-chevron-right'></i></li>
                <li><a class="text-decoration-none" href="index.php"><i class='bx bx-user'></i> Tài khoản</a></li>
                <li><i class='bx bxs-chevron-right'></i></li>
                <li><a class="text-decoration-none" href="index.php?userslogin"><i class='bx bx-user-plus'></i> Đăng nhập</a></li>
            </ul>
        </div>
        <div class="login-form w3_form">
            <div class="login w3_login" id="signin">
                <h2 class="login-header w3_header">Đăng nhập</h2>
                <?php // var_dump($data); 
                ?>
                <div class="w3l_grid">
                    <form class="login-container" action="index.php?submitlogin" method="post">
                        <input type="email" placeholder="Email" Name="email" required="">
                        <input type="password" placeholder="Password" Name="password" required="">
                        <input type="submit" class="btn btn-danger" value="Đăng nhập">
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
                        <p>Bạn chưa có tài khoản ?<span id="setregister">Đăng ký ngay</span></p>
                        <h4> <a href="index.php?usersforgot">Forgot your password?</a></h4>
                    </div>
                </div>
            </div>
            <div class="login w3_login" id="signup">
                <h2 class="login-header w3_header">Đăng ký</h2>
                <?php // var_dump($data); 
                ?>
                <div class="w3l_grid">
                    <form class="login-container" action="index.php?submitmaregister" method="post">
                        <input type="email" placeholder="Email" Name="Email" required="">
                        <input type="submit" class="btn btn-danger" value="Nhận mã đăng ký">
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
                        <p>Bạn chưa có tài khoản ?<span id="setlogin">Đăng nhập ngay</span></p>
                        <h4> <a href="index.php?usersforgot">Forgot your password?</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once(realpath('') . '\\src\\views\\layouts\\end.php'); ?>