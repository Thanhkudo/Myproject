<?php
    $id='';
    $fullname='';
    $avatar='';
    $vip='';
    if (isset($_SESSION['user_main']))
    {
        $id = $_SESSION['user_main']['id'];
        $fullname = $_SESSION['user_main']['fullname'];
        $avatar = $_SESSION['user_main']['avatar'];
        $vip = $_SESSION['user_main']['vip'];

    }
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="assets/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item" >
                        <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                        </div>
                        <a href="#" class="nav-link">
                            <img src="assets/images/users/<?php echo $avatar?>" class="img-circle elevation-1 " alt="User Image" width="30px">
                            <p>
                                <?php echo $fullname?>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="?controller=users&action=detail&id=<?php echo $id?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Trang cá nhân</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?controller=users&action=change_pass&id=<?php echo $id?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Đổi mật khẩu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?controller=login&action=logout" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Đăng xuất</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>


        <!-- SidebarSearch Form -->
        <form action="" method="get">
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input type="hidden" name="controller" value="<?php echo isset($_GET['controller'])?$_GET['controller']:'index';?>">
                <input type="hidden" name="action" value="<?php echo isset($_GET['action'])?$_GET['action']:'index'?>">
                <input class="form-control form-control-sidebar" type="text" name="name" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar" type="submit" name="search">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        </form>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?controller=users" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Danh sách User
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?controller=sanpham" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?controller=hangsx" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Các hãng sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?controller=contact" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách phản hồi</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>