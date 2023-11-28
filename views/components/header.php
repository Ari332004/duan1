<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Kính mắt</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

  <!-- CSS 
    ========================= -->

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="assets/css/plugins.css" />

  <!-- Main Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!-- Main Wrapper Start -->
  <!--Offcanvas menu area start-->
  <div class="off_canvars_overlay"></div>
  <div class="offcanvas_menu">
    <div class="canvas_open">
      <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
    </div>
    <div class="offcanvas_menu_wrapper">
      <div class="canvas_close">
        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
      </div>
      <div class="welcome_text">
        <ul>
          <li>
            <span>Free Delivery:</span> Take advantage of our time to save
            event
          </li>
          <li><span>Free Returns *</span> Satisfaction guaranteed</li>
        </ul>
      </div>
      <div class="search_bar">
        <form action="?act=product" method="post">
          <select class="select_option" name="select" id="categori">
            <option selected value="0">All</option>
            <?php foreach ($dsdm as $dm) : ?>
            <option value="<?= $dm['id']?>"><?= $dm['ten_dm']?></option>
            <?php endforeach ?>
          </select>
          <input placeholder="Tìm kiếm" type="text" name="tensp" />
          <button type="submit" name='search'><i class="ion-ios-search-strong"></i></button>
        </form>
      </div>
      <div class="cart_area">
        <div class="middel_links">
          <ul>
            <li><a href="login.html">Login</a></li>
            <li>/</li>
            <li><a href="login.html">Register</a></li>
          </ul>
        </div>
        <div class="cart_link">
          <a href="?act=cart"><i class="fa fa-shopping-basket"></i>2 item(s)</a>
          <!--mini cart-->
          <div class="mini_cart">
            <div class="cart_item top">
              <div class="cart_img">
                <a href="#"><img src="assets/img/s-product/product.jpg" alt="" /></a>
              </div>
              <div class="cart_info">
                <a href="#">Apple iPhone SE 16GB</a>

                <span>1x $60.00</span>
              </div>
              <div class="cart_remove">
                <a href="#"><i class="ion-android-close"></i></a>
              </div>
            </div>
            <div class="cart_item bottom">
              <div class="cart_img">
                <a href="#"><img src="assets/img/s-product/product2.jpg" alt="" /></a>
              </div>
              <div class="cart_info">
                <a href="#">Marshall Portable Bluetooth</a>
                <span> 1x $160.00</span>
              </div>
              <div class="cart_remove">
                <a href="#"><i class="ion-android-close"></i></a>
              </div>
            </div>
            <div class="cart__table">
              <table>
                <tbody>
                  <tr>
                    <td class="text-left">Sub-Total :</td>
                    <td class="text-right">$150.00</td>
                  </tr>

                  <tr>
                    <td class="text-left">Total :</td>
                    <td class="text-right">$184.00</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="cart_button view_cart">
              <a href="?act=cart">View Cart</a>
            </div>
            <div class="cart_button checkout">
              <a href="?act=checkout">Checkout</a>
            </div>
          </div>
          <!--mini cart end-->
        </div>
      </div>
      <div id="menu" class="text-left">
        <ul class="offcanvas_main_menu">
          <li class="active">
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="index.php?act=product">Shop</a>
          </li>
          <li><a href="index.php?act=product&iddm=2">Kính râm</a></li>
          <li><a href="index.php?act=product&iddm=1">Gọng kính</a></li>
          <li class="menu-item-has-children">
            <a href="my-account.html">my account</a>
          </li>
        </ul>
      </div>
      <div class="offcanvas_footer">
        <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
        <ul>
          <li class="facebook">
            <a href="#"><i class="fa fa-facebook"></i></a>
          </li>
          <li class="twitter">
            <a href="#"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="pinterest">
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
          </li>
          <li class="google-plus">
            <a href="#"><i class="fa fa-google-plus"></i></a>
          </li>
          <li class="linkedin">
            <a href="#"><i class="fa fa-linkedin"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--Offcanvas menu area end-->

  <!--header area start-->
  <header class="header_area header_three">
    <!--header top start-->
    <div class="header_top">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-7 col-md-12">
            <div class="welcome_text">
              <ul>
                <li>
                  <span>Free Delivery:</span> Take advantage of our time to
                  save event
                </li>
                <li><span>Free Returns *</span> Satisfaction guaranteed</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-5 col-md-12">
            <div class="top_right text-right">
              <ul>
                <li class="top_links">
                  <a href="#">Account <i class="ion-chevron-down"></i></a>
                  <ul class="dropdown_links">
                    <?php if (!isset($_SESSION['user'])) { ?>
                    <li><a href="index.php?act=login">Đăng nhập</a></li>
                    <li><a href="index.php?act=login">Đăng ký</a></li>
                    <?php } else { ?>
                    <li><a href="index.php?act=hoso">Hồ sơ</a></a></li>
                    <li><a href="index.php?act=dangxuat">Đăng xuất</a></a></li>
                    <?php if($_SESSION['user']['vai_tro'] == 1): ?>
                    <li><a href="admin/index.php?page=sanpham&act=list">Quản trị</a></li>
                    <?php endif; ?>
                    <?php } ?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--header top start-->

    <!--header middel start-->
    <div class="header_middel">
      <div class="container-fluid">
        <div class="middel_inner">
          <div class="row align-items-center">
            <div class="col-lg-4">
              <div class="search_bar">
                <form action="#">
                  <select class="select_option" name="select" id="categori">
                    <option selected value="0">All</option>
                    <?php foreach ($dsdm as $dm) : ?>
                    <option value="<?= $dm['id']?>"><?= $dm['ten_dm']?></option>
                    <?php endforeach ?>
                  </select>
                  <input placeholder="Tìm kiếm" type="text" />
                  <button type="submit">
                    <i class="ion-ios-search-strong"></i>
                  </button>
                </form>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="logo">
                <a href="index.php"><img src="assets/img/logo/logo.png" alt="" /></a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="cart_area">
                <div class="cart_link">
                  <a href="?act=cart"><i class="fa fa-shopping-basket"></i>2 item(s)</a>
                  <!--mini cart-->
                  <div class="mini_cart">
                    <div class="cart_item top">
                      <div class="cart_img">
                        <a href="#"><img src="assets/img/s-product/product.jpg" alt="" /></a>
                      </div>
                      <div class="cart_info">
                        <a href="#">Apple iPhone SE 16GB</a>

                        <span>1x $60.00</span>
                      </div>
                      <div class="cart_remove">
                        <a href="#"><i class="ion-android-close"></i></a>
                      </div>
                    </div>
                    <div class="cart_item bottom">
                      <div class="cart_img">
                        <a href="#"><img src="assets/img/s-product/product2.jpg" alt="" /></a>
                      </div>
                      <div class="cart_info">
                        <a href="#">Marshall Portable Bluetooth</a>
                        <span> 1x $160.00</span>
                      </div>
                      <div class="cart_remove">
                        <a href="#"><i class="ion-android-close"></i></a>
                      </div>
                    </div>
                    <div class="cart__table">
                      <table>
                        <tbody>
                          <tr>
                            <td class="text-left">Sub-Total :</td>
                            <td class="text-right">$150.00</td>
                          </tr>

                          <tr>
                            <td class="text-left">Total :</td>
                            <td class="text-right">$184.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="cart_button view_cart">
                      <a href="?act=cart">View Cart</a>
                    </div>
                    <div class="cart_button checkout">
                      <a href="checkout.html">Checkout</a>
                    </div>
                  </div>
                  <!--mini cart end-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="horizontal_menu">
          <div class="left_menu">
            <div class="main_menu">
              <nav>
                <ul>
                  <li class="active">
                    <a href="index.php">Home</a>
                  </li>
                  <li class="mega_items">
                    <a href="index.php?act=product">Shop</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="logo_container">
            <a href="index.php"><img src="assets/img/logo/logo.png" alt="" /></a>
          </div>
          <div class="right_menu">
            <div class="main_menu">
              <nav>
                <ul>
                  <li><a href="index.php?act=product&iddm=2">Kính râm</a></li>
                  <li><a href="index.php?act=product&iddm=1">Gọng kính</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="main_menu_inner">
              <div class="main_menu">
                <nav>
                  <ul>
                    <li class="active"><a href="index.php">Home </a></li>
                    <li><a href="index.php?act=product">Shop </a></li>
                    <li><a href="index.php?act=product&iddm=2">Kính râm</a></li>
                    <li><a href="index.php?act=product&iddm=1">Gọng kính</a></li>
                    <li><a href="index.php?act=product&iddm=3">Kính thời trang</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--header bottom end-->
  </header>
  <!--header area end-->