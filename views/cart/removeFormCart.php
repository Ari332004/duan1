<?php
session_start();
include_once '../../models/pdo.php';
include_once '../../models/cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $macart = $_POST['id'];

    if (isset($_SESSION['user'])) {
      cart_delete($macart);
      // $dataCart = check_spct_exists($maspct, $mauser);
      // if (!empty($dataCart)) {
      //   updateSL($maspct, $mauser, $newQuantity);
      // } else {
      //   echo 'Sản phầm ko tồn tại trong giỏ hàng';
      // }
    } else {
      if (!empty($_SESSION['cart'])) {
        unset($_SESSION['cart'][$macart]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
      } else {
        echo 'Sản phầm ko tồn tại trong giỏ hàng';
      }
    }

    // Kiểm giỏ hàng có tồn tại hay không
    // if (!empty($_SESSION['cart'])) {
    //     // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    //     $index = array_search($productId, array_column($_SESSION['cart'], 'id'));

    //     // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
    //     if ($index !== false) {
    //         // Xóa sản phẩm khỏi giỏ hàng
    //         unset($_SESSION['cart'][$index]);
    //         $_SESSION['cart'] = array_values($_SESSION['cart']);
    //     } else {
    //         echo 'Sản phầm ko tồn tại trong giỏ hàng';
    //     }
    // }

} else {
    echo 'Yêu cầu không hợp lệ';
}
?>