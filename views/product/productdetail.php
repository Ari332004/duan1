<?php

$errbl = '';
  if(isset($_POST['guiBL'])){
    if ($_POST['comment']!='') {
      if (isset($_SESSION['user'])) {
        insert_binhluan($_POST['comment'],$_SESSION['user']['id'],$_GET['masp'],$_POST['rating']);
        header("Location: index.php?act=productdetail&masp=".$_GET['masp']);
      } else {
        $errbl = 'Vui lòng đăng nhập để gửi bình luận';
      }
    } else {
      $errbl = 'Vui lòng nhập nội dung bình luận';
    }
    
  }
?>
<!--product details start-->
<div class="product_details mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5">
        <div class="product-details-tab">
          <div id="img-1" class="zoomWrapper single-zoom">
            <a href="#">
              <img id="zoom1" src="uploads/sanpham/<?= $datasp['anhsp'] ?>"
                data-zoom-image="uploads/sanpham/<?= $datasp['anhsp'] ?>" alt="big-1" />
            </a>
          </div>

          <div class="single-zoom-thumb">
            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
              <?php foreach ($dsanh as $key => $value) : ?>
              <li>
                <a href="#" class="elevatezoom-gallery active" data-update=""
                  data-image="uploads/sanpham/<?= $value['img_url'] ?>"
                  data-zoom-image="uploads/sanpham/<?= $value['img_url'] ?>">
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
                <li class="review"><a href="#product_d_info"> Write a review </a></li>
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
              <input type="number" min="1" oninput="sl()" class="product_quantity" />
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
<div class="product_d_info" id="product_d_info">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="product_d_inner">
          <div class="product_info_button">
            <ul class="nav" role="tablist">
              <li>
                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                  aria-selected="false">Mô Tả</a>
              </li>
              <li id="review_form">
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
                  <?= $datasp['mota'] ?>
                </p>
              </div>
              <?php foreach ($databl as $bl) : ?>
              <div class="product_info_inner">
                <div class="product_ratting mb-10">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-star <?= $bl['rate']<1?'star_gray':'' ?>"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star <?= $bl['rate']<2?'star_gray':'' ?>"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star <?= $bl['rate']<3?'star_gray':'' ?>"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star <?= $bl['rate']<4?'star_gray':'' ?>"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star <?= $bl['rate']<5?'star_gray':'' ?>"></i></a>
                    </li>
                  </ul>
                  <p><?= $bl['ngay_bl']?></p>
                </div>
                <div class="product_demo">
                  <strong><?= $bl['username']?></strong>
                  <p><?= $bl['noi_dung']?></p>
                </div>
              </div>
              <?php endforeach ?>
              <div class="product_review_form">
                <form action="" method="post">
                  <h2>Bình luận</h2>
                  <div class="row">
                    <div class="col-12">
                      <div style="display: flex; align-items: self-start; gap: 5px;">

                        <label for="review_comment">Đánh giá của bạn về sản phẩm </label>
                        <div class="rating">
                          <input type="radio" id="star1" name="rating" value="1" hidden />
                          <i id="star1" class="rating__star fa fa-star"></i>
                          <input type="radio" id="star2" name="rating" value="1" hidden />
                          <i id="star2" class="rating__star fa fa-star"></i>
                          <input type="radio" id="star3" name="rating" value="1" hidden />
                          <i id="star3" class="rating__star fa fa-star"></i>
                          <input type="radio" id="star4" name="rating" value="1" hidden />
                          <i id="star4" class="rating__star fa fa-star"></i>
                          <input type="radio" id="star5" name="rating" value="1" hidden />
                          <i id="star5" class="rating__star fa fa-star"></i>
                        </div>
                      </div>

                      <input type="number" name="rating" id="rating-input" value="5" hidden />
                      <textarea name="comment" id="review_comment"></textarea>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6">
                         <label for="author">Name</label>
                         <input id="author" type="text" />
                       </div>
                       <div class="col-lg-6 col-md-6">
                         <label for="email">Email </label>
                         <input id="email" type="text" />
                       </div> -->
                  </div>
                  <button name="guiBL">Gửi</button>
                  <p style="color: red;"><?= $errbl?></p>
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
          <h2>Sản phẩm cùng loại</h2>
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
<script>
function sl() {
  console.log(document.querySelector(".product_quantity").value);
  if (document.querySelector(".product_quantity").value <= 0) {
    document.querySelector(".product_quantity").value = 1;
  }
}
const ratingStars = [...document.getElementsByClassName("rating__star")];
const ratingInput = document.getElementById("rating-input");

function executeRating(stars) {
  const starClassActive = "rating__star fa fa-star";
  const starClassInactive = "rating__star fa fa-star star_gray";
  const starsLength = stars.length;
  let i;
  stars.map((star) => {
    star.onclick = () => {
      i = stars.indexOf(star);

      if (star.className === starClassInactive) {
        ratingInput.value = i + 1;
        for (i; i >= 0; --i) stars[i].className = starClassActive;
      } else {
        ratingInput.value = i;
        for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
      }
    };
  });
}
executeRating(ratingStars);
</script>