<?php
require_once "controllers/Controller.php";
require_once "models/Sanpham.php";
require_once "models/Pagination.php";
require_once "models/Users.php";

class HomeController extends Controller {

    public function __construct(){
        if (isset($_POST['login'])) {
            $user_model = new Users();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user_main = $user_model->check_user_pass($username, md5($password));
            if (empty($username)) {
                $this->error = "Cần nhập Username!";
            } elseif (empty($password)) {
                $this->error = "Cần nhập Password!";
            } elseif (empty($user_main)) {
                $this->error = "Sai Username hoặc Password!";
            }
            if (empty($this->error)) {
                if (isset($_POST['remember'])) {
                    setcookie('username', $username, time() + 60);
                }
                $_SESSION['username'] = isset($_COOKIE['username']) ? $_COOKIE['username'] : $username;
                $_SESSION['user_main'] = $user_main;
                $_SESSION['success'] = "Đăng nhập thành công !";
                header('Location:index.php');
                exit();
            }
        }

            $menu_model = new Sanpham();
            $dienthoai= $menu_model->getmenu(1);
            $tablet= $menu_model->getmenu(2);
            $laptop= $menu_model->getmenu(3);
            $_SESSION['menu']['dienthoai']=$dienthoai;
            $_SESSION['menu']['tablet']=$tablet;
            $_SESSION['menu']['laptop']=$laptop;

    }

    public function index(){

        if (isset($_POST['login'])) {
            $user_model = new Users();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user_main = $user_model->check_user_pass($username, md5($password));
            if (empty($username)) {
                $this->error = "Cần nhập Username!";
            } elseif (empty($password)) {
                $this->error = "Cần nhập Password!";
            } elseif (empty($user_main)) {
                $this->error = "Sai Username hoặc Password!";
            }
            if (empty($this->error)) {
                if (isset($_POST['remember'])) {
                    setcookie('username', $username, time() + 60);
                }
                $_SESSION['username'] = isset($_COOKIE['username']) ? $_COOKIE['username'] : $username;
                $_SESSION['user_main'] = $user_main;
                $_SESSION['success'] = "Đăng nhập thành công !";
                header('Location:index.php');
                exit();
            }
        }
        if (isset($_GET['loaisp'])&&isset($_GET['hangsx'])){
            if (!is_numeric($_GET['loaisp'])||!is_numeric($_GET['hangsx'])){
                $_SESSION['error']="ID không không hợp lệ !";
                header('Location:index.php?controller=home');
                exit();
            }
            $idloai = isset($_GET['loaisp'])? $_GET['loaisp']:'';
            $idhang = isset($_GET['hangsx'])? $_GET['hangsx']:'';
        }
        else{
            $idhang='';
            $idloai='';
        }

        $sp_model=new Sanpham();
        $params=[
            'limit'=>4,
            'string'=>'page',
            'controller'=>'home',
            'action'=>'index',
        ];
        $page =1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        if (isset($_GET['name'])){
            $params['query']= '&name='.$_GET['name'];
        }
        $total = $sp_model->getCount();
        $params['total']=$total;
        $params['page']=$page;
        $pagiantion_model=new Pagination($params);
        $pagination = $pagiantion_model->getPagination();
        $select_sp = $sp_model->select_allpagination($params,$idloai,$idhang);

        $this->content = $this->render('views/homes/index.php',[
            'select_sp'=>$select_sp,
            'pagination' =>$pagination,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function sanpham(){


        if (isset($_GET['loaisp'])&&isset($_GET['hangsx'])){
            if (!is_numeric($_GET['loaisp'])||!is_numeric($_GET['hangsx'])){
                $_SESSION['error']="ID không không hợp lệ !";
                header('Location:index.php?controller=home');
                exit();
            }
            $idloai = isset($_GET['loaisp'])? $_GET['loaisp']:'';
            $idhang = isset($_GET['hangsx'])? $_GET['hangsx']:'';
        }
        else{
            $idhang='';
            $idloai='';
        }

        $sp_model=new Sanpham();
        $params=[
            'limit'=>4,
            'string'=>'page',
            'controller'=>'home',
            'action'=>'sanpham',
        ];
        $page =1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        if (isset($_GET['name'])){
            $params['query']= '&name='.$_GET['name'];
        }
        $total = $sp_model->getCountmenu($idloai,$idhang);
        $params['total']=$total;
        $params['page']=$page;
        $pagiantion_model=new Pagination($params);
        $pagination = $pagiantion_model->getPagination();
        $select_sp = $sp_model->select_allpagination($params,$idloai,$idhang);

        $this->content = $this->render('views/homes/index.php',[
            'select_sp'=>$select_sp,
            'pagination' =>$pagination,
        ]);
        require_once 'views/layouts/main.php';
    }





}