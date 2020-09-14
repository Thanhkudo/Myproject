<section class="hearder-conten clearfix" style="margin-top: 2px;">
    <nav class="navbar navbar-default" role="navigation" style="width: 100%;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-md hidden-lg" href="#">Menu</a>
        </div>

        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mobile" aria-hidden="true"></i>  ĐIỆN THOẠI<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($_SESSION['menu']['dienthoai'] as $dienthoai):?>
                            <ul>
                                <li style="margin-top: 2px;"><a style="color: #00008B;"  href="index.php?controller=home&action=sanpham&hangsx=<?php echo $dienthoai['id_hangsx']?>&loaisp=<?php echo $dienthoai['id_loaisp']?>"><i class="icon-chevron-right"></i><?php echo $dienthoai['name_hangsx']?></a></li>
                            </ul>
                        <?php endforeach;?>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tablet" aria-hidden="true"></i>  TABLET<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($_SESSION['menu']['tablet'] as $tablet):?>
                            <ul>
                                <li style="margin-top: 2px;"><a style="color: #00008B;"  href="index.php?controller=home&action=sanpham&hangsx=<?php echo $tablet['id_hangsx']?>&loaisp=<?php echo $tablet['id_loaisp']?>"><i class="icon-chevron-right"></i><?php echo $tablet['name_hangsx']?></a></li>
                            </ul>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-laptop" aria-hidden="true"></i>  LAPTOP<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($_SESSION['menu']['laptop'] as $laptop):?>
                            <ul>
                                <li style="margin-top: 2px;"><a style="color: #00008B;"  href="index.php?controller=home&action=sanpham&hangsx=<?php echo $laptop['id_hangsx']?>&loaisp=<?php echo $laptop['id_loaisp']?>"><i class="icon-chevron-right"></i><?php echo $laptop['name_hangsx']?></a></li>
                            </ul>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li><a href="?controller=contacs&action=map"> <i class="fa fa-map" aria-hidden="true"></i>  BẢN ĐỒ</a></li>
                <li><a href="?controller=contact&action=contact"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  LIÊN HỆ</a></li>
            </ul>
        </div>

    </nav>
</section>