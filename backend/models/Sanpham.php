<?php
require_once "models/Model.php";

class Sanpham extends Model {
    public $id_sp;
    public $name_sp;
    public $id_loaisp;
    public $id_hangsx;
    public $gia_sp;
    public $thongso_sp;
    public $mota_sp;
    public $noibat;
    public $avatar;
    public $status;
    public $sale;
    public $search;


    public function __construct(){
        parent::__construct();
        if (isset($_GET['name'])&&!empty($_GET['name'])){
            $name=$_GET['name'];
            $name=addslashes($name);
            $this->search.=" AND `name_sp` LIKE '%$name%'";
        }
    }

    public function insert(){
        $insert=$this->conn->prepare("INSERT INTO sanpham(`name_sp`,`id_loaisp`,`id_hangsx`,`gia_sp`,`thongso_sp`,`mota_sp`,`noibat`,`avatar`,`status`,`sale`) 
        VALUES (:name_sp, :id_loaisp, :id_hangsx, :gia_sp, :thongso_sp, :mota_sp, :noibat, :avatar, :status, :sale)");
        $arr_insert=[
            ':name_sp'=>$this->name_sp,
            ':id_loaisp'=>$this->id_loaisp,
            ':id_hangsx'=>$this->id_hangsx,
            ':gia_sp'=>$this->gia_sp,
            ':thongso_sp'=>$this->thongso_sp,
            ':mota_sp'=>$this->mota_sp,
            ':noibat'=>$this->noibat,
            ':avatar'=>$this->avatar,
            ':status'=>$this->status,
            ':sale'=>$this->sale,
        ];
        return $insert->execute($arr_insert);
    }
    public function update(){
    }
    public function select_one($id){
        $select = $this->conn->prepare("SELECT * FROM sanpham WHERE id_sp=$id");
        $select ->execute();
        $is_select = $select->fetch(PDO::FETCH_ASSOC);
        return $is_select;

    }
    public function checknamesp($namesp){
        $check = $this->conn->prepare("SELECT * FROM sanpham WHERE name_sp=:namesp");
        $arr_check=[
            ':namesp'=>$namesp,
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
        $select = $this->conn->prepare("SELECT * FROM sanpham WHERE TRUE $this->search LIMIT $start, $limit " );
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }
    public function delete($id){
        $delete = $this->conn->prepare("DELETE FROM sanpham WHERE id_sp=$id");
        return  $delete ->execute();
    }
    public function getCount(){
        $select = $this->conn->prepare("SELECT COUNT(id_sp) FROM sanpahm WHERE TRUE $this->search");
        $select ->execute();
        return $select->fetchColumn();


    }
}