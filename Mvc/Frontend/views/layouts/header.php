<header class="header_area">
  <!--header top start-->
  <div class="header_top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4">
          <div class="welcome_text">
            <p>Chào mừng bạn  <span>Showroom Tú Hoàng </span> </p>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="top_right text-right">
            <ul>
              <li class="language"><a href="tel:0395679339"> Hottline: 039.567.9339 </a>
              </li>
              <?php if(!isset($_SESSION['user_account'])): ?>
              <li class="language"><a href="dang-nhap"> Đăng nhập </a>
              </li>
              <li class="language"><a href="dang-ky"> Đăng ký </a>
              </li>
              <?php else: ?>
              <li class="top_links"><a>
                  <span>
                  <?php if(!empty($_SESSION['user_account']['avatar'])):  ?>
                  <img style="width: 20px;height: 20px;border-radius: 20px;" src="Assets/uploads/users/<?php echo $_SESSION['user_account']['avatar']; ?>" alt="">
                  <?php else: ?>
                  <i class="zmdi zmdi-account"></i>
                  <?php endif; ?>
                  </span>
                  <?php echo $_SESSION['user_account']['fullname']; ?> <i class="zmdi zmdi-caret-down"></i></a>
                <ul class="dropdown_links">
                  <li><a href="thong-tin-ca-nhan">Thông tin cá nhân </a></li>
                  <li><a href="lich-su-mua-hang">Lịch sử đơn hàng</a></li>
                  <li><a href="danh-sach-yeu-thich">Danh sách yêu thích</a></li>
                  <li><a href="logout">Đăng xuất</a></li>
                </ul>
              </li>
              <?php endif; ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--header top start-->
  <!--header center area start-->
  <div class="header_middle">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3">
          <div class="logo">
            <a href="index.php"><img src="Assets/Frontend/images/logo.PNG" alt=""></a>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="header_middle_inner">
            <div class="search-container">
              <form action="#">
                <div class="search_box">
                  <input placeholder="Nhập sản phẩm mà bạn muốn tìm kiếm..." type="text" id="product__search">
                  <button type="submit"><i class="zmdi zmdi-search"></i></button>
                </div>
                <div class="result__search">
                  <?php
                  require_once 'Mvc/Frontend/controllers/ProductController.php';
                  $obj_controller=new ProductController();
                  $obj_controller->searchProductName();
                  ?>

                </div>
              </form>
            </div>
            <div class="mini_cart_wrapper">
              <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket"></i>
                <?php
                $total=0;
                if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
                {
                  foreach ($_SESSION["cart"] as $list)
                  {
                    $total +=$list["quanlity"];
                  }
                }
                ?>

                <span><?php echo $total; ?> Sản phẩm</span>
              <?php else: ?>
              <span>Giỏ Hàng</span>
              <?php endif; ?>
              </a>
              <!--mini cart-->
              <?php if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
              ?>
              <div class="mini_cart">
                <div style="overflow-y: auto;height: 250px;">
                <?php
                if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
                  $total_cart=0;
                  $total_discount=0;
                  $total=0;
                  $total_product=0;
                  foreach ($_SESSION['cart'] AS $product_id => $cart):
                    $total_item_discount = ($cart["price"] * ($cart["discount"] / 100)) * $cart["quanlity"];
                    $total_item = ($cart["price"] * $cart["quanlity"]);
                    $total_product = $total_item - $total_item_discount;
                    $total_cart += $total_item;
                    $total_discount += $total_item_discount;
                    $total += $total_product;
                    $product_link = 'chi-tiet-san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                  ?>
                <div class="cart_item">
                  <div class="cart_img">
                    <?php if (!empty($cart['avatar'])): ?>
                      <a href="<?php echo $product_link; ?>"><img width="80%"; style="height: 70px;text-align: center;" src="assets/uploads/products/<?php echo $cart['avatar']; ?>" alt=""></a>
                    <?php endif; ?>
                  </div>
                  <div class="cart_info">
                    <a href="#"><?php echo $cart['name']; ?></a>
                    <span class="price_cart"><?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ <strong> ×  <?php echo $cart['quanlity']; ?></span>
                  </div>
                  <div class="cart_remove">
                    <a href="xoa-san-pham/<?php echo $product_id; ?>" onclick="return window.confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng');"><i class="ion-android-close"></i></a>
                  </div>
                </div>
                  <?php endforeach; endif; ?>
                </div>
                <div class="mini_cart_table">
                  <div class="cart_total">
                    <span>Tồng tiền thanh toán:</span>
                    <span class="price"><?php
                      echo number_format($total);
                      ?> VNĐ
                     </span>
                  </div>
                </div>
                <div class="mini_cart_footer">
                  <div class="cart_button">
                    <a href="gio-hang-cua-ban">Xem chi tiết</a>
                    <a href="thanh-toan">Thanh toán</a>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <!--mini cart end-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php  require_once 'Mvc/Frontend/controllers/CategoryController.php';
      $category=new CategoryController();
      $category->getCategoryProduct();
?>

</header>

