<?php
class Controller{

    public function __construct(){
        if (!isset($_SESSION['username'])){
            $_SESSION['error']="Bạn cần đăng nhập";
            header('Location: index.php?controller=login&action=login');
            exit();
        }
    }

    public $content;
    public $error;
    public $title_page;

    public function render($file,$arr=[]){
        $render_view='';
        extract($arr);
        ob_start();
        require_once "$file";
        $render_view = ob_get_clean();
        return $render_view;
    }
}