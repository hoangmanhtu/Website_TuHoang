
<section class="content-header" style="margin-bottom: 15px;">
  <h1>
   Giỏ hàng của bạn
    <small>Tu Hoang Electronic</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active"> <i class="fa fa-shopping-cart"></i> Giỏ hàng của bạn</a></li>
  </ol>
</section>

<?php
$total_cart=0;
$total_discount=0;
$total=0;
$total_product=0;
?>

  <?php if(!empty($_SESSION["cart_admin"])): ?>
  <div class="row">
    <div class="col-sm-12">
      <div class="box ">
        <div class="">
          <form action="" method="post">
            <div class="table-responsive">
              <table style="text-align: center;" class="table table-bordered ">
                <tr>
                  <th style="text-align: center" width="27%">Sản phẩm</th>
                  <th style="text-align: center"  width="15%">Gía</th>
                  <th style="text-align: center" width="8%">Số Lượng</th>
                  <th style="text-align: center"  width="15%">% Khuyến Mại</th>
                  <th style="text-align: center"  width="15%">Thành tiền</th>
                  <th style="text-align: center"  width="10%">Xóa</th>
                </tr>
                <tbody>
                <?php
                foreach ($_SESSION["cart_admin"] as $product_id => $cart):?>
                  <tr>
                    <td style="text-align: center">
                      <div  style="text-align: center" >
                        <a href="index.php?area=backend&controller=product&action=detail&id=<?php echo $product_id; ?>">
                          <img style="width: 100px;height: 80px;text-align: center" src="assets/uploads/products/<?php echo $cart["avatar"]; ?>"/>
                        </a>
                      </div>
                      <div>
                        <a href="index.php?area=backend&controller=product&action=detail&id=<?php echo $product_id; ?>"> <?php echo $cart["name"]; ?></a>
                      </div>
                    </td>
                    <td>
                      <?php echo number_format($cart["price"]); ?> VND
                    </td>
                    <td>
                      <div class="buttons_added">
                        <input style="width: 50px;line-height: 25px;background: #1b2a47" min="1" type="number"  name="<?php echo $product_id; ?>" value="<?php echo $cart["quality"]; ?>">
                      </div>
                    </td>
                    <td>
                      <?php echo isset($cart["discount"])? $cart["discount"] : 0; ?> %
                    </td>
                    <td>
                      <?php
                      $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
                      $total_item=($cart["price"] * $cart["quality"]);
                      $total_product=$total_item-$total_item_discount;
                      echo number_format($total_product);
                      $total_cart += $total_item;
                      $total_discount += $total_item_discount;
                      $total +=$total_product;
                      ?>
                      VND
                    </td>
                    <td>
                      <a class="btn btn-bitbucket" href="index.php?area=backend&controller=cart&action=delete&id=<?php echo $product_id; ?>"
                         onclick="return window.confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?');">
                        <i class="fa fa-trash"></em></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
                <tbody >
                <tr>
                  <th style="text-align: right" colspan="6"><a style="text-align:left;" class="btn btn-danger"  onclick="return window.confirm('Bạn có chắc chắn muốn toàn bộ sản phẩm trong giỏ hàng');" href="index.php?area=backend&controller=cart&action=destroy" class="button pull-left">Xóa toàn bộ</a>
                    <a class="btn btn-primary" href="index.php?area=backend&controller=product" class="button pull-right black">Tiếp tục mua hàng</a>
                    <input class="btn btn-success" type="submit" name="submit" class="button pull-right" value="Cập nhật">
                  </th>
                </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col-sm-7">
          </div>
          <div class="col-sm-5" style="font-size: 16px;">
            <table class="table table-bordered table-list">
              <?php if($total_discount>0): ?>
                <tr>
                  <td width="50%">Thành tiền</td>
                  <th> <?php echo number_format($total_cart); ?> VND</th>
                </tr>
                <tr>
                  <td width="50%">Giảm giá </td>
                  <th>- <?php echo number_format($total_discount); ?> VND</th>
                </tr>
                <tr>
                  <td width="50%">Tổng số tiền thanh toán :</td>
                  <th><?php echo number_format($total); ?> VND</th>
                </tr>
              <?php else: ?>
                <tr>
                  <td width="50%">Tổng số tiền thanh toán :</td>
                  <th><?php echo number_format($total); ?> VND</th>
                </tr>
              <?php endif; ?>
            </table>
            <div style="text-align: right">

              <div style="padding-bottom: 40px;margin-right: 20px;">
                <a style="padding:10px;border-radius: 5px;color: white;background-color:red;" class="submit-support3" href="index.php?area=backend&controller=payment&action=index"> Thanh toán giỏ hàng</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <?php else: ?>
      <h4 style="text-align: center;padding: 30px 0px;font-size: 16px;">Giỏ hàng của bạn trống</h4>
    <?php endif;?>
  </div>
</div>

<!-- end main -->