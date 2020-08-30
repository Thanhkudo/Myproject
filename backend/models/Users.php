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
    public $created;

    public $search;

    public function __construct(){
        parent::__construct();
        if (isset($_GET['name'])&&!empty($_GET['name'])){
            $name=$_GET['name'];
            $name=addslashes($name);
            $this->search.=" AND `username` LIKE '%$name%'";
        }
    }

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
    public function update($id){
        $update =$this->conn->prepare("UPDATE users SET password=:password, fullname=:fullname, avatar=:avatar, phone=:phone, address=:address, email=:email, gender=:gender, vip=:vip WHERE id=$id");
        $arr_update=[
            ':password'=>$this->password,
            ':fullname'=>$this->fullname,
            ':avatar'=>$this->avatar,
            ':phone'=>$this->phone,
            ':address'=>$this->address,
            ':email'=>$this->email,
            ':gender'=>$this->gender,
            ':vip'=>$this->vip,
        ];
        return $update->execute($arr_update);

    }
    public function update_pass($id){
        $update=$this->conn->prepare("UPDATE users SET password=:password WHERE id =$id");
        $arr_update=[
            ':password'=>$this->password,
        ];
        return $update->execute($arr_update);
    }
    public function reset($name){
        $update =$this->conn->prepare("UPDATE `users` SET `password`=:password WHERE username='$name'");
        $arr_update=[
            ':password'=>$this->password,
        ];
        return $update->execute($arr_update);

    }
    /*public function select_all($params=[]){

        $arr_search = " WHERE TRUE";
        if (isset($param['name'])&&!empty($param['name'])){
            $name = $param['name'];
            $arr_search .= " AND username LIKE '%$name%' ";
        }
        $select = $this->conn->prepare("SELECT * FROM users $arr_search ORDER BY id DESC ");
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }*/
    public function select_allpagination($params=[]){
        $limit = $params['limit'];
        $page =  $params['page'];
        $start = ($page - 1) * $limit;
        $select = $this->conn->prepare("SELECT * FROM users WHERE TRUE $this->search LIMIT $start, $limit" );
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }
    public function checkussername($username){
        $check = $this->conn->prepare("SELECT * FROM users WHERE username=:username");
        $arr_check=[
          ':username'=>$username,
        ];
        $check ->execute($arr_check);
        $is_check = $check->fetch(PDO::FETCH_ASSOC);
        if (!empty($is_check)){
            return TRUE;
        }
        return FALSE;
    }
    public function check_user_pass($user,$pass){
        $check = $this->conn->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
        $arr_check=[
            ':username'=>$user,
            ':password'=>$pass,
        ];
        $check ->execute($arr_check);
        $is_check = $check->fetch(PDO::FETCH_ASSOC);
        return $is_check;
    }
    public function select_one($id){
        $select = $this->conn->prepare("SELECT * FROM users WHERE id=$id");
        $select ->execute();
        $is_select = $select->fetch(PDO::FETCH_ASSOC);
        return $is_select;

    }
    public function delete($id){
        $delete = $this->conn->prepare("DELETE FROM users WHERE id=$id");
        return  $delete ->execute();
    }
    public function getuser($user){
        $select = $this->conn->prepare("SELECT * FROM users WHERE username=:username");
        $arr_select=[
          ':username'=>$user
        ];
        $select ->execute($arr_select);
        $is_select = $select->fetch(PDO::FETCH_ASSOC);
        return $is_select;

    }
    public function getCount(){
        $select = $this->conn->prepare("SELECT COUNT(id) FROM users WHERE TRUE $this->search");
        $select ->execute();
        return $select->fetchColumn();


    }
}
