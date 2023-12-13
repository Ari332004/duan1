<?php
session_start();
include_once '../../models/pdo.php';
include_once '../../models/cart.php';
include_once '../../models/sanphamct.php';

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
  <td class="product-price"><?= number_format($cart['gia'], 0, '', '.') ?>₫</td>
  <td class="product_quantity">
    <?php
                        $slmax= spct_select_by_id($cart['ma_spct']);
                        $slgh = countSL($cart['ma_spct']);
                        if(isset($_SESSION['cart'])){
                          $slsession = array_sum(array_column($_SESSION['cart'], 'sl'));
                        } else {
                          $slsession = 0;
                        }
                      ?>
    <input min="1" max="<?= $slmax['so_luong']-$slgh['tong_sl']-$slsession + $cart['sl']?>" value="<?= $cart['sl'] ?>"
      type="number" id="quantity<?= $cart['ma_spct'].$cart['ma_user']?>"
      oninput="updateQuantity(<?= $cart['ma_spct'] ?>,<?= $cart['ma_user'] ?>, <?= $id ?>)" />
  </td>
  <td class="product_total"><?= number_format((int)$cart['gia'] * (int)$cart['sl'], 0, '', '.') ?>₫
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