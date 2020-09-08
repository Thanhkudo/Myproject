 <div class="row">
    <div class="col-md-12" >
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img style="width: 1150px; height: 431.25px" src="assets/images/layouts/s3.png" >
                </div>

                <div class="item">
                    <img  style="width: 1150px; height: 431.25px" src="assets/images/layouts/s2.jpg">
                </div>

                <div class="item">
                    <img style="width: 1150px; height: 431.25px" src="assets/images/layouts/s1.png">
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</div>

 <br>

 <div class="tabs-category clearfix">
     <div class="tab-content clearfix container">
         <div class="tabs-title">
             <div id="" class="tab-title">
                 <h3>
                     <span>DANH SÁCH SẢN PHẨM </span>
                 </h3>
             </div>
         </div>
     </div>
 </div>
 <div class="container female">
     <div class="row pTB" >
         <?php foreach ($select_sp as $val):?>

             <div class="col-md-3 col-sm-6 ">
                 <div class="products">
                     <?php if($val['sale']!=0):?>
                         <div class="offer"><?php echo $val["sale"]."%"; ?></div>
                     <?php endif; ?>
                     <div class="thumbnail"><a href="index.php?view=info_product&id=<?php echo $val['id_sp'] ?>"><img style="width: 225px; height: 225px;" src="../backend/assets/images/sanpham/<?php echo $val['avatar']?>" alt="Sản phẩm"></a></div>
                     <div class="productname"><?php echo $val['name_sp'] ?></div>
                     <h4 class="price"><?php
                         $price=$val["gia_sp"];
                         $sale=$val["sale"];
                         $price_sale=$price - $price*$sale/100;

                         echo number_format("$price_sale",0,",",".");
                         echo " VNĐ .";
                         ?></h4>

                     <div class="button_group" style="margin-bottom: 2px;">
                         <button class="button " type="button" onclick="addCart(<?php echo $sql_row["id_sp"]; ?>)">
                             <span class="glyphicon glyphicon-shopping-cart"></span>Thêm vào giỏ hàng</button>
                     </div>
                 </div>
             </div>
         <?php endforeach; ?>
     </div>
     <div class="text-center">
         <?php echo $pagination ?>
     </div>
 </div>
