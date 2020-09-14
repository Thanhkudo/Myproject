<?php
require_once 'controllers/Controller.php';
require_once 'models/Sanpham.php';


class SanphamController extends Controller {


    public function index(){
        if (!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error']="ID không không hợp lệ !";
            header('Location:index.php?controller=home');
            exit();
        }
        $id = $_GET['id'];
        $sp_model= new Sanpham();
        $select = $sp_model->select_one($id);
        $this->content=$this->render('views/sanpham/index.php',['select'=>$select]);
        require_once 'views/layouts/main.php';
    }
}
?>