<div class="tabs-category  container">
    <div class="tab-content clearfix ">
        <div class="tabs-title">
            <div id="" class="tab-title">
                <h3>
                    <span>DANH SÁCH HÓA ĐƠN CỦA BẠN </span>
                </h3>
            </div>
        </div>
    </div>
</div><br>
<?php if (isset($_SESSION['user_main'])) :?>
    <?php if(isset($select)&&!empty($select)):?>
        <div class="">
            <div style="overflow-x: auto">
                <table class=" table table-hover">
                    <tr >
                        <th>Họ Tên</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                        <th>Ghi Chú</th>
                        <th>Trạng Thái</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php foreach ($select as $val):?>
                    <tr>
                        <td><?php echo $val['fullname']?></td>
                        <td><?php echo $val['phone']?></td>
                        <td><?php echo $val['email']?></td>
                        <td><?php echo $val['address']?></td>
                        <td><?php echo $val['note']?></td>
                        <td><?php echo ($val['status']==0)? 'Đang giao hàng':'Đã xong' ?></td>
                        <td class="text-center">
                            <a href="?controller=payment&action=detail&id=<?php echo $val['id']?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if ($val['status']==1):?>
                            <a href="?controller=payment&action=delete&id=<?php echo $val['id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa !')">
                                <i class="fa fa-times"></i>
                            </a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    <?php else:?>
        <div class="contrainer">
            <h3 class="text-center">Bạn chưa mua sản phẩm nào </h3>
        </div>
    <?php endif;?>

<?php else:?>
<div class="container">
    <h3 class="text-center">Vui lòng đăng nhập để xem thông tin hóa đơn của bạn</h3>
</div>
<?php endif;?>
