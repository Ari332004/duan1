    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area product_bread">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumb_content">
              <ul>
                <li><a href="index.html">home</a></li>
                <li>/</li>
                <li>product details</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5">
            <div class="product-details-tab">
              <div id="img-1" class="zoomWrapper single-zoom">
                <a href="#">
                  <img id="zoom1" src="uploads/sanpham/<?= $datasp['tenanh'] ?>"
                    data-zoom-image="uploads/sanpham/<?= $datasp['tenanh'] ?>" alt="big-1" />
                </a>
              </div>

              <div class="single-zoom-thumb">
                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                  <?php foreach ($dsanh as $key => $value) : ?>
                  <li>
                    <a href="#" class="elevatezoom-gallery active" data-update=""
                      data-image="uploads/sanpham/<?= $value['img_url'] ?>"
                      data-zoom-image="uploads/sanpham/product4.jpg">
                      <img src="uploads/sanpham/<?= $value['img_url'] ?>" alt="zo-th-1" />
                    </a>
                  </li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7">
            <div class="product_d_right">
              <form action="#">
                <h1><?= $datasp['ten_sp'] ?></h1>
                <div class="product_ratting">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star"></i></a>
                    </li>
                    <li class="review"><a href="#"> 1 review </a></li>
                    <li class="review"><a href="#"> Write a review </a></li>
                  </ul>
                </div>
                <div class="product_price">
                  <span class="current_price"><?= $datasp['gia'] ?> VNĐ</span>
                </div>
                <div class="product_desc">
                  <p>
                    <?= $datasp['mota'] ?>
                  </p>
                </div>

                <div class="product_variant color">
                  <h3>Màu</h3>
                  <select class="niceselect_option" id="color" name="produc_color">
                    <option selected value="0">Chọn màu</option>
                    <?php foreach ($dsmau as $key => $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['ten_mau'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="product_variant color">
                  <h3>Chất liệu</h3>
                  <select class="niceselect_option" id="color" name="produc_cl">
                    <option selected value="0">Chọn chất liệu</option>
                    <?php foreach ($dschatlieu as $key => $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['ten_cl'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="product_variant quantity">
                  <label>Số lượng</label>
                  <input min="1" max="<?= $datasp['so_luong'] ?>" value="1" type="number" />
                  <button class="button" type="submit">Thêm vào giỏ hàng</button>
                </div>
              </form>
              <div class="priduct_social">
                <h3>Share on:</h3>
                <ul>
                  <li>
                    <a href="#"><i class="fa fa-rss"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-vimeo"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-tumblr"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="product_d_inner">
              <div class="product_info_button">
                <ul class="nav" role="tablist">
                  <li>
                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                      aria-selected="false">More info</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                      aria-selected="false">Reviews</a>
                  </li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="info" role="tabpanel">
                  <div class="product_info_content">
                    <p>
                      <?= $datasp['mota'] ?>
                    </p>
                  </div>
                </div>

                <div class="tab-pane fade" id="reviews" role="tabpanel">
                  <div class="product_info_content">
                    <p>
                      Fashion has been creating well-designed collections since
                      2010. The brand offers feminine designs delivering stylish
                      separates and statement dresses which have since evolved
                      into a full ready-to-wear collection in which every item
                      is a vital part of a woman's wardrobe. The result? Cool,
                      easy, chic looks with youthful elegance and unmistakable
                      signature style. All the beautiful pieces are made in
                      Italy and manufactured with the greatest attention. Now
                      Fashion extends to a range of accessories including shoes,
                      hats, belts and more!
                    </p>
                  </div>
                  <div class="product_info_inner">
                    <div class="product_ratting mb-10">
                      <ul>
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-star"></i></a>
                        </li>
                      </ul>
                      <strong>Posthemes</strong>
                      <p>09/07/2018</p>
                    </div>
                    <div class="product_demo">
                      <strong>demo</strong>
                      <p>That's OK!</p>
                    </div>
                  </div>
                  <div class="product_review_form">
                    <form action="#">
                      <h2>Add a review</h2>
                      <p>
                        Your email address will not be published. Required
                        fields are marked
                      </p>
                      <div class="row">
                        <div class="col-12">
                          <label for="review_comment">Your review </label>
                          <textarea name="comment" id="review_comment"></textarea>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <label for="author">Name</label>
                          <input id="author" type="text" />
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <label for="email">Email </label>
                          <input id="email" type="text" />
                        </div>
                      </div>
                      <button type="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--product info end-->



    <!--product section area start-->
    <section class="product_section upsell_product">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section_title">
              <h2>Related Products</h2>
              <p>
                Contemporary, minimal and modern designs embody the Lavish Alice
                handwriting
              </p>
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
                        src="uploads/sanpham/<?= $sp['tenanh']?>" alt="" /></a>
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