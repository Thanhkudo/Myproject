<?php
require_once "controllers/Controller.php";
require_once "models/Users.php";
class IndexController extends Controller {

    public function index(){

        if (isset($_SESSION['user_main'])){
            if ($_SESSION['user_main']['vip']==0){
                header('Location: index.php?controller=login&action=logout');
                exit();
            }
        }

        $this->title_page="Home";
        $this->content = $this->render('views/layouts/index.php');
        require_once 'views/layouts/main.php';
    }


}