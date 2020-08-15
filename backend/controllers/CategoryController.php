<?php
require_once "models/Category.php";
class CategoryController{
    public $content;
    public $error;

    public function index(){
        $category_model=new Category();
        $select = $category_model->select_all();
        $arr_view = [
            'select' =>$select
        ];
        $this->content = $this->render('views/category/index.php',$arr_view);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            if (empty($name)||empty($amount)){
                $this->error="Vui lòng điền đủ dữu liệu";
            }
            if (empty($this->error)){
                $category_model = new Category();
                $category_model->name=$name;
                $category_model->amount=$amount;
                $is_insert = $category_model->insert();

                if ($is_insert){
                    $_SESSION['success']="Thêm thành công";
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
                else{
                    $this->error="Thêm thất bại";
                }
            }
        }
        $this->content = $this->render('views/category/create.php');
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