<?php
function anh_insert($img_url,$ma_sp){
    $sql = "INSERT INTO anh(img_url,ma_sp) VALUES(?,?)";
    pdo_execute($sql, $img_url,$ma_sp);
  }
  function anh_select_all($ten_sp="",$ma_sp=0,$id=0,$img_url=''){
    $sql  = "SELECT anh.*, sanpham.ten_sp FROM anh JOIN sanpham ON anh.ma_sp = sanpham.id WHERE 1";
    if($id>0){
      $sql.=" and id ='".$id."'";
    }
    if($ten_sp!=""){
        $sql.=" and ten_sp like '%".$ten_sp."%'";
    }
    if($img_url!=""){
        $sql.=" and img_url like '%".$img_url."%'";
    }
    if($ma_sp>0){
        $sql.=" and ma_sp ='".$ma_sp."'";
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