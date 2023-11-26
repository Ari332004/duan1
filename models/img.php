<?php
function anh_insert($img_url,$ma_sp){
    $sql = "INSERT INTO anh(img_url,ma_sp) VALUES(?,?)";
    pdo_execute($sql, $img_url,$ma_sp);
  }
  function anh_select_all($keyten="",$iddm=0,$idsp=0,$keymota=''){
    $sql  = "SELECT sanpham.*, anh.img_url,anh.ma_sp FROM sanpham JOIN anh ON sanpham.id = anh.ma_sp WHERE 1";
    if($idsp>0){
      $sql.=" and id ='".$idsp."'";
    }
    if($keyten!=""){
        $sql.=" and ten_sp like '%".$keyten."%'";
    }
    if($iddm>0){
        $sql.=" and ma_sp ='".$iddm."'";
    }
    if($keymota!=""){
      $sql.=" and mota like '%".$keymota."%'";
  }
    $sql.=" order by id desc";
    return pdo_query($sql);
}
  function anh_delete($ma_sp){
    $sql = "DELETE FROM anh WHERE ma_sp=?";
    if(is_array($ma_sp)){
        foreach ($ma_sp as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_sp);
    }
  }
  function anh_select_by_id($id){
    $sql = "SELECT * FROM anh WHERE id=?";
    return pdo_query_one($sql,$id);
  }
  function anh_update($id, $img_url,$ma_sp){
    $sql = "UPDATE anh SET img_url=?,ma_sp=? WHERE id=?";
    pdo_execute($sql, $img_url,$ma_sp, $id);
  }
?>