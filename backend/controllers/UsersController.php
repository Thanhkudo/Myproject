<?php
require_once 'controllers/Controller.php';
require_once 'models/Users.php';
class UsersController{

    public function index(){
        $user_model=new Users();
        $select = $user_model->select_all();

        $this->content = $this->render('views/users/index.php',['select'=>$select]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $user_model=new Users();
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $gender = $_POST['vip'];
            $vip = $_POST['vip'];
            //validate
            if (empty($username)){
                $this->error="Username không được để trống !";
            }elseif (empty($password)){
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
            }elseif ($_FILES['avatar']['error']==0){
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
                if ($_FILES['avatar']['error']==0){
                    $filename='';
                    $dir = __DIR__.'../assets/images/users';
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
        $this->content = $this->render('views/users/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update(){
        $this->content = "Trang update";
        require_once 'views/layouts/main.php';

    }
    public function detail(){
        $this->content = "Trang detail";
        require_once 'views/layouts/main.php';

    }
    public function delete(){
        $this->content = "Trang delete";
        require_once 'views/layouts/main.php';

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