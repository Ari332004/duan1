<?php
  function select_all_tt(){
    $sql = "SELECT * FROM thanhtoan WHERE 1";
    return pdo_query($sql);
  }

function selectall_donhang()
{
  $sql = "SELECT donhang.id, username, donhang.phone, donhang.dia_tri, donhang.ngay_dat_hang, thanhtoan.mota, donhang.tong,trangthaidh.mota,donhang.ma_ttdh
    FROM donhang 
    JOIN users ON donhang.ma_user = users.id 
    JOIN trangthaidh ON donhang.ma_ttdh=trangthaidh.id
    JOIN thanhtoan ON donhang.ma_tt = thanhtoan.id";
  return pdo_query($sql);
}
function selectall_ctdh($id)
{
  $sql = "SELECT chitietdonhang.id ,chitietdonhang.ten,chitietdonhang.gia,chitietdonhang.so_luong,chitietdonhang.anh
    FROM chitietdonhang
    WHERE chitietdonhang.ma_dh=?
    ";

  return pdo_query($sql, $id);
}

function ctdh_update($id, $ma_ttdh)
{
  $sql = "UPDATE donhang SET ma_ttdh=? WHERE id=?";
  pdo_execute($sql, $ma_ttdh, $id);
}
function select_trangthai_by_id($idctdh)
{
  $sql = " SELECT  donhang.id,donhang.id as ctdh , trangthaidh.id,trangthaidh.mota 
    FROM trangthaidh
    JOIN donhang ON trangthaidh.id=donhang.ma_ttdh
    WHERE donhang.id=?
    ";

  return pdo_query_one($sql, $idctdh);
}

function selectall_trangthaidh()
{
  $sql = "SELECT * FROM trangthaidh";
  return pdo_query($sql);
}
?>