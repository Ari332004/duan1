<?php $dataAll = selectall_donhang(); ?>
<form action="" method="post">
    <legend class="text-center mb-4">Danh sách đơn hàng</legend>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th scope="col">Mã</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Phương thức thanh toán</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataAll as $key => $value) : ?>
                <tr>
                    <td></td>
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['username']; ?></td>
                    <td><?= $value['phone']; ?></td>
                    <td><?= $value['dia_tri']; ?> </td>
                    <td><?= $value['ngay_dat_hang']; ?></td>
                    <td><?= $value['mota']; ?></td>
                    <td> </td>
                    <td>
                        <a href="index.php?dh=<?= $value['id']; ?>&page=donhang&act=chitietdh" class="btn btn-danger" >
                            Chi tiết đơn hàng
                        </a>
                       
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</form>
</div>
</div>