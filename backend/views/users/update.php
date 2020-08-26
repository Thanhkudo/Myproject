<div class="container col-8">
    <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Update Employees</h3>
            <hr>
            <label for="username">User Name <span style="color: red">*</span></label>
            <input type="text" name="username" disabled id="username" class="form-control" value="<?php echo $select_update['username']?>">

            <label for="password">Password <span style="color: red">*</span></label>
            <input type="password"  name="password" id="password" class="form-control" value="">

            <label for="password">Confirm Password <span style="color: red">*</span></label>
            <input type="password"  name="password_confirm" id="password_confirm" class="form-control" value="">

            <label for="fullname">Full Name <span style="color: red">*</span></label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo isset($_POST['fullname'])?$_POST['fullname']:$select_update['fullname']?>">

            <label for="avatar">Avatar </label>
            <input type="file" name="avatar" id="avatar" class="form-control" value="">
            <?php if (!empty($select_update['avatar'])):?>
                <img height="100px" src="assets/images/users/<?php echo $select_update['avatar'] ?>"/> -->
            <?php endif;?>
                <img height="100px" src="#" id="img-preview" style="display: none"><br>
            <label for="email">Email </label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($_POST['email'])?$_POST['email']:$select_update['email']?>">

            <label for="phone">Phone </label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($_POST['phone'])?$_POST['phone']:$select_update['phone']?>">

            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="<?php echo isset($_POST['address'])?$_POST['address']:$select_update['address']?>">

            <label>Gender</label><br>
            <input type="radio" name="gender" id="male" value="1" class="custom-radio" <?php if ($select_update['gender']==1) {echo"checked";} ?>>
            <label for="">Male </label>
            <input type="radio" name="gender" id="female" value="0" class="custom-radio" <?php if ($select_update['gender']==0){ echo"checked";} ?>>
            <label for="">Female </label><br>

            <label for="vip">Quyền quản trị</label><br>
            <select  name="vip" id="vip" class="form-control">
                <?php
                $admin='';
                $member='';
                $supadmin='';
                switch ($select_update['vip']){
                    case 0:
                        $member='selected';
                        break;
                    case 1:
                        $admin = "selected";
                        break;
                    case 2:
                        $supadmin = "selected";
                        break;
                }

                if (isset($_POST['vip'])){
                    switch ($_POST['vip']){
                        case 0:
                            $member = "selected";
                            break;
                        case 1:
                            $admin = "selected";
                            break;
                        case 2:
                            $supadmin = "selected";
                            break;
                    }
                }
                ?>
                <option value="0" selected <?php echo $member?>>Thành Viên</option>
                <option value="1" <?php echo $admin?>>Admin</option>
                <option value="2" <?php echo $supadmin?>>Super Admin</option>
            </select><br>

            <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
            <button class="btn btn-light"><a href="?controller=users">Cancel</a></button>
        </form>
    </div>
</div>