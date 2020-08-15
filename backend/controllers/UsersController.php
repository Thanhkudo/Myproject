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

        $this->content = "them";
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