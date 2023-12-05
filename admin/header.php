<?php 
  $page = 'page='.$_GET['page'] ?? 'page=sanpham';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
    integrity="sha512-Oy+sz5W86PK0ZIkawrG0iv7XwWhYecM3exvUtMKNJMekGFJtVAhibhRPTpmyTj8+lJCkmWfnpxKgT2OopquBHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
  table .bi-check-circle-fill {
    color: green;
  }

  table .bi-x-circle-fill {
    color: red;
  }

  table .btn.btn-danger {
    font-size: 14px;
  }

  .hide {
    display: none;
  }
  </style>
  <link rel="stylesheet" href="./admin.css" />
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar" class="active">
      <div class="sidebar-header" id="sidebar-title">
        <h3><i class="bi bi-person-circle"></i> Admin</h3>
        <strong><i class="bi bi-list"></i></strong>
      </div>

      <ul class="list-unstyled components">
        <li class="<?= $_GET['act'] == 'list' ? 'active':''?>">
          <a href="./index.php?<?= $page?>&act=list">
            <i class="bi bi-list-ul"></i>
            List
          </a>
        </li>
        <?php if($page != 'page=binhluan'):?>
        <li class="<?= $_GET['act'] == 'edit' ? 'active':''?>">
          <a href="index.php?<?= $page?>&act=edit">
            <i class="bi bi-pencil-square"></i>
            Edit
          </a>
        </li>
        <?php endif?>
        <li class="<?= $_GET['act'] == 'search' ? 'active':''?>">
          <a href="./index.php?<?= $page?>&act=search">
            <i class="bi bi-search"></i>
            Search
          </a>
        </li>
        <li class="<?= $_GET['act'] == 'statistical' ? 'active':''?>">
          <a href="./index.php?<?= $page?>&act=statistical">
            <i class="bi bi-clipboard-data"></i>
            statistical
          </a>
        </li>
        <li class="">
          <a href="../index.php">
            <i class="bi bi-box-arrow-left"></i>
            Logout
          </a>
        </li>
      </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= ($page == 'page=sanpham' || $page == 'page=sanphamct' || $page == 'page=anh') ? 'active':''?>"
                  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sản Phẩm
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" href="./index.php?page=sanpham&act=list">Sản Phẩm
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./index.php?page=sanphamct&act=list">Sản phẩm chi tiết
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./index.php?page=anh&act=list">Ảnh sản phẩm
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $page == 'page=taikhoan' ? 'active':''?>"
                  href="./index.php?page=taikhoan&act=list">Tài khoản</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $page == 'page=binhluan' ? 'active':''?>"
                  href="./index.php?page=binhluan&act=list">Bình luận</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $page == 'page=loai' ? 'active':''?>" href="./index.php?page=loai&act=list">Danh
                  mục</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $page == 'page=donhang' ? 'active':''?>"
                  href="./index.php?page=donhang&act=list">Đơn hàng</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= ($page == 'page=sanpham' || $page == 'page=sanphamct' || $page == 'page=anh') ? 'active':''?>"
                  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Thống kê
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!-- <li>
                    <a class="dropdown-item" href="./index.php?page=sanpham&act=list">Doanh thu theo tuần
                    </a>
                  </li> -->
                  <li>
                    <a class="dropdown-item" href="./index.php?page=thongke&act=dttt">Doanh thu theo tháng
                    </a>
                  </li>
                  <!-- <li>
                    <a class="dropdown-item" href="./index.php?page=thongke&act=list">Sản phẩm
                    </a>
                  </li> -->
                  <li>
                    <a class="dropdown-item" href="./index.php?page=thongke_sp&act=list">Sản phẩm 
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>