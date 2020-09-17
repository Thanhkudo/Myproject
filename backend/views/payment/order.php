<div class="container">
    <div class="row">
        <div class="col">
            <h3>Danh sách Hóa đơn</h3>
        </div>
    </div>
    <br>
    <div style="overflow-x: auto">
        <table class="table" >
            <tr>
                <th scope="col">ID</th>
                <!--<th scope="col">User Name</th>-->
                <th scope="col">Full Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Tổng tiền </th>
                <th scope="col">Ph.thức thanh toán</th>
                <th scope="col">Ph.thức vận chuyển</th>
                <th scope="col">Trạng thái</th>
                <th scope="col class="text-center"">Action</th>
            </tr>
            <?php foreach ($select_order as $val):?>
                <tr>
                    <td scope="col"><?php echo $val['id']?></td>
                    <!--<td scope="col"><?php echo $val['id_user']?></td>-->
                    <td scope="col"><?php echo $val['fullname']?></td>
                    <td scope="col"><?php echo $val['phone']?></td>
                    <td scope="col"><?php echo $val['email']?></td>
                    <td scope="col"><?php echo $val['address']?></td>
                    <td scope="col"><?php echo $val['note']?>
                    <td scope="col"><?php echo $val['price']?></td>
                    <td scope="col" ><?php echo ($val['payment']==1)?"Thanh toán trực tiếp":"Chuyển khoản nhân hàng"; ?></td>
                    <td scope="col" ><?php echo ($val['shipping']==1)?"Giao hàng tận nhà":"nhận tại của hàng"; ?></td>
                    <td scope="col" ><?php echo ($val['status']==0)?"Chờ thanh toán":"Đã xong"; ?></td>

                    <td class="text-center">
                        <a href="?controller=payment&action=detail&id=<?php echo $val['id']?>"><i class="far fa-eye"></i></a>
                        <?php if ($_SESSION['user_main']['vip']==2): ?>
                            <a href="?controller=payment&action=update&id=<?php echo $val['id']?>"><i class="fas fa-edit"></i></a>
                            <?php if ($val['status']==1):?>
                            <a href="?controller=payment&action=delete&id=<?php echo $val['id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa !')"><i class="far fa-trash-alt"></i></a>
                            <?php endif;?>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <nav aria-label="Page navigation example">
            <?php echo $pagination?>
        </nav>
    </div>
</div>
