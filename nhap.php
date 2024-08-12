

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng</title>
</head>

<body>
  <h1>Giỏ hàng</h1>
  <form action="checkout.php" method="post">
    <ul id="cart">
      <?php
      // Định nghĩa các sản phẩm trong giỏ hàng (giả sử)
      $products = [
        ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 100],
        ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 150],
        ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 200]
      ];

      // Hiển thị danh sách sản phẩm trong giỏ hàng
      foreach ($products as $product) {
        echo '<li>';
        echo '<input type="checkbox" name="selectedProducts[]" value="' . $product['id'] . '">';
        echo '<span>' . $product['name'] . ' - ' . $product['price'] . ' đ</span>';
        echo '</li>';
      }
      ?>

    </ul>
    <button type="submit" name="checkoutBtn">Thanh toán</button>
  </form>

  <!-- <?php include ("products.php"); ?> -->
</body>

</html>