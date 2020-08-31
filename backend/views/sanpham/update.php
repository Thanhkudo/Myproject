<div class="container col-8">
    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Sửa sản phẩm</h3>
            <hr>
            <label for="namesp">Tên sản phẩm <span style="color: red">*</span></label>
            <input type="text" name="namesp" id="namesp" class="form-control" value="<?php echo isset($_POST['namesp'])?$_POST['namesp']:$select_sp['name_sp']?>"><br>

            <label for="loaisp">Loại sản phẩm </label>
            <select name="loaisp" id="loaisp" class="form-control">
                <option value="-1">--Chọn loại sản phẩm --</option>
                <?php foreach ($select_loaisp as $loaisp):
                    $selected_loaisp='';
                    if ($loaisp['id_loaisp']==$select_sp['id_loaisp']){
                        $selected_loaisp='selected';
                    }
                    ?>
                    <option value="<?php echo $loaisp['id_loaisp']?>" <?php echo $selected_loaisp;?>><?php echo $loaisp['name_loaisp'] ?></option>
                <?php endforeach;?>

            </select>

            <label for="hangsx">Hãng sản xuất  </label>
            <select name="hangsx" id="hangsx" class="form-control">
                <option value="-1">--Chọn hãng sản phẩm --</option>

                <?php foreach ($select_hangsx as $hangsx):
                    $selected_hangsx='';
                    if ($hangsx['id_hangsx']==$select_sp['id_hangsx']){
                        $selected_hangsx='selected';
                    }?>
                    <option value="<?php echo $hangsx['id_hangsx']?>" <?php echo $selected_hangsx;?>> <?php echo $hangsx['name_hangsx']?></option>
                <?php endforeach;?>

            </select><br>

            <label for="noibat">Thông tin nổi bật </label>
            <textarea name="noibat" id="noibat" class="form-control"><?php echo isset($_POST['noibat']) ? $_POST['noibat'] : $select_sp['noibat'] ?></textarea><br>

            <label for="mota">Mô tả sản phẩm </label>
            <textarea  name="mota" id="mota" class="form-control"><?php echo isset($_POST['mota'])?$_POST['mota']:$select_sp['mota_sp']?></textarea><br>

            <label for="thongso">Thông số sản phẩm </label>
            <textarea name="thongso" id="thongso" class="form-control" ><?php echo isset($_POST['thongso'])?$_POST['thongso']:$select_sp['thongso_sp']?></textarea><br>

            <label for="avatar">Ảnh sản phẩm </label>
            <input type="file" name="avatar" id="avatar" class="form-control" value="">
            <?php if (!empty($select_sp['avatar'])):?>
                <img height="100px" src="assets/images/sanpham/<?php echo $select_sp['avatar'] ?>"/> -->
            <?php endif;?>
            <img src="#" alt="" id="img-preview" style="display: none" width="150px" height="100px"><br>

            <label for="sale">Giảm giá (%)</label>
            <input type="number" name="sale" id="sale" class="form-control" value="<?php echo isset($_POST['sale'])?$_POST['sale']:$select_sp['sale']?>"><br>

            <label for="giasp">Giá sản phẩm </label>
            <input type="number" name="giasp" id="giasp" class="form-control" value="<?php echo isset($_POST['giasp'])?$_POST['giasp']:$select_sp['gia_sp']?>"><br>

            <label for="trangthai">Trạng thái </label>
            <select name="trangthai" id="trangthai" class="form-control">
                <?php
                $het='';
                $con='';
                switch ($select_sp['status']){
                    case 0:
                        $het = 'selected';
                        break;
                    case 1:
                        $con = 'selected';
                        break;
                }
                if (isset($_POST['trangthai'])){
                    switch ($_POST['trangthai']){
                        case 0:
                            $het = 'selected';
                            break;
                        case 1:
                            $con = 'selected';
                            break;
                    }
                }
                ?>
                <option value="0" <?php echo $het?>>Hết hàng</option>
                <option value="1" <?php echo $con?>>Còn hàng</option>
            </select><br>


            <input type="submit" value="Save" name="submit" class="btn btn-primary">
            <button class="btn btn-light"><a href="?controller=sanpham">Cancel</a></button>

        </form>
    </div>
</div>
<?php
?>