<?php
require_once "models/Model.php";

class Hang_sx extends Model
{
    public $id_hangsx;
    public $name_hangsx;
    public $note;
    public $search;

    public function __construct(){
        parent::__construct();
        if (isset($_GET['name'])&&!empty($_GET['name'])){
            $name=$_GET['name'];
            $name=addslashes($name);
            $this->search.=" AND `name_hangsx` LIKE '%$name%'";
        }
    }

    public function select_all(){
        $select = $this->conn->prepare("SELECT * FROM hang_sx ");
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert(){
        $insert=$this->conn->prepare("INSERT INTO hang_sx(`name_hangsx`,`note`)VALUES ( :name_hangsx, :note)");
        $arr_insert=[
            ':name_hangsx'=>$this->name_hangsx,
            ':note'=>$this->note,
        ];
        return $insert->execute($arr_insert);
    }
    public function update($id){
        $update =$this->conn->prepare("UPDATE hang_sx SET name_hangsx=:name_hangsx, note =:note WHERE id_hangsx = $id");
        $arr_update=[
            ':name_hangsx'=>$this->name_hangsx,
            ':note'=>$this->note,
        ];
        return  $update->execute($arr_update);
    }
    public function select_one($id){
        $select = $this->conn->prepare("SELECT * FROM hang_sx WHERE id_hangsx=$id");
        $select ->execute();
        $is_select = $select->fetch(PDO::FETCH_ASSOC);
        return $is_select;

    }
    public function checknamesp($namesp){
        $check = $this->conn->prepare("SELECT * FROM hang_sx WHERE name_hangsx=:name_hangsx");
        $arr_check=[
            ':name_hangsx'=>$this->name_hangsx,
        ];
        $check ->execute($arr_check);
        $is_check = $check->fetch(PDO::FETCH_ASSOC);
        if (!empty($is_check)){
            return TRUE;
        }
        return FALSE;
    }
    public function select_allpagination($params=[]){
        $limit = $params['limit'];
        $page =  $params['page'];
        $start = ($page - 1) * $limit;
        $select = $this->conn->prepare("SELECT * FROM hang_sx WHERE TRUE $this->search LIMIT $start, $limit " );
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }
    public function delete($id){
        $delete = $this->conn->prepare("DELETE FROM hang_sx WHERE id_hangsx=$id");
        return  $delete ->execute();
    }
    public function getCount(){
        $select = $this->conn->prepare("SELECT COUNT(id_hangsx) FROM hang_sx WHERE TRUE $this->search");
        $select ->execute();
        return $select->fetchColumn();


    }
}
