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
include_once './models/cart.php';
include_once './models/donhang.php';
// if(isset($_SESSION['cart'])){
//     $_SESSION['cart'] = [];
// }
$dsdm = loai_select_all();
if(isset($_SESSION['user'])){
    $datacart = cartAll($_SESSION['user']['id']);
}else{
    if(isset($_SESSION['cart'])){
        $datacart = $_SESSION['cart'];
    } else{
        $datacart = [];
    }
}

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
                  if(empty(dangnhap($name,$pswd))){
                    dangky($name, $pswd);
                    $dk = "Đăng ký thành công";
                    $colordk = 'green';
                  } else {
                    $dk = "Tài khoản đã tồn tại";
                  $colordk = 'red';
                  }
                  
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
            $datauser = tai_khoan_select_by_id($_SESSION['user']['id']);
            include_once './views/user/user.php';
            break;
        case 'myorder':
            $datauser = tai_khoan_select_by_id($_SESSION['user']['id']);
            include_once './views/user/myOrder.php';
            break;
        case 'myorderdetail':
            $datauser = tai_khoan_select_by_id($_SESSION['user']['id']);
            include_once './views/user/myOrderDetail.php';
            break;
        case 'product':
            $spshop=sp_shop();
            $errfilter = '';
            if(isset($_GET['iddm'])){
                $spshop=sp_shop($_GET['iddm'],'');
            };
            if(isset($_GET['mau'])){
                $spshop=filterMauCl($_GET['mau'],0);
            };
            if(isset($_GET['cl'])){
                $spshop=filterMauCl(0,$_GET['cl']);
            };
            if(isset($_POST['search'])){
                $spshop=sp_shop($_POST['select'],$_POST['tensp']);
            };
            if(isset($_POST['khoanggia'])){
                if($_POST['max'] < $_POST['min']){
                    $errfilter = 'Vui lòng nhập khoảng giá chính sác';
                } else {
                    $spshop=filterPrice($_POST['max'],$_POST['min']);
                    $errfilter = '';
                }
                
            };
            include_once './views/product/product.php';
            break;
        case 'productdetail':
            $datasp = '';
            if(isset($_GET['masp'])){
                if(isset($_POST['produc_color']) && isset($_POST['produc_cl'])){
                    $datasp = sp_detail_mau_cl($_POST['masp'],$_POST['produc_color'],$_POST['produc_cl']);
                } else{
                    $datasp = sp_detail($_GET['masp']);
                }
                $dsmau = detail_mau($datasp['ma_sp']);
                $dschatlieu = detail_cl($datasp['ma_sp']);
                $dsanh = detail_anh($datasp['ma_sp']);
                $spnew = sp_home($datasp['ma_dm']);
                $databl = binhluan_select_detail($datasp['ma_sp']);
            }
            include_once './views/product/productdetail.php';
            break;
        case 'cart':
            include_once './views/cart/cart.php';
            break;
        case 'checkout':
            $dspttt=select_all_tt();
              if(isset($_SESSION['user'])){
                $name=test_input($_SESSION['user']['username']);
                $address=test_input($_SESSION['user']['dia_tri']);
                $tel=test_input($_SESSION['user']['sdt']);
              } else{
                $name="";
                $address="";
                $tel="";
              }
            include_once './views/product/checkout.php';
            break;

    }
} else {
    include_once './views/home/home.php';
}



include_once './views/components/footer.php';

ob_end_flush();
?>