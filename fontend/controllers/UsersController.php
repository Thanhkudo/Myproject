<?php
require_once 'controllers/Controller.php';
require_once 'models/Users.php';
require_once "PHPMailer/Mailer.php";
class UsersController extends Controller{

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
        $this->content = $this->render('views/users/create.php');
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
            $select_email='';
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
        $this->content= $this->render('views/users/forgot.php');
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
        $this->content= $this->render('views/users/resetpass.php');
        require_once 'views/layouts/main.php';
    }

    public function logout(){
        session_destroy();
        setcookie('username','usernamr',time()-1);
        $_SESSION['success']="Logout thành công";
        header('Location:index.php');
        exit();
    }

    public function detail(){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $id=$_SESSION['user_main']['id'];
        if (isset($_POST['update'])){
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            //validate
            if (empty($email)){
                $this->error="Email không được để trống !";
            }elseif (empty($fullname)){
                $this->error="Vui lòng nhập họ tên!";
            }elseif (!empty($phone)&& !is_numeric($phone)){
                $this->error="Lỗi định dạng Phone !";
            }elseif (!empty($email)&& !filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error="Lỗi định dạng email !";
            }

            if (empty($this->error)){
                $user_model=new Users();
                $user_model->fullname=$fullname;
                $user_model->email=$email;
                $user_model->phone=$phone;
                $user_model->address=$address;
                $user_model->gender=$gender;
                $is_insert=$user_model->update_user($id);
                if ($is_insert){
                    $_SESSION['success']="Cập nhật thành công! Vui lòng đăng nhập lại  ";
                } else{
                    $_SESSION['error']="Update thất bại";
                }
                header('Location: index.php?controller=users&action=detail');
                exit();
            }
        }
        $this->content=$this->render('views/users/detail.php');
        require_once 'views/layouts/main.php';
    }

    public function changepass(){

            $name = $_SESSION['username'];
        if (isset($_POST['changepass'])){
            $user_model=new Users();

            $pass =$_POST['pass'];
            $new_pass = $_POST['new_pass'];
            $cf_pass = $_POST['cf_pass'];
            if (empty($pass)){
                $this->error="Vui lòng nhập mật khẩu !";
            }elseif (md5($pass)!=$_SESSION['user_main']['password']){
                $this->error="Sai mật khẩu !";
            }elseif (empty($new_pass)){
                $this->error="Nhập mật khẩu mới !";
            }elseif (empty($cf_pass)){
                $this->error="Nhập lại mật khẩu mới !";
            }elseif ($new_pass!=$cf_pass){
                $this->error="Mật khẩu không trùng khớp!";
            } elseif (strlen($pass)<6){
                $this->error="Mật khẩu ít nhất 6 ký tự!";
            }
            if (empty($this->error)){
                $user_model->password=md5($new_pass);
                $reset = $user_model->reset($name);
                if ($reset){
                    $_SESSION['success']='Đổi Password thành công';
                    unset($_SESSION['user_main']);
                    header('Location:index.php?');
                    exit();
                }
                else{
                    $this->error="Đổi thất bại";
                }
            }
        }
        $this->content= $this->render('views/users/changepass.php');
        require_once 'views/layouts/main.php';
    }
}
?>