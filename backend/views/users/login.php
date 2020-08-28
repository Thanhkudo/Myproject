<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-md-offset-4 col-sm-7 col-sm-offset-3">
    <div class="panel panel-primary" >
        <div class="panel-heading">
            <div class="panel-title text-center"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</div>
        </div>

        <div style="padding-top:30px" class="panel-body" >
            <?php if (!empty($this->error)):?>
                <div class="alert alert-danger text-center">
                    <?php echo $this->error?>
                </div>
            <?php endif;?>

            <?php if (isset($_SESSION['error'])):?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif;?>

            <?php if (isset($_SESSION['success'])):?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif;?>

            <form id="loginform" class="form-horizontal" role="form" action="" method="post">

                <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control input-sm" name="username" value="" placeholder="username ">
                </div>

                <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control input-sm" name="password" placeholder="password">
                </div>



                <div class="input-group col-sm-offset-3 col-sm-7">
                    <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                        </label>
                    </div>
                </div>


                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls text-center">
                        <button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-sign-in" aria-hidden="true"> </i>  Sign In</button>
                        <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >

                            <a href="?controller=login&action=forgot">
                                Forgot your password?
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>