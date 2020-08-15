<?php
require_once "controllers/Controller.php";
class IndexController extends Controller {

    public function index(){
        $this->content = $this->render('views/layouts/index.php');
        require_once 'views/layouts/main.php';
    }


}