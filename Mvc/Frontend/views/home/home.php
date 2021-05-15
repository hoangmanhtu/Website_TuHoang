
<section class="slider_section mt-20">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!--shipping area start-->
        <div class="shipping_area">
          <div class="single_shipping">
            <div class="shipping_icone">
              <i class="zmdi zmdi-local-shipping zmdi-hc-fw"></i>
            </div>
            <div class="shipping_content">
              <p>FreeShip đơn hàng từ 999.000 VNĐ </p>
            </div>
          </div>
          <div class="single_shipping">
            <div class="shipping_icone">
              <i class="zmdi zmdi-replay-5"></i>
            </div>
            <div class="shipping_content">
              <p>Đổi trả miễn phí trong vòng 30 ngày đầu</p>
            </div>
          </div>
          <div class="single_shipping last_child">
            <div class="shipping_icone">
              <i class="zmdi zmdi-phone-in-talk"></i>
            </div>
            <div class="shipping_content">
              <p>Hỗ trợ tư vấn trực tiếp 24/7 </p>
            </div>
          </div>
        </div>
        <!--shipping area end-->
        <div class="slider_area owl-carousel">
          <div class="single_slider" data-bgimg="Assets/Frontend/images/slider1.jpg">
            <div class="slider_content content_position_center">
              <h1>New</h1>
              <h2>Designer Funiture! </h2>
              <span>elite collections! </span>
              <a href="shop.html">shop now</a>
            </div>
          </div>
          <div class="single_slider" data-bgimg="Assets/Frontend/images/slider1.jpg">
            <div class="slider_content content_position_center">
              <h1>New</h1>
              <h2>Designer Funiture! </h2>
              <span>elite collections! </span>
              <a href="shop.html">shop now</a>
            </div>
          </div>
          <div class="single_slider" data-bgimg="Assets/Frontend/images/slider1.jpg">
            <div class="slider_content content_position_center">
              <h1>New</h1>
              <h2>Designer Funiture! </h2>
              <span>elite collections! </span>
              <a href="shop.html">shop now</a>
            </div>
          </div>
          <div class="single_slider d-flex align-items-center" data-bgimg="Assets/Frontend/images/slider2.jpg">
            <div class="slider_content content_position_left">
              <h1>New</h1>
              <h2>Designer Funiture! </h2>
              <span>elite collections! </span>
              <a href="shop.html">shop now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--deals product section area end-->
<?php  require_once 'Mvc/Frontend/controllers/CategoryController.php';
$category=new CategoryController();
$category->CategoryHot();
?>

<?php  require_once 'Mvc/Frontend/controllers/ProductController.php';
$product=new ProductController();
$product->hotProduct();
?>
<!--new product area end-->
<!--banner area start-->
<div class="banner_area banner_column2 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="Assets/Frontend/images/banner2.jpg" alt=""></a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="Assets/Frontend/images/banner3.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->
<!--banner area end-->
<section class="custom_product_area mb-50">
    <div class="container">
        <div class="row">
            <?php  require_once 'Mvc/Frontend/controllers/ProductController.php';
            $product=new ProductController();
            $product->SellingProducts();
            ?>
            <?php  require_once 'Mvc/Frontend/controllers/ProductController.php';
            $product=new ProductController();
            $product->starProducts();
            ?>
        </div>
    </div>
</section>
<!--new product area start-->
<!--banner area start-->
<div class="banner_area mb-50">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="single_banner">
          <div class="banner_thumb">
            <a href="shop.html"><img src="Assets/Frontend/images/banner4.jpg" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php  require_once 'Mvc/Frontend/controllers/ProductController.php';
$product=new ProductController();
$product->NewsProduct();
?>
<!--banner area start-->
<div class="banner_area mb-50">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="single_banner">
          <div class="banner_thumb">
            <a href="shop.html"><img src="Assets/Frontend/images/banner5.jpg" alt=""></a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!--banner area end-->

<hr>
<?php  require_once 'Mvc/Frontend/controllers/NewsController.php';
$product=new NewsController();
$product->hotNews();
?>
<!--home product area start-->

<!--home product area end-->

<!--banner area start-->
<!--<div class="banner_area mb-50">-->
<!--  <div class="container">-->
<!--    <div class="row">-->
<!--      <div class="col-12">-->
<!--        <div class="single_banner">-->
<!--          <div class="banner_thumb">-->
<!--            <a href="shop.html"><img src="Assets/Frontend/images/banner6.jpg" alt=""></a>-->
<!--          </div>-->
<!---->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--banner area end-->

<!--custom product area start-->
<!--custom product area end-->


<!--brand newsletter area start-->
<!--brand area end-->
