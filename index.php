<?php
include_once './views/components/header.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'home':
            include_once './views/home/home.php';
            break;
        case 'dangky':
            include_once './views/login/dangky.php';
            break;
        case 'dangnhap':
            include_once './views/login/dangnhap.php';
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
        case 'order':
            include_once './views/product/order.php';
            break;
        case 'cart':
            include_once './views/product/cart.php';
            break;

    }
} else {
    include_once './views/home/home.php';
}



include_once './views/components/footer.php';


?>