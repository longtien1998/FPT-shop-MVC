<?php

  // Xử lý khi người dùng nhấn nút Thanh toán
  if (isset($_POST['checkoutBtn'])) {
    // Lấy các sản phẩm được chọn để thanh toán
    $selectedProducts = $_POST['selectedProducts'];

    // Hiển thị các sản phẩm được chọn để thanh toán
    echo '<h2>Các sản phẩm được chọn để thanh toán:</h2>';
    echo '<ul>';
    foreach ($selectedProducts as $productId) {
      // Trong thực tế, bạn có thể thực hiện các thao tác khác như xử lý thanh toán, v.v.
      echo '<li>' .$productId. '</li>';
    }
    echo '</ul>';
  
}
?>
