<header>
    <div class="container p-0 <?php

use core\Field;

 echo str_contains($_SERVER['REQUEST_URI'], "?") ? "d-none" : ""; ?> dautrang"
        style="margin: 0 auto;">
        <img src="./assets/library/1200/1200x44sad-1708509269.png" alt="" width="100%" height="100%">
    </div>
    <div class="row justify-content-center fs-header m-0 p-0">
        <!-- <img class="icon-left" src="./assets/library/bg-header-1.png" height="60" alt=""> -->
        <div class="container row fs-childheader m-0 p-0">
            <a class="logo col-lg-2 p-2" href="index.php">
                <img src="./assets/library/logo.png" width="170" alt="Logo">
            </a>
            <div class="search col-lg" style="position: relative;">
                <!-- <form action="" class="form m-0">
                    <input class="input-search " type="text" placeholder="Nhập tên điện thoại, Máy tính, Phụ kiện ... cần tìm">
                    <button type="submit" class="btn-search" value="Tìm kiếm"><i class='bx bx-search'></i></button>
                </form> -->
                 
                <form method="post"  class="form m-0">

                    <input type="text" value="<?php echo isset ($_GET['search']) ? $_GET['search'] : '' ?>"
                        name="search" placeholder="Nhập tên điện thoại, Máy tính, Phụ kiện ... cần tìm" id="key" class="input-search">
                    <!-- <button class="btn-search" style="margin-top:5px;" type="submit"><i class="fa fa-search"
                            onclick="return search();" style="position: absolute; top: -13px;"></i> </button> -->
                    <button type="submit" class="btn-search" value="Tìm kiếm"><i class='bx bx-search'></i></button>
                </form>
                <div class="smart-search bg-white">
                    <ul>
                    </ul>
                </div>
                <script type="text/javascript">
                    
                </script>
                <!--</form>-->
            </div>
            <ul class="chucnang row justify-content-between col-lg list-unstyled m-0">
                <li class="thongtinhay p-1 mx-1">
                    <a class="a-light text-center " href="">
                        <div><i class='bx bx-file'></i></div>
                        <span>Thông tin hay</span>
                    </a>
                    <ul class="thongtinhay-hover list-unstyled bg-light p-3">
                        <li><a href="" class="a-dark">Tin mới</a></li>
                        <li><a href="" class="a-dark">Khuyến mãi</a></li>
                        <li><a href="" class="a-dark">Điện máy - Gia dụng</a></li>
                        <li><a href="" class="a-dark">Thủ thuật</a></li>
                        <li><a href="" class="a-dark">For Games</a></li>
                        <li><a href="" class="a-dark">Video hot</a></li>
                        <li><a href="" class="a-dark">Đánh giá - Tư vấn</a></li>
                        <li><a href="" class="a-dark">App & Game</a></li>
                        <li><a href="" class="a-dark">Sự kiện</a></li>
                    </ul>
                </li>
                <li class="ttvati p-1 mx-1">
                    <a class="ttvati a-light text-center" href="">
                        <div><i class='bx bxs-wallet-alt'></i></div>
                        <span>Thanh toán và tiện ích</span>
                    </a>
                </li>
                <li class="dangnhap p-1 mx-1">
                    <a class="dangnhap a-light text-center"
                        href="<?php echo isset ($_SESSION["username"]) ? "index.php?users" : "index.php?userslogin"; ?>">
                        <div><i class='bx bx-user-circle'></i></div>
                        <span>
                            <?php echo isset ($_SESSION["username"]) ? $_SESSION["username"] : "Tài khoản"; ?>
                        </span>
                    </a>

                    <ul
                        class="dangnhap-hover <?php echo isset ($_SESSION["username"]) ? "" : "d-none"; ?> list-unstyled bg-light">
                        <li><a href="index.php?users" class="a-dark p-3"><i class='bx bxs-user'></i> Thông tin cá
                                nhân</a></li>
                        <li><a href="" class="a-dark p-3"><i class='bx bx-file'></i> Lịch sử tích điểm</a></li>
                        <li><a href="" class="a-dark p-3"><i class='bx bx-menu'></i> Đơn hàng của tôi</a></li>
                        <li><a href="index.php?userslogout" class="a-dark p-3"><i
                                    class='bx bx-log-out bx-rotate-180'></i> Thoát tài khoản</a></li>
                    </ul>
                </li>
                <li class="giohang p-1 mx-1">
                    <a class="giohang a-light text-center" href="index.php?cart">
                        <div><i class='bx bxs-cart-alt'></i></div>
                        <span>Giỏ hàng</span>
                        <div class="giohang-total text-center">
                            <?php echo isset ($_SESSION["cart"]) ? ((count($_SESSION["cart"]) > 0) ? Field::cartNumber() : 0) : 0; ?>
                        </div>
                    </a>
                    <ul class="giohang-hover list-unstyled bg-light p-3">
                        <?php
                            if(isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0){
                                foreach ($_SESSION["cart"] as $key) {
                                    echo '<li >
                                            <div class="giohang-info row m-0">
                                                <div class="col-2 px-1"><img src="/assets/library/laptop/macbook-air-m2-2022-den-dd.jpg" alt=""></div>
                                                <div class="col px-0">'.$key["name"].'</div>
                                                <div class="col-1">x'.$key["number"].'</div>
                                            </div>
                                        </li>
                                        
                                        ';
                                }
                            echo '<a href="index.php?cart" class="float-right btn btn-danger mt-3">Xem giỏ hàng</a>';
                        } else {
                            echo "<li>Giỏ hàng trống</li>";
                        } 
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- <img class="icon-right" src="./assets/library/bg-header-2.png" height="60" alt=""> -->
    </div>