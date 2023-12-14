<?php
function loai_insert($ten_loai){
  $sql = "INSERT INTO danhmuc(ten_dm) VALUES(?)";
  pdo_execute($sql, $ten_loai);
}

function loai_update($id, $ten_loai){
  $sql = "UPDATE danhmuc SET ten_dm=? WHERE id=?";
  pdo_execute($sql, $ten_loai, $id);
}

function loai_delete($id){
  $sql = "DELETE FROM danhmuc WHERE id=?";
  if(is_array($id)){
      foreach ($id as $ma) {
          pdo_execute($sql, $ma);
      }
  }
  else{
      pdo_execute($sql, $id);
  }
}

function loai_select_all($id=0,$keyten=''){
  $sql = "SELECT * FROM danhmuc WHERE 1";
  if($id>0){
    $sql.=" and id ='".$id."'";
  }
  if($keyten!=""){
      $sql.=" and ten_dm like '%".$keyten."%'";
  }
  $sql.=" and status = 0";
  return pdo_query($sql);
}

function loai_select_by_id($id){
  $sql = "SELECT * FROM danhmuc WHERE id=? and status = 0";
  return pdo_query_one($sql,$id);
}
function xoaMemLoai($id){
  $sql= "UPDATE danhmuc SET status = 1 WHERE id = ?";
    pdo_execute($sql, $id);
}
?>