<?php
function insert_binhluan($noidung, $ma_user,$ma_sp,$rate)
{
    $ngay_bl = date('Y-m-d');
    $sql = "insert into binhluan(noi_dung,ma_user,ma_sp,ngay_bl,rate) values('$noidung','$ma_user','$ma_sp','$ngay_bl','$rate')";
    pdo_execute($sql);
}

function loadall_binhluan($ma_sp=0)
{
    $sql = "select * from binhluan where 1";
    if ($ma_sp > 0) $sql .= " and ma_sp = '" . $ma_sp . "'";
    $sql .= " order by ma_sp desc";
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
function binhluan_select_detail($ma_sp)
{
    $sql = "SELECT binhluan.*, username FROM binhluan 
    join users on binhluan.ma_user=users.id
    WHERE trang_thai=1";
    if ($ma_sp > 0) {
        $sql .= " and ma_sp ='" . $ma_sp . "'";
    }
    return pdo_query($sql);
}
function upStatus($id){
    $sql = "UPDATE binhluan SET trang_thai = 1 WHERE id=?";
    pdo_execute($sql, $id);
}