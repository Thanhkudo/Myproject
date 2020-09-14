<div class="container">
    <div class="row">
        <div class="col">
            <h3>Danh sách Sản phẩm</h3>
        </div>
            <div class="col text-right" >
                <button class="btn btn-success"><a href="?controller=sanpham&action=create" style="text-decoration: none; color: #fffFff;display: block"><i class="fa fa-plus"></i> Thêm mới</a></button>
            </div>
    </div>
    <br>
    <div style="overflow-x: auto">
        <table class="table" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên sp</th>
                <th scope="col">Loại sp</th>
                <th scope="col">Hãng sx</th>
                <th scope="col">Ảnh sp</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Sale</th>
                <th scope="col">Giá</th>
                <th scope="col">Giá Sale</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            <?php foreach ($select_sp as $val):?>
                <tr>
                    <td scope="col"><?php echo $val['id_sp']?></td>
                    <td scope="col"><?php echo $val['name_sp']?></td>
                    <?php foreach ($select_loaisp as $loai):
                        if ($val['id_loaisp']==$loai['id_loaisp']):?>
                            <td scope="col"><?php echo $loai['name_loaisp']?></td>
                    <?php endif;?>
                    <?php endforeach;?>
                    <?php foreach ($select_hangsx as $hang):
                        if ($val['id_hangsx']==$hang['id_hangsx']):?>
                            <td scope="col"><?php echo $hang['name_hangsx']?></td>
                        <?php endif;?>
                    <?php endforeach;?>
                    <td scope="col">
                        <img height="100px" width="100px" src="assets/images/sanpham/<?php echo $val['avatar'] ?>"/>
                    </td>
                    <?php
                    $status='';
                    switch ($val['status']){
                        case 0:
                            $status='Hết hàng';
                            break;
                        case 1:
                            $status='Còn hàng';
                            break;
                    }
                    ?>
                    <td scope="col"><?php echo $status?></td>
                    <td scope="col"><?php echo $val['sale']?> %</td>
                    <td scope="col"><?php echo number_format($val['gia_sp'])?> VNĐ</td>
                    <td scope="col"><?php echo number_format($val['gia_sp'] - $val['gia_sp'] * $val['sale'] / 100)?> VNĐ</td>

                    <td class="text-center">
                            <a href="?controller=sanpham&action=update&id=<?php echo $val['id_sp']?>"><i class="fas fa-edit"></i></a>
                            <a href="?controller=sanpham&action=delete&id=<?php echo $val['id_sp']?>" onclick="return confirm('Bạn chắc chắn muốn xóa !')"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <nav aria-label="Page navigation example">
            <?php echo $pagination ?>
        </nav>
    </div>
</div>
