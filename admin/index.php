<?php
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
        case 'home':
            include_once './views/home/home.php';
            break;
        case 'login':
            include_once './views/login/login.php';
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
    include_once './loai/loai.php';
}



include_once './footer.php';


?>