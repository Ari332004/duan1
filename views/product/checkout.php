<?php
$msg = '';
$color = 'green';
if(isset($_POST['muahang'])){
  $fullname = $_POST['fullname']??'';
  $tel = $_POST['phonenumber']??'';
  $address = $_POST['address']??'';
  $pttt = $_POST['inlineRadioOptions'] ?? 0;
  $mauser = isset($_SESSION['user'])?$_SESSION['user']['id']:0;
  $carts = $_POST['checkout']?? [];
  if($fullname != '' && $address !='' && $tel!=''){
    if($pttt!=0){
    $iddh =  insert_dh_return_id($mauser,$tel,$address,$pttt, $sum_total,$fullname);
    foreach ($datacart as $key => $cart){
      insert_dhct($cart['ma_spct'],$iddh,$cart['gia'],$cart['sl'],$cart['anh'],$cart['tensp']);
      if(isset($_SESSION['user'])){
        cart_delete($cart['id']);
      } else {
        unset($_SESSION['cart']);
        // $_SESSION['cart'] = array_values($_SESSION['cart']);
      }
    }
    $msg = 'Bạn đã mua hàng thành công';
    $color = 'green';
  }else{
      $msg = 'Vui lòng chọn phương thức thanh toán';
    $color = 'red';
    }
  } else {
    $msg = 'Vui long nhập đầy đủ thông tin cá nhân';
    $color = 'red';
  }
}
?>

<form method="post" class="mt-5">
  <div class="container" style="max-width: 90%;color: black;">
    <div class="row">
      <div class="col-lg-5 col-md-5">
        <legend>Thông tin đơn hành</legend>
        <div class="form-group mb-3">
          <label for="usr" class="form-label">Họ và tên:</label>
          <input required="true" type="text" class="form-control" id="fullname" name="fullname" value="<?= $name ?>">
        </div>
        <!-- <div class="form-group mb-3">
          <label for="email" class="form-label">Email:</label>
          <input required="true" type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
        </div> -->
        <div class="form-group mb-3">
          <label for="phone_number" class="form-label">Số điện thoại:</label>
          <input required="true" type="tel" class="form-control" id="phone_number" name="phonenumber"
            value="<?= $tel ?>">
        </div>
        <div class="form-group mb-3">
          <label for="address" class="form-label">Địa chỉ:</label>
          <input required="true" type="text" class="form-control" id="address" name="address" value="<?= $address ?>">
        </div>
      </div>
      <div class="col-md-7">
        <legend>Đơn hàng của bạn</legend>
        <table class="table" style="align-items: center;">
          <thead>
            <tr>
              <th>Ảnh</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Tổng</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum_total = 0; ?>
            <?php foreach ($datacart as $key => $cart) : ?>
            <?php $mauCL = getMauCl($cart['ma_spct']) ?>
            <tr>
              <td style="display: none;"><input type="text" hidden
                  value="<?= isset($_SESSION['user']) ? $cart['id'] : $key; ?>" name="checkout[]"></td>
              <td><img src="uploads/sanpham/<?= $cart['anh'] ?>" width="100px"></td>
              <td>
                <div class="d-flex flex-column"><?= $cart['tensp'] ?>
                  <span><?= 'Màu: '. $mauCL['ten_mau']?></span>
                  <span><?= 'Chất liệu: '.$mauCL['ten_cl']?></span>
                </div>
              </td>
              <td><?= number_format($cart['gia'], 0, '', '.') ?> VNĐ</td>
              <td><?= $cart['sl'] ?></td>
              <td><?= number_format((int)$cart['gia'] * (int)$cart['sl'], 0, '', '.') ?> VNĐ</td>
            </tr>
            <?php $sum_total += ((int)$cart['gia'] * (int)$cart['sl']); ?>
            <?php endforeach ?>
            <?php
// $cart = [];
// if(isset($_SESSION['cart'])) {
// 	$cart = $_SESSION['cart'];
// }
// $total = 0;
// foreach ($cart as $item) {
// 	$total += $item['num'] * $item['price'];
// 	echo '
// 		<tr>
// 			<td><img src="'.$item['thumbnail'].'" style="width: 100px"></td>
// 			<td>'.$item['title'].'</td>
// 			<td>'.number_format($item['price'], 0, '', '.').' VND</td>
// 			<td>'.$item['num'].'</td>
// 			<td>'.number_format($item['num'] * $item['price'], 0, '', '.').' VND</td>
// 		</tr>';
// }
?>
          </tbody>
        </table>
        <div class="pttt mt-5 mb-5">
          <legend>Phương thức thanh toán</legend>
          <?php foreach ($dspttt as $pt) : ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
              value="<?= $pt['id'] ?>">
            <label for="inlineRadio1"><?= $pt['mota'] ?></label>
          </div>
          <?php endforeach ?>
        </div>
        <div class="row" style="justify-content: right;">
          <div style=" width: 50%;">
            <div class="total row">
              <p class="col-6">Tổng cộng</p>
              <p class="col-6">
                <?=number_format($sum_total, 0, '', '.')?> VNĐ
              </p>
            </div>
            <button class="btn btn-success" name="muahang" style="width: 100%;">Hoàn thành</button>
            <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</form>