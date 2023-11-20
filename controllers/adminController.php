<?php
include_once '../models/pdo.php';
include_once '../models/loai.php';
include_once '../models/sanpham.php';
function loai() {
  $dataAll = loai_select_all();

  if (isset($_GET['DTL'])) {
    loai_delete($_GET['DTL']);

    header('Location: index.php?act=loai');
  }

  $arrID = [];

  function deleteItems()
  {
    foreach ($_POST['check'] as $id) {
      $arrID[] = $id;
    }
    loai_delete_multi($arrID);

    header('Location: index.php?act=loai');
  }

  function loai_delete_multi($arrID)
  {
    foreach ($arrID as $id) {
      loai_delete($id);
    }
  }

  if (isset($_POST['btnDelete'])) {
    deleteItems();
  }
  include_once './loai/loai.php';
}

function loai_them_sua(){
  $msg = "";
  $h2 = "THÊM MỚI DANH MỤC";
  $idTL = $_GET['idTL'] ?? "";
  if ($idTL != "") {
    $h2 = "CHỈNH SỬA DANH MỤC";
    $result = loai_select_by_id($idTL);
  } else {
  }
  if (isset($_POST['submit'])) {
    $name = $_POST['name'] ?? "";
    $id = $_POST['id'] ?? "";
    if ($name != "" && $id != "") {
      if ($idTL != "") {
        $kq = loai_update($id, $name);
        $msg = "Chỉnh sửa thành công";
        $color = "green";
      } else {
        $kq = loai_insert($name);
        $msg = "Thêm mới thành công";
        $color = "green";
      }
    } else {
      $msg = "Vui lòng nhập đầy đủ thông tin";
      $color = "red";
    }
  }
  include_once './loai/edit_loai.php';
}

function loai_search(){
  $dataAll = loai_select_all();
  if (isset($_POST['find'])) {
    $name = $_POST['name'] ?? "";
    $id = $_POST['id'] ?? 0;
    $dataAll = loai_select_all($id, $name);
  }
  include_once './loai/search_loai.php';
}
?>