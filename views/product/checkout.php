<form method="post" class="mt-5">
  <div class="container" style="max-width: 90%;color: black;">
    <div class="row">
      <div class="col-lg-5 col-md-5">
        <legend>Thông tin đơn hành</legend>
        <div class="form-group mb-3">
          <label for="usr" class="form-label">Họ và tên:</label>
          <input required="true" type="text" class="form-control" id="fullname" name="fullname">
        </div>
        <div class="form-group mb-3">
          <label for="email" class="form-label">Email:</label>
          <input required="true" type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group mb-3">
          <label for="phone_number" class="form-label">Số điện thoại:</label>
          <input required="true" type="tel" class="form-control" id="phone_number" name="phone_number">
        </div>
        <div class="form-group mb-3">
          <label for="address" class="form-label">Địa chỉ:</label>
          <input required="true" type="text" class="form-control" id="address" name="address">
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
            <tr>
              <td><img src="assets/img/product/product1.jpg" style="width: 100px"></td>
              <td>tên</td>
              <td>100000 VND</td>
              <td>10</td>
              <td>1000000 VND</td>
            </tr>
            <tr>
              <td><img src="assets/img/product/product2.jpg" style="width: 100px"></td>
              <td>tên</td>
              <td>100000 VND</td>
              <td>10</td>
              <td>1000000 VND</td>
            </tr>
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
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
            <label for="inlineRadio1">Nhân viên</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
            <label for="inlineRadio1">Nhân viên</label>
          </div>
        </div>
        <div class="row" style="justify-content: right;">
          <div style=" width: 50%;">
            <div class="total row">
              <p class="col-6">Tổng cộng</p>
              <p class="col-6">
                0 VNĐ
                <!-- <?=number_format($total, 0, '', '.')?> VND -->
              </p>
            </div>
            <button class="btn btn-success" style="width: 100%;">Hoàn thành</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</form>