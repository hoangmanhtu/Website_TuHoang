
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb_content">
          <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <?php
            $category_id=$product["category_id"];
            $category_name=$product["category_name"];
            $category_slug=Helper::getSlug($category_name);
            $category_link="danh-sach-san-pham/$category_slug/$category_id"
            ?>
            <li><a href="<?php echo $category_link; ?>"><?php echo $product['category_name']; ?></a></li>
            <li><?php echo $product['title']; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details variable_product mt-50 mb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="product-details-tab">
          <div id="img-1" class="zoomWrapper single-zoom" style="text-align: center" >

              <img id="img-main" src="Assets/Uploads/products/<?php echo $product['avatar']; ?>">
          </div>
          <div class="single-zoom-thumb">
            <ul class="s-tab-zoom owl-carousel single-product-active" >
              <?php if(!empty($product_images)):
                foreach ($product_images as $image):
              ?>
              <li class="name_imgaes">
                  <img width="70%" height="70px;" src="Assets/Uploads/product_images/<?php echo $image['avatar']; ?>" id="<?php echo $image["id"]?>" onclick="changeImage('<?php echo $image["id"]?>')" />
              </li>
             <?php endforeach; endif; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="product_d_right">
          <form action="#">

            <h1><?php echo $product['title']; ?></h1>
              <p style="font-size: 16px;"> Thương hiệu : <span style="color:red;font-weight: bold"><?php echo $product["producer_name"]; ?></span>
                <?php if($product['quality'] >= 10): ?>
                <span style="margin-left: 50px;color: green"> <i class="fa fa-check"></i> Còn hàng</span>
                <?php  elseif ($product['quality'] < 10 && $product['quality'] > 0): ?>
                <span style="margin-left: 50px;color: green"> <i class="fa fa-check"></i> Còn <?php echo $product['quality'];  ?> sản phẩm</span>
                <?php else: ?>
                <span style="margin-left: 50px;color: red"> <i class="fa fa-check"></i>Hết hàng</span>
                <?php endif; ?>
              </p>
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
                <span style="margin-left: 20px;font-size: 15px;"> (<?php echo $product['total_rating']; ?>) đánh giá</span>
                <?php endif; ?>
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
            <div class="product_desc">
              <label>Khuyến mại đặc biệt :</label>
              <ul>
                <?php echo $product['present']; ?>
              </ul>
            </div>
            <?php endif; ?>
            <?php if($product["quality"] > 0): ?>
            <div class="product_variant quantity">
              <label>Số lượng:</label>
              <input min="1" max="10" value="1" type="number" id="numCart">
            </div>
            <?php endif; ?>
            <div class="action_links">
              <ul>
                <?php if($product["quality"] <= 0): ?>
                  <li class="add_to_cart"><a href="tel:039.567.9339" " title="Liên hệ với cửa hàng"><i class="zmdi zmdi-shopping-cart-plus"></i>Liên hệ</a></li>
                  <li class="wishlist"><a href="wishlist.html" title="Thêm vào danh sách yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                <?php else: ?>
                <li class="add_to_cart"><a onclick="CartAddShopping(<?php echo $product['id']; ?>,<?php echo $product['quality']; ?>)" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i> Mua ngay</a></li>
                <li class="wishlist"><a href="wishlist.html" title="Thêm vào danh sách yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                <?php endif; ?>
              </ul>
            </div>
          </form>

          <div class="product_d_meta">
            <span>Thương hiệu : <a href="#"> <?php echo $product["producer_name"]; ?></a></span>
            <span>Danh mục sản phẩm : <a href="#"><?php echo $product["category_name"]; ?></a></span>
          </div>
          <div class="priduct_social">
            <ul>
              <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
              <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
              <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
              <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
              <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--product details end-->

<!--product info start-->
<div class="product_d_info">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="product_d_inner">
          <div class="product_info_button">
            <ul class="nav" role="tablist">
              <li >
                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Mô tả chi tiết</a>
              </li>
              <li>
                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Thông số kỹ thuật</a>
              </li>
              <li>
                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá
                <?php if(!empty($product['total_rating'])): ?>
                (<?php echo $product['total_rating']; ?>)
                <?php endif; ?>
                </a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="info" role="tabpanel" >
              <div class="product_info_content">
                  <?php echo $product['content']; ?>
              </div>
            </div>
            <div class="tab-pane fade" id="sheet" role="tabpanel" >
              <?php echo $product['summary']; ?>
            </div>

            <div class="tab-pane fade" id="reviews" role="tabpanel" >
              <div class="reviews_wrapper">
                <?php if(!empty($ratings)): ?>
                  <?php foreach ($ratings as $rating): ?>
                <div class="reviews_comment_box">
<!--                  <div class="comment_thmb">-->
<!--                    <img src="assets/img/blog/comment2.jpg" alt="">-->
<!--                  </div>-->
                  <div class="comment_text">
                    <div class="reviews_meta">
                      <div class="star_rating">
                        <ul>
                          <?php for($i=1;$i<=5;$i++): ?>
                          <li><i class="ion-ios-star icon-star <?php if( $i <= $rating["number"]) echo "font-red"; else  echo "" ?>"></i></a></li>
                          <?php endfor; ?>
                        </ul>
                    </div>
                      <p><strong><?php echo $rating["name"]; ?> </strong> - <span style="font-size: 13px;"><?php echo date('d/m/Y - H:i:s', strtotime($rating['created_at'])); ?></span> </p>
                      <span><?php echo $rating['content']; ?></span>
                    </div>
                  </div>
                </div>
                <?php endforeach; else: ?>
                  <div style="text-align: center;">Sản phẩm này chưa có đánh giá !</div>
                <?php endif; ?>
                <?php if(isset($_SESSION["user_account"])): ?>
                <div class="product_ratting mb-10">
                  <h3>Đánh giá của bạn : </h3>
                  <ul>
                    <?php for($i=1;$i<=5;$i++): ?>
                    <li class="list-star"><i class="ion-ios-star icon-star" data-key="<?php echo $i; ?>"></i></a></li>
                    <?php endfor; ?>
                    <input type="hidden" value="" name="number_rating" class="number_rating">
                    <span class="list-text"></span>
                  </ul>
                </div>
                <div class="product_review_form">
                    <div class="row">
                      <div class="col-12">
                        <label for="content_rating">Viết đánh giá cho sản phẩm :</label>
                        <textarea name="comment" id="content_rating" ></textarea>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <input  type="hidden" name="name" id="name_rating" value="<?php echo isset($_SESSION['user_account']) ? $_SESSION['user_account']['fullname'] : '' ?>">
                      </div>
                    </div>
                    <a  class="submit_rating btn btn-success" href="danh-gia/<?php echo $product["id"]; ?>">Gửi đánh giá</a>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--product info end-->

<!--product area start-->
<section class="product_area related_products mb-47">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section_title">
          <h2>Related Products</h2>
        </div>
        <div class="product_carousel product_column4 owl-carousel">
          <div class="single_product">
            <div class="product_thumb">
              <a href="product-details.html"><img src="assets/img/product/product15.jpg" alt=""></a>
              <div class="label_product">
                <span class="label_sale">sale</span>
              </div>
              <div class="quick_button">
                <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
              </div>
            </div>
            <div class="product_content">
              <div class="product_name">
                <h3><a href="product-details.html">Aliquam Watches</a></h3>
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
                <span class="current_price">$65.00</span>
                <span class="old_price">$70.00</span>
              </div>
              <div class="action_links">
                <ul>
                  <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                  <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                  <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_product">
            <div class="product_thumb">
              <a href="product-details.html"><img src="assets/img/product/product16.jpg" alt=""></a>
              <div class="quick_button">
                <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
              </div>
            </div>
            <div class="product_content">
              <div class="product_name">
                <h3><a href="product-details.html">Condimentum Watches</a></h3>
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
                <span class="current_price">$65.00</span>
                <span class="old_price">$70.00</span>
              </div>
              <div class="action_links">
                <ul>
                  <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                  <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                  <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_product">
            <div class="product_thumb">
              <a href="product-details.html"><img src="assets/img/product/product17.jpg" alt=""></a>
              <div class="label_product">
                <span class="label_sale">sale</span>
              </div>
              <div class="quick_button">
                <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
              </div>
            </div>
            <div class="product_content">
              <div class="product_name">
                <h3><a href="product-details.html">Headphone ipsum</a></h3>
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
                <span class="current_price">$65.00</span>
                <span class="old_price">$70.00</span>
              </div>
              <div class="action_links">
                <ul>
                  <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                  <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                  <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_product">
            <div class="product_thumb">
              <a href="product-details.html"><img src="assets/img/product/product18.jpg" alt=""></a>
              <div class="quick_button">
                <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
              </div>
            </div>
            <div class="product_content">
              <div class="product_name">
                <h3><a href="product-details.html">Epicuri per</a></h3>
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
                <span class="current_price">$65.00</span>
                <span class="old_price">$70.00</span>
              </div>
              <div class="action_links">
                <ul>
                  <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                  <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                  <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_product">
            <div class="product_thumb">
              <a href="product-details.html"><img src="assets/img/product/product19.jpg" alt=""></a>
              <div class="label_product">
                <span class="label_sale">sale</span>
              </div>
              <div class="quick_button">
                <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
              </div>
            </div>
            <div class="product_content">
              <div class="product_name">
                <h3><a href="product-details.html">Itaque earum</a></h3>
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
                <span class="current_price">$65.00</span>
                <span class="old_price">$70.00</span>
              </div>
              <div class="action_links">
                <ul>
                  <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                  <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                  <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--product area end-->



