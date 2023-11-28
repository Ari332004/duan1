  <!--shop  area start-->
  <div class="shop_area shop_reverse mt-5">
    <div class="container">
      <div class="shop_inner_area">
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <!--sidebar widget start-->
            <div class="sidebar_widget">
              <div class="widget_list widget_filter">
                <h2>Lọc theo giá</h2>
                <form action="#">
                  <div id="slider-range"></div>
                  <button type="submit">Lọc</button>
                  <input type="text" name="text" id="amount" />

                </form>
              </div>
              <div class="widget_list widget_categories">
                <h2>Danh mục</h2>
                <ul>
                  <?php foreach ($dsdm as $key => $value) : ?>
                  <li><a href="#"><?= $value['ten_dm'] ?> <span><?= $value['id'] ?></span></a> </li>
                  <?php endforeach ?>

                </ul>
              </div>
              <div class="widget_list widget_categories">
                <h2>Màu</h2>
                <ul>
                  <?php foreach ($dsmau as $key => $value) : ?>
                  <li><a href="#"><?= $value['ten_mau'] ?> <span><?= $value['id'] ?></span></a> </li>
                  <?php endforeach ?>

                </ul>
              </div>
              <div class="widget_list widget_categories">
                <h2>Chất liệu</h2>
                <ul>
                  <?php foreach ($dschatlieu as $key => $value) : ?>
                  <li><a href="#"><?= $value['ten_cl'] ?> <span><?= $value['id'] ?></span></a> </li>
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
              <div class=" niceselect_option">

                <form class="select_option sort_form" action="index.php?act=product" method="post">
                  <select name="orderby" id="short" name="sort"
                    onchange="document.querySelector('.sort_form').submit()">

                    <option selected value="0">Xắp xếp</option>
                    <option value="1">Mới nhất</option>
                    <option value="2">Xắp xếp theo giá từ cao đến thấp</option>
                    <option value="3">Xắp xếp theo giá từ thấp đến cao</option>
                    <option value="4">Xắp xếp theo chữ cái(A-Z)</option>
                    <option value="5">Xắp xếp theo chữ cái(Z-A)</option>
                  </select>
                </form>

              </div>
            </div>
            <!--shop toolbar end-->

            <div class="row shop_wrapper">

              <?php foreach ($spshop as $sp) : ?>
              <div class="col-lg-4 col-md-4 col-12 ">
                <div class="single_product">
                  <div class="product_thumb">
                    <a class="primary_img" href="index.php?act=productdetail&masp=<?= $sp['id'] ?>"><img
                        src="uploads/sanpham/<?= $sp['tenanh']?>" alt=""></a>
                    <div class="product_action">
                      <div class="hover_action">
                        <a href="#"><i class="fa fa-plus"></i></a>
                        <div class="action_button">
                          <ul>
                            <li>
                              <a title="add to cart" href="cart.html"><i class="fa fa-shopping-basket"
                                  aria-hidden="true"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="quick_button">
                      <a href="index.php?act=productdetail&masp=<?= $sp['id'] ?>" title="quick_view">Xem sản phẩm</a>
                    </div>
                  </div>

                  <div class="product_content grid_content">
                    <h3><a href="index.php?act=productdetail&masp=<?= $sp['id'] ?>"><?= $sp['ten_sp'] ?></a></h3>
                    <span class="current_price"><?= $sp['gia'] ?> VNĐ</span>
                  </div>


                  <div class="product_content list_content">
                    <h3><a href="index.php?act=productdetail&masp=<?= $sp['id'] ?>"><?= $sp['ten_sp'] ?></a></h3>
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
                      <span class="current_price"><?= $sp['gia'] ?> VNĐ</span>
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

            <div class="shop_toolbar t_bottom">
              <div class="pagination">
                <ul>
                  <li class="current">1</li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="next"><a href="#">next</a></li>
                  <li><a href="#">>></a></li>
                </ul>
              </div>
            </div>
            <!--shop toolbar end-->
            <!--shop wrapper end-->
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--shop  area end-->