<?php
class Controller{

    public function __construct(){

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