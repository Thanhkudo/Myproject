<?php
//frontend/controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Sanpham.php';

class CartController extends Controller {

    //Giỏ hàng của bạn
    //Có thể truy cập thông qua url mvc như sau:
    //index.php?controller=cart&action=index
  // Url dạng rewrite đang là: gio-hang-cua-ban.html
  //Thao tác với file .htaccess, ngang hàng với file
  //index.php gốc của ứng dụng
    public function index() {



        if (isset($_POST['update'])) {
            if (empty($_SESSION['cart'])){
                $_SESSION['error'] = 'Không có sản phẩm nào';
                header("Location: index.php?controller=cart");
                exit();
            }

            //Lặp các phần tử trong giỏ hàng, và gán lại số lương
            //tương ứng cho từng phần tử theo id của sản phẩm
            foreach ($_SESSION['cart'] AS $id_sp => $cart) {
              //truy cập phần tử mảng theo product_id
              $_SESSION['cart'][$id_sp]['quantity'] = $_POST[$id_sp];
            }
            $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
        }
        if (isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] AS $id_sp => $cart) {
                if ($_SESSION['cart'][$id_sp]['quantity']==0) {
                    unset($_SESSION['cart'][$id_sp]);
                }
            }
        }

        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }


    //Phương thức nhận request từ ajax để xử lý thêm vào
    // giỏ hàng
    public function add() {
        //Debug mảng dựa vào method truyền lên từ ajax

        //+ Đã nhận đc product_id từ ajax truyền lên
        // + Lấy thông tin sản phẩm tương ứng với id truyền
//        lên
        $id_sp = $_GET['id'];
        $sp_model = new Sanpham();
        $sp = $sp_model->select_one($id_sp);
//
        // + Tạo 1 mảng để chứa các thông tin cần thiết của
        //giỏ hàng là name, price, avatar
        $gia= $sp['gia_sp']-($sp['gia_sp']*$sp['sale']/100);
        $cart = [
            'name' => $sp['name_sp'],
            'gia' => $gia,
            'avatar' => $sp['avatar'],
            //mặc định số lượng ban đầu = 1
            'quantity' => 1
        ];
        // + Xây dựng giỏ hàng sử dụng SESSION, với key=cart
        // - Nếu giỏ hàng chưa từng tồn tại trước đó, khi click
//        Thêm vào giỏ -> thêm mới 1 giỏ hàng
        if (!isset($_SESSION['cart'])) {
            //Thêm phần tử vào giỏ hàng luôn có format:
            //product_id => thông-tin-giỏ-hàng-tương-ứng
            $_SESSION['cart'][$id_sp] = $cart;
        } else {
            // - Nếu giỏ hàng đã tồn tại rồi thì sẽ tồn tại 2
            // trường hơp, sử dụng ham array_key_exists để
            //kiểm tra xem key có tồn tại trong 1 mảng hay ko

            // + Thêm sản phẩm chưa từng tồn tại trong giỏ:
            //xử lý tương tự trường hợp thêm mới sp vào giỏ
            if (!array_key_exists($id_sp, $_SESSION['cart'])) {
                $_SESSION['cart'][$id_sp] = $cart;
            } else {
                $_SESSION['cart'][$id_sp]['quantity']++;
                // + Thêm sản phẩm đã tồn tại trong giỏ rồi: ko
                //thêm mới sản phẩm mà update lại số lượng sản phẩm
                //dang có sẵn, bằng cách cộng thêm 1
            }
        }
        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';

    }

    //Phương thức xóa sản phẩm khỏi giỏ hàng
    public function delete() {
      //Nếu trong rewrite đã có valiate bằng regex, ví dụ
      //phải là số, thì bên PHP ko cần valiate lại nữa
      $id_sp = $_GET['id'];
      //Xóa sản phẩm trong giỏ hàng dựa theo id bắt đc
      unset($_SESSION['cart'][$id_sp]);
      //Kiểm tra nếu xóa hết toàn bộ sản phẩm trong giỏ hàng r
      // thì xóa luôn cái giỏ hàng đó đi
      if (empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
      }
      $_SESSION['success'] ="Đã xóa sản phẩm trong giỏ hàng !";
      header("Location:index.php?controller=cart&action=index");
      exit();
    }

}