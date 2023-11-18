<?php 
  $page = 'page='.$_GET['page'] ?? 'sanpham';
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
        <li class="active">
          <a href="./index.php?<?= $page?>&act=list">
            <i class="bi bi-list-ul"></i>
            List
          </a>
        </li>
        <li class="">
          <a href="index.php?<?= $page?>&act=edit">
            <i class="bi bi-pencil-square"></i>
            Edit
          </a>
        </li>
        <li class="">
          <a href="./index.php?<?= $page?>&act=search">
            <i class="bi bi-search"></i>
            Search
          </a>
        </li>
        <li class="">
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
          <a class="navbar-brand" href="./index.php?page=sanpham&act=list">Sản phẩm</a>
        </div>
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php?page=sanphamct&act=list">Chi tiết sản phẩm</a>
        </div>
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php?page=taikhoan&act=list">Tài khoản</a>
        </div>
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php?page=binhluan&act=list">Bình luận</a>
        </div>
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php?page=loai&act=list">Danh mục</a>
        </div>
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php?page=donhang&act=list">Đơn hàng</a>
        </div>
      </nav>