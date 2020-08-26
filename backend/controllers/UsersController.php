<?php
require_once 'controllers/Controller.php';
require_once 'models/Users.php';
class UsersController extends Controller {

    public function index(){
        $this->title_page="Users";
        $user_model=new Users();
        $select_user = $user_model->select_all();
        $this->content = $this->render('views/users/index.php',['select_user'=>$select_user]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $this->title_page="Create";
        $user_model=new Users();
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $fullname = $_POST['fullname'];
            $avatar= $_FILES['avatar'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $vip = $_POST['vip'];
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
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
            }elseif ($avatar['error']==0){
                $duoifile = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
                strtolower($duoifile); //chuyen chu tương
                $arr_duoifile=['png','jpg','jbeg','gif'];
                $file_size_mb = $_FILES['avatar']['size']/1024/1024;
                $file_size_mb =round($file_size_mb,2);
                if (!in_array($duoifile,$arr_duoifile)){
                    $this->error="Avatar phải là ảnh !";
                }elseif ($file_size_mb >2){
                    $this->error="File Upload quá lớn !";
                }
            }
            $filename='';
            if (empty($this->error)){
                if ($avatar['error']==0){
                    $dir =__DIR__."/../assets/images/users";
                    if (!file_exists($dir)){
                        mkdir($dir);
                    }
                    $filename= time()."-user-".$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'],$dir.'/'.$filename);
                }
                $user_model->username=$username;
                $user_model->password=md5($password);
                $user_model->fullname=$fullname;
                $user_model->avatar=$filename;
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
                    header('Location: index.php?controller=users');
                    exit();
                }

            }
        }
        $this->content = $this->render('views/users/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update(){
        $this->title_page="Update";
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=users');
            exit();
        }
        $id = $_GET['id'];
        $user_model=new Users();
        $select_update = $user_model->select_one($id);

        if (isset($_POST['submit'])){
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $fullname = $_POST['fullname'];
            $avatar = $_FILES['avatar'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $vip = $_POST['vip'];
            //validate
            if (empty($password)){
                $this->error="Password không được để trống !";
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
            }elseif ($avatar['error']==0){
                $duoifile = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
                strtolower($duoifile); //chuyen chu tương
                $arr_duoifile=['png','jpg','jbeg','gif'];
                $file_size_mb = $_FILES['avatar']['size']/1024/1024;
                $file_size_mb =round($file_size_mb,2);
                if (!in_array($duoifile,$arr_duoifile)){
                    $this->error="Avatar phải là ảnh !";
                }elseif ($file_size_mb >2){
                    $this->error="File Upload quá lớn !";
                }
            }
            if (empty($this->error)){
                $filename=$select_update['avatar'];
                if ($_FILES['avatar']['error']==0){
                    $dir =__DIR__."/../assets/images/users";
                    @unlink(__DIR__."/../assets/images/users/".$filename);
                    if (!file_exists($dir)){
                        mkdir($dir);
                    }
                    $filename= time()."-user-".$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'],$dir.'/'.$filename);
                }
                $user_model->password=md5($password);
                $user_model->fullname=$fullname;
                $user_model->avatar=$filename;
                $user_model->email=$email;
                $user_model->phone=$phone;
                $user_model->address=$address;
                $user_model->gender=$gender;
                $user_model->vip=$vip;
                $is_insert=$user_model->update($id);
                if ($is_insert){
                    $_SESSION['success']="Update thành công";
                } else{
                    $_SESSION['error']="Update thất bại";
                }
                header('Location: index.php?controller=users');
                exit();
            }
        }

        $this->content = $this->render('views/users/update.php',['select_update'=>$select_update]);
        require_once 'views/layouts/main.php';

    }
    public function detail(){
        $this->title_page="Detail";
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=users');
            exit();
        }
        $id = $_GET['id'];
        $user_model=new Users();
        $select_detail = $user_model->select_one($id);
        $this->content = $this->render('views/users/detail.php',['select_detail'=>$select_detail]);
        require_once 'views/layouts/main.php';

    }
    public function delete(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=users');
            exit();
        }
        $id = $_GET['id'];
        $user_model=new Users();
        $select=$user_model->select_one($id);
        $delete=$user_model->delete($id);
        if ($delete){
            @unlink(__DIR__."/../assets/images/users/".$select['avatar']);
            $_SESSION['success']="Xóa dữ liệu thành công !";
            header('Location:index.php?controller=users');
        }
        else{
            $_SESSION['error']="Xóa dữ liệu thất bại!";
            header('Location:index.php?controller=users');
        }


    }

}