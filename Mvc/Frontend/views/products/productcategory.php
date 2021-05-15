
<!--Offcanvas menu area end-
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb_content">
          <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><?php echo isset($category['name']) ? $category['name'] : "Hàng mới về" ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_reverse mt-50 mb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12">
        <!--sidebar widget start-->
        <aside class="sidebar_widget">
          <?php  require_once 'Mvc/Frontend/controllers/CategoryController.php';
          $category_controller=new CategoryController();
          $category_controller->getCategoryCenter();
          ?>

          <?php  require_once 'Mvc/Frontend/controllers/ProducerController.php';
          $producer=new ProducerController();
          $producer->ProducerCenter();
          ?>
<!--            -->
            <?php  require_once 'Mvc/Frontend/controllers/ProductController.php';
            $product=new ProductController();
            $product->SellingproductCenter();
            ?>
<!--            -->
        </aside>
        <!--sidebar widget end-->
      </div>
      <div class="col-lg-9 col-md-12 filter_data">
<!--          <div class="product_content list_content">-->
<!--              <div class="product_name">-->
<!--                  <h3><a href="--><?php //echo $product_link; ?><!--">--><?php //echo $product['title'] ?><!--</a></h3>-->
<!--              </div>-->
<!--              <div class="product_rating">-->
<!--                  <ul>-->
<!--                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>-->
<!--                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>-->
<!--                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>-->
<!--                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>-->
<!--                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>-->
<!--                  </ul>-->
<!--              </div>-->
<!--              <div class="price_box">-->
<!--                  --><?php //if($product["discount"] > 0): ?>
<!--                      <span class="current_price">  --><?php //echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?><!-- VNĐ</span>-->
<!--                      <span class="old_price"> --><?php //echo number_format($product["price"]); ?><!--VNĐ</span>-->
<!--                  --><?php //else: ?>
<!--                      <span class="current_price">  --><?php //echo number_format($product["price"]); ?><!-- VNĐ</span>-->
<!--                  --><?php //endif; ?>
<!--              </div>-->
<!--              --><?php //if(!empty($product['present'])): ?>
<!--                  <div class="product_desc" style="margin-bottom: 20px">-->
<!--                      <label>Khuyến mại đặc biệt :</label>-->
<!--                      <ul>-->
<!--                          --><?php //echo $product['present']; ?>
<!--                      </ul>-->
<!--                  </div>-->
<!--              --><?php //endif; ?>
<!--              <div class="action_links">-->
<!--                  <ul>-->
<!--                      --><?php //if($product["quality"] > 0): ?>
<!--                          <li class="wishlist"><a href="" onclick="HeartProduct(<?php echo $product_id; ?>)"  title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>-->
<!--                          <li class="add_to_cart"><a href="them-vao-gio-hang/--><?php //echo $product['id']; ?><!--" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i>Mua ngay</a></li>-->
<!--                          <li class="compare"><a href="--><?php //echo $product_link; ?><!--" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>-->
<!--                      --><?php //else: ?>
<!--                          <li class="wishlist"><a href="" onclick="HeartProduct(<?php echo $product_id; ?>)"  title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>-->
<!--                          <li class="add_to_cart"><a href="tel:0395679339" title="Liên hệ với cửa hàng"><i class="zmdi zmdi-phone-bluetooth"></i>Liên hệ</a></li>-->
<!--                          <li class="compare"><a href="--><?php //echo $product_link; ?><!--" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>-->
<!--                      --><?php //endif; ?>
<!--                  </ul>-->
<!--              </div>-->
<!--          </div>-->
<!---->
      </div>
    </div>
  </div>
</div>


