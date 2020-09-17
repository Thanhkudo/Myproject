<?php
    echo "<pre>";
    print_r($_POST);
echo "</pre>";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <script src="/app/services/orderServices.js"></script>
                <script src="/app/controllers/orderController.js"></script>
                <div class="payment-content ng-scope" ng-controller="orderController" ng-init="initCheckoutController()">
                    <h1 class="title"><span>Thanh toán</span></h1>
                    <div class="steps clearfix" style="padding-bottom: 30px;">
                        <ul class="clearfix">
                            <li class="cart active col-md-2 col-xs-4 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng</span><span class="step-number"><a>1</a></span></li>
                            <li class="payment active col-md-2 col-xs-4 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                            <li class="finish active col-md-2 col-xs-4 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                    </div>

                    <form class="payment-block clearfix ng-invalid ng-invalid-required ng-valid-email ng-dirty ng-valid-parse" id="checkout-container" method="POST" action="">
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
                            <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                            <div class="step-preview clearfix">
                                <h2 class="title">Thông tin thanh toán</h2>
                                <div class="form-block ng-scope">
                                    <div class="user-login">Đăng ký tài khoảng mới <a href="?controller=users&action=create"> Tại đây </a></div><br>
                                    <div class="form-group"><input class="form-control" id="fullname" name="fullname" placeholder="Họ & Tên" required value="<?php echo isset($_SESSION["user_main"])?$_SESSION["user_main"]["fullname"]:''?>" type="text"></div>
                                    <div class="form-group"><input class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="<?php echo isset($_SESSION["user_main"])?$_SESSION["user_main"]["phone"]:''?>" required type="text"></div>
                                    <div class="form-group"><input class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($_SESSION["user_main"])?$_SESSION["user_main"]["email"]:''?>" required type="email"></div>

                                    <div class="form-group">
                                        <i style="color: red; font-size: 11px;">Nhập địa chỉ chi tiết để chúng tôi có thể giao hàng tận nơi cho bạn</i>
                                        <div class="form-group"><input id="address" name="address" class="form-control" placeholder="Số nhà- Xã/Phường - Quận Huyện - Tỉnh TP" required type="text"></div>
                                    </div>
                                    <textarea class="form-control" rows="4" id="note" name="note" placeholder="Ghi chú đơn hàng"></textarea>
                                </div><!-- end ngIf: CustomerId<=0 -->
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
                            <h4>2. Thanh toán và vận chuyển</h4>
                            <div class="step-preview clearfix">
                                <h2 class="title">Vận chuyển</h2>
                                <div class="form-group ">
                                    <select class="form-control" name="vanchuyen">
                                        <option value="1" name="" selected="selected">Giao hàng tận nhà</option>
                                        <option value="2" >Nhận hàng tại cửa hàng</option>
                                    </select>
                                </div>
                                <h2 class="title">Thanh toán</h2>
                                <div class="form-group">
                                    <select class="form-control" name="thanhtoan">
                                        <option value="1" selected="selected">Thanh toán tiền mặt</option>
                                        <option value="2" >Chuyển khoản ngân hàng</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
                            <h4>3. Thông tin đơn hàng</h4>
                            <div class="step-preview">
                                <div class="cart-info">
                                    <div class="cart-items">
                                        <table style="border:1px solid red; width: 100%; font-size: 11px;"  >
                                            <tr>
                                                <th class="text-center">Tên sản phẩm</th>
                                                <th class="text-center">Ảnh</th>
                                                <th class="text-center">Giá</th>
                                                <th class="text-center">Số lương</th>
                                                <th class="text-center">Thành tiền</th>
                                            </tr>
                                            <?php $total_cart=0; foreach ($_SESSION['cart'] as $id_sp=>$cart):?>
                                            <tr>
                                                <td class="text-center"><?php echo $cart['name']?></td>
                                                <td class="text-center"><img src="../backend/assets/images/sanpham/<?php echo $cart['avatar']?>" alt="" width="75px" height="75px" class="img-size-32"></td>
                                                <td class="text-center"><?php echo $cart['gia']?></td>
                                                <td class="text-center"><?php echo $cart['quantity']?></td>
                                                <td class="text-center">
                                                    <?php echo $total=$cart['quantity']* $cart['gia']?>
                                                </td>
                                                <?php $total_cart += $total?>
                                            </tr>
                                            <?php endforeach;?>
                                        </table>
                                    </div>

                                    <div class="total-payment">
                                        Thanh toán <span class="ng-binding"><?php echo number_format($total_cart);  ?> VNĐ </span>
                                    </div>
                                    <div class="button-submit">
                                        <button class="btn btn-default" name="submit" type="submit">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class=" container">
    <div class="policy-content clearfix">
        <div class="col-md-3  clearfix">
            <div class="sale-policy-block">
                <i class="fa fa-refresh"></i>
                <span>Hoàn trả trong<br>30 ngày</span>
            </div>
        </div>
        <div class="col-md-3 clearfix">
            <div class="sale-policy-block">
                <i class="fa fa-truck"></i>
                <span>Giao hàng<br>miễn phí</span>
            </div>
        </div>
        <div class="col-md-3 clearfix">
            <div class="sale-policy-block">
                <i class="fa fa-life-saver"></i>
                <span>Thanh toán<br>linh hoạt</span>
            </div>
        </div>
        <div class="col-md-3 clearfix">
            <div class="sale-policy-block">
                <i class="fa fa-users"></i>
                <span>Hỗ trợ<br>khách hàng</span>
            </div>
        </div>
    </div>
</div>
