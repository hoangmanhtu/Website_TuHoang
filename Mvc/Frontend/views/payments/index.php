<div class="breadcrumbs_area mb-10">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb_content">
          <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="gio-hang-cua-ban">Giỏ hàng của bạn</a></li>
            <li>Thanh toán giỏ hàng</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="Checkout_section mt-10">
  <div class="container">
      <form action="" method="POST" id="shopping_pay" class="checkout_form">
      <div class="row">
          <div class="col-lg-6 col-md-6">
            <h3>Thông tin khách hàng</h3>
            <div class="row">
              <div class="col-12 mb-20">
                <label>Họ tên khách hàng <span>*</span></label>
                <input type="text" placeholder="Nhập tên người nhân..." name="fullname"
                       value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['fullname'])) {
                         echo $_SESSION['user_account']['fullname'];
                       } ?>">
              </div>
              <?php if (isset($_SESSION["user_account"])): ?>
                <div class="col-12 mb-20">
                  <label>Email <span>*</span></label>
                  <input type="text" placeholder="Nhập email đặt hàng..." readonly name="email"
                         value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['email'])) {
                           echo $_SESSION['user_account']['email'];
                         } ?>">
                </div>
              <?php else: ?>
                <div class="col-12 mb-20">
                  <label>Email <span>*</span></label>
                  <input type="text" placeholder="Nhập email đặt hàng..." name="email">
                </div>
              <?php endif; ?>
              <div class="col-12 mb-20">
                <label>Số điện thoại <span>*</span></label>
                <input placeholder="Nhập số điện thoại..." type="number" name="phone"
                       value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['phone'])) {
                         echo $_SESSION['user_account']['phone'];
                       } ?>">
              </div>

              <div class="col-12 mb-20">
                <label>Địa chỉ nhận hàng <span>*</span></label>
                <input type="text" placeholder="Nhập địa chỉ nhận hàng..." name="address"
                       value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['address'])) {
                         echo $_SESSION['user_account']['address'];
                       } ?>">
              </div>
              <div class="col-12">
                <div class="order-notes">
                  <label>Ghi chú<span> (nếu có)</span></label>
                  <textarea id="order_note" placeholder="Nhập ghi chú nếu có" rows="5" cols="5" name="note"></textarea>
                </div>
              </div>
              <input type="hidden" name="user_id" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["id"];   else: echo "";  endif;?>">
              <input type="hidden" name="status" value="0">
             <div class="col-12">
               <div class="panel-default">
                 <label>Chọn phương thức thanh toán :</label> <br/>
                 <input id="payment_defult" name="method" type="radio" value="0" data-target="createp_account">
                 <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult"
                        aria-controls="collapsedefult">Thanh toán trực tuyến</label>
                 <br>
                 <input id="payment_defult" name="method" type="radio" checked value="1" data-target="createp_account">
                 <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult"
                        aria-controls="collapsedefult">COD (dựa vào địa chỉ của bạn)</label>
               </div>
             </div>
            <div class="col-12">
              <div class="order_button">
                <input type="submit" name="submit" value="Thanh toán đơn hàng">
              </div>
            </div>
            </div>
          </div>
          <?php
          $total_cart = 0;
          $total_discount = 0;
          $total = 0;
          $total_product = 0;
          if (isset($_SESSION['cart'])):
          ?>
          <div class="col-lg-6 col-md-6">
            <h3>Thông tin đơn hàng</h3>
            <div class="order_table table-responsive">

              <table>
                <thead>
                <tr>
                  <th width="25%">Tên sản phẩm</th>
                  <th width="45%">Giá sản phẩm</th>
                  <th width="30%">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                  $product_link = 'chi-tiet-san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                  ?>
                  <tr>
                    <td>
                      <?php if (!empty($cart['avatar'])): ?>
                        <a href="<?php echo $product_link; ?>"><img class="mp-10"
                                                                    src="assets/uploads/products/<?php echo $cart['avatar']; ?>"
                                                                    width=100" height="60"></a>
                      <?php endif; ?>
                      <br>
                      <a href="<?php echo $product_link; ?>" class="content-product-a">
                        <?php echo $cart['name']; ?>
                      </a></td>
                    <td> <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ <strong>
                        × <?php echo $cart['quanlity']; ?></strong></td>
                    <td>
                      <?php
                      $total_item_discount = ($cart["price"] * ($cart["discount"] / 100)) * $cart["quanlity"];
                      $total_item = ($cart["price"] * $cart["quanlity"]);
                      $total_product = $total_item - $total_item_discount;
                      $total_cart += $total_item;
                      $total_discount += $total_item_discount;
                      $total += $total_product;
                      echo number_format($total_product);
                      ?>
                      VND
                    </td>
                  </tr>
                <?php endforeach; ?>

                </tbody>
                <tfoot>
                <?php if ($total_discount > 0): ?>
                  <tr>
                    <th>Thành tiền</th>
                    <td colspan="3"><?php echo number_format($total_cart) ?>  VNĐ</td>
                  </tr>
                  <tr>
                    <th>Giảm giá</th>
                    <td colspan="3">- <?php echo number_format($total_discount); ?>VNĐ</td>
                  </tr>
                  <tr class="order_total">
                    <th>Tổng tiền thanh toán</th>
                    <td colspan="3"><strong>
                        <?php echo number_format($total); ?> VNĐ</strong></td>
                  </tr>
                <?php else: ?>
                  <tr class="order_total">
                    <th>Tổng tiền thanh toán</th>
                    <td colspan="3"><strong>
                        <?php echo number_format($total); ?> VNĐ</strong></td>
                  </tr>
                <?php endif; ?>
                </tfoot>
              </table>
            </div>
          </div>
          <?php endif; ?>
      </div>
    </form>
</div>
</div>
