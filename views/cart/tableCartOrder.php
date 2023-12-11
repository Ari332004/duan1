<?php
session_start();
include_once '../../models/pdo.php';
include_once '../../models/cart.php';

if(isset($_SESSION['user'])){
  $datacart = cartAll($_SESSION['user']['id']);
}else{
  if(isset($_SESSION['cart'])){
      $datacart = $_SESSION['cart'];
  } else{
      $datacart = [];
  }
}

if(!empty($datacart)){
  $sum_total = 0;
  foreach ($datacart as $key => $cart) :?>
<?php  $id = isset($_SESSION['user']) ? $cart['id'] : $key; ?>
<?php $mauCL = getMauCl($cart['ma_spct']) ?>
<tr>
  <td class="product_remove">
    <a onclick="removeFormCart(<?= $id ?>)"><i class="fa fa-trash-o"></i></a>
  </td>
  <td class="product_thumb">
    <a href="#"><img src="uploads/sanpham/<?= $cart['anh'] ?>" alt="" /></a>
  </td>
  <td class="product_name" style="text-align: center;">
    <div class="d-flex flex-column" style="text-align: left;color: #747474;"><a href="#"><?= $cart['tensp'] ?></a>
      <span><?= 'Màu: '. $mauCL['ten_mau']?></span>
      <span><?= 'Chất liệu: '.$mauCL['ten_cl']?></span>
    </div>
  </td>
  <td class="product-price"><?= number_format($cart['gia'], 0, '', '.') ?> VNĐ</td>
  <td class="product_quantity">
    <input min="1" value="<?= $cart['sl'] ?>" type="number" id="quantity<?= $cart['ma_spct'].$cart['ma_user']?>"
      oninput="updateQuantity(<?= $cart['ma_spct'] ?>,<?= $cart['ma_user'] ?>, <?= $id ?>)" />
  </td>
  <td class="product_total"><?= number_format((int)$cart['gia'] * (int)$cart['sl'], 0, '', '.') ?> VNĐ
  </td>
</tr>
<?php
$sum_total += ((int)$cart['gia'] * (int)$cart['sl']);
  endforeach;
  $_SESSION['resultTotal'] = $sum_total;
?>

<?php
}
?>