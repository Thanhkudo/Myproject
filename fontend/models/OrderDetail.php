<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
    public $id_order;
    public $id_sp;
    public $name_sp;
    public $avatar;
    public $quantity;

  //Insert vào bảng order_details
    public function insert() {
        $insert = $this->conn->prepare("INSERT INTO order_details(id_order, id_sp, name_sp, avatar, quantity)
    VALUES (:id_order, :id_sp, :name_sp, :avatar, :quantity)");

        $arr= [
            ':id_order' => $this->id_order,
            ':id_sp' => $this->id_sp,
            ':name_sp' => $this->name_sp,
            ':avatar'=>$this->avatar,
            ':quantity' => $this->quantity,
        ];
        return $insert->execute($arr);
    }

    public function select_all($id){
        $select = $this->conn->prepare("SELECT * FROM order_details WHERE id_order = $id ORDER BY id DESC ");
        $select ->execute();
        $is_select = $select->fetchAll(PDO::FETCH_ASSOC);
        return $is_select;

    }
}
