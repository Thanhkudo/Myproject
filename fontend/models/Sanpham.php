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
    public $search='';


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
    public function update($id){
        $update =$this->conn->prepare("UPDATE sanpham SET name_sp=:name_sp, id_loaisp=:id_loaisp, id_hangsx=:id_hangsx, gia_sp=:gia_sp, thongso_sp=:thongso_sp, mota_sp=:mota_sp, noibat=:noibat, avatar=:avatar, sale=:sale, status=:status WHERE id_sp = $id");
        $arr_update=[
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
        return  $update->execute($arr_update);
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
    public function select_allpagination($params=[],$idloai,$idhang){
        $menu = !empty($idloai)&&!empty($idhang)? "AND `id_hangsx` = $idhang AND `id_loaisp` = $idloai":'';
        $limit = $params['limit'];
        $page =  $params['page'];
        $start = ($page - 1) * $limit;
        $select = $this->conn->prepare("SELECT * FROM sanpham WHERE TRUE $this->search $menu LIMIT $start, $limit " );
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }
    public function delete($id){
        $delete = $this->conn->prepare("DELETE FROM sanpham WHERE id_sp=$id");
        return  $delete ->execute();
    }
    public function getCount(){
        $select = $this->conn->prepare("SELECT COUNT(id_sp) FROM sanpham WHERE TRUE $this->search");
        $select ->execute();
        return $select->fetchColumn();


    }
    public function getmenu($n){
        $select= $this->conn->prepare("SELECT DISTINCT sanpham.id_hangsx,sanpham.id_loaisp,hang_sx.name_hangsx FROM sanpham INNER JOIN hang_sx ON sanpham.id_hangsx = hang_sx.id_hangsx WHERE sanpham.id_loaisp = $n");
        $select->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }
    public function getCountmenu($idloai,$idhang){
        $menu = !empty($idloai)&&!empty($idhang)? "AND `id_hangsx` = $idhang AND `id_loaisp` = $idloai":'';
        $select = $this->conn->prepare("SELECT COUNT(id_sp) FROM sanpham WHERE TRUE $this->search $menu");
        $select ->execute();
        return $select->fetchColumn();


    }
}