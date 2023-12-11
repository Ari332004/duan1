<?php
  function select_all_tt(){
    $sql = "SELECT * FROM thanhtoan WHERE 1";
    return pdo_query($sql);
  }

function selectall_donhang($user=0,$tt=0)
{
  $sql = "SELECT donhang.id, username, donhang.phone, donhang.dia_tri, donhang.ngay_dat_hang, thanhtoan.mota, donhang.tong,trangthaidh.mota,donhang.ma_ttdh,donhang.hovaten
    FROM donhang 
    LEFT  JOIN users ON donhang.ma_user = users.id 
    JOIN trangthaidh ON donhang.ma_ttdh=trangthaidh.id
    JOIN thanhtoan ON donhang.ma_tt = thanhtoan.id
    WHERE 1";
  if ($user > 0) {
    $sql .= " and ma_user ='" . $user . "'";
  }
  if ($tt > 0) {
    $sql .= " and donhang.ma_ttdh ='" . $tt . "'";
  }
  return pdo_query($sql);
}
function selectall_ctdh($id)
{
  $sql = "SELECT chitietdonhang.id ,chitietdonhang.ten,chitietdonhang.gia,chitietdonhang.so_luong,chitietdonhang.anh,chitietdonhang.ma_spct
    FROM chitietdonhang
    WHERE chitietdonhang.ma_dh=?
    ";

  return pdo_query($sql, $id);
}
function insert_dh_return_id($mauser,$phone,$diatri,$tt, $total,$fullname){
  $sql="INSERT INTO donhang(ma_user, phone, dia_tri, ma_tt, tong, hovaten) VALUES (?,?,?,?,?,?);
  SELECT LAST_INSERT_ID();";
  return pdo_execute_return_lastInsertID($sql,$mauser,$phone,$diatri,$tt, $total,$fullname);
}
function insert_dhct($spct,$dh,$gia,$sl,$anh,$ten){
  $sql = "INSERT INTO chitietdonhang(ma_spct, ma_dh, gia, so_luong, anh, ten) VALUES (?,?,?,?,?,?)";
  pdo_execute($sql,$spct,$dh,$gia,$sl,$anh,$ten);
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