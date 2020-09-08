<div class="container col-8">
    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Sửa hãng sản phẩm</h3>
            <hr>
            <label for="namesp">Tên hãng <span style="color: red">*</span></label>
            <input type="text" name="namehang" id="namehang" class="form-control" value="<?php echo isset($_POST['namehang'])?$_POST['namehang']:$select_hang['name_hangsx']?>"><br>

            <label for="mota">Ghi chú </label>
            <textarea  name="mota" id="mota" class="form-control"><?php echo isset($_POST['mota'])?$_POST['mota']:$select_hang['note']?></textarea><br>

            <input type="submit" value="Save" name="submit" class="btn btn-primary">
            <button class="btn btn-light"><a href="?controller=hangsx">Cancel</a></button>

        </form>
    </div>
</div>
<?php
?>