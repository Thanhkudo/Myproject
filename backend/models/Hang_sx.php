<?php
require_once "models/Model.php";

class Hang_sx extends Model
{
    public $id_hangsx;
    public $name_hangsx;

    public $search;

    public function insert(){
    }
    public function update(){
    }
    public function select_all(){
        $select = $this->conn->prepare("SELECT * FROM hang_sx ");
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delate(){

    }
}
