<?php
session_start();
include_once './models/pdo.php';
include_once './models/taikhoan.php';


include_once './views/components/header.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'home':
            include_once './views/home/home.php';
            break;
        case 'login':
            $dk = '';
            $dn = '';
            if (isset($_POST['dangnhap'])) {
                $user = $_POST['userdn'];
                $pass = $_POST['passdn'];
                $taikhoan = dangnhap($user, $pass);
                if($user != '' && $pass != ''){
                    if (is_array($taikhoan)) {
                        $_SESSION['user'] = $taikhoan;
                        $dn = "Đăng nhập thành công";
                        $colordn = 'green';
                        // Chuyen huong trang chu hoac admin 
                        header("location: index.php");
                    } else {
                        $dn = "Thông tin đăng nhập sai";
                        $colordn = 'red';
                    }
                }else{
                    $dn = "Vui lòng nhập đầy đủ thông tin";
                    $colordn = 'red';
                }
                
            }
            
            if (isset($_POST['dangky'])) {
              $name = $_POST['userdk'];
              $pswd = $_POST['passdk'];
              $repswd = $_POST['repassdk'];
              if ($name != '' && $pswd != '' && $pswd == $repswd) {
                  dangky($name, $pswd);
                  $dk = "Đăng ký thành công";
                  $colordk = 'green';
              } else {
            
                  $dk = "Vui lòng nhập đầy đủ và đúng thông tin";
                  $colordk = 'red';
              }
            }
            include_once './views/login/login.php';
            break;
        case 'dangxuat':
            dangxuat();
            include_once './views/home/home.php';
            break;
        case 'quenmk':
            include_once './views/login/quenmk.php';
            break;
        case 'user':
            include_once './views/user/user.php';
            break;
        case 'product':
            include_once './views/product/product.php';
            break;
        case 'productdetail':
            include_once './views/product/productdetail.php';
            break;
        case 'cart':
            include_once './views/product/cart.php';
            break;
        case 'checkout':
            include_once './views/product/checkout.php';
            break;

    }
} else {
    include_once './views/home/home.php';
}



include_once './views/components/footer.php';


?>