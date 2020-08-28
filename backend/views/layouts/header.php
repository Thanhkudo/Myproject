<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="get" action="">
        <div class="input-group input-group-sm">
            <input type="hidden" name="controller" value="<?php echo isset($_GET['controller'])?$_GET['controller']:'index';?>">
            <input type="hidden" name="action" value="<?php echo isset($_GET['action'])?$_GET['action']:'index'?>">
            <input class="form-control form-control-navbar" type="text" name="name" value="" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit" name="search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!--
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->



</nav>
