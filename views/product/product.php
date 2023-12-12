  <!--shop  area start-->
  <div class="shop_area shop_reverse mt-5">
    <div class="container">
      <div class="shop_inner_area">
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <!--sidebar widget start-->
            <div class="sidebar_widget">
              <div class="widget_list widget_filter">
                <h2>Khoảng giá</h2>
                <form action="index.php?act=product" method="post">
                  <!-- <div id="slider-range"></div> -->
                  <div class="d-flex justify-content-around mb-3" style="gap: 20px;">
                    <input type="text" style="border: 1px solid gray; width: 40%; text-align: left;" placeholder="Từ"
                      name="min" class="priceMin">
                    <span style="font-size: 30px;">-</span>
                    <input type="text" style="border: 1px solid gray; width: 40%; text-align: left;" placeholder="Đến"
                      name="max" class="priceMax">
                  </div>
                  <button name="khoanggia">Áp dụng</button>
                  <p style="color: red;"><?= $errfilter ?></p>
                  <!-- <input type="text" name="text" id="amount" /> -->
                </form>
              </div>
              <div class="widget_list widget_categories">
                <h2>Danh mục</h2>
                <ul>
                  <?php foreach ($dsdm as $key => $value) : ?>
                  <li><a href="index.php?act=product&iddm=<?= $value['id'] ?>"><?= $value['ten_dm'] ?>
                      <span><?= $value['id'] ?></span></a> </li>
                  <?php endforeach ?>

                </ul>
              </div>
              <div class="widget_list widget_categories">
                <h2>Màu</h2>
                <ul>
                  <?php foreach ($dsmau as $key => $value) : ?>
                  <li><a href="index.php?act=product&mau=<?= $value['id'] ?>"><?= $value['ten_mau'] ?>
                      <span><?= $value['id'] ?></span></a> </li>
                  <?php endforeach ?>

                </ul>
              </div>
              <div class="widget_list widget_categories">
                <h2>Chất liệu</h2>
                <ul>
                  <?php foreach ($dschatlieu as $key => $value) : ?>
                  <li><a href="index.php?act=product&cl=<?= $value['id'] ?>"><?= $value['ten_cl'] ?>
                      <span><?= $value['id'] ?></span></a> </li>
                  <?php endforeach ?>

                </ul>
              </div>

            </div>
            <!--sidebar widget end-->
          </div>
          <div class="col-lg-9 col-md-12">
            <!--shop wrapper start-->
            <!--shop toolbar start-->
            <div class="shop_title">
              <h1>shop</h1>
            </div>
            <div class="shop_toolbar_wrapper">
              <div class="shop_toolbar_btn">

                <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                  title="3"></button>

                <button data-role="grid_4" type="button" class="btn-grid-4" data-toggle="tooltip" title="4"></button>

                <button data-role="grid_5" type="button" class="btn-grid-5" data-toggle="tooltip" title="5"></button>

                <!-- <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                  title="List"></button> -->
              </div>
              <!-- <div class=" niceselect_option">

                <form class="select_option sort_form" method="post">
                  <select name="orderby" id="sortOption" name="sort" onchange="sortProducts()">
                    <option value="1">Mới nhất</option>
                    <option value="2">Xắp xếp theo giá từ cao đến thấp</option>
                    <option value="3">Xắp xếp theo giá từ thấp đến cao</option>
                    <option value="4">Xắp xếp theo chữ cái(A-Z)</option>
                    <option value="5">Xắp xếp theo chữ cái(Z-A)</option>
                  </select>
                </form>

              </div> -->
            </div>
            <!--shop toolbar end-->

            <div class="row shop_wrapper" id="products">

              <?php foreach ($spshop as $sp) : ?>
              <div class="col-lg-4 col-md-4 col-12 spdon">
                <div class="single_product">
                  <div class="product_thumb">
                    <a class="primary_img" href="index.php?act=productdetail&masp=<?= $sp['maspct'] ?>"><img
                        src="uploads/sanpham/<?= $sp['anhsp']?>" alt=""></a>
                    <div class="product_action">
                      <div class="hover_action">
                        <a href="#"><i class="fa fa-plus"></i></a>
                        <div class="action_button">
                          <ul>
                            <li>
                              <a title="add to cart"
                                onclick="addToCart(<?= $sp['maspct'] ?>, '<?= $sp['ten_sp'] ?>', <?= $sp['gia'] ?>, '<?= $sp['anhsp'] ?>', 1, <?= isset($_SESSION['user'])?$_SESSION['user']['id']:0; ?>)"><i
                                  class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="quick_button">
                      <a href="index.php?act=productdetail&masp=<?= $sp['maspct'] ?>" title="quick_view">Xem sản
                        phẩm</a>
                    </div>
                  </div>

                  <div class="product_content grid_content">
                    <h3><a class="current_name"
                        href="index.php?act=productdetail&masp=<?= $sp['maspct'] ?>"><?= $sp['ten_sp'] ?></a></h3>
                    <span class="current_price"><?= number_format($sp['gia'], 0, '', ',') ?>₫</span>
                  </div>


                  <div class="product_content list_content">
                    <h3><a href="index.php?act=productdetail&masp=<?= $sp['maspct'] ?>"><?= $sp['ten_sp'] ?></a></h3>
                    <div class="product_ratting">
                      <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                      </ul>
                    </div>
                    <div class="product_price">
                      <span class="current_price"><?= number_format($sp['gia'], 0, '', ',') ?>₫</span>
                    </div>
                    <div class="product_desc">
                      <p><?= $sp['mota'] ?>
                      </p>
                    </div>

                  </div>

                </div>
              </div>
              <?php endforeach ?>
            </div>

            <!-- <div class="shop_toolbar t_bottom">
              <div class="pagination">
                <ul>
                  <li class="current">1</li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="next"><a href="#">next</a></li>
                  <li><a href="#">>></a></li>
                </ul>
              </div>
            </div> -->
            <!--shop toolbar end-->
            <!--shop wrapper end-->
          </div>
        </div>
      </div>

    </div>
  </div>
  <script>
const priceMinInput = document.querySelector('.priceMin');
const priceMaxInput = document.querySelector('.priceMax');

priceMinInput.addEventListener('input', () => {
  if (!priceMinInput.value.match(/^\d+$/)) {
    priceMinInput.value = '';
  }
});

priceMaxInput.addEventListener('input', () => {
  if (!priceMaxInput.value.match(/^\d+$/)) {
    priceMaxInput.value = '';
  }
});
  </script>
  <!--shop  area end-->