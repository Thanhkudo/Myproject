<?php
require_once 'Models/Users.php';
class LoginController{
    public $error;
    public $content;
    public $title_page;

    public function login(){
        $this->title_page="Login";
        if (isset($_SESSION['user_main'])){
            $_SESSION['success']='Chào mừng bạn quay trở lại';
            header('Location:index.php');
            exit();
        }
        if (isset($_POST['submit'])){
            $user_model=new Users();
            $username=$_POST['username'];
            $password=$_POST['password'];
            $user_main = $user_model->check_user_pass($username,md5($password));
            if (empty($username)){
                $this->error="Cần nhập Username!";
            }elseif (empty($password)){
                $this->error="Cần nhập Password!";
            }elseif (empty($user_main)){
                $this->error="Sai Username hoặc Password!";
            }elseif ($user_main['vip']==0){
                $this->error="Bạn không đủ thầm quyền vào trang này!";
            }
            if (empty($this->error)){
                $_SESSION['success']='Đăng nhập thành công';
                $_SESSION['user_main']=$user_main;
                header('Location:index.php');
                exit();
            }
        }
        $this->content= $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }

    public function logout(){
        session_destroy();
        $_SESSION['success']="Logout thành công";
        header('Location:index.php?controller=login&action=login');
        exit();
    }

    public function render($file,$arr=[]){
        $render_view='';
        extract($arr);
        ob_start();
        require_once "$file";
        $render_view = ob_get_clean();
        return $render_view;
    }
}