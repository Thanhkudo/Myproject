<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';
class ContactController extends Controller{

    public function map (){
        $this->content=$this->render('views/contacts/map.php');
        require_once 'views/layouts/main.php';
    }
    public function contact(){
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            if (isset($_SESSION['user_main'])){
                $id = $_SESSION['user_main']['id'];
            }
            if (empty($content)){
                $this->error="Vui lòng nhập nội dung phản hồi !";
            }
            if (empty($this->error)){
                $contact_model=new Contact();
                $contact_model->id_user=$id;
                $contact_model->name=$name;
                $contact_model->phone=$phone;
                $contact_model->address=$address;
                $contact_model->email=$email;
                $contact_model->title=$title;
                $contact_model->content=$content;
                $insert = $contact_model->insert();
                if ($insert){
                    $_SESSION['success']="Cảm ơn ý kiến của bạn, chúng tôi sẽ xem xét thật kỹ !";
                    header('Location:index.php?controller=contact&action=contact');
                    exit();
                }
                else{
                    $this->error="Vui lòng thử lại !";
                }
            }

        }
        $this->content=$this->render('views/contacts/contact.php');
        require_once 'views/layouts/main.php';
    }
}
?>