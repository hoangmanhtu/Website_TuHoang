<?php
if(!empty($products)):
foreach($products as $product):
$product_title = $product['title'];
$product_slug = Helper::getSlug($product_title);
$product_id = $product['id'];
$product_link = "chi-tiet-san-pham/$product_slug/$product_id";
?>
<div class="modal fade" id="modal<?php echo $product["id"]; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal_body">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
              <div class="modal_tab">
                <div class="tab-content product-details-large">
                  <div class="tab-pane fade show active" id="tab<?php echo $product["id"]; ?>" role="tabpanel" >
                    <div class="modal_tab_img">
                      <a href="#"><img src="Assets/Uploads/products/<?php echo $product["avatar"]; ?>" alt=""></a>
                    </div>
                  </div>
<!--                  --><?php //if(!empty($product_images)):
//                  foreach ($product_images as $image):
//                  if($product['id'] === $image['product_id']):
//                  ?>
<!--                  <div class="tab-pane fade" id="tab--><?php //echo $image['id']; ?><!--" role="tabpanel">-->
<!--                    <div class="modal_tab_img">-->
<!--                      <a href="#"><img src="Assets/Uploads/product_images/--><?php //echo $image["avatar"]; ?><!--" alt=""></a>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  --><?php //endif; endforeach; endif; ?>
                </div>
                <div class="modal_tab_button">
                  <ul class="nav product_navactive owl-carousel" role="tablist">
<!--                    <li >-->
<!--                      <a class="nav-link active" data-toggle="tab--><?php //echo $product["id"]; ?><!--" href="#tab--><?php //echo $product["id"]; ?><!--" role="tab" aria-controls="tab1" aria-selected="false"><img src="Assets/Uploads/products/--><?php //echo $product["avatar"]; ?><!--" alt=""></a>-->
<!--                    </li>-->
<!--                    --><?php //if(!empty($product_images)):
//                    foreach ($product_images as $image):
//                    if($product['id'] === $image['product_id']):
//                    ?>
<!--                    <li>-->
<!--                      <a class="nav-link" data-toggle="tab--><?php //echo $image['id']; ?><!--" href="#tab--><?php //echo $image['id']; ?><!--" role="tab" aria-controls="tab2" aria-selected="false"><img src="Assets/Uploads/product_images/--><?php //echo $image["avatar"]; ?><!--" alt=""></a>-->
<!--                    </li>-->
<!--                    --><?php //endif; endforeach; endif; ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
              <div class="modal_right">
                <div class="modal_title mb-10">
                  <h2> <?php echo $product["title"]; ?></h2>
                </div>
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
                <div class="modal_price mb-10">
                  <?php if($product["discount"] > 0): ?>
                    <span class="current_price">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                    <span class="old_price"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                  <?php else: ?>
                    <span class="current_price">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                  <?php endif; ?>
                </div>
                <?php if(!empty($product['present'])): ?>
                <div class="product_desc mb-15">
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
                <div class="action_links" style="margin:0px 0px 20px 0px;">
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
                <div class="modal_social">
                  <h2>Chia sẻ sản phẩm</h2>
                  <ul>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; endif; ?>
