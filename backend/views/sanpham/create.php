<div class="container col-8">
    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Thêm sản phẩm</h3>
            <hr>
            <label for="namesp">Tên sản phẩm <span style="color: red">*</span></label>
            <input type="text" name="namesp" id="namesp" class="form-control" value="<?php echo isset($_POST['namesp'])?$_POST['namesp']:""?>"><br>

            <label for="loaisp">Loại sản phẩm </label>
            <select name="loaisp" id="loaisp" class="form-control">
                <option value="-1">--Chọn loại sản phẩm --</option>
                <?php foreach ($select_loaisp as $loaisp):
                    $selected_loaisp='';
                    if (isset($_POST['loaisp']) && $loaisp['id_loaisp']==$_POST['loaisp']){
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
                    if (isset($_POST['HangsxController']) && $hangsx['id_hangsx']==$_POST['HangsxController']){
                        $selected_hangsx='selected';
                    }?>
                    <option value="<?php echo $hangsx['id_hangsx']?>" <?php echo $selected_hangsx;?>><?php echo $hangsx['name_hangsx'] ?></option>
                <?php endforeach;?>

            </select><br>

            <label for="noibat">Thông tin nổi bật </label>
            <textarea name="noibat" id="noibat" class="form-control"><?php echo isset($_POST['noibat']) ? $_POST['noibat'] : '' ?></textarea><br>

            <label for="mota">Mô tả sản phẩm </label>
            <textarea  name="mota" id="mota" class="form-control"><?php echo isset($_POST['mota'])?$_POST['mota']:""?></textarea><br>

            <label for="thongso">Thông số sản phẩm </label>
            <textarea name="thongso" id="thongso" class="form-control" ><?php echo isset($_POST['thongso'])?$_POST['thongso']:""?></textarea><br>

            <label for="avatar">Ảnh sản phẩm </label>
            <input type="file" name="avatar" id="avatar" class="form-control" value="">
            <img src="#" alt="" id="img-preview" style="display: none" width="150px" height="100px"><br>

            <label for="sale">Giảm giá (%)</label>
            <input type="number" name="sale" id="sale" class="form-control" value="<?php echo isset($_POST['sale'])?$_POST['sale']:""?>"><br>

            <label for="giasp">Giá sản phẩm </label>
            <input type="number" name="giasp" id="giasp" class="form-control" value="<?php echo isset($_POST['giasp'])?$_POST['giasp']:""?>"><br>

            <label for="trangthai">Trạng thái </label>
            <select name="trangthai" id="trangthai" class="form-control">
                <?php
                    $het='';
                    $con='';
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


            <input type="submit" value="Create" name="submit" class="btn btn-primary">
            <button class="btn btn-light"><a href="?controller=sanpham">Cancel</a></button>

        </form>
    </div>
</div>
<?php
?>