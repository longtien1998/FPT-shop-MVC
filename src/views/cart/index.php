<?php

use core\Field;

    $title = "Giỏ Hàng";
    include_once(realpath('') . '\\src\\views\\layouts\\begin.php'); ?>
<?php

// foreach ($_SESSION["cart"] as $key) {
//     var_dump($key);
// }
// echo count($_SESSION["cart"]);
isset($_SESSION["cart"]) ? ((count($_SESSION["cart"]) > 0) ? $block = "none" : $block = "") : $block = "";
!isset($_SESSION["cart"]) ? $show = "none" : ((count($_SESSION["cart"]) == 0) ? $show = "none" : $show = "") ;

?>

<div class="cart">
    <div class="container">
        <div>
            <?php 
                // echo isset($data['messSuccess']) ? $data['messSuccess'] : (isset($data['messfail']) ? $data['messfail'] : "" );
                if(isset($data['messSuccess'])){
                    echo $data['messSuccess'];
                    unset($data['messSuccess']);
                } else if(isset($data['messfail'])){
                    echo  $data['messfail'];
                    unset( $data['messfail']);
                } else{
                    echo"";
                }
            ?>
        </div>
        <div class="path ">
            <ul class="row list-unstyled m-0">
                <li><a class="text-decoration-none" href="index.php"><i class='bx bx-home'></i> Trang chủ</a></li>
                <li><i class='bx bxs-chevron-right'></i></li>
                <li><a class="text-decoration-none" href="index.php?cart"><i class='bx bx-cart'></i> Giỏ hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="cart-detal ">
        <div class="container <?php echo $block; ?>">
            <div class="cart-none text-center">
                <div class="cart-none-img">
                    <img src="./assets/library/tt/empty-cart.png" alt="" width="100%">
                </div>
                <h4>Chưa có sản phẩm nào trong giỏ hàng</h4>
                <p>Cùng mua sắm hàng ngàn sản phẩm tại FPT Shop nhé !</p>
                <a class="btn btn-danger" href="index.php">Mua hàng</a>
            </div>
        </div>

        <div class="cart-block <?php echo $show; ?>">
            <div class="container">
                <form action="index.php?cartupdate" method="post">
                    <div class="row justify-content-between m-0">
                        <h3>Có <?php echo  Field::cartNumber();?> sản phẩm trong giỏ hàng</h3>
                        <div>
                            <button class="btn btn-info" type="submit">Cập nhập giỏ hàng</button>
                            <a class="btn btn-warning" href="index.php?cartdestroy">Xóa tất cả</a>
                        </div>
                        
                    </div>
                    <?php foreach ($_SESSION['cart'] as $key) {
                        // var_dump($key);                }
                    ?>
                    <div class="cart-selector">
                        <div class="cart-product row  m-0">
                            <div class="cart-product-img col-lg-2">
                                <img src="./assets/library/laptop/macbook-air-m2-2022-den-dd.jpg" alt="" width="100%">
                            </div>
                            <div class="cart-product-info col-lg-7">
                                <h5 class="cart-product-info-name"><?php echo $key["name"]; ?></h5>
                                <div class="row m-0">
                                    <div class="mausac m-2">
                                        <p>Màu sắc</p>
                                        <select name="mausac" id="" class="">
                                            <option value="">Đen</option>
                                            <option value="">Đỏ</option>
                                            <option value="">Vàng</option>
                                            <option value="">Trắng</option>
                                        </select>
                                    </div>
                                    <div class="soluong m-2">
                                        <p>Số lượng</p>
                                        <div>
                                            <input class="input-control" name="product_<?php echo $key['id'];?>" type="number" min="0" maxlength="1" value="<?php echo $key["number"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-product-price col-lg-3">
                                <div class="cart-product-delete"><a class="product-delete" href="index.php?cartdelete&<?php echo $key['id']; ?>"><i class='bx bx-trash'></i></a></div>
                                <div class="cart-product-delprice">
                                    <h4><?php echo number_format($key["delprice"]*$key["number"], 0, ',', '.'); ?><span> đ</span></h4>
                                    
                                    <?php echo  ($key['cout'] !== NULL && $key['cout'] > 0) ? '<p><del>'. number_format($key["price"]*$key["number"] , 0, ',', '.').' <span> đ</span></del></p>' : "";?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                    <div class="cart-selector">
                        <div class="product-endow">
                            <div class="product-endow-title">
                                <h5>Sản phẩm kèm theo ưu đãi</h5>
                            </div>
                            <div class="product-endow-detail">
                                <div class="product-endow-detail row justify-content-between m-0">
                                    <div class="endow-detail-img col-lg-1">
                                        <img src="./assets/library/Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be.jpg"
                                            alt="" width="100%">
                                    </div>
                                    <div class="endow-detail-name col-lg-7">
                                        <h6>Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be</h6>
                                    </div>
                                    <div class="endow-detail-price col-lg-2">
                                        <h5>872.000 <span> đ</span></h5>
                                        <p><del>1.090.000 <span>đ</span></del></p>
                                    </div>
                                    <div class="endow-detail-buy col-lg-2">
                                        <a class="btn btn-danger" href="">Chọn mua</a>
                                    </div>
                                </div>
                                <div class="product-endow-detail row justify-content-between m-0">
                                    <div class="endow-detail-img col-lg-1">
                                        <img src="./assets/library/Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be.jpg"
                                            alt="" width="100%">
                                    </div>
                                    <div class="endow-detail-name col-lg-7">
                                        <h6>Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be</h6>
                                    </div>
                                    <div class="endow-detail-price col-lg-2">
                                        <h5>872.000 <span> đ</span></h5>
                                        <p><del>1.090.000 <span>đ</span></del></p>
                                    </div>
                                    <div class="endow-detail-buy col-lg-2">
                                        <a class="btn btn-danger" href="">Chọn mua</a>
                                    </div>
                                </div>
                                <div class="product-endow-detail row justify-content-between m-0">
                                    <div class="endow-detail-img col-lg-1">
                                        <img src="./assets/library/Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be.jpg"
                                            alt="" width="100%">
                                    </div>
                                    <div class="endow-detail-name col-lg-7">
                                        <h6>Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be</h6>
                                    </div>
                                    <div class="endow-detail-price col-lg-2">
                                        <h5>872.000 <span> đ</span></h5>
                                        <p><del>1.090.000 <span>đ</span></del></p>
                                    </div>
                                    <div class="endow-detail-buy col-lg-2">
                                        <a class="btn btn-danger" href="">Chọn mua</a>
                                    </div>
                                </div>
                                <div class="product-endow-detail row justify-content-between m-0">
                                    <div class="endow-detail-img col-lg-1">
                                        <img src="./assets/library/Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be.jpg"
                                            alt="" width="100%">
                                    </div>
                                    <div class="endow-detail-name col-lg-7">
                                        <h6>Tai nghe Bluetooth choàng đầu Baseus Bowie D05 Be</h6>
                                    </div>
                                    <div class="endow-detail-price col-lg-2">
                                        <h5>872.000 <span> đ</span></h5>
                                        <p><del>1.090.000 <span>đ</span></del></p>
                                    </div>
                                    <div class="endow-detail-buy col-lg-2">
                                        <a class="btn btn-danger" href="">Chọn mua</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-selector">
                        <div class="promotion">
                            <div class="promotion-title">
                                <h5>Khuyến mãi tặng kèm</h5>
                            </div>
                            <div class="promotion-detail">
                                <div class="promotion-detail row justify-content-between m-0">
                                    <div class="promotion-detail-img col-lg-1">
                                        <img src="./assets/library/balo.jpeg" alt="" width="100%" height="100%">
                                    </div>
                                    <div class="promotion-detail-name col-lg-10">
                                        <h6>Vật phẩm khuyến mãi Balo Gaming Acer SUV 1 (LN.AC.SU01)</h6>
                                    </div>
                                    <div class="promotion-detail-total col-lg-1">
                                        x1
                                    </div>

                                </div>
                                <div class="promotion-detail row justify-content-between m-0">
                                    <div class="promotion-detail-img col-lg-1">
                                        <img src="./assets/library/balo.jpeg" alt="" width="100%" height="100%">
                                    </div>
                                    <div class="promotion-detail-name col-lg-10">
                                        <h6>Vật phẩm khuyến mãi Balo Gaming Acer SUV 1 (LN.AC.SU01)</h6>
                                    </div>
                                    <div class="promotion-detail-total col-lg-1">
                                        x1
                                    </div>

                                </div>
                                <div class="promotion-detail row justify-content-between m-0">
                                    <div class="promotion-detail-img col-lg-1">
                                        <img src="./assets/library/balo.jpeg" alt="" width="100%" height="100%">
                                    </div>
                                    <div class="promotion-detail-name col-lg-10">
                                        <h6>Vật phẩm khuyến mãi Balo Gaming Acer SUV 1 (LN.AC.SU01)</h6>
                                    </div>
                                    <div class="promotion-detail-total col-lg-1">
                                        x1
                                    </div>

                                </div>
                                <div class="promotion-detail row justify-content-between m-0">
                                    <div class="promotion-detail-img col-lg-1">
                                        <img src="./assets/library/balo.jpeg" alt="" width="100%" height="100%">
                                    </div>
                                    <div class="promotion-detail-name col-lg-10">
                                        <h6>Vật phẩm khuyến mãi Balo Gaming Acer SUV 1 (LN.AC.SU01)</h6>
                                    </div>
                                    <div class="promotion-detail-total col-lg-1">
                                        x1
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-selector">
                        <div class="shipping">
                            <div class="shipping-title row justify-content-between m-0 pl-3">
                                <h5 class=" m-0"><i class='bx bxs-box' style="color: crimson;font-size: 22px;"></i>
                                    Chọn hình thức nhận hàng</h5>
                                <div class="row m-0">
                                    <div class="row m-0">
                                        <label class="checkbox-container">
                                            <input type="checkbox" id="checkbox1" onclick="toggleCheck('checkbox1')"
                                                checked>
                                            <span class="checkbox"></span>
                                            <span class="checkmark"></span>
                                            Giao hàng tận nơi
                                        </label>
                                    </div>
                                    <div class="row m-0">
                                        <label class="checkbox-container">
                                            <input type="checkbox" id="checkbox2" onclick="toggleCheck('checkbox2')">
                                            <span class="checkbox"></span>
                                            <span class="checkmark"></span>
                                            Nhận tại cửa hàng
                                        </label>
                                    </div>
                                </div>


                                <script>
                                    function toggleCheck(id) {
                                        // Get the checkbox element by ID
                                        const checkbox = document.getElementById(id);

                                        // If the checkbox is checked
                                        if (checkbox.checked) {
                                            // Uncheck the other checkbox
                                            if (id === "checkbox1") {
                                                document.getElementById("checkbox2").checked = false;
                                            } else {
                                                document.getElementById("checkbox1").checked = false;
                                            }
                                        }
                                    }
                                </script>
                            </div>
                            <div class="shipping-info p-3">
                                <div class="shipping-info-title row justify-content-between m-0 ">
                                    <h6 class="">Giao hàng tới</h6>
                                    <p class="thaydoi">thay đổi</p>
                                </div>
                                <div class="location row m-0 p-2">
                                    <div class="col-lg-10">
                                        <h5>107/15 ngũ Hành Sơn</h5>
                                        <p>Phường Mỹ An, Quận Ngũ Hành Sơn, Đà Nẵng</p>
                                        <p><b>Long Tiến</b> : 0982268784</p>
                                    </div>
                                    <div class="iconloca text-center col-lg-2">
                                        <div class="text-center">
                                            <i class='bx bxs-home'></i> Nhà
                                        </div>

                                    </div>
                                </div>
                                <div class="line my-3"></div>
                                <div class="timeship">
                                    <div class="row justify-content-between m-0">
                                        <h6>Thời gian giao hàng</h6>
                                        <select name="" id="" class="col-lg-7">
                                            <option value="">Chỉ giao hàng trong giờ hành chính</option>
                                            <option value="">Tất cả các ngày trong tuần</option>
                                        </select>
                                    </div>

                                    <textarea name="postContent" id="" cols="30" rows="3" maxlength="300"
                                        placeholder="Thêm ghi chú (ví dụ: Hãy gọi trước khi giao)"></textarea>
                                </div>
                            </div>
                            <div class="service-ship p-3 my-3">
                                <div class="row m-0">
                                    <label class="switch">
                                        <input type="checkbox" class="nut">
                                        <span class="check round"></span>

                                    </label>
                                    <span class="switch-title">Yêu cầu hỗ trợ kỹ thuật</span>
                                </div>
                                <div class="row m-0">
                                    <label class="switch">
                                        <input type="checkbox" class="nut">
                                        <span class="check round"></span>
                                    </label>
                                    <span class="switch-title">Yêu cầu xuất hóa đơn điện tử</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <div class="cart-total <?php echo $show; ?>">
        <div class="border-bottom">
            <div class="container ">
                <div class="voucher row m-0">
                    <i class='bx bxs-discount'></i>
                    <p>Sử dụng voucher hoặc đổi điểm</p>
                </div>
            </div>
        </div>
        <div class="border-bottom">
            <div class="container ">
                <div class="dieukhoan row m-0">
                    <input type="checkbox" id="">
                    <p>Tôi đồng ý với <a href="">Điều khoản dịch vụ</a>, <a href="">Chính sách thu thập và xử lý dữ liệu
                            cá nhân</a> của FPT Shop.</p>
                </div>
            </div>
        </div>
        <div class="border-bottom ">
            <div class="container p-3">
                <div class="row m-0">
                    <div class="cart-total-detail col-lg-6">
                        <div class="tongtien row justify-content-between m-0">
                            <p>Tổng tiền:</p>
                            <p><?php echo number_format(Field::cartAllTotal(),0,',','.');  ?> đ</p>
                        </div>
                        <div class="tongtien row justify-content-between m-0">
                            <p>Giảm giá khuyến mãi:</p>
                            <p><?php echo number_format(Field::cartdelTotal(),0,',','.');  ?> đ</p>
                        </div>
                        <div class="tongtien row justify-content-between m-0">
                            <p>Giảm giá voucher:</p>
                            <p>0 đ</p>
                        </div>
                    </div>
                    <div class="cart-total-all col-lg-6 ">
                        <div class="thanhtoan row justify-content-between m-0">
                            <p>Cần thanh toán (<?php echo Field::cartNumber(); ?> sản phẩm):</p>
                            <p style="color: crimson;font-weight: 700;font-size: 25px;"><?php echo number_format(Field::cartTotal(),0,',','.');  ?> đ</p>
                        </div>
                        <input class="hoantat btn" type="submit" value="Hoàn tất đặt hàng">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once(realpath('') . '\\src\\views\\layouts\\end.php'); ?>