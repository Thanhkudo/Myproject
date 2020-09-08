<?php
require_once "controllers/Controller.php";
require_once 'models/Hang_sx.php';
require_once 'models/Pagination.php';
class HangsxController extends Controller {

    public function index(){
        $this->title_page="Hãng sản xuất";
        $hang_model=new Hang_sx();
        $params=[
            'limit'=>4,
            'string'=>'page',
            'controller'=>'hangsx',
            'action'=>'index',
        ];
        $page =1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        if (isset($_GET['name'])){
            $params['query']= '&name='.$_GET['name'];
        }
        $total = $hang_model->getCount();
        $params['total']=$total;
        $params['page']=$page;
        $pagiantion_model=new Pagination($params);
        $pagination = $pagiantion_model->getPagination();
        $select_hang = $hang_model->select_allpagination($params);
        $this->content = $this->render('views/hangsx/index.php',[
            'select_hang'=>$select_hang,
            'pagination' =>$pagination,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $this->title_page="Create";
        if (isset($_POST['submit'])){
            $namehang = $_POST['namehang'];
            $mota= $_POST['mota'];

            //validate
            if (empty($namehang)) {
                $this->error = "Cần nhập tên hãng sản phẩm !";
            }

            if (empty($this->error)){
                $hang_model= new Hang_sx();

                $hang_model->name_hangsx = $namehang;
                $hang_model->note = $mota;

                $check=$hang_model->checknamesp($namehang);
                if ($check){
                    $this->error="Hãng sản phẩm đã tồn tại !";
                }
                else{
                    $is_insert=$hang_model->insert();
                    if ($is_insert){
                        $_SESSION['success']="Thêm thành công";
                    } else{
                        $_SESSION['error']="Thêm thất bại";
                    }
                    header('Location: index.php?controller=hangsx');
                    exit();
                }

            }
        }

        $this->content = $this->render('views/hangsx/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update(){
        $this->title_page="Update";
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=hangsx');
            exit();
        }
        $id = $_GET['id'];
        $hang_model = new Hang_sx();
        $select_hang = $hang_model->select_one($id);

        if (isset($_POST['submit'])){
            $namehang = $_POST['namehang'];
            $mota= $_POST['mota'];

            //validate
            if (empty($namehang)) {
                $this->error = "Cần nhập tên hãng !";
            }
            if (empty($this->error)){


                $hang_model->name_hangsx=$namehang;
                $hang_model->note=$mota;

                $is_update=$hang_model->update($id);
                if ($is_update){
                    $_SESSION['success']="Sửa thành công";
                } else{
                    $_SESSION['error']="Sửa thất bại";
                }
                header('Location: index.php?controller=hangsx');
                exit();



            }
        }

        $this->content = $this->render('views/hangsx/update.php',[
            'select_hang'=>$select_hang,

        ]);
        require_once 'views/layouts/main.php';

    }
    public function delete(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=hangsx');
            exit();
        }
        $id = $_GET['id'];
        $hang_model=new Hang_sx();
        $delete=$hang_model->delete($id);
        if ($delete){
            $_SESSION['success']="Xóa dữ liệu thành công !";
            header('Location:index.php?controller=hangsx');
        }
        else{
            $_SESSION['error']="Xóa dữ liệu thất bại!";
            header('Location:index.php?controller=hangsx');
        }


    }
}