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
}
?>