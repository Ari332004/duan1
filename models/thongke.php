<?php
function thongke_sp($start_date = null, $end_date = null) {
    $sql = "SELECT DATE(ngay_dat_hang) AS ngay, SUM(tong) AS doanh_thu
    FROM donhang";

    if ($start_date && $end_date) {
        $sql .= " WHERE ngay_dat_hang BETWEEN '$start_date' AND '$end_date'";
    } elseif ($start_date) {
        $sql .= " WHERE ngay_dat_hang >= '$start_date'";
    } elseif ($end_date) {
        $sql .= " WHERE ngay_dat_hang <= '$end_date'";
    }

    $sql .= " GROUP BY DATE(ngay_dat_hang);";
    
    return pdo_query($sql);
}
function thongke_spct()
{
    $sql = "SELECT c.ma_sp, p.ten_sp, m.ten_mau, SUM(c.so_luong) AS tong_so_luong, SUM(d.so_luong) AS so_luong_da_ban,
    CONCAT(ROUND((SUM(d.so_luong) / (SELECT SUM(d2.so_luong) FROM chitietdonhang d2)) * 100, 2), '%') AS ti_le_ban,
    SUM(d.so_luong * p.gia) AS tong_tien_ban
    FROM sanphamchitiet c
    JOIN sanpham p ON c.ma_sp = p.id
    JOIN mau m ON c.ma_mau = m.id
    JOIN chitietdonhang d ON c.id = d.ma_spct
    GROUP BY c.ma_sp, p.ten_sp, m.ten_mau
    ORDER BY so_luong_da_ban DESC";

    return pdo_query($sql);
}
function thongke_sp_theo_nam($year = null) {
    $sql = "SELECT MONTH(ngay_dat_hang) AS thang, SUM(tong) AS doanh_thu
    FROM donhang";
    
    if ($year) {
        $start_date = $year . '-01-01';
        $end_date = $year . '-12-31';
        $sql .= " WHERE ngay_dat_hang BETWEEN '$start_date' AND '$end_date'";
    }
    
    $sql .= " GROUP BY MONTH(ngay_dat_hang);";
    
    return pdo_query($sql);
}
?>