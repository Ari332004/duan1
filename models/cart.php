<?php
  function check_spct_exists($maspct,$user){
    $sql = "SELECT * FROM giohang WHERE ma_spct=? AND ma_user=?";
    return pdo_query($sql,$maspct,$user);
  }

  function updateSL($maspct,$user,$sl=0){
    $sql = "UPDATE giohang ";
    if($sl>0){
      $sql.=" SET sl ='".$sl."'";
    } else {
      $sql.=" SET sl = sl + 1";
    }
    $sql.=" WHERE ma_spct=? AND ma_user=?";
    pdo_execute($sql, $maspct, $user);
  }

  function cart_insert($maspct, $tensp, $giasp, $anhsp, $slsp, $mauser){
    $sql = "INSERT INTO giohang (gia, sl, anh, ma_spct, ma_user, tensp) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $giasp, $slsp, $anhsp, $maspct, $mauser, $tensp);
  }
  // cart_insert($maspct, $tensp, $giasp, $anhsp, $slsp, $mauser);

  function cartAll($id=0){
    $sql = "SELECT * FROM giohang WHERE 1";
    if($id>0){
      $sql.=" and ma_user ='".$id."'";
    }
    return pdo_query($sql);
  }

  function cart_delete($id){
    $sql = "DELETE FROM giohang WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
  }
?>