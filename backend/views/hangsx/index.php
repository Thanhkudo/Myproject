<div class="container">
    <div class="row">
        <div class="col">
            <h3>Các hãng Sản phẩm</h3>
        </div>
            <div class="col text-right" >
                <button class="btn btn-success"><a href="?controller=hangsx&action=create" style="text-decoration: none; color: #fffFff;display: block"><i class="fa fa-plus"></i> Thêm mới</a></button>
            </div>
    </div>
    <br>
    <div style="overflow-x: auto">
        <table class="table" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên Hãng</th>
                <th scope="col">Ghi chú</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            <?php foreach ($select_hang as $val):?>
                <tr>
                    <td scope="col"><?php echo $val['id_hangsx']?></td>
                    <td scope="col"><?php echo $val['name_hangsx']?></td>
                    <td scope="col"><?php echo $val['note']?></td>
                    <td class="text-center">
                            <a href="?controller=hangsx&action=update&id=<?php echo $val['id_hangsx']?>"><i class="fas fa-edit"></i></a>
                            <a href="?controller=hangsx&action=delete&id=<?php echo $val['id_hangsx']?>" onclick="return confirm('Bạn chắc chắn muốn xóa !')"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <nav aria-label="Page navigation example">
            <?php echo $pagination ?>
        </nav>
    </div>
</div>
<?php
echo "<pre>";
print_r($select_hang);
echo "</pre>";
?>
