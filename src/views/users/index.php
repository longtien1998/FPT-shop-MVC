<?php $title = "Thông tin tài khoản"; ?>
<?php include_once(realpath('') . '\\src\\views\\layouts\\begin.php'); ?>


<div class="user">
    <div class="container mb-3 ">
        <div>
            <?php echo isset($data['messSuccess']) ? $data['messSuccess'] : (isset($data['messfail']) ? $data['messfail'] : ""); ?>
        </div>

        <script>
            // document.addEventListener("DOMContentLoaded", function () {
                
            //     var successMessage = document.getElementById("successMessage");
            //     if(successMessage){
            //         // Hiển thị thông báo thành công
            //         successMessage.classList.add("show");
            //         successMessage.style.top = "100px";

            //         // Ẩn thông báo sau 3 giây
            //         setTimeout(function () {
            //             successMessage.classList.remove("show");
            //         }, 5000);
            //       }
                    
            // });
        </script>
        <div class="path ">
            <ul class="row list-unstyled m-0">
                <li><a class="text-decoration-none" href="index.php"><i class='bx bx-home'></i> Trang chủ</a></li>
                <li><i class='bx bxs-chevron-right'></i></li>
                <li><a class="text-decoration-none" href="index.php?users"><i class='bx bx-user'></i> Tài khoản</a></li>
                <li><i class='bx bxs-chevron-right'></i></li>
                <li><a class="text-decoration-none" href="index.php?users"><i class='bx bx-user-badge'></i> Thông tin tài
                        khoản</a></li>
            </ul>
        </div>
        <div class="user-info row m-0">
            <div class="user-bar col-lg-4 pr-3">
                <div class="user-bar-profile  p-3">
                    <div class="user-bar-profile-name row m-0">
                        <div class="profile-name-img mr-3">
                            <img src="./assets/library/icon/user.png" alt="" width="100%" height="100%">
                        </div>
                        <div class="profile-name">
                            <?php
                            // var_dump($data);
                            $key = $data['user'];
                            // var_dump($key);
                            ?>
                            <h5>
                                <?php echo ($key['roles'] == 1) ? "Nhân Viên: " : "Khách hàng: ";
                                echo $key['tenLot']; ?>
                                <?php echo $key['ten']; ?>
                            </h5>
                            <p>
                                <?php echo $key['email']; ?>
                            </p>

                        </div>
                    </div>
                    <div class="profile-coin p-3">
                        <h5>Điểm thưởng</h5>
                        <p><img class="icon-coin" src="https://fptshop.com.vn/static/images/loyalty.svg" alt=""><span>
                                <?php echo isset($key['DiemThuong']) ? $key['DiemThuong'] : "0"; ?>
                            </span></p>
                        <img class="nen" src="./assets/library/icon/goldenpot1.png" alt="">
                        <a class="btn btn-danger" href="">Xem thể lệ</a>
                        <p>Mua sắm để tích điểm và đổi quà tại FPT Shop nhé! <a href="index.php">Mua sắm ngay</a></p>
                    </div>
                </div>
                <div class="user-bar-list mt-3">
                    <ul class="list-unstyled">
                        <li class="list-active">
                            <a class="" href="index.php?user"><i class="bx bx-user"></i> Thông tin cá nhân <i
                                    class='bx bx-chevron-right'></i></a>
                        </li>
                        <li class="">
                            <a href=""><i class='bx bx-box'></i></i> Đơn hàng của tôi <i
                                    class='bx bx-chevron-right'></i></a>
                        </li>
                        <li class="">
                            <a href=""><i class='bx bx-map'></i></i> Sổ địa chỉ nhận hàng <i
                                    class='bx bx-chevron-right'></i></a>
                        </li>
                        <?php
                        echo ($key['roles'] == 1) ? '<li class="">
                            <a href="admin/"><i class="bx bx-chevrons-right"></i> Vào trang quản trị <i class="bx bx-chevron-right"></i></a>
                        </li>' : "";
                        ?>

                        <li class="">
                            <a href="index.php?userslogout"><i class='bx bx-log-out bx-rotate-180'></i> Đăng xuất <i
                                    class='bx bx-chevron-right'></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="user-detail col-lg-8 p-0">
                <div class="user-detail-title border-bottom w-100 px-3">
                    <h4>Thông tin cá nhân</h4>
                </div>
                <div class="user-detail-info">
                    <div class="info-show">
                        <div class="info-show-img">
                            <img src="<?php echo isset($key['HinhAnh']) ? $key['HinhAnh'] : './assets/library/icon/User_icon_2.png'; ?>"
                                alt="" width="100%" height="100%">
                        </div>
                        <!-- <div class="w-100">
                            <div class="text-center">
                                <div class="upload-flie btn btn-orange " id="upload-file" ><i class="fa-solid fa-pen-to-square"></i></div>
                            </div>
                            <script>
                                window.onload = function() {
                                    let file = document.getElementById('up-file');
                                    document.getElementById('upload-file').addEventListener("click", function() {
                                        // console.log("hiện");
                                        file.style.display == "none" ? document.getElementById('up-file').style.display = "block" : document.getElementById('up-file').style.display = "none";
                                    })
                                };
                            </script>
                            <div class="up-file py-4" id="up-file">
                                <div class=" mx-auto">
                                    <form action="index.php?filetoUpload" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Chọn file hình ảnh</label>
                                            <input id="filetoUpload" name="filetoUpload" type="file" class="form-control1" style="line-height: 17px;">
                                        </div>
                                        <div class=" mb-3 px-2 py-2 text-center">
                                            <input type="submit" name="luu" value="Lưu" class="btn btn-danger m-0 rounded-pill px-4">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div> -->

                        <ul class="list-unstyled info" id="info">
                            <li class="row justify-content-between m-0">
                                <p class="label">Họ và tên</p>
                                <p><strong>
                                        <?php echo $key['ho']; ?>
                                        <?php echo $key['tenLot']; ?>
                                        <?php echo $key['ten']; ?>
                                    </strong></p>
                            </li>
                            <li class="row justify-content-between m-0">
                                <p class="label">Số điện thoại</p>
                                <p><strong>
                                        <?php echo $key['soDienThoai']; ?>
                                    </strong></p>
                            </li>
                            <li class="row justify-content-between m-0">
                                <p class="label">Giới tính</p>
                                <p><strong>
                                        <?php echo ($key['gioiTinh'] == "nu") ? "Nữ" : "Nam"; ?>
                                    </strong></p>
                            </li>
                            <li class="row justify-content-between m-0">
                                <p class="label">Ngày sinh</p>
                                <p><strong>
                                        <?php echo date_format(date_create($key['ngaySinh']), "d/m/Y"); ?>
                                    </strong></p>
                            </li>
                            <li class="row justify-content-between m-0">
                                <p class="label">Email</p>
                                <p><strong>
                                        <?php echo $key['email']; ?>
                                    </strong></p>
                            </li>
                            <li class="border-bottom-0 mt-3">
                                <button class="btn btn-danger" id="set-info-user">Chỉnh sửa thông tin</button>
                            </li>
                            <div id="result"></div>
                        </ul>
                                <script>
                                    document.getElementById('set-info-user').addEventListener("click",function (){
                                        document.querySelector(".info").style.display="none";
                                        document.querySelector(".update").style.display="block";
                                        // console.log("hi");

                                    });
                                </script>
                        <div class="login w3_login "  >
                            <form class="login-container update" id="myForm" action="index.php?updateuser" method="post" id="update">
                                <label for="Email: ">Email: </label>
                                <input type="email" class="bg-light" placeholder="Email" Name="email" disabled
                                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>">
                                <label for="ho: ">Họ: </label>
                                <input type="text" placeholder="Họ" Name="ho"
                                    value="<?php  echo isset($key['ho']) ? $key['ho'] : ""; ?>">
                                <label for="tenlot: ">Tên lót: </label>
                                <input type="text" placeholder="Tên lót" Name="tenlot"
                                    value="<?php  echo isset($key['tenLot']) ? $key['tenLot'] : ""; ?>">
                                <label for="ten: ">Tên: </label>
                                <input type="text" placeholder="Tên" Name="ten" required=""
                                    value="<?php  echo isset($key['ten']) ? $key['ten'] : ""; ?>">
                                <label for="sdt: ">Số điện thoại: </label>
                                <input type="text" placeholder="Số điện thoại" Name="sdt" required=""
                                    value="<?php echo isset($key['soDienThoai']) ? $key['soDienThoai'] : ""; ?>">
                                <div class="row justify-content-between m-0 mb-3">
                                    <fieldset class="col-lg-5">
                                        <legend>Giới tính</legend>
                                        <input type="radio" value="nam" name="gioitinh" <?php echo isset($key['gioiTinh']) ? ($key['gioiTinh'] == "nam" ? "checked" : "") : ""; ?>><i>Nam</i>
                                        <input type="radio" value="nu" name="gioitinh" <?php echo isset($key['gioiTinh']) ? ($key['gioiTinh'] == "nu" ? "checked" : "") : ""; ?>><i>Nữ</i>
                                    </fieldset>
                                    <fieldset class="col-lg-6">
                                        <legend for="">Ngày Sinh</legend>
                                        <input type="date" placeholder="Ngày sinh" Name="ngaysinh" required=""
                                            value="<?php echo isset($key['ngaySinh']) ? $key['ngaySinh'] : ""; ?>">
                                    </fieldset>
                                </div>
                                <div class="row justify-content-around m-0">
                                    <input type="submit" value="Cập nhập thông tin" class="btn btn-danger col-5">
                                    <button class="btn btn-outline-danger col-5" id="setpass" type="button">Thay đổi mật khẩu</button>
                                </div>
                            </form>
                            <script>
                                document.getElementById('setpass').addEventListener("click",function (){
                                    document.querySelector(".update").style.display="none";
                                    document.getElementById("getpass").classList.remove("getpass");
                                });
                            </script>
                            <form class="login-container getpass" id="getpass" action="index.php?setpass" method="post">
                                <label for="sdt: ">Nhập mật khẩu mới: </label>
                                <input type="password" placeholder="Mật khẩu" Name="password" required="" autocomplete="new-password">
                                <input type="submit" class="btn btn-danger" value="Lưu">
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once(realpath('') . '\\src\\views\\layouts\\end.php'); ?>