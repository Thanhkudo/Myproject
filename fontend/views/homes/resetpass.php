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
            <input id="login-username" type="text" class="form-control input-sm" disabled name="name" value="<?php echo isset($_GET['name']) ? $_GET['name']:'';?>" placeholder="username ">
        </div>

        <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control input-sm" name="pass" placeholder="password">
        </div>

        <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control input-sm" name="cf_pass" placeholder="Confirm password">
        </div>

        <div style="margin-top:10px" class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls text-center">
                <button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Save </button>
                <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
            </div>

        </div>

    </form>
</div>