<?php
require_once "models/Model.php";
class Contact extends Model{
    public $id;
    public $id_user;
    public $name;
    public $address;
    public $email;
    public $phone;
    public $title;
    public $content;
    public $search;

    public function __construct(){
        parent::__construct();
        if (isset($_GET['name'])&&!empty($_GET['name'])){
            $name=$_GET['name'];
            $name=addslashes($name);
            $this->search.=" AND `name` LIKE '%$name%'";
        }
    }
    public function insert(){
        $insert=$this->conn->prepare("INSERT INTO contacts(`id_user`,`name`,`address`,`email`,`phone`,`title`,`content`) 
        VALUES (:id_user, :namess, :address, :email, :phone, :title, :content)");
        $arr_insert=[
            ':id_user'=> $this->id_user,
            ':namess'=> $this->name,
            ':address' => $this->address,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':title' => $this->title,
            ':content'=> $this->content,
        ];
        return $insert->execute($arr_insert);
    }
    public function select_one($id){
        $select = $this->conn->prepare("SELECT * FROM contacts WHERE id=$id");
        $select ->execute();
        $is_select = $select->fetch(PDO::FETCH_ASSOC);
        return $is_select;

    }
    public function select_allpagination($params=[]){
        $limit = $params['limit'];
        $page =  $params['page'];
        $start = ($page - 1) * $limit;
        $select = $this->conn->prepare("SELECT * FROM contacts WHERE TRUE $this->search ORDER BY id DESC LIMIT $start, $limit" );
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }
    public function delete($id){
        $delete = $this->conn->prepare("DELETE FROM contacts WHERE id=$id");
        return  $delete ->execute();
    }
    public function getCount(){
        $select = $this->conn->prepare("SELECT COUNT(id) FROM contacts WHERE TRUE $this->search");
        $select ->execute();
        return $select->fetchColumn();


    }

}
?>