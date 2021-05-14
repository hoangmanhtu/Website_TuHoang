<?php if(!empty($products)): ?>
<div class="wishlist_area mt-60">
  <div class="container">
    <form action="#">
      <div class="row">
        <div class="col-12">
          <div class="table_desc wishlist">
            <div class="cart_page table-responsive">
              <table>
                <thead>
                <tr>
                  <th class="product_remove">Xóa</th>
                  <th class="product_thumb">Ảnh sản phẩm</th>
                  <th class="product_name">Tên sản phẩm</th>
                  <th class="product_quantity">Danh mục sản phẩm</th>
                  <th class="product-price">Gía tiền</th>
                  <th>Số lượng còn</th>
                  <th class="product_total">Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $key=>$product):
                $product_title = $product['title'];
                $product_slug = Helper::getSlug($product_title);
                $product_id = $product['id'];
                $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                ?>
                <tr>
                  <td class="product_remove"><a href="xoa-yeu-thich/<?php echo $product['id']; ?>"   onclick="return confirm('Bạn có chắc chắn muốn bỏ thích sản phẩm này')">X</a></td>
                  <td class="product_thumb"><a href="<?php echo $product_link; ?>"><img style="width: 150px;height: 100px;" src="assets/uploads/products/<?php echo $product['avatar']; ?>" alt=""></a></td>
                  <td class="product_name"><a href="<?php echo $product_link; ?>"><?php echo $product['title'] ?></a></td>
                  <td class="product_quantity"><?php echo $product['category_name']; ?></td>
                  <td class="product-price">
                    <?php if($product["discount"] > 0): ?>
                      <span class="current_price" style="color: red;font-weight: bold;font-size: 14px;">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                      <span class="old_price" style="text-decoration: line-through;font-size: 12px;"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                    <?php else: ?>
                      <span class="current_price" style="color: red;font-weight: bold;font-size: 14px;">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php
                    if($product['quality'] > 0){
                      echo $product['quality'].' chiếc';
                    }else{
                      echo '<p style="color: red"> <i class="fa fa-check"></i>Hết hàng</p>';
                    }
                     ?>
                  </td>

                  <td class="product_total">
                    <?php if($product['quality'] > 0): ?>
                  <a class="add_to_cart" href="them-vao-gio-hang/<?php echo $product['id']; ?>" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i>  Mua ngay</a>
                  <?php else: ?>
                      <a class="add_to_cart" href="tel:0395679339" title="Liên hệ với cửa hàng"><i class="zmdi zmdi-phone-bluetooth"></i>  Liên hệ</a>
                    <?php endif; ?>
                  </td>
                </tr>

              <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

    </form>
    <div class="row">
      <div class="col-12">
        <div class="wishlist_share">

          <ul>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>
<?php else: ?>
<div style="margin: 50px auto;text-align: center"><h4>Bạn không có sản phẩm yêu thích nào !!!</h4></div>
<?php endif; ?>
