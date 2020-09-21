
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Chi tiết hóa đơn</h3>
        </div>
    </div>
    <br>
    <div style="overflow-x: auto">
        <table class="table" >
            <tr>
                <th class="text-center">ID Order</th>
                <th class="text-center">Name SP</th>
                <th class="text-center">Avatar</th>
                <th class="text-center">Quantity</th>
            </tr>
            <?php foreach ($select_detail as $val):?>
                <tr>
                    <td class="text-center"><?php echo $val['id_order']?></td>
                    <td class="text-center"><?php echo $val['name_sp']?></td>
                    <td class="text-center"><img src="assets/images/sanpham/<?php echo $val['avatar']?>" width="100px" alt=""></td>
                    <td class="text-center"><?php echo $val['quantity']?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<?php
echo '<pre>';
print_r($select_detail);
echo '</pre>';
?>