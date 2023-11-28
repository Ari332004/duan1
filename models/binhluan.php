<?php
function insert_binhluan($noidung, $ma_user,$ma_sp,$ngay_bl)
{
    $sql = "insert into binhluan(noi_dung,ma_user,ma_sp,ngay_bl) values('$noidung','$ma_user',$ma_sp',$ngay_bl')";
    pdo_execute($sql);
}

function loadall_binhluan($ma_sp)
{
    $sql = "select * from binhluan where 1";
    if ($ma_sp > 0) $sql .= " and ma_sp = '" . $ma_sp . "'";
    $sql .= " order by ma_sp";
    $listbl = pdo_query($sql);
    return $listbl;
}
function binhluan_delete($id)
{
    $sql = "DELETE FROM binhluan WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}
function binhluan_select_by_id($ma_user){
    $sql="SELECT * FROM binhluan WHERE ma_user=?";
    return pdo_query_one($sql,$ma_user);
}
function binhluan_select_all($id = 0, $noi_dung = '', $ma_user = 0, $ma_sp = 0)
{
    $sql = "SELECT * FROM binhluan WHERE 1";
    if ($id > 0) {
        $sql .= " and id ='" . $id . "'";
    }
    if ($ma_user != "") {
        $sql .= " and ma_user like '%" . $ma_user . "%'";
    }
    if ($ma_sp > 0) {
        $sql .= " and ma_sp ='" . $ma_sp . "'";
    }
    if ($noi_dung != "") {
        $sql .= " and noi_dung like '%" . $noi_dung . "%'";
    }
    $sql .= " order by id desc";
    return pdo_query($sql);
}                                                                   
function  select_all_blct($id = 0, $noi_dung = '', $username = '', $ten_sp = '',$ngay_bl=''){
    $sql= "SELECT binhluan.id,noi_dung,users.username,sanpham.ten_sp,ngay_bl
    FROM binhluan
    INNER JOIN sanpham on binhluan.ma_sp=sanpham.id
    INNER JOIN users on binhluan.ma_user=users.id
    ";
  
    return pdo_query($sql, $id, $noi_dung, $username, $ten_sp, $ngay_bl);
    
}