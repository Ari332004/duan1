<?php
$dataAll = loadall_binhluan(0);

?>
<form action="" method="post">
    <legend class="text-center mb-4">Danh sách bình luận</legend>

    <div class="container" style="max-width: 90%">
        <div class="row mb10 mt-2">
            <a href="#" class="col-auto"><input class="btn btn-primary mr10 checked" type="button"
                    value="CHỌN TẤT CẢ"></a>
            <a href="#" class="col-auto"><input class="btn btn-primary mr10 unchecked" type="button"
                    value="BỎ CHỌN TẤT CẢ"></a>
            <a href="#" class="col-auto"><input class="btn btn-primary mr10" type="submit" name="btnDelete"
                    value="XÓA CÁC MỤC ĐÃ CHỌN"></a>

        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">ID</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Mã KH</th>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Ngày bình luận</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataAll as $binhluan) {
                    extract($binhluan);

                ?>

                <tr>
                    <td><input type="checkbox"></td>
                    <td><?= $id ?></td>
                    <td><?= $noi_dung ?></td>
                    <td><?= $ma_user ?></td>
                    <td><?= $ma_sp ?></td>
                    <td><?= $ngay_bl ?></td>
                    <td>
                        <a href="index.php?idBL=<?= $id ?>&page=binhluan&act=xoa" class="btn btn-danger"
                            onclick="confirm('Bạn có muốn xóa hay không?')">
                            Xóa
                        </a>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</form>

</div>
</div>