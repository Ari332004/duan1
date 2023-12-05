<?php
function selectall_donhang()
{
  $sql = "SELECT donhang.id, users.username, donhang.phone, donhang.dia_tri, donhang.ngay_dat_hang, thanhtoan.mota, trangthaidh.mota AS trang_thai 
  FROM donhang JOIN users ON donhang.ma_user = users.id 
  JOIN thanhtoan ON donhang.ma_tt = thanhtoan.id 
  JOIN trangthaidh ON donhang.ma_tt = trangthaidh.id;";
   
  return pdo_query($sql);
}
function selectall_ctdh($id)
{
  $sql = "SELECT chitietdonhang.id ,chitietdonhang.ten,chitietdonhang.gia,chitietdonhang.so_luong,chitietdonhang.anh, trangthaidh.mota
    FROM chitietdonhang
    JOIN trangthaidh ON chitietdonhang.ma_ttdh=trangthaidh.id
    WHERE chitietdonhang.ma_dh=?

    ";

  return pdo_query($sql, $id);
}

function ctdh_update($id, $ma_ttdh)
{
  $sql = "UPDATE chitietdonhang SET ma_ttdh=? WHERE id=?";
  pdo_execute($sql, $ma_ttdh, $id);
}
function select_trangthai_by_id($idctdh)
{
  $sql = " SELECT  chitietdonhang.ma_dh,chitietdonhang.id as ctdh , trangthaidh.id,trangthaidh.mota 
    FROM trangthaidh
    JOIN chitietdonhang ON trangthaidh.id=chitietdonhang.ma_dh
    WHERE chitietdonhang.id=?
    ";

  return pdo_query_one($sql, $idctdh);
}

function selectall_trangthaidh()
{
  $sql = "SELECT * FROM trangthaidh ";
  return pdo_query($sql);
}
