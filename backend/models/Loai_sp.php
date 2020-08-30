<?php
require_once "models/Model.php";

class Loai_sp extends Model {
    public $id_loaisp;
    public $name_loaisp;

    public $search;

    public function insert(){
    }
    public function update(){
    }
    public function select_all(){
        $select = $this->conn->prepare("SELECT * FROM loai_sp ORDER BY id_loaisp DESC ");
        $select->execute();
        $is_select= $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }
    public function delate(){

    }
}