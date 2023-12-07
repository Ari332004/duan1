<!--slider area start-->
<div class="slider_area slider_style home_three_slider owl-carousel">
  <div class="single_slider" data-bgimg="assets/img/banner/banner4.jpg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="slider_content content_one">
            <img src="assets/img/slider/content3.png" alt="" />
            <p>
              the wooboom clothing summer collection is back at half price
            </p>
            <a href="index.php?act=product">Discover Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="single_slider" data-bgimg="assets/img/banner/banner2.jpg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="slider_content content_two">
            <img src="assets/img/slider/content4.png" alt="" />
            <p>
              the wooboom clothing summer collection is back at half price
            </p>
            <a href="index.php?act=product">Discover Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="single_slider" data-bgimg="assets/img/banner/banner3.jpg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="slider_content content_three">
            <img src="assets/img/slider/content5.png" alt="" />
            <p>
              the wooboom clothing summer collection is back at half price
            </p>
            <a href="index.php?act=product">Discover Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--slider area end-->

<!--banner area start-->
<div class="banner_section banner_section_three">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="banner_area">
          <div class="banner_thumb">
            <a href="index.php?act=product"><img src="assets/img/banner/banner7.jpg" alt="#" /></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="banner_area">
          <div class="banner_thumb">
            <a href="index.php?act=product"><img src="assets/img/banner/banner8.jpg" alt="#" /></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="banner_area bottom">
          <div class="banner_thumb">
            <a href="index.php?act=product"><img src="assets/img/banner/banner13.jpg" alt="#" /></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--banner area end-->

<!--product section area start-->
<section class="product_section womens_product">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section_title">
          <h2>Sản phẩm của chúng tôi</h2>
          <p>Các sản phẩm thiết kế hiện đại,mới nhất</p>
        </div>
      </div>
    </div>
    <div class="product_area">
      <div class="tab-content">
        <div class="product_container">
          <div class="row product_column4">
            <?php foreach ($spnew as $sp) : ?>
            <div class="col-lg-3">
              <div class="single_product">
                <div class="product_thumb">
                  <a class="primary_img" href="index.php?act=productdetail&masp=<?= $sp['id'] ?>"><img
                      src="uploads/sanpham/<?= $sp['anhsp']?>" alt="" /></a>
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
                    <a href="index.php?act=productdetail" title="quick_view">Xem sản phẩm</a>
                  </div>
                </div>
                <div class="product_content">
                  <h3>
                    <a href="index.php?act=productdetail"><?= $sp['ten_sp'] ?></a>
                  </h3>
                  <span class="current_price"><?= $sp['gia'] ?> VNĐ</span>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--product section area end-->

<!--banner area start-->
<section class="banner_section banner_section_three">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="banner_area">
          <div class="banner_thumb">
            <a href="index.php?act=product"><img src="assets/img/banner/banner15.jpg" alt="#" /></a>
            <div class="banner_content">
              <h1>
                Owndays <br />
                500 store
              </h1>
              <a href="index.php?act=product">Discover Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="banner_area">
          <div class="banner_thumb">
            <a href="index.php?act=product"><img src="assets/img/banner/banner14.jpg" alt="#" /></a>
            <div class="banner_content">
              <h1>
                Memory <br />
                Metal
              </h1>
              <a href="index.php?act=product">Discover Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--banner area end-->

<!--product section area start-->
<section class="product_section womens_product bottom">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section_title">
          <h2>Sản phẩm thịnh hành</h2>
          <p>Sản phẩm ấn tượng và bán chạy nhất</p>
        </div>
      </div>
    </div>
    <div class="product_area">
      <div class="row">
        <div class="product_carousel product_three_column4 owl-carousel">
          <?php foreach ($spnew as $sp) : ?>
          <div class="col-lg-3">
            <div class="single_product">
              <div class="product_thumb">
                <a class="primary_img" href="index.php?act=productdetail&masp=<?= $sp['id'] ?>"><img
                    src="uploads/sanpham/<?= $sp['anhsp']?>" alt="" /></a>
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
                  <a href="index.php?act=productdetail" title="quick_view">Xem sản phẩm</a>
                </div>
              </div>
              <div class="product_content">
                <h3>
                  <a href="index.php?act=productdetail"><?= $sp['ten_sp'] ?></a>
                </h3>
                <span class="current_price"><?= $sp['gia'] ?> VNĐ</span>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!--product section area end-->