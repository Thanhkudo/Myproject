<div class="tabs-category  container">
    <div class="tab-content clearfix ">
        <div class="tabs-title">
            <div id="" class="tab-title">
                <h3>
                    <span>CHI TIẾT HÓA ĐƠN </span>
                </h3>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div style="overflow-x: auto">
        <table class="table table-hover" >
            <tr>
                <th class="text-center">Tên SP</th>
                <th class="text-center">Ảnh</th>
                <th class="text-center">Số Lượng</th>
            </tr>
            <?php foreach ($select_detail as $val):?>
                <tr>
                    <td class="text-center"><a href="?controller=sanpham&id=<?php echo $val['id_sp']?>"><?php echo $val['name_sp']?></a></td>
                    <td class="text-center"><img src="../backend/assets/images/sanpham/<?php echo $val['avatar']?>" width="150px" alt=""></td>
                    <td class="text-center"><?php echo $val['quantity']?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>