<?php
class pagination{
    public $param =[
        'total'=> 0,        //tổng số trang
        'limit'=> 0,        //số bản ghi trên 1 trang
        'string'=>'page' ,   //tham số truyền lên url
        //vd: index.php?controller=user&action=index&page=2
        'controller'=>'',
        'action'=>'',
        'query'=>'',
    ];
    public $full_url;

    public function __construct($param=[]){
        if (isset($param['limit']) && $param['limit']<0){
            die('Tham số limit ko đc bé hơn 0');
        }
        if (isset($param['total']) && $param['total']<0){
            die('Tham số total ko đc bé hơn 0');
        }
        if (!isset($param['string'])){
            $param['string']='page';
        }
        //gán tham số
        $this->param=$param;
        $query='';
        if (isset($this->param['query'])&& !empty($this->param['query'])){
            $query = '&'.$this->param['query'];
        }
        $this->full_url= $_SERVER['PHP_SELF'].'?controller='.$this->param['controller'].'&action='.$this->param['action'].$query.'&'.$this->param['string'].'=';
    }

    //lấy thông số param tổng số trang
    public function getTotalPage(){
        $total = $this->param['total'] / $this->param['limit'];
        $total = ceil($total);  //lm tròn lên số nguyên dương
        return $total;
    }

    //lấy số trang hiện tại
    public function getCurrentPage(){
        $page=1;
        $string= $this->param['string'];
        if (isset($_GET[$string])&&$_GET[$string]>=1){
            if ($_GET[$string]>$this->getTotalPage()){
                $page = $this->getTotalPage();
            }else{
                $page = $_GET[$string];
            }
        }
        return $page;
    }
    //lấy số thang trc
    public function getPrevPage(){
        $prev_page='';
        //lấy ra trang hiện tại
        if ($this->getCurrentPage() > 1){
            $url=$this->full_url.($this->getCurrentPage() -1);
            $prev_page='<li><a href="'.$url.'"> Prev </a></li>';
        }
        return $prev_page;
    }

    //lấy số trang sau
    public function getNexxtPage(){
        $next_page = '';
        $current_page = $this->getCurrentPage();
        $total_page = $this->getTotalPage();
        if ($current_page < $total_page){
            $url=$this->full_url.($current_page + 1);
            $next_page ='<li><a href="'.$url.'"> Next </a></li>';
        }
        return $next_page;
    }

    //hiển thị pagination
    public function getPagination(){

        if ($this->getTotalPage() == 1){
            return '';
        }
        $data ='<ul class="pagination">';

        //hiển thị Prev
        $data.=$this->getPrevPage();
        //lặp từng trang
        for ($i=1;$i<=$this->getTotalPage();$i++){
            $current_page = $this->getCurrentPage();
            //nếu là trang hiện tại thì thêm active để nhận biết
            if ($i == $this->getCurrentPage()){
                $data.='<li class="active"><a href=""> '.$i.' </a></li>';
            }
            else{
                $url=$this->full_url.$i;
                $data.='<li><a href="'.$url.'"> '.$i.' </a></li>';
            }
        }

        //hiển thị Next
        $data.=$this->getNexxtPage();
        $data.="</ul>";

        return $data;
    }

}
?>