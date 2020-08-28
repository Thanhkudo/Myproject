<?php
require_once 'models/Users.php';
require_once 'PHPMailer/Mailer.php';

class LoginController{
    public $error;
    public $success;
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
                $_SESSION['success']="Xin chào $username";
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

    public function forgot(){
        $this->title_page = "Forgot Password";
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
            $select_email= $is_select['email'];
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
        $this->content= $this->render('views/users/forgot_pass.php');
        require_once 'views/layouts/main_login.php';
    }

    public function reset(){
        $this->title_page = "Reset Password";
        if (isset($_GET['name'])){
            $name = $_GET['name'];
        }
        if (isset($_POST['submit'])){
            $user_model=new Users();
            //$name = $_POST['name'];
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
                    header('Location:index.php?controller=login&action=login');
                    exit();
                }
                else{
                    $this->error="Đổi thất bại";
                }
            }
        }
        $this->content= $this->render('views/users/reset_pass.php');
        require_once 'views/layouts/main_login.php';
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