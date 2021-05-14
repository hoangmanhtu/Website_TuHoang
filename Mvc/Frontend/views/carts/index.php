<?php
$total_cart = 0;
$total_discount = 0;
$total = 0;
$total_product = 0;
?>

<div class="breadcrumbs_area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb_content">
          <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li>Giỏ hàng của bạn</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php  if(isset($_SESSION['success'])): ?>
  <div class="container" style="margin-top: 10px;">
    <div class="alert alert-success alert-dismissible "role="alert">
      <?php echo "<i class='fa fa-check'></i>" . $_SESSION["success"];
      unset($_SESSION["success"]); ?>
    </div>
  </div>
<?php endif;?>
<?php  if(isset($_SESSION['error'])): ?>
  <div class="container" style="margin-top: 10px;">
    <div class="alert alert-danger alert-dismissible"role="alert">
      <?php echo "<i class='fa fa-times'></i>" .$_SESSION["error"];
      unset($_SESSION["error"]); ?>
    </div>
  </div>
<?php endif;?>
<?php if (!empty($_SESSION["cart"])): ?>
  <form action="" method="POST">
    <div class="shopping_cart_area mt-10">
      <div class="container">
        <form action="#">
          <div class="row">
            <div class="col-12">
              <div class="table_desc">
                <div class="cart_page table-responsive">
                  <table>
                    <thead>
                    <tr>
                      <th class="product_name">Sản phẩm</th>
                      <th class="product_thumb">Ảnh sản phẩm</th>
                      <th class="product-price" style="width: 15%">Giá sản phẩm</th>
                      <th class="product-price">% Khuyến mại</th>
                      <th class="product_quantity">Số lượng</th>
                      <th class="product_total">Tổng tiền</th>
                      <th class="product_remove">Xóa sản phẩm</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION["cart"] as $product_id => $cart):
                      $slug = Helper::getSlug($cart["name"]);
                      $url_detail = "chi-tiet-san-pham/$slug/$product_id";
                      ?>
                      <tr>
                        <td class="product_name"><a href="<?php echo $url_detail; ?>"> <?php echo $cart["name"]; ?></a>
                        </td>
                        <td class="product_thumb"><a href="<?php echo $url_detail; ?>"><img
                                style="text-align: center;height: 90px;" width="70%" height="70px;"
                                src="assets/uploads/products/<?php echo $cart["avatar"]; ?>" alt=""></a></td>
                        <td class="product-price"> <?php echo number_format($cart["price"]); ?> VNĐ</td>
                        <td class="product-price"><?php echo isset($cart["discount"]) ? $cart["discount"] : 0; ?> %</td>
                        <td class="product_quantity"><input min="1"
                                                            value="<?php echo $cart["quanlity"]; ?>"
                                                            name="<?php echo $product_id; ?>" type="number"></td>
                        <td class="product_total"><?php
                          $total_item_discount = ($cart["price"] * ($cart["discount"] / 100)) * $cart["quanlity"];
                          $total_item = ($cart["price"] * $cart["quanlity"]);
                          $total_product = $total_item - $total_item_discount;
                          echo number_format($total_product);
                          $total_cart += $total_item;
                          $total_discount += $total_item_discount;
                          $total += $total_product;
                          ?> VNĐ
                        </td>
                        <td class="product_remove"><a onclick="return window.confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng');" href="xoa-san-pham/<?php echo $product_id; ?>"><i
                                class="fa fa-trash-o"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="cart_submit">
                  <input type="submit" value="Cập nhật giỏ hàng" name="submit">
                </div>
              </div>
            </div>
          </div>
          <!--coupon code area start-->
          <div class="coupon_area">
            <div class="row">
              <div class="col-lg-6 col-md-6">
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="coupon_code right">
                  <h3>Thanh toán giỏ hàng</h3>
                  <div class="coupon_inner">
                    <div class="cart_subtotal">
                      <p>Thành tiền</p>
                      <p class="cart_amount"><?php echo number_format($total_cart); ?> VNĐ</p>
                    </div>
                    <div class="cart_subtotal ">
                      <p>Giảm giá</p>
                      <p class="cart_amount"> <?php echo number_format($total_discount); ?> VNĐ </p>
                    </div>
                    <div class="cart_subtotal">
                      <p>Tổng tiền cần thanh toán</p>
                      <p class="cart_amount"><?php echo number_format($total); ?> VNĐ</p>
                    </div>
                    <div class="checkout_btn">
                      <a href="thanh-toan">Thanh toán giỏ hàng</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--coupon code area end-->
        </form>
      </div>
    </div>
  </form>
<?php else: ?>
  <h4 style="text-align: center">Giỏ hàng của bạn trống</h4>
<?php endif; ?>
