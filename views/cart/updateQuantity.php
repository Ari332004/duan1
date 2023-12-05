<?php
session_start();
include_once '../../models/pdo.php';
include_once '../../models/cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Lấy dữ liệu từ ajax đẩy lên
  $maspct = $_POST['id'];
  $mauser = $_POST['user'];
  $newQuantity = $_POST['sl'];
  if (isset($_SESSION['user'])) {
    $dataCart = check_spct_exists($maspct, $mauser);
    if (!empty($dataCart)) {
      updateSL($maspct, $mauser, $newQuantity);
    } else {
      echo 'Sản phầm ko tồn tại trong giỏ hàng';
    }
  } else {
    $index = array_search($maspct, array_column($_SESSION['cart'], 'ma_spct'));
    if ($index !== false) {
      $_SESSION['cart'][$index]['sl'] = $newQuantity;
    } else {
      echo 'Sản phầm ko tồn tại trong giỏ hàng';
    }
  }
} else {
  echo 'Yêu cầu không hợp lệ';
}