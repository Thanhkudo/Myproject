<?php
require_once "controllers/Controller.php";
require_once "models/Users.php";
class IndexController extends Controller {

    public function index(){
        $this->title_page="Home";
        /*if (isset($_SESSION['user_main'])) {
            $user_main = $_SESSION['user_main'];
            $user_model = new Users();
            $select = $user_model->getusser($user_main);
        }
        $this->content = $this->render('views/layouts/index.php',['select'=>$select]);*/
        $this->content = $this->render('views/layouts/index.php');
        require_once 'views/layouts/main.php';
    }


}