<div class="Offcanvas_menu">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="canvas_open">
          <span>MENU</span>
          <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
        </div>
        <div class="Offcanvas_menu_wrapper">
          <div class="canvas_close">
            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
          </div>
          <div class="welcome_text">
            <p>Chào mừng bạn  <span>Showroom Tú Hoàng </span> </p>
          </div>

          <div class="top_right">
            <ul>
              <li class="language"><a href="tel:0395679339"> Hottline: 039.567.9339 </a>
              <li class="top_links"><a href="#"><i class="zmdi zmdi-account"></i>Tài khoản <i class="zmdi zmdi-caret-down"></i></a>
                <ul class="dropdown_links">
                  <li><a href="checkout.html">Hoàng Mạnh Tú </a></li>
                  <li><a href="my-account.html">Thông tin cá nhân </a></li>
                  <li><a href="cart.html">Lịch sử đơn hàng</a></li>
                  <li><a href="wishlist.html">Đăng xuất</a></li>
                </ul>
              </li>

            </ul>
          </div>
          <div class="search-container">
            <form action="#">
              <div class="search_box">
                <input placeholder="Nhập sản phẩm mà bạn muốn tìm kiếm..." type="text">
                <button type="submit"><i class="zmdi zmdi-search"></i></button>
              </div>
            </form>
          </div>
          <div class="mini_cart_wrapper">

            <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket"></i>
              <?php
              if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
              {
                foreach ($_SESSION["cart"] as $list)
                {
                  $total +=$list["quality"];
                }
              }
              ?>
              <span>><?php echo $total; ?> Sản phẩm</span>
            </a>
            <?php else: ?>
            <span>Giỏ Hàng</span>
            <?php endif; ?>

            <!--mini cart-->
            <div class="mini_cart">
              <div class="cart_item">
                <div class="cart_img">
                  <a href="#"><img src="https://demo.hasthemes.com/pallas-preview/pallas/assets/img/s-product/product.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                  <a href="#">Condimentum Watches</a>

                  <span class="quantity">Qty: 1</span>
                  <span class="price_cart">$60.00</span>

                </div>
                <div class="cart_remove">
                  <a href="#"><i class="ion-android-close"></i></a>
                </div>
              </div>
              <div class="cart_item">
                <div class="cart_img">
                  <a href="#"><img src="https://demo.hasthemes.com/pallas-preview/pallas/assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                  <a href="#">Officiis debitis</a>
                  <span class="quantity">Qty: 1</span>
                  <span class="price_cart">$69.00</span>
                </div>
                <div class="cart_remove">
                  <a href="#"><i class="ion-android-close"></i></a>
                </div>
              </div>
              <div class="cart_item">
                <div class="cart_img">
                  <a href="#"><img src="https://demo.hasthemes.com/pallas-preview/pallas/assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                  <a href="#">Officiis debitis</a>
                  <span class="quantity">Qty: 1</span>
                  <span class="price_cart">$69.00</span>
                </div>
                <div class="cart_remove">
                  <a href="#"><i class="ion-android-close"></i></a>
                </div>
              </div>
              <div class="cart_item">
                <div class="cart_img">
                  <a href="#"><img src="https://demo.hasthemes.com/pallas-preview/pallas/assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                  <a href="#">Officiis debitis</a>
                  <span class="quantity">Qty: 1</span>
                  <span class="price_cart">$69.00</span>
                </div>
                <div class="cart_remove">
                  <a href="#"><i class="ion-android-close"></i></a>
                </div>
              </div>
              <div class="cart_item">
                <div class="cart_img">
                  <a href="#"><img src="https://demo.hasthemes.com/pallas-preview/pallas/assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                  <a href="#">Officiis debitis</a>
                  <span class="quantity">Qty: 1</span>
                  <span class="price_cart">$69.00</span>
                </div>
                <div class="cart_remove">
                  <a href="#"><i class="ion-android-close"></i></a>
                </div>
              </div>
              <div class="cart_item">
                <div class="cart_img">
                  <a href="#"><img src="https://demo.hasthemes.com/pallas-preview/pallas/assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                  <a href="#">Officiis debitis</a>
                  <span class="quantity">Qty: 1</span>
                  <span class="price_cart">$69.00</span>
                </div>
                <div class="cart_remove">
                  <a href="#"><i class="ion-android-close"></i></a>
                </div>
              </div>
              <div class="mini_cart_table">
                <div class="cart_total">
                  <span>Subtotal:</span>
                  <span class="price">$138.00</span>
                </div>
              </div>

              <div class="mini_cart_footer">
                <div class="cart_button">
                  <a href="cart.html">Xem chi tiết</a>
                  <a href="checkout.html">Thanh toán</a>
                </div>
              </div>

            </div>
            <!--mini cart end-->
          </div>
          <div id="menu" class="text-left ">
            <ul class="offcanvas_main_menu">
              <li class="menu-item-has-children active">
                <a href="#">Trang chủ</a>
              </li>
              <li class="menu-item-has-children">
                <a href="#">sản phẩm</a>

              </li>
              <li class="menu-item-has-children">
                <a href="#">Tin tức khuyến mại</a>
              </li>
              <li class="menu-item-has-children">
                <a href="lien-he">Liên hệ </a>

              </li>
              <li class="menu-item-has-children">
                <a href="my-account.html">Hệ thống cửa hàng</a>
              </li>
            </ul>
          </div>

          <div class="Offcanvas_footer">
            <span><a href="#"><i class="fa fa-envelope-o"></i> hoangmanhtu0809@gmail.com</a></span>
            <ul>
              <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
              <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>