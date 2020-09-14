<?php
require_once 'controllers/Controller.php';
class MapController extends Controller{

    public function index (){
        $this->content=$this->render('views/contacts/map.php');
        require_once 'views/layouts/main.php';
    }
}
?>