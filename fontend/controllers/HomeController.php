<?php
require_once "controllers/Controller.php";
require_once "models/Sanpham.php";
require_once "models/Pagination.php";
require_once "models/Users.php";
require_once "PHPMailer/Mailer.php";
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

    public function create(){
        $user_model=new Users();
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['repassword'];
            $fullname = $_POST['fullName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gioitinh'];
            $vip = 0;

            //validate
            if (empty($username)){
                $this->error="Username không được để trống !";
            }elseif (empty($password)){
                $this->error="Password không được để trống !";
            }elseif (strlen($password)<6){
                $this->error="Password ít nhất 6 ký tự!";
            }elseif (empty($password_confirm)){
                $this->error="Vui lòng nhập lại Password !";
            }elseif ($password != $password_confirm){
                $this->error="Password không trùng khớp !";
            }elseif (empty($fullname)){
                $this->error="Fullname không được để trống !";
            }elseif (!empty($phone)&& !is_numeric($phone)){
                $this->error="Lỗi định dạng Phone !";
            }elseif (!empty($email)&& !filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error="Lỗi định dạng email !";
            }

            if (empty($this->error)){

                $user_model->username=$username;
                $user_model->password=md5($password);
                $user_model->fullname=$fullname;

                $user_model->email=$email;
                $user_model->phone=$phone;
                $user_model->address=$address;
                $user_model->gender=$gender;
                $user_model->vip=$vip;
                $checkuser=$user_model->checkussername($username);
                if ($checkuser){
                    $this->error="User đã tồn tại !";
                }
                else{
                    $is_insert=$user_model->insert();
                    if ($is_insert){
                        $_SESSION['success']="Thêm thành công";
                    } else{
                        $_SESSION['error']="Thêm thất bại";
                    }
                    header('Location: index.php?controller=home');
                    exit();
                }

            }
        }
        $this->content = $this->render('views/homes/create.php');
        require_once 'views/layouts/main.php';
    }

    public function forgot(){

        if (isset($_POST['gmail'])){
            header('Location:https://mail.google.com/');
            exit();
        }
        if (isset($_POST['submit'])){
            $user_model=new Users();
            $PHPMailer = new Mailer();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $is_select = $user_model->getuser($name);
            !empty($is_select) ? $select_email= $is_select['email']:'';

            if (empty($name)||empty($email)){
                $this->error="Vui lòng nhập username và email của bạn";
            }
            if (empty($this->error)){

                if ($select_email != $email) {
                    $this->error = "Email không trùng khớp";
                }
                else{
                    $PHPMailer->email($email,$name);
                    $_SESSION['success']="Một tin nhắn đã gửi tới Gmail của bạn. <br> Vui lòng xác nhận";
                }
            }
        }
        $this->content= $this->render('views/homes/forgot.php');
        require_once 'views/layouts/main.php';
    }

    public function reset(){
        $this->title_page = "Reset Password";
        if (isset($_GET['name'])){
            $name = $_GET['name'];
        }
        if (isset($_POST['submit'])){
            $user_model=new Users();
            $name = $_GET['name'];
            $pass = $_POST['pass'];
            $cf_pass = $_POST['cf_pass'];
            $is_select = $user_model->checkussername($name);
            if ($is_select == FALSE){
                $this->error="Username không tồn tại !";
            }elseif (empty($pass)){
                $this->error="Vui lòng nhập Password !";
            }
            elseif (strlen($pass)<6){
                $this->error="Password ít nhất 6 ký tự!";
            }elseif (empty($cf_pass)){
                $this->error="Nhập lại Password !";
            }elseif ($pass!=$cf_pass){
                $this->error="Password không trùng khớp!";
            }
            if (empty($this->error)){
                $user_model->password=md5($pass);
                $reset = $user_model->reset($name);
                if ($reset){
                    $_SESSION['success']='Đổi Password thành công';
                    header('Location:index.php');
                    exit();
                }
                else{
                    $this->error="Đổi thất bại";
                }
            }
        }
        $this->content= $this->render('views/homes/resetpass.php');
        require_once 'views/layouts/main.php';
    }

    public function logout(){
        session_destroy();
        setcookie('username','usernamr',time()-1);
        $_SESSION['success']="Logout thành công";
        header('Location:index.php');
        exit();
    }



}