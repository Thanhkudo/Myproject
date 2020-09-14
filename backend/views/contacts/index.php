<div class="container">
    <div class="row">
        <div class="col">
            <h3>Thông tin phản hồi</h3>
        </div>
            <div class="col text-right" >

            </div>
    </div>
    <br>
    <div style="overflow-x: auto">
        <table class="table" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID User</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ngày</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            <?php foreach ($select_ph as $val):?>
                <tr>
                    <td scope="col"><?php echo $val['id']?></td>
                    <td scope="col"><?php echo $val['id_user']?></td>
                    <td scope="col"><?php echo $val['name']?> </td>
                    <td scope="col"><?php echo $val['email']?> </td>
                    <td scope="col"><?php echo $val['phone']?> </td>
                    <td scope="col"><?php echo $val['address']?> </td>
                    <td scope="col"><?php echo $val['title']?> </td>
                    <td scope="col"><?php echo $val['content']?> </td>
                    <td scope="col"><?php echo $val['created_at']?></td>
                    <td class="text-center">
                        <a href="?controller=contact&action=delete&id=<?php echo $val['id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa !')"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <nav aria-label="Page navigation example">
            <?php echo $pagination ?>
        </nav>
    </div>
    <?php
    echo "<pre>";
    print_r($select_ph);
    echo "</pre>";
    ?>
</div>
