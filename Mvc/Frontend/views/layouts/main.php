

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <base href="<?php echo $_SERVER['SCRIPT_NAME']; ?>" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Showroom Tú Hoàng </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
  <link rel="stylesheet" href="assets/Frontend/css/plugins.css">
  <link rel="stylesheet" href="assets/Frontend/css/style.css">
  <script src="Assets/Backend/js/jquery.min.js"></script>
</head>
<body>
<input type="hidden" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ""  ?>" name="getid" class="get_id">
<?php require_once 'Mvc/frontend/views/layouts/header.php' ;?>
<!--header area end-->
<?php  if(isset($_SESSION['success'])): ?>
  <div class="container">
    <div class="alert alert-success alert-dismissible "role="alert">
      <?php echo "<i class='fa fa-check'></i>" . $_SESSION["success"];
      unset($_SESSION["success"]); ?>
    </div>
  </div>
<?php endif;?>
<?php  if(isset($_SESSION['error'])): ?>
  <div class="container">
    <div class="alert alert-danger alert-dismissible"role="alert">
      <?php echo "<i class='fa fa-times'></i>" .$_SESSION["error"];
      unset($_SESSION["error"]); ?>
    </div>
  </div>
<?php endif;?>
<?php echo $this->content; ?>
<!--footer area start-->
<?php require_once 'Mvc/frontend/views/layouts/footer.php'; ?>
<!--footer area end-->
<?php  require_once 'Mvc/frontend/controllers/ProductController.php';
$product=new ProductController();
$product->detailModal();
?>
<!-- Plugins JS -->
<script src="assets/Frontend/js/plugins.js"></script>
<script src="assets/Frontend/js/main.js"></script>
<script src="Assets/Backend/js/jquery.validate.min.js"></script>
<script src="Assets/Backend/js/additional-methods.min.js"></script>
<!-- Main JS -->
<script>
    function changeImage(id) {

        // lấy giá trị của thuộc tính src
        var srcImg = document.getElementById(id).getAttribute("src");
        //
        // tác động vào thuộc tính src của thẻ html co id=img-main
        document.getElementById("img-main").setAttribute("src", srcImg);
    }
    function HeartProduct(id) {

        $.ajax({
            url: "index.php?area=frontend&controller=WishList&action=addWishList",
            method: 'POST',
            data: {
                id: id,
            },
            dataType: "text",
        }).done(function (data) {
            location.reload(data);
            alert(data);
        });
    };
        $("#register_form").validate({
            rules:  {
                fullname : "required",
                email :{
                    required: true,
                    email: true
                },
                phone :
                    {
                        required : true,
                        number: true,
                        maxlength:10,
                        minlength:10
                    },
                password: {
                    required: true,
                    minlength: 5
                },
            },
            messages :
                {
                    fullname : " * Họ tên không được để trống",
                    email :{
                        required: " * Email không được để trống",
                        email: " * Phải đúng định dạng là Email"
                    },
                    phone :
                        {
                            required : " * Số điện thoại không được để trống",
                            number: "* Phải nhập số không được nhập chữ hay ký tự đăc biệt",
                            minlength: " * Số điện thoại phải có ít nhất 10 số",
                            maxlength :" * Số điện thoại không được quá 10 số",
                        },
                    password: {
                        required: " * Mật khẩu không được để trống",
                        minlength: " * Mật khẩu phải có ít nhất 5 ký tự",
                    },
                }
        });
        $("#register_email").keyup(function () {
            let email = $(this).val();
            $.post("index.php?area=frontend&controller=login&action=validateEmail",
                {email: email},
                function (data) {
                    if (data == "True") {
                        $("#emailerror").text(" * Email này đã được đăng ký");
                        $("#emailerror").css("font-style","italic");
                        $("#emailerror").css("color","red");
                        document.getElementById("submit_register").disabled = true;
                    }
                    else {
                        document.getElementById("submit_register").disabled = false;
                        $("#emailerror").text("");
                    }
                });
        });
        $("#register_phone").keyup(function () {
            let phone = $(this).val();
            $.post("index.php?area=frontend&controller=login&action=validatePhone",
                {phone: phone},
                function (data) {
                console.log(data);
                    if (data == "True") {
                        $("#phoneerror").text(" * Số điện thoại này đã được đăng ký");
                        $("#phoneerror").css("font-style","italic");
                        $("#phoneerror").css("font-size","12px");
                        $("#phoneerror").css("color","red");
                        document.getElementById("submit_register").disabled = true;
                    }
                    else {
                        document.getElementById("submit_register").disabled = false;
                        $("#phoneerror").text("");
                    }
                });
        });
        $("#login_frontend").validate({
            rules:  {
                email :{
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
            },
            messages :
                {
                    email :{
                        required: " *Email không được để trống",
                        email: " *Tên đăng nhâp phải đúng định dạng là Email"
                    },

                    password: {
                        required: " * Mật khẩu không được để trống",
                    },
                }
        });
        $("#shopping_pay").validate({

            rules:  {
                fullname : "required",
                email :{
                    required: true,
                    email: true
                },
                phone :
                    {
                        required : true,
                        number: true,
                    },
                address: {
                    required: true,
                },
            },
            messages :
                {
                    fullname : " * Họ tên không được để trống",
                    email :{
                        required: " * Email không được để trống",
                        email: " * Phải đúng định dạng là Email"
                    },
                    phone :
                        {
                            required: " * Số điện thoại không được để trống",
                            number: "* Phải nhập số không được nhập chữ hay ký tự đăc biệt",
                        },
                    address: {
                        required: " * Địa chỉ nhận hàng không được để trống",
                    },
                }
        });
    function CartAddShopping(id,quanlity) {
        var numerCart=$("#numCart").val();
        if(quanlity < numerCart){
            alert("Sản phẩm này chỉ còn" +quanlity+ "Sản phẩm");
        }else{
            $.ajax({
                url: "index.php?area=frontend&controller=cart&action=add",
                type: "POST",
                data: {
                    'number' : numerCart,
                    'id' : id
                },
                success: function (data) {
                    console.log(data);
                    location.replace("gio-hang-cua-ban");
                }
            });
        }
    }
//
    $(function () {
        let listStar=$(".list-star .icon-star");
        listratingText= {
            1: 'Không thích',
            2: 'Tạm được',
            3: 'Bình thường',
            4: 'Tốt',
            5: 'Rất tốt',
        };
        listStar.click(function () {
            let $this=$(this);
            let number=$this.attr('data-key');
            listStar.removeClass('font-red');
            $(".number_rating").val(number);
            $.each(listStar,function (key,value) {
                if(key +1 <=  number)
                {
                    $(this).addClass('font-red')
                }
            });
            $(".list-text").text('').text(listratingText[number]).show();
        });
    });
    $(document).ready(function() {
        $(".submit_rating").click(function () {
            event.preventDefault();
            let content=$("#content_rating").val();
            let number=$(".number_rating").val();
            let name=$("#name_rating").val();
            let url=$(this).attr('href');
            // console.log(content,number,name,url);
            if(content && number  && name)
            {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        number: number,
                        name: name,
                        content: content,
                    },
                    dataType : "text",
                }).done(function (data) {
                    location.reload(data);
                    alert(data);
                });
            }
            else
            {
                alert("Vui lòng nhập đủ thông tin đánh giá")
            }
        });
        filter_data();
        function filter_data() {
            $('.filter_data').html('<div id="loading" style=""></div>');
            var id = $('.get_id').val();
            var price = get_filter('price');
            var brand = get_filter('brand');
            if (price && brand) {
                $.ajax({
                    url: "index.php?area=frontend&controller=Product&action=searchProduct",
                    method: "POST",
                    data: {
                        id: id,
                        price: price,
                        brand: brand,
                    },
                    success: function (data) {
                        $('.filter_data').html(data);
                    }
                });
            }
        }
        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        };
        $('.common_selector').click(function () {
            filter_data();
        });
    //

        $("#product__search").keyup(function () {
            let name=$(this).val();
            let search = $.trim(name);
            if(search != '')
            {
                $(".result__search").css("display","block");
                $(".result__search").css("height","300px");
                $(".result__search").css("padding-top","10px");
                $(".result__search").css("overflow","auto");
                $(".result__search").css("border","1px solid #dadada");
                $.ajax({
                    url :"index.php?area=frontend&controller=product&action=searchProductName",
                    method: "POST",
                    data : {
                        search : search
                    },
                    dataType: "text",
                    success:function (data) {
                        $(".result__search").html(data);
                    }
                });
            }
            else
            {
                $(".result__search").css("display","none");
            }
        });
    });

    $(function (){
    $(".widget_categories ul li a").click(function () {
        var path = window.location.href;
        // var stringUrl="/Website_Tu_Hoang/";
        // var current = path.substring(path.lastIndexOf('/')+1);
        var url = $(this).attr('href');
        var currenturl = url.substring(url.lastIndexOf('/')+1);
        var current = path.substring(path.lastIndexOf('/')+1);
        // var Urlcurrent=stringUrl.concat(url);
        // alert(" --- "+currenturl+" --- "+current);
        if(currenturl != current){
            // alert(" --- "+currenturl+" --- "+current);
            $(this).addClass('active');
        };
    });
    });
</script>
</body>

</html>

