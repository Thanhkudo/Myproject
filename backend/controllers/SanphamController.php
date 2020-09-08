<?php
require_once "controllers/Controller.php";
require_once 'models/Sanpham.php';
require_once 'models/Loai_sp.php';
require_once 'models/Hang_sx.php';
require_once 'models/Pagination.php';
class SanphamController extends Controller {

    public function index(){
        $this->title_page="Sản phẩm";
        $sp_model=new Sanpham();
        $params=[
            'limit'=>4,
            'string'=>'page',
            'controller'=>'sanpham',
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
        $select_sp = $sp_model->select_allpagination($params);
        $loaisp_model=new Loai_sp();
        $select_loaisp=$loaisp_model->select_all();

        $hangsx_model=new Hang_sx();
        $select_hangsx=$hangsx_model->select_all();
        $this->content = $this->render('views/sanpham/index.php',[
            'select_sp'=>$select_sp,
            'pagination' =>$pagination,
            'select_loaisp'=>$select_loaisp,
            'select_hangsx'=>$select_hangsx,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $this->title_page="Create";
        if (isset($_POST['submit'])){
            $namesp = $_POST['namesp'];
            $loaisp = $_POST['loaisp'];
            $hangsx = $_POST['hangsx'];
            $noibat = $_POST['noibat'];
            $mota= $_POST['mota'];
            $thongso = $_POST['thongso'];
            $avatar = $_FILES['avatar'];
            $sale = $_POST['sale'];
            $gia = $_POST['giasp'];
            $trangthai = $_POST['trangthai'];

            //validate
            if (empty($namesp)){
                $this->error="Cần nhập tên sản phẩm !";
            }elseif ($loaisp<0){
                $this->error="Cần chọn Loại sản phẩm !";
            }elseif ($hangsx<0){
                $this->error="Cần chọn hãng sản phẩm !";
            }elseif ($avatar['error']==0){
                $duoifile = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
                strtolower($duoifile); //chuyen chu tương
                $arr_duoifile=['png','jpg','jpeg','gif','jfif'];
                $file_size_mb = $_FILES['avatar']['size']/1024/1024;
                $file_size_mb =round($file_size_mb,2);
                if (!in_array($duoifile,$arr_duoifile)){
                    $this->error="Avatar phải là ảnh !";
                }elseif ($file_size_mb >2){
                    $this->error="File Upload quá lớn !";
                }
            }elseif (!empty($sale)&&!is_numeric($sale)){
                $this->error="Giảm giá phải là số !";
            }elseif (!empty($gia)&&!is_numeric($gia)){
                $this->error="Giá phải là số !";
            }
            $filename='';
            if (empty($this->error)){
                if ($avatar['error']==0){
                    $dir =__DIR__."/../assets/images/sanpham";
                    if (!file_exists($dir)){
                        mkdir($dir);
                    }
                    $filename= time()."-".$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'],$dir.'/'.$filename);
                }
                $sp_model= new Sanpham();

                $sp_model->name_sp=$namesp;
                $sp_model->id_hangsx=$hangsx;
                $sp_model->id_loaisp=$loaisp;
                $sp_model->avatar=$filename;
                $sp_model->noibat=$noibat;
                $sp_model->thongso_sp=$thongso;
                $sp_model->mota_sp=$mota;
                $sp_model->sale=$sale;
                $sp_model->gia_sp=$gia;
                $sp_model->status=$trangthai;

                $check=$sp_model->checknamesp($namesp);
                if ($check){
                    $this->error="Sản phẩm đã tồn tại !";
                }
                else{
                    $is_insert=$sp_model->insert();
                    if ($is_insert){
                        $_SESSION['success']="Thêm thành công";
                    } else{
                        $_SESSION['error']="Thêm thất bại";
                    }
                    header('Location: index.php?controller=sanpham');
                    exit();
                }

            }
        }
        $loaisp_model=new Loai_sp();
        $select_loaisp=$loaisp_model->select_all();

        $hangsx_model=new Hang_sx();
        $select_hangsx=$hangsx_model->select_all();

        $this->content = $this->render('views/sanpham/create.php',['select_loaisp'=>$select_loaisp,'select_hangsx'=>$select_hangsx]);
        require_once 'views/layouts/main.php';
    }
    public function update(){
        $this->title_page="Update";
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=sanpham');
            exit();
        }
        $id = $_GET['id'];
        $sp_model = new Sanpham();
        $select_sp = $sp_model->select_one($id);

        $loaisp_model=new Loai_sp();
        $select_loaisp=$loaisp_model->select_all();

        $hangsx_model=new Hang_sx();
        $select_hangsx=$hangsx_model->select_all();

        if (isset($_POST['submit'])){
            $namesp = $_POST['namesp'];
            $loaisp = $_POST['loaisp'];
            $hangsx = $_POST['hangsx'];
            $noibat = $_POST['noibat'];
            $mota= $_POST['mota'];
            $thongso = $_POST['thongso'];
            $avatar = $_FILES['avatar'];
            $sale = $_POST['sale'];
            $gia = $_POST['giasp'];
            $trangthai = $_POST['trangthai'];

            //validate
            if (empty($namesp)){
                $this->error="Cần nhập tên sản phẩm !";
            }elseif ($loaisp<0){
                $this->error="Cần chọn Loại sản phẩm !";
            }elseif ($hangsx<0){
                $this->error="Cần chọn hãng sản phẩm !";
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
            }elseif (!empty($sale)&&!is_numeric($sale)){
                $this->error="Giảm giá phải là số !";
            }elseif (!empty($gia)&&!is_numeric($gia)){
                $this->error="Giá phải là số !";
            }
            $filename=$select_sp['avatar'];
            if (empty($this->error)){
                if ($avatar['error']==0){
                    $dir =__DIR__."/../assets/images/sanpham";
                    @unlink(__DIR__."/../assets/images/sanpham/".$filename);
                    if (!file_exists($dir)){
                        mkdir($dir);
                    }
                    $filename= time()."-".$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'],$dir.'/'.$filename);
                }

                $sp_model->name_sp=$namesp;
                $sp_model->id_hangsx=$hangsx;
                $sp_model->id_loaisp=$loaisp;
                $sp_model->avatar=$filename;
                $sp_model->noibat=$noibat;
                $sp_model->thongso_sp=$thongso;
                $sp_model->mota_sp=$mota;
                $sp_model->sale=$sale;
                $sp_model->gia_sp=$gia;
                $sp_model->status=$trangthai;

                $is_update=$sp_model->update($id);
                if ($is_update){
                    $_SESSION['success']="Sửa thành công";
                } else{
                    $_SESSION['error']="Sửa thất bại";
                }
                header('Location: index.php?controller=sanpham');
                exit();



            }
        }

        $this->content = $this->render('views/sanpham/update.php',[
            'select_sp'=>$select_sp,
            'select_loaisp'=>$select_loaisp,
            'select_hangsx'=>$select_hangsx
        ]);
        require_once 'views/layouts/main.php';

    }
    public function delete(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=sanpham');
            exit();
        }
        $id = $_GET['id'];
        $sp_model=new Sanpham();
        $select=$sp_model->select_one($id);
        $delete=$sp_model->delete($id);
        if ($delete){
            @unlink(__DIR__."/../assets/images/sanpham/".$select['avatar']);
            $_SESSION['success']="Xóa dữ liệu thành công !";
            header('Location:index.php?controller=sanpham');
        }
        else{
            $_SESSION['error']="Xóa dữ liệu thất bại!";
            header('Location:index.php?controller=sanpham');
        }


    }
}