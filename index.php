<?php
include_once './views/components/header.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
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
        case 'checkout':
            include_once './views/product/checkout.php';
            break;

    }
} else {
    include_once './views/home/home.php';
}



include_once './views/components/footer.php';


?>