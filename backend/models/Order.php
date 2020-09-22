<?php
require_once 'models/Model.php';
class Order extends Model {
    public $id;
    public $id_user;
    public $fullname;
    public $address;
    public $phone;
    public $email;
    public $note;
    public $price;
    public $payment;
    public $shipping;
    public $status;
    public $created_at;
    public $search;

    public function __construct(){
        parent::__construct();
        if (isset($_GET['name'])&&!empty($_GET['name'])){
            $name=$_GET['name'];
            $name=addslashes($name);
            $this->search.=" AND `fullname` LIKE '%$name%'";
        }
    }
    public function insert() {
        $insert = $this->conn->prepare("INSERT INTO orders(id_user, fullname, address, phone, email, note, price,payment,shipping, status)
    VALUES(:id_user, :fullname, :address, :phone, :email, :note, :price, :payment, :shipping, :status)");
        $arr = [
            ':id_user' => $this->id_user,
            ':fullname' => $this->fullname,
            ':address' => $this->address,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':note' => $this->note,
            ':price' => $this->price,
            ':payment' => $this->payment,
            ':shipping' => $this->shipping,
            ':status' => $this->status,
        ];
        $insert->execute($arr);
        $order_id = $this->conn->lastInsertId();
    return $order_id;
    }

    public function select_allpagination($params=[]){
        $limit = $params['limit'];
        $page =  $params['page'];
        $start = ($page - 1) * $limit;
        $select = $this->conn->prepare("SELECT * FROM orders WHERE TRUE $this->search ORDER BY id DESC LIMIT $start, $limit  " );
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;
    }

    public function select_one($id){
        $select = $this->conn->prepare("SELECT * FROM orders WHERE id=$id");
        $select ->execute();
        $is_select = $select->fetch(PDO::FETCH_ASSOC);
        return $is_select;

    }

    public function update($id){
        $update =$this->conn->prepare("UPDATE orders SET fullname=:fullname, phone=:phone, address=:address, email=:email, note=:note, price=:price, payment=:payment, shipping=:shipping, status=:status WHERE id = $id");
        $arr_update=[
            ':fullname'=>$this->fullname,
            ':phone'=>$this->phone,
            ':address'=>$this->address,
            ':email'=>$this->email,
            ':note'=>$this->note,
            ':price'=>$this->price,
            ':payment'=>$this->payment,
            ':shipping'=>$this->shipping,
            ':status'=>$this->status,
        ];
        return $update->execute($arr_update);

    }

    public function delete($id){
        $delete = $this->conn->prepare("DELETE FROM orders WHERE id=$id");
        return  $delete ->execute();
    }

    public function getCount(){
        $select = $this->conn->prepare("SELECT COUNT(id) FROM orders WHERE TRUE $this->search");
        $select ->execute();
        return $select->fetchColumn();


    }
}