<?php
ob_start();
session_start();
include_once './models/pdo.php';
include_once './models/taikhoan.php';
include_once './models/sanpham.php';
include_once './models/sanphamct.php';
include_once './models/img.php';
include_once './models/binhluan.php';
include_once './models/loai.php';

$dsdm = loai_select_all();

include_once './views/components/header.php';

$spnew = sp_home();
$dsmau = select_mau();
$dschatlieu = select_cl();

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
                        header("Location: index.php");
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
            $spshop=sp_shop();
            if(isset($_GET['iddm'])){
                $spshop=sp_shop($_GET['iddm'],'');
            };
            if(isset($_POST['search'])){
                $spshop=sp_shop($_POST['select'],$_POST['tensp']);
            };
            if(isset($_POST['sort'])){
                echo '<script>alert("ok")</script>';
            };
            include_once './views/product/product.php';
            break;
        case 'productdetail':
            $datasp = '';
            if(isset($_GET['masp'])){
                $datasp = sp_detail($_GET['masp']);
                $dsmau = detail_mau($datasp['ma_sp']);
                $dschatlieu = detail_cl($datasp['ma_sp']);
                $dsanh = detail_anh($datasp['ma_sp']);
                $spnew = sp_home($datasp['ma_dm']);
            }
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

ob_end_flush();
?>