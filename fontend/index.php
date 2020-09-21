<?php
session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');

$controller = isset($_GET['controller'])? $_GET['controller']:'home';

$action = isset($_GET['action'])? $_GET['action']:'index';

$controller= ucfirst($controller);
$controller.="Controller";

$controller_file = $controller.".php";

$past_controller="controllers/$controller_file";

if (!file_exists($past_controller)){
    die("Trang bạn tìm không tồn tại");
}
else{
    require_once "$past_controller";

    $obj = new $controller;

    if (!method_exists($obj,$action)){
        die("Không tồn tại phương thức $action trong class $controller");
    }
    $obj->$action();
}
?>
<?php
echo'<pre>';
//print_r($_SESSION['user_main']);
echo'</pre>';

?>
