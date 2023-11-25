<?php
ob_start();
include_once '../models/pdo.php';
include_once '../models/loai.php';
include_once '../models/sanpham.php';
include_once '../models/binhluan.php';
include_once '../models/taikhoan.php';

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
            case 'xoa':
              if(isset($_GET['DSP'])){
                  san_pham_delete($_GET['DSP']);
                
              }
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
                case 'xoa':
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
        case 'loai':
          switch ($act){
            case 'list':
              include_once './loai/loai.php';
              break;
            case 'edit':
              include_once './loai/edit_loai.php';
              break;
            case 'search':
              include_once './loai/search_loai.php';
              break;
          }
            break;
        case 'binhluan':
          switch ($act) {
            case 'list':
              include_once './binhluan/binhluan.php';
              break;
            case 'xoa':
              if (isset($_GET['idBL'])) {
                binhluan_delete($_GET['idBL']);
              }
              include_once './binhluan/binhluan.php';
              break;
            case 'search':  
              include_once './binhluan/search_binhluan.php';
              break;
          }
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

ob_end_flush();
?>