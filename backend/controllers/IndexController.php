<?php
require_once "controllers/Controller.php";
require_once "models/Users.php";
class IndexController extends Controller {

    public function index(){
        $this->title_page="Home";
        $this->content = $this->render('views/layouts/index.php');
        require_once 'views/layouts/main.php';
    }


}