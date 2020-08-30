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
});