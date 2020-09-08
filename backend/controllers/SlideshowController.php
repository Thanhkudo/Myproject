<?php
require_once "controllers/Controller.php";
require_once 'models/Slideshow.php';
class SlideshowController extends Controller {

    public function index(){

        $slideshow_model=new Slideshow();
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
}