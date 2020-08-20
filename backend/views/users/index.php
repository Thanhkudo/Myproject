<div class="container">
    <div class="row">
        <div class="col">
            <h3>Danh sách User</h3>
        </div>
        <div class="col text-right" >
            <button class="btn btn-success"><a href="?controller=users&action=create" style="text-decoration: none; color: #fffFff;display: block"><i class="fa fa-plus"></i> Thêm mới</a></button>
        </div>
    </div>
    <br>
    <div style="overflow-x: auto">
        <table class="table" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Full Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Vip</th>
                <th scope="col">Action</th>
                <?php foreach ($select_user as $val):?>
            </tr>
                <td scope="col"><?php echo $val['id']?></td>
                <td scope="col"><?php echo $val['username']?></td>
                <td scope="col"><?php echo $val['fullname']?></td>
                <td scope="col"><?php echo $val['phone']?></td>
                <td scope="col"><?php echo $val['email']?></td>
                <td scope="col"><?php echo ($val['gender']==0)?"Nữ":"Nam"; ?></td>
                <td scope="col"><?php echo $val['address']?></td>
                <td scope="col"><?php echo ($val['vip']==0)?"Member":"Admin"?></td>

                <td>
                <a href="?controller=users&action=detail&id=<?php echo $val['id']?>"><i class="far fa-eye"></i></a>
                <a href="?controller=users&action=update&id=<?php echo $val['id']?>"><i class="fas fa-pencil-alt"></i></a>
                <a href="?controller=users&action=delete&id=<?php echo $val['id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa !')"><i class="far fa-trash-alt"></i></a>
            </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
