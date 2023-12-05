 <!--footer area start-->
 <footer class="footer_widgets">
   <div class="footer_top">
     <div class="container">
       <div class="row" style="justify-items: center;">
         <div class="col-lg-3 col-md-6 col-sm-6 col-6">
           <div class="widgets_container">
             <h3>Tất cả sản phẩm</h3>
             <div class="footer_menu">
               <ul>
                 <li><a href="index.php?act=product&iddm=1">Gọng Kính</a></li>
                 <li><a href="index.php?act=product&iddm=2">Kính Râm</a></li>
                 <li><a href="index.php?act=product&iddm=3">Kính Thời Trang</a></li>
                 <li><a href="#">Phụ Kiện</a></li>
                 <!-- <li><a href="contact.html">Contact Us</a></li>
                 <li><a href="#">Returns</a></li> -->
               </ul>
             </div>
           </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-6">
           <div class="widgets_container">
             <h3>Chính sách mua hàng</h3>
             <div class="footer_menu">
               <ul>
                 <li><a href="#">Hình thức thanh toán</a></li>
                 <li><a href="#">Chính sách giao hàng</a></li>
                 <li><a href="#">Chính sách bảo hành</a></li>
                 <li><a href="#">Chính sách Bảo Mật</a></li>
               </ul>
             </div>
           </div>
         </div>
         <div class="col-lg-3 col-md-6">
           <div class="widgets_container contact_us">
             <h3>Thông tin liên hệ</h3>
             <div class="footer_contact">
               <p>
                 Địa chỉ: Số 75A, Ngách 139/27 Nguyễn Ngọc Vũ, Tổ 30, P. Trung Hoà, Q. Cầu Giấy, Hà Nội
               </p>
               <p>
                 Hotline:
                 <a href="tel:%2019000359">(+084) 1900 0359</a>
               </p>
               <p>Email: vietntph33724@gamil.com</p>
               <ul>
                 <li>
                   <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                 </li>
                 <li>
                   <a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a>
                 </li>
                 <li>
                   <a href="#" title="facebook"><i class="fa fa-facebook"></i></a>
                 </li>
                 <li>
                   <a href="#" title="youtube"><i class="fa fa-youtube"></i></a>
                 </li>
               </ul>
             </div>
           </div>
         </div>
         <div class="col-lg-3 col-md-6">
           <div class="widgets_container newsletter">
             <h3>Về Shop</h3>
             <div class="newleter-content">
               <p>Giới Thiệu</p>
               <p>Liên Hệ</p>
               <p>Hệ Thống Cửa Hàng</p>
               <img src="./assets/img/about/dmca_protected_sml_120n.png" alt="">
               <div style="height: 60px;" class="mt-2">
                 <img src="./assets/img/about/logoSaleNoti.png" alt="" style="height: 60px;">
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="footer_bottom">
     <div class="container">
       <div class="row">
         <div class="col-lg-6 col-md-6">
           <div class="copyright_area">
             <p>
               &copy; 2021 <strong> </strong> Mede with ❤️ by
               <a href="https://hasthemes.com/" target="_blank"><strong>HasThemes</strong></a>
             </p>
           </div>
         </div>
         <div class="col-lg-6 col-md-6">
           <div class="footer_custom_links">
             <ul>
               <li><a href="#">Order History</a></li>
               <li><a href="wishlist.html">Wish List</a></li>
               <li><a href="#">Newsletter</a></li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </footer>
 <!--footer area end-->

 <script>
function addToCart(maspct, tensp, giasp, anhsp, slsp, mauser) {
  // alert("addToCart")

  // console.log(maspct, tensp, giasp, anhsp, slsp, mauser);
  // Sử dụng jQuery
  $.ajax({
    type: "POST",
    // Đường dẫ tới tệp PHP xử lý dữ liệu
    url: "./views/cart/addToCart.php",
    data: {
      id: maspct,
      name: tensp,
      price: giasp,
      img: anhsp,
      sl: slsp,
      user: mauser,
    },
    success: function(response) {
      alert("Bạn đã thêm sản phẩm vào giỏ hàng thành công!");
    },
    error: function(error) {
      console.log(error);
    },
  });
}
 </script>

 <!-- JS
============================================ -->

 <!-- Plugins JS -->
 <script src="assets/js/plugins.js"></script>

 <!-- Main JS -->
 <script src="assets/js/main.js"></script>

 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


 </body>

 </html>