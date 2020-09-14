<div class="tabs-category clearfix">
    <div class="tab-content clearfix container">
        <div class="tabs-title">
            <div id="" class="tab-title">
                <h3>
                    <span>Quên mật khẩu</span>
                </h3>
            </div>
        </div>
    </div>
</div>
<div style="padding-top:30px" class="panel-body" >
    <form id="forgotform" class="form-horizontal" role="form" action="" method="post">

        <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-username" type="text" class="form-control input-sm" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name']:'';?>" placeholder="username ">
        </div>
        <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input id="login-username" type="email" class="form-control input-sm" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:'';?>" placeholder="Email ">
        </div>
        <div style="margin-top:10px" class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls text-center">
                <button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Sent</button>
                <?php if (isset($_SESSION['success'])):?>
                    <button type="submit" class="btn btn-danger btn-sm" name="gmail"><i class="fa fa-envelope" aria-hidden="true"></i> Vào Gmail</button>
                <?php endif;?>
            </div>

        </div>
    </form>
</div>