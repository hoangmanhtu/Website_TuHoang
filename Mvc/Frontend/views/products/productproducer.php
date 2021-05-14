
<!--Offcanvas menu area end-
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb_content">
          <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li>Thương hiệu :<?php echo $producer['name']; ?></li>
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
          <?php  require_once 'Mvc/frontend/controllers/CategoryController.php';
          $category_controller=new CategoryController();
          $category_controller->getCategoryCenter();
          ?>
          <div class="widget_list widget_filter">
            <h2>Tìm kiếm theo khoảng giá</h2>
            <form action="#">
              <div id="slider-range"></div>
              <button type="submit">Tìm kiếm</button>
              <input type="text" name="text" id="amount" />

            </form>
          </div>
          <?php  require_once 'Mvc/frontend/controllers/ProducerController.php';
          $producer_controller=new ProducerController();
          $producer_controller->ProducerCenter();
          ?>
          <div class="widget_list recent_product">
            <h2>Top Rated Products</h2>
            <div class="recent_product_container">
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Natus erro</a></h3>
                  <div class="product_rating">
                    <ul>
                      <?php
                      $rating=0;
                      if($product["total_rating"] > 0)
                      {
                        $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
                      }
                      ?>
                      <?php for($i=1;$i<=5;$i++): ?>
                        <li><a href=""><i class="zmdi <?php if( $i <= $rating) echo "zmdi-star"; else  echo "zmdi-star-outline" ?>"></i></a></li>
                      <?php endfor; ?>
                      <?php if(!empty($product['total_rating'])): ?>
                        <span style="margin-left: 20px;font-size: 13px;"> (<?php echo $product['total_rating']; ?>) đánh giá</span>
                      <?php endif; ?>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Nemo enim</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product3.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Consequuntur magni</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product4.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Cras neque</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product5.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Endurance2</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product6.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Crown Summit1</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product7.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Compete Hoodie3</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product3.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Crown Summit1</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product4.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Crown Summit1</a></h3>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product5.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Crown Summit1</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product6.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Crown Summit1</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
              <div class="recent_product_list">
                <div class="recent_product_thumb">
                  <a href="product-details.html"><img src="assets/img/s-product/product7.jpg" alt=""></a>
                </div>
                <div class="recent_product_content">
                  <h3><a href="product-details.html">Crown Summit1</a></h3>
                  <div class="product_rating">
                    <ul>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                    </ul>
                  </div>
                  <div class="price_box">
                    <span class="current_price">$65.00</span>
                    <span class="old_price">$70.00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </aside>
        <!--sidebar widget end-->
      </div>
      <div class="col-lg-9 col-md-12">
        <div class="shop_title">
          <h1>Thương hiệu<?php echo $producer['name']; ?></h1>
        </div>
        <div class="shop_toolbar_wrapper">
          <div class="shop_toolbar_btn">

            <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip" title="3"></button>
            <button data-role="grid_list" type="button"  class="active btn-list" data-toggle="tooltip" title="List"></button>
          </div>
          <div class="page_amount">
            <p><?php echo $producer['total_product']; ?> Sản phẩm</p>
          </div>
        </div>
        <!--shop toolbar end-->

        <div class="row no-gutters shop_wrapper grid_list">
          <?php if(!empty($products)):
            foreach ($products as $product):
              $product_title = $product['title'];
              $product_slug = Helper::getSlug($product_title);
              $product_id = $product['id'];
              $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
              ?>
              <div class=" col-12 ">
                <div class="single_product">
                  <div class="product_thumb">
                    <a href="<?php echo $product_link; ?>"><img src="Assets/Uploads/products/<?php echo $product['avatar']; ?>" alt=""></a>
                    <?php if($product['discount'] > 0): ?>
                      <div class="label_product">
                        <span class="label_sale"><?php echo $product['discount'] ?> %</span>
                      </div>
                    <?php endif; ?>
                    <div class="quick_button">
                      <a href="#" data-toggle="modal" data-target="#modal<?php echo $product['id'] ?>"  title="Xem nhanh sản phẩm"> <i class="zmdi zmdi-eye"></i></a>
                    </div>
                  </div>
                  <div class="product_content grid_content">
                    <div class="product_name">
                      <h3><a href="<?php echo $product_link; ?>"><?php echo $product['title']; ?></a></h3>
                    </div>
                    <div class="product_rating">
                      <ul>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      </ul>
                    </div>
                    <div class="price_box">
                      <?php if($product["discount"] > 0): ?>
                        <span class="current_price">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                        <span class="old_price"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                      <?php else: ?>
                        <span class="current_price">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                      <?php endif; ?>
                    </div>
                    <div class="action_links">
                      <ul>
                        <li class="wishlist"><a href="wishlist.html" title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                        <li class="add_to_cart"><a href="cart.html" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i>Mua ngay</a></li>
                        <li class="compare"><a href="#" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="product_content list_content">
                    <div class="product_name">
                      <h3><a href="<?php echo $product_link; ?>"><?php echo $product['title'] ?></a></h3>
                    </div>
                    <div class="product_rating">
                      <ul>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                      </ul>
                    </div>
                    <div class="price_box">
                      <?php if($product["discount"] > 0): ?>
                        <span class="current_price">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                        <span class="old_price"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                      <?php else: ?>
                        <span class="current_price">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                      <?php endif; ?>
                    </div>
                    <?php if(!empty($product['present'])): ?>
                      <div class="product_desc" style="margin-bottom: 20px">
                        <label>Khuyến mại đặc biệt :</label>
                        <ul>
                          <?php echo $product['present']; ?>
                        </ul>
                      </div>
                    <?php endif; ?>
                    <div class="action_links">
                      <ul>
                        <li class="wishlist"><a href="wishlist.html" title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                        <li class="add_to_cart"><a href="them-vao-gio-hang/<?php echo $product['id']; ?>" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i>Mua ngay</a></li>
                        <li class="compare"><a href="#" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; else: ?>
            <div class="col-12" style="text-align: center;">
              Không có sản phẩm nào thuộc thương hiệu này !!!
            </div>
          <?php endif; ?>
        </div>

        <div class="shop_toolbar t_bottom">
          <div class="pagination">
            <ul>
              <li class="current">1</li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li class="next"><a href="#">next</a></li>
              <li><a href="#">>></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


