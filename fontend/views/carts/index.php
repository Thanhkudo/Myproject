<?php

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="payment-content ng-scope" ng-controller="orderController" ng-init="initCheckoutController()">
                <h1 class="title"><span>Giỏ hàng</span></h1>
                <div class="table-responsive">
                    <form action="" method="post">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lương</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        if(isset($_SESSION["cart"])):
                            $i=0;
                            $total_cart=0
                        ?>

                            <?php foreach ($_SESSION["cart"] as $id_sp => $cart):$i++;?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td><a href="?controller=sanpham&action=index&id=<?php echo $id_sp?>"><?php echo $cart["name"];?></a></td>
                                    <td>
                                        <img src="../backend/assets/images/sanpham/<?php echo $cart["avatar"] ?>" width="100" alt="">
                                    </td>
                                    <td>
                                        <?php ;
                                        $price=$cart['gia'];
                                        echo number_format("$price",0,",",".");?> VNĐ
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" min="0" class="form-control product-amount" name="<?php echo $id_sp ?>" id="<?php echo $id_sp ?>"  value="<?php echo $cart["quantity"] ?>" />
                                                <a href="?controller=cart&action=delete&id=<?php echo $id_sp ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                    Xóa
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php $total_item= $cart["quantity"] * $price;
                                        echo number_format("$total_item",0,",",".");
                                        $total_cart +=$total_item;
                                        ?> VNĐ
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="5">Tổng tiền</td>
                                <td><?php echo number_format("$total_cart",0,",",".");  ?> VNĐ</td>
                            </tr>
                        <?php else:?>
                            <tr>
                                <td colspan="6"><h4>Không có sản phẩm nào</h4></td>
                            </tr>
                        <?php endif;?>
                    </table>
                </div>
                <center>

                    <a href=""><input type="submit" name="update" class="btn btn-primary" value="Cập Nhật"></a>
                    <a style="margin-left: 30px;" href="index.php?view=thanhtoan"><input type="submit" class="btn btn-primary" value="Thanh Toán"></a>
                </center>
                </form>
                <div class="payment-title text-center">
                    <h3>
                        GIAO HÀNG TOÀN QUỐC - THANH TOÁN KHI NHẬN HÀNG - 15 NGÀY ĐỔI TRẢ MIỄN PHÍ
                    </h3>
                    <div>
                        Nếu gặp khó khăn trong việc đặt hàng xin hãy gọi<b class="hotline"> 0979139451 </b>
                        để được hỗ trợ tốt nhất.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>