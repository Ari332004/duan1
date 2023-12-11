<!-- shopping cart area start -->

<div class="shopping_cart_area mt-5">
  <div class="container">
    <form action="#">
      <div class="row">
        <div class="col-12">
          <div class="table_desc">
            <div class="cart_page table-responsive">
              <table>
                <thead>
                  <tr>
                    <th class="product_remove">Delete</th>
                    <th class="product_thumb">Image</th>
                    <th class="product_name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product_quantity">Quantity</th>
                    <th class="product_total">Total</th>
                  </tr>
                </thead>
                <tbody id="order">
                  <?php $sum_total = 0; ?>
                  <?php foreach ($datacart as $key => $cart) : ?>
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
                      <div class="d-flex flex-column" style="text-align: left;color: #747474;"><a
                          href="#"><?= $cart['tensp'] ?></a>
                        <span><?= 'Màu: '. $mauCL['ten_mau']?></span>
                        <span><?= 'Chất liệu: '.$mauCL['ten_cl']?></span>
                      </div>
                    </td>
                    <td class="product-price"><?= number_format($cart['gia'], 0, '', '.') ?> VNĐ</td>
                    <td class="product_quantity">
                      <input min="1" value="<?= $cart['sl'] ?>" type="number"
                        id="quantity<?= $cart['ma_spct'].$cart['ma_user']?>"
                        oninput="updateQuantity(<?= $cart['ma_spct'] ?>,<?= $cart['ma_user'] ?>, <?= $id ?>)" />
                    </td>
                    <td class="product_total"><?= number_format((int)$cart['gia'] * (int)$cart['sl'], 0, '', '.') ?> VNĐ
                    </td>
                  </tr>
                  <?php $sum_total += ((int)$cart['gia'] * (int)$cart['sl']); ?>
                  <?php endforeach ?>
                  <?php $_SESSION['resultTotal'] = $sum_total; ?>
                </tbody>
              </table>
            </div>
            <div class="cart_submit checkout_btn">
              <a href="?act=cart">Cập nhật giỏ hàng</a>
            </div>
          </div>
        </div>
      </div>

      <!--coupon code area start-->
      <div class=" coupon_area">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="coupon_code right">
              <h3>Tổng giỏ hàng</h3>
              <div class="coupon_inner">
                <!-- <div class="cart_subtotal">
                  <p>Subtotal</p>
                  <p class="cart_amount">215.00 VNĐ</p>
                </div>
                <div class="cart_subtotal">
                  <p>Shipping</p>
                  <p class="cart_amount"><span>Flat Rate:</span> 255.00 VNĐ</p>
                </div>
                <a href="#">Calculate shipping</a> -->

                <div class="cart_subtotal">
                  <p style="font-size: 1.2rem;">Tổng:</p>
                  <p class="cart_amount"><?=number_format($sum_total, 0, '', '.')?> VNĐ</p>
                </div>
                <div class="checkout_btn">
                  <a href="?act=checkout">Mua Hàng</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--coupon code area end-->
    </form>
  </div>
</div>
<!-- shopping cart area end -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
// hàm cập nhật số lượng
function updateQuantity(id, user, index) {
  // lấy giá trị của ô input
  let newQuantity = $('#quantity' + id + user).val();
  if (newQuantity <= 0) {
    newQuantity = 1
  }

  // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
  $.ajax({
    type: 'POST',
    url: './views/cart/updateQuantity.php',
    data: {
      id: id,
      user: user,
      sl: newQuantity
    },
    success: function(response) {
      // Sau khi cập nhật thành công
      $.post('./views/cart/tableCartOrder.php', function(data) {
        $('#order').html(data);
      })
    },
    error: function(error) {
      console.log(error);
    },
  })
}

function removeFormCart(id) {
  if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
    // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
    $.ajax({
      type: 'POST',
      url: './views/cart/removeFormCart.php',
      data: {
        id: id
      },
      success: function(response) {
        // Sau khi cập nhật thành công
        $.post('./views/cart/tableCartOrder.php', function(data) {
          $('#order').html(data);
        })
      },
      error: function(error) {
        console.log(error);
      },
    })
  }
}
</script>