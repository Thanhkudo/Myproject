<?php
require_once "configs/Database.php";
class Model{
    public $conn;

    public function __construct(){
        $this->conn=$this->getConnection();
    }

    public function getConnection(){
        try{
            $conn = new PDO(Database::DB_DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
        }
        catch (PDOException $e){
            die("Lỗi kết nối CSDL".$e->getMessage());
        }
        return $conn;
    }

    public function closeConnection(){
        $this->conn=null;
    }
}