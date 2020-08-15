<?php
require_once "models/Model.php";

class Users extends Model {
    public $id;
    public $username;
    public $password;
    public $fullname;
    public $avatar;
    public $phone;
    public $address;
    public $gender;
    public $email;
    public $vip;


    public function insert(){
        $insert=$this->conn->prepare("INSERT INTO users(`username`,`password`,`fullname`,`avatar`,`phone`,`address`,`email`,`gender`,`vip`) 
        VALUES (:username,:password,:fullname,:avatar,:phone,:address,:email,:gender,:vip)");
        $arr_insert=[
            ':username'=>$this->username,
            ':password'=>$this->password,
            ':fullname'=>$this->fullname,
            ':avatar'=>$this->avatar,
            ':phone'=>$this->phone,
            ':address'=>$this->address,
            ':email'=>$this->email,
            ':gender'=>$this->gender,
            ':vip'=>$this->vip,
        ];
        return $insert->execute($arr_insert);
    }
    public function update(){

    }
    public function select_all(){
        $select = $this->conn->prepare("SELECT * FROM users ORDER BY id DESC ");
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;

    }
    public function delate(){

    }
}
