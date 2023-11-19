<?php
include_once '../controllers/admin/sanphamController.php';

include_once './header.php';


if (isset($_GET['page']) && isset($_GET['act'])) {
    $page = $_GET['page'];
    $act = $_GET['act'];

    switch ($page) {
        case 'sanpham':
          switch ($act){
            case 'list':
              include_once './sanpham/sanpham.php';
              break;
            case 'edit':
              include_once './sanpham/edit_sanpham.php';
              break;
            case 'search':
              include_once './sanpham/search_sanpham.php';
              break;
          }
          break;
        case 'taikhoan':
            switch ($act){
                case 'list':
                  include_once './taikhoan/taikhoan.php';
                  break;
                case 'edit':
                  include_once './taikhoan/edit_taikhoan.php';
                  break;
                case 'search':
                  include_once './taikhoan/search_taikhoan.php';
                  break;
              }
            break;
        case 'sanphamct':
            switch ($act){
                case 'list':
                  include_once './sanphamct/sanphamct.php';
                  break;
                case 'edit':
                  include_once './sanphamct/edit_sanphamct.php';
                  break;
                case 'search':
                  include_once './sanphamct/search_sanphamct.php';
                  break;
              }
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

    }
} else {
    include_once './sanpham/sanpham.php';
}



include_once './footer.php';


?>