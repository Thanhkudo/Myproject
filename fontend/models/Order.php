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

  //Insert vào bảng orders
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
}