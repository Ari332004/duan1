 <!-- customer login start -->
 <div class="customer_login mb-5">
   <div class="container">
     <div class="row">
       <!--login area start-->
       <div class="col-lg-6 col-md-6">
         <div class="account_form">
           <h2>Đăng nhập</h2>
           <form action="#" method="post">
             <p>
               <label>Tên đăng nhập <span>*</span></label>
               <input type="text" name="userdn">
             </p>
             <p>
               <label>Mật khẩu <span>*</span></label>
               <input type="password" name="passdn">
             </p>
             <div class="login_submit">
               <a href="#">Quên mật khẩu?</a>
               <label for="remember">
                 <input id="remember" type="checkbox">
                 Remember me
               </label>
               <button type="submit" name="dangnhap">Đăng nhập</button>

             </div>
             <div class="" style="color: <?= $colordn ?>;">
               <p><?= $dn ?></p>
             </div>
           </form>
         </div>
       </div>
       <!--login area start-->

       <!--register area start-->
       <div class="col-lg-6 col-md-6">
         <div class="account_form register">
           <h2>Đăng ký</h2>
           <form action="#" method="post">
             <p>
               <label>Tên đăng nhập <span>*</span></label>
               <input type="text" name="userdk">
             </p>
             <p>
               <label>Mật khẩu <span>*</span></label>
               <input type="password" name="passdk">
             </p>
             <p>
               <label>Xác nhận mật khẩu <span>*</span></label>
               <input type="re_password" name="repassdk">
             </p>
             <div class="login_submit">
               <button type="submit" name="dangky">Đăng ký</button>
             </div>
             <div class="msg" style="color: <?= $colordk ?>;"><?= $dk ?></div>
           </form>
         </div>
       </div>
       <!--register area end-->
     </div>
   </div>
 </div>
 <!-- customer login end -->