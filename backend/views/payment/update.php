<div class="container col-8">
    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Sửa Hóa Đơn</h3>
            <hr>
            <label for="fullname">Họ và tên <span style="color: red">*</span></label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:$select_update['fullname']?>"><br>

            <label for="sale">Phone <span style="color: red">*</span></label>
            <input type="number" name="phone" id="phone" class="form-control" value="<?php echo isset($_POST['phone'])?$_POST['phone']:$select_update['phone']?>"><br>

            <label for="sale">Email <span style="color: red">*</span></label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($_POST['email'])?$_POST['email']:$select_update['email']?>"><br>

            <label for="sale">Address <span style="color: red">*</span></label>
            <input type="text" name="address" id="address" class="form-control" value="<?php echo isset($_POST['address'])?$_POST['address']:$select_update['address']?>"><br>

            <label for="note">Ghi chú </label>
            <textarea name="note" id="note" class="form-control" ><?php echo isset($_POST['note'])?$_POST['note']:$select_update['note']?></textarea><br>

            <label for="price">Tổng tiền </label>
            <input type="number" name="price" id="price" class="form-control" value="<?php echo isset($_POST['price'])?$_POST['price']:$select_update['price']?>"><br>

            <label for="payment">Phương thức thanh toán  </label>
            <select name="payment" id="payment" class="form-control">
                <?php $selected1='';$selected2=''; ($select_update['payment']==0)? $selected1='selected':$selected2='selected';?>
                <option value="1" <?php echo $selected1;?>> Thanh toán khi nhận hàng</option>
                <option value="2" <?php echo $selected2;?>> Thanh toán trực tuyến</option>
            </select><br>

            <label for="shipping">Phương thức vận chuyển  </label>
            <select name="shipping" id="shipping" class="form-control">
                <?php $selected1='';$selected2=''; ($select_update['shipping']==0)? $selected1='selected':$selected2='selected';?>
                <option value="1" <?php echo $selected1;?>> Nhận tại cửa hàng</option>
                <option value="2" <?php echo $selected2;?>> Nhận tại nhà</option>
            </select><br>

            <label for="status">Trạng thái </label>
            <select name="status" id="status" class="form-control">
                <?php $selected0='';$selected1=''; ($select_update['status']==0)? $selected0='selected':$selected1='selected';?>
                <option value="0" <?php echo $selected0;?>> Đang vận chuyển</option>
                <option value="1" <?php echo $selected1;?>> Đã xong</option>
            </select><br>


            <input type="submit" value="Save" name="submit" class="btn btn-primary">
            <button class="btn btn-light"><a href="?controller=payment">Cancel</a></button>

        </form>
    </div>
</div>
<?php
?>