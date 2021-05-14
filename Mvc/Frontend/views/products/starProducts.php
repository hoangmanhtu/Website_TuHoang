<div class="col-lg-6">
  <div class="small_product_area">
    <div class="section_title">
      <h2>Sản phẩm <span>đánh giá nhiều nhất</span></h2>
    </div>
    <div class="small_product_wrappe">
      <?php if (!empty($products)):
        foreach ($products as $product):
          $product_title = $product['title'];
          $product_slug = Helper::getSlug($product_title);
          $product_id = $product['id'];
          $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
          ?>
          <div class="small_product_items">
            <div class="product_thumb">
              <a href="<?php echo $product_link; ?>"><img src="Assets/Uploads/products/<?php echo $product['avatar']; ?>" alt=""></a>
            </div>
            <div class="product_content">
              <div class="product_name">
                <h3><a href="<?php echo $product_link; ?>"><?php echo $product['title']; ?></a></h3>
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
              <div class="price_box">
                <?php if($product["discount"] > 0): ?>
                  <span class="current_price">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                  <span class="old_price"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                <?php else: ?>
                  <span class="current_price">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; endif; ?>
    </div>
  </div>
</div>