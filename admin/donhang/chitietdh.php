<?php $dataAll = selectall_ctdh($_GET['dh']); ?>
<form action="" method="post" enctype="multipart/form-data">
    <legend class="text-center mb-4">Chi tiết đơn hàng</legend>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th scope="col">Mã</th>
                <th scope="col">Tên Sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Ảnh sản phẩm</th>
                <th scope="col">Trạng thái đơn hàng</th>
                
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataAll as $key => $value) : ?>
                <tr>
                    <td></td>
                    <td><?= $value['id']; ?></td>
                    <td><?= $value['ten']; ?></td>
                    <td><?= $value['gia']; ?></td>
                    <td><?= $value['so_luong']; ?> </td>
                    <td><img src="../uploads/sanpham/<?=$value['anh']?>" style="  "width="85px"></td>
                    <td><?= $value['mota']; ?></td>
                    <td> </td>
                   
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</form>
</div>
</div>