<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/Pagination.php';
require_once 'models/OrderDetail.php';
class PaymentController extends Controller{

    public function index(){
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $vanchuyen = $_POST['vanchuyen'];
            $thanhtoan = $_POST['thanhtoan'];
            $id_user='';
            if (isset($_SESSION['user_main'])){
                $id_user=$_SESSION['user_main']['id'];
            }

            if (empty($fullname)){
                $this->error = " Bạn cần nhập họ tên !";
            }elseif (empty($phone)){
                $this->error = " Bạn cần nhập SĐT!";
            }elseif (!filter_var($phone, FILTER_VALIDATE_INT)) {
                $this->error = 'SĐT ko đúng định dạng';
            }elseif (empty($email)){
                $this->error = " Bạn cần nhập Email!";
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email ko đúng định dạng';
            }elseif (empty($address)){
                $this->error = " Bạn cần nhập địa chỉ!";
            }
            if (empty($this->error)) {
                $order_model = new Order();
                $order_model->id_user = $id_user;
                $order_model->fullname = $fullname;
                $order_model->phone = $phone;
                $order_model->address = $address;
                $order_model->email = $email;
                $order_model->note = $note;
                $order_model->payment = $thanhtoan;
                $order_model->shipping = $vanchuyen;
                $order_model->status = 0;

                $price = 0;
                foreach ($_SESSION['cart'] AS $id_sp => $cart) {
                    $price += $cart['gia'] * $cart['quantity'];
                }
                $order_model->price = $price;

                $id_order = $order_model->insert();
                var_dump($id_order);

                $order_detail_model = new OrderDetail();
                foreach ($_SESSION['cart'] AS $id_sp => $cart) {
                    $order_detail_model->id_order = $id_order;
                    $order_detail_model->id_sp= $id_sp;
                    $order_detail_model->name_sp = $cart['name'];
                    $order_detail_model->quantity = $cart['quantity'];
                    $is_insert = $order_detail_model->insert();
                    var_dump($is_insert);
                }

                //Gửi mail cho khách hàng, viết thành 1 phương thức
                //gửi mail
                // Nội dung mail khi gửi chính là thông tin người mua hàng
                //và thông tin đơn hàng

//        $body = $this->render('views/payments/mail_template_order');
//        $this->sendMail($email, $body);

                if ($thanhtoan == 2) {
                    $_SESSION['payment'] = [
                        'price' => $price,
                        'fullname' => $fullname,
                        'email' => $email,
                        'phone' => $phone
                    ];
                    header("Location: index.php?controller=payment&action=online");
                    exit();
                } else {
                    header('Location: index.php?controller=payment&action=thanks');
                    exit();
                }

            }
        }
        $this->content=$this->render('views/payment/index.php');
        require_once 'views/layouts/main.php';
    }

    public function order(){
        $this->title_page="Hóa đơn";
        $order_model=new Order();
        $params=[
            'limit'=>4,
            'string'=>'page',
            'controller'=>'payment',
            'action'=>'order',
        ];
        $page =1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        if (isset($_GET['name'])){
            $params['query']= '&fullname='.$_GET['name'];
        }
        $total = $order_model->getCount();
        $params['total']=$total;
        $params['page']=$page;
        $pagiantion_model=new Pagination($params);
        $pagination = $pagiantion_model->getPagination();
        $select_order = $order_model->select_allpagination($params);

        $this->content = $this->render('views/payment/order.php',[
            'select_order'=>$select_order,
            'pagination' =>$pagination,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function online() {
        $this->content = $this->render('configs/nganluong/index.php');
        require_once 'views/layouts/main.php';
    }
    public function thanks() {
        $this->content=$this->render('views/payment/thanks.php');
        require_once 'views/layouts/main.php';
    }
}
?>