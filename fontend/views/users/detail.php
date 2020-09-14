<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="menu-account">
                <h3>
                    <span>
                        Tài khoản
                    </span>
                </h3>
                <ul>
                    <li><a href="index.php?view=ttdh"><i class="fa fa-key"></i>Lịch sử mua hàng</a></li>
                    <li><a href="?controller=users&action=changepass"><i class="fa fa-key"></i>Đổi mật khẩu</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="register-content clearfix ng-scope">
                <h1 class="title"><span>Thông tin tài khoản</span></h1>
                <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                    <form class="form-horizontal"  method="post" action="">
                        <div class="form-group">
                            <label for="Code" class="col-sm-3 control-label">Tài khoản<span class="warning">(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" name="username" id="username" disabled value="<?php echo $_SESSION['user_main']['username'] ?>" required="true" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-sm-3 control-label">Email<span class="warning">(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" name="email" id="email"  value="<?php echo $_SESSION['user_main']['email'] ?>" required="true" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Name" class="col-sm-3 control-label">Họ tên<span class="warning">(*)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control " value="<?php echo $_SESSION['user_main']['fullname'] ?>" required="true" type="text" name="fullname" id="fullName">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Điện thoại</label>
                            <div class="col-sm-9">
                                <input class="form-control" pattern="(\\+84|0)\\d{9,10}" value="<?php echo $_SESSION['user_main']['phone'] ?>" type="number" name="phone" id="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Giới tính</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="gender">
                                    <option value="1" <?php if($_SESSION['user_main']['gender']==1){echo "selected";} ?>>Nam</option>
                                    <option value="0" <?php if($_SESSION['user_main']['gender']==0){echo "selected";} ?> >Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input class="form-control " value="<?php echo $_SESSION['user_main']['address'] ?>" type="text" name="address" id="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-default" name="update" >Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>