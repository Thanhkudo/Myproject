<div class="container">
    <div class="contact-content clearfix ng-scope" >
        <h1 class="title">
            <span>
                Thông tin liên hệ
            </span>
        </h1>
        <div class="contact-block clearfix">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-info">
                        <div class="docs"><b class="name ng-binding">Kudo Shop</b></div>
                        <div class="docs ng-binding">
                            <i class="fa fa-map-marker"></i>
                            <b>Địa chỉ:</b> Phú Lương - Hà Đông - Hà Nội
                        </div>
                        <div class="docs ng-binding">
                            <i class="fa fa-phone"></i>
                            <b>Điện thoại:</b> (+84) 32 79 2626
                        </div>
                        <div class="docs ng-binding">
                            <i class="fa fa-mobile"></i>
                            <b>Hotline</b> 035 582 0911
                        </div>
                        <div class="docs ng-binding">
                            <i class="fa fa-fax"></i>
                            <b>Fax:</b> (09) 10 01 198
                        </div>
                        <div class="docs">
                            <i class="fa fa-envelope"></i>
                            <a href="" class="ng-binding">Thanhkudo@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h3 class="title">Gửi thông tin liên hệ</h3>
                    <div class="description">
                        Xin vui lòng điền các yêu cầu vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi
                        sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!
                    </div>
                    <div class="contact-feedback">
                        <form method="post" action="">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                                <input placeholder="Họ tên" name="name" ng-model="Name" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="" type="text" value="<?php echo isset($_SESSION['user_main']['fullname'])?$_SESSION['user_main']['fullname']:''?>">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <input placeholder="Địa chỉ" name="address" ng-model="Address" class="form-control ng-pristine ng-untouched ng-valid" type="text"value="<?php echo isset($_SESSION['user_main']['address'])?$_SESSION['user_main']['address']:''?>">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input placeholder="Email" name="email" ng-model="Email" class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" required="" type="email" value="<?php echo isset($_SESSION['user_main']['email'])?$_SESSION['user_main']['email']:''?>">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input placeholder="Điện thoại" name="phone" ng-model="Phone" class="form-control" required="" type="text" value="<?php echo isset($_SESSION['user_main']['phone'])?$_SESSION['user_main']['phone']:''?>">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input placeholder="Tiêu đề" name="title" ng-model="Title" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="" type="text" value="">
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Nội dung" name="content" class="form-control " rows="3" ng-model="Content" required=""></textarea>
                            </div>
                            <button class="btn btn-default" type="submit" name="submit">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>