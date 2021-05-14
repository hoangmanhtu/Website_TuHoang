<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Thanh toán đơn hàng
    <small>Tu Hoang Electronic</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng của bạn</a></li>
    <li class="active"> <i class="fa fa-paypal"></i> Thanh toán đơn hàng</li>
  </ol>
</section>
    <form action="" method="POST" id="shopping_pay">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="box">
            <div class="box-body">
              <h4 style="text-align: center;">THÔNG TIN ĐƠN HÀNG</h4>
              <div class="form-group">
                <label >Họ và tên khách hàng :</label>
                <input type="text"  value="" class="form-control required" name="fullname"
                       placeholder="Nhập họ tên khách hàng..." aria-required="true">
              </div>
              <div class="form-group">
                <label>Email :</label>
                <input type="text"  value="" class="form-control required" name="email"
                       placeholder="Nhập email khách hàng..." aria-required="true">
              </div>
              <div class="form-group">
                  <label>Số điện thoại :</label>
                <input type="text"  value="" class="form-control required" name="phone"
                       placeholder="Nhập số điện khách hàng..." aria-required="true">
              </div>
              <div class="form-group">
                <label>Địa chỉ khách hàng :</label>
                <input type="text"  value="" class="form-control required" name="address"
                       placeholder="Nhập địa chỉ khách hàng..." aria-required="true">
              </div>
              <div class="form-group">
                <label>Note (ghi chú) :</label>
                <textarea id="order_note" class="form-control" placeholder="Nhập ghi chú nếu có" rows="5" cols="5" name="note"></textarea>
              </div>
              <div>
                <label>Chọn phương thức thanh toán :</label> <br/>
                <input id="payment_defult1" name="method" type="radio" value="1" checked>
                <label for="payment_defult1">Thanh toán tại siêu thị</label>
                <br>
                <input name="method" type="radio"  value="0" id="payment_defult">
                <label for="payment_defult">COD (dựa vào địa chỉ của bạn)</label>
              </div>
              <input type="hidden" name="user_id" value="<?php if(isset($_SESSION["user_admin"]) && !empty($_SESSION["user_admin"])): echo $_SESSION["user_admin"]["id"];   else: echo "";  endif;?>">
              <input type="hidden" name="status" value="1">
            </div>
            <div class="box-footer">
              <input type="submit" value="Thanh toán đơn hàng" name="submit" class=" btn btn-success">
              <a href="index.php?area=backend&controller=cart" class="btn btn-danger">Về trang giỏ hàng</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="box">
            <div class="box-body">
              <?php
              $total_cart = 0;
              $total_discount = 0;
              $total = 0;
              $total_product = 0;
              if (isset($_SESSION['cart_admin'])):
              ?>
                <h4 style="text-align: center;">THÔNG TIN ĐƠN HÀNG</h4>
              <div class="order_table table-responsive">
                <table class="table table-bordered ">
                  <tr>
                    <th width="35%">Tên sản phẩm</th>
                    <th width="35%">Giá sản phẩm</th>
                    <th width="30%">Thành tiền</th>
                  </tr>
                  <tbody>
                  <?php foreach ($_SESSION['cart_admin'] AS $product_id => $cart):
                    ?>
                    <tr>
                      <td style="text-align: center">
                        <?php if (!empty($cart['avatar'])): ?>
                          <a href="#"><img class="mp-10"
                                                                      src="assets/uploads/products/<?php echo $cart['avatar']; ?>"
                                                                      width=100" height="60"></a>
                        <?php endif; ?>
                        <br>
                        <a href="#" class="content-product-a">
                          <?php echo $cart['name']; ?>
                        </a></td>
                      <td> <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ <strong>
                          × <?php echo $cart['quality']; ?></strong></td>
                      <td>
                        <?php
                        $total_item_discount = ($cart["price"] * ($cart["discount"] / 100)) * $cart["quality"];
                        $total_item = ($cart["price"] * $cart["quality"]);
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
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </form>
<script>
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
</script>

