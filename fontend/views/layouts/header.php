<div class="header">
    <nav class="navbar navbar-default" role="navigation" >
        <div class="collapse navbar-collapse navbar-ex1-collapse header_top">
            <ul class="nav navbar-nav navbar-right">
                <li class="dorpdown"><a href="#"><span class="glyphicon glyphicon-gift"></span>Khuyến mãi</a></li>
                <li class="dorpdown"><a href="?controller=cart&action=index"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng</a></li>
                <span class="ajax-message"></span>
                <li class="dorpdown"><a href=""><span class="glyphicon glyphicon-shopping-cart"></span>Kiểm tra đơn hàng</a></li>
                <li class="dorpdown"><a href="?controller=contact&action=contact"><span class="glyphicon glyphicon-phone-alt"></span>Hỗ trợ khách hàng</a></li>
                <?php
                if(!isset($_SESSION["user_main"])){
                    ?>
                    <!-- <li class="dorpdown"><a href="index.php?view=login"><span class="glyphicon glyphicon-user"></span>Đăng nhập</a></li> -->
                    <li style="margin-top: -2px;"><a data-toggle="modal" href='#modal-id' class="glyphicon glyphicon-user"> Đăng nhập</a>
                        <div class="modal fade" id="modal-id">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="">Đăng Nhập</h4></center>
                                    </div>
                                    <div class="modal-body">
                                        <form action="index.php" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="username" name="username"  onchange="" placeholder="Nhập Username" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required="">
                                            </div><br>
                                            <div>
                                                <input type="checkbox" name="checked" id="checked"> Nhớ mật khẩu?<a style="float: right;" href="index.php?controller=users&action=forgot">Quên mật khẩu?</a>
                                            </div>


                                            <center><button type="submit" class="btn btn-primary" id="login" name="login">Đăng nhập</button></center><br>
                                            <button type="submit" id="cancel_edit" class="btn btn-primary"	>Hủy</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div></li>
                    <li class="dorpdown"><a href="?controller=users&action=create"><span class="glyphicon glyphicon-user"></span>Đăng ký</a></li>
                <?php }else{
                    ?>
                    <li class="dorpdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">Chào:<?php echo $_SESSION["user_main"]["fullname"] ?></span></a>

                        <ul class="dropdown-menu">

                            <li ><a href="?controller=users&action=detail">
                                    <span class="glyphicon glyphicon-cog"></span>Thông tin cá nhân
                                </a></li>
                            <?php if(isset($_SESSION['user_main']['vip'])!=0):?>


                                <li ><a href="../backend/index.php">
                                        <span class="glyphicon glyphicon-wrench"></span>Vào trang Admin
                                    </a></li>
                            <?php endif ?>
                            <li><a href="?controller=users&action=logout"><span class="glyphicon glyphicon-off">Thoát</span></a></li>
                        </ul>
                    </li>

                    <?php
                } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div> <!-- header -->

<section class="header-content" style="margin-top: -10px;">
    <div class=" col-12" style="background-color: #9ACD32;" >
        <div class="row" >
            <div class="col-md-3 col-sm-3 col-xs-12 ">
                <a href="index.php" title="">
                    <img style="width: 150px; border-radius: 10px;"  alt="Thế giới Alo" src="assets/images/layouts/logg.jpg" class="img-responsive center-block">
                </a>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 text-center">
                <form class="navbar-form navbar-left" action="" role="search" enctype="mutipart/from-data" method="get" style="padding-top: 10px;" >
                    <div class="form-group col-12" >
                        <input type="text" name="name" class="form-control" placeholder="Bạn kiếm sản phẩm gì?" required="">
                        <button type="submit" name="search" value="search" class="btn btn-default form-search"><span class="glyphicon glyphicon-search"></span></button>
                    </div>

                </form>
            </div>
        </div>
    </>
</section>
