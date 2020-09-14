$(document).ready(function () {
//hiển thị ảnh preview khi upload
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-preview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $('input[type=file]').change(function () {
        readURL(this);
    })

    //tích hợp ckediter: giá trị truyền vào là name của thẻ text aria
    //cần xóa cache trình duyệt để thấy sự thay đổi
    //Ctrl + Shift + R
    CKEDITOR.replace('noibat' , {
        //đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    CKEDITOR.replace('thongso' , {
        //đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    CKEDITOR.replace('mota' , {
        //đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });



    $('.add-to-cart').click(function () {
        //nhớ xóa cache trình duyệt: ctrl + Shift + R
         alert('clicked');
        // LẤy giá trị của thuộc tính data-id đã khai báo trong
        // class hiện tại, data-id chính là product_id của sản
        //phẩm
        // + Sử dụng $(this) để tham chiếu đến chính selector
        // hiện tại
        var id_sp = $(this).attr('data-id');
        console.log(id_sp);
        // + Gọi ajax, truyền vào 1 đối tượng
        $.ajax({
            method: 'GET',
            // + Url theo mô hình MVC sẽ xử lý ajax
            url: 'index.php?controller=cart&action=add',
            // + Dữ liệu gửi lên, là 1 object
            data: {
                id_sp: id_sp
            },
            // + Nơi đón kết quả trả về từ url, biến data chứa toàn
            //bộ kết quả trả về
            success: function (data) {
                //Set message hiển thị cho class ajax-message
                $('.ajax-message').html('Thêm vào giỏ hàng thành công');
                //add class này dể set opacity = 1, vì mặc định ban đầu
                //message đang có opacity = 0 -> ẩn
                $('.ajax-message').addClass('ajax-message-active');
                //Sau khi hiển thị message thì sẽ xóa message này đi
                //, chờ khoảng 5s r mới xóa, sử dụng hàm setTimeout
                setTimeout(function () {
                    // Remove class ajax-message-active đi
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000);

                var cart_total = $('.cart-amount').text();
                cart_total++;
                $('.cart-amount').text(cart_total);
                $('.cart-amount-mobile').text(cart_total);
            }
            // + Xem thông tin ajax: xem trong tab Network của
            // trình duyệt
        });
    })
});