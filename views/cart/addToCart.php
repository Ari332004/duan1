<?php
session_start();
include_once '../../models/pdo.php';
include_once '../../models/cart.php';

// Kiểm tra xem có tồn tại mảng giỏ hàng hay không.
if (!isset($_SESSION['cart'])) {
    // Nếu không có thì đi khởi tạo
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $maspct = $_POST['id'];
    $tensp = $_POST['name'];
    $giasp = $_POST['price'];
    $anhsp = $_POST['img'];
    $slsp = $_POST['sl'];
    $mauser = $_POST['user'];

    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
   
    // array_column() trích xuất một cột từ mảng giỏ hàng và trả về một mảng chứ giá trị của cột id
    if(isset($_SESSION['user'])){

        if($mauser != 0){
            $dataCart = check_spct_exists($maspct, $mauser);
          }
        if(!empty($dataCart)){
            updateSL($maspct, $mauser);
          } else {
            cart_insert($maspct, $tensp, $giasp, $anhsp, $slsp, $mauser);
          }
    } else {
        $index = false;
        if (!empty($_SESSION['cart'])) {
            $index = array_search($maspct, array_column($_SESSION['cart'], 'ma_spct'));
        }
        if ($index !== false) {
            $_SESSION['cart'][$index]['sl'] += 1;
        } else {
            // Nếu sản phẩm chưa tồn tại thì thêm mới vào giỏ hàng
            $product = [
                'ma_spct' => $maspct,
                'tensp' => $tensp,
                'gia' => $giasp,
                'sl' => $slsp,
                'anh' => $anhsp,
                'ma_user' => 0
            ];
            $_SESSION['cart'][] = $product;
            // var_dump($_SESSION['cart']);die;
        }
    }
    
    
} else {
    echo 'Yêu cầu không hợp lệ';
}
?>