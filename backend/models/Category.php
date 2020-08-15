<?php
require_once "models/Model.php";

class Category{
    public $id;
    public $name;
    public $amount;


    public function insert(){
        $database_model = '';
        $sql = "INSERT INTO categories (`name`,`amount`) VALUES (:name, :amount)";
        $arr=[
            ':name'=>$this->name,
            ':amount'=>$this->amount,
        ];
        $is_insert = $database_model->insert($sql,$arr);
        return $is_insert;
    }
    public function update(){

    }
    public function select_all(){
        $database_model = '';
        $sql = "SELECT * FROM categories ORDER BY id DESC ";
        $is_select = $database_model->select_all($sql);
        return $is_select;

    }
    public function delate(){

    }
}