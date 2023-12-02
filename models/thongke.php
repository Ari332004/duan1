<?php
function thongke_sp($ma_sp = 0, $ten_sp = "") {
    $sql = "SELECT c.ma_sp, p.ten_sp, m.ten_mau,cl.ten_cl, SUM(c.so_luong) AS tong_so_luong, SUM(c.luot_xem) AS tong_luot_xem
    FROM sanphamchitiet c
    JOIN sanpham p ON c.ma_sp = p.id
    JOIN mau m ON c.ma_mau = m.id
    JOIN chatlieu cl ON c.ma_cl = cl.id";
    
    if ($ma_sp > 0) {
        $sql .= " WHERE c.ma_sp = '".$ma_sp."'";
    }
    
    if ($ten_sp != "") {
        $sql .= " AND p.ten_sp LIKE '%".$ten_sp."%'";
    }
    
    $sql .= " GROUP BY c.ma_sp, p.ten_sp, m.ten_mau";
    
    return pdo_query($sql);
}
function thongke_spct(){
    $sql="SELECT c.ma_sp, p.ten_sp, m.ten_mau, SUM(c.so_luong) AS tong_so_luong, SUM(c.luot_xem) AS tong_luot_xem, SUM(d.so_luong) AS so_luong_da_ban, 
    SUM(c.so_luong) - SUM(d.so_luong) AS so_luong_con_lai,
    CONCAT(ROUND((SUM(d.so_luong) / SUM(c.so_luong)) * 100, 2), '%') AS ti_le_ban,
    SUM(d.so_luong * p.gia) AS tong_tien_ban
FROM sanphamchitiet c
JOIN sanpham p ON c.ma_sp = p.id
JOIN mau m ON c.ma_mau = m.id
JOIN chitietdonhang d ON c.id = d.ma_spct
GROUP BY c.ma_sp, p.ten_sp, m.ten_mau
ORDER BY so_luong_da_ban DESC;
    ";
    return pdo_query($sql);
}

?>