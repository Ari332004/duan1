<?php
ob_start();
include_once '../models/pdo.php';
include_once '../models/loai.php';
include_once '../models/sanpham.php';
include_once '../models/sanphamct.php';
include_once '../models/binhluan.php';
include_once '../models/taikhoan.php';
include_once '../models/img.php';
include_once '../models/thongke.php';
include_once '../models/donhang.php';

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
                  include_once './sanphamct/edit_spct.php';
                  break;
                  case 'xoa':
                    if (isset($_GET['idspct'])) {
                      spct_delete($_GET['idspct']);
                    }
                    include_once './sanphamct/sanphamct.php';
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
          
              case 'search':
                include_once './binhluan/search_binhluan.php';
                break;
          }
          break;
        case 'anh':
          switch ($act){
              case 'list':
                include_once './anh/anh.php';
                break;
              case 'edit':
                include_once './anh/edit_anh.php';
                break;
              case 'xoa':
                if (isset($_GET['DIMG'])) {
                  anh_delete($_GET['DIMG']);
                }
                include_once './anh/anh.php';
                break;
            }
            break;
       
              case 'thongke':
                switch ($act){
                    case 'list':
                      include_once './thongke/thongke_sp.php';
                      break;
                    case 'bdngay':
                      include_once './thongke/thongke.php';
                      break;
                    case 'dttt':
                      include_once './thongke/doanhthu_tt.php';
                      break;
                    case 'thbl':
                      include_once './thongke/tonghopBL.php';
                      break;
                    case 'chitietbinhluan':
                      include_once './thongke/chiTietBL.php';
                      break;
                  }
                break;
                case 'donhang':
                  switch ($act) {
                    case 'list':
                      include_once './donhang/donhang.php';
                      break;
                    case 'chitietdh':
                      include_once './donhang/chitietdh.php';
                      break;
                    case 'edit':
            
                      include_once './donhang/edit_trangthai.php';
                      break;
                    }
              break;

    }
} else {
    include_once './sanpham/sanpham.php';
}



include_once './footer.php';

ob_end_flush();
?>