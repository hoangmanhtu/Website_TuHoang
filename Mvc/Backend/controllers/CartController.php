<?php
require_once 'Mvc/Backend/models/Product.php';

class CartController extends Controller
{
  public function __construct()
  {
    if (isset($_SESSION["cart_admin"]) == false)
      $_SESSION["cart_admin"] = array();
  }

  public function add()
  {
    $id = $_POST["id"];
    $product_model = new Product();
    $product = $product_model->getById($id);
    $cart =
        [
            "name" => $product["title"],
            "price" => $product["price"],
            "avatar" => $product["avatar"],
            "discount" => $product["discount"],
            "quality" => 1,
        ];

    if (!isset($_SESSION["cart_admin"])) {
      $_SESSION["cart_admin"][$id] = $cart;
    } else {
      if (!array_key_exists($id, $_SESSION["cart_admin"])) {
        $_SESSION["cart_admin"][$id] = $cart;
      } else {
        if ($product['quality'] <= $_SESSION["cart_admin"][$id]["quality"]) {
          echo   'Sản phẩm ' . $product["title"] . 'chỉ còn lại ' . $product['quality'] . ' chiếc';
        } else {
          $_SESSION["cart_admin"][$id]["quality"]++;
        }
      }
    }
    echo "Bạn đã thêm sản phẩm ".$product['title']." vào giỏ hàng";
  }

  public function index()
  {
    if (isset($_POST["submit"])) {
      foreach ($_SESSION["cart_admin"] as $product_id => $cart) {
        $product_model = new Product();
        $products = $product_model->getById($product_id);
        if ($products['quality'] < $_POST[$product_id]) {
          $_SESSION["error"] = "Sản phẩm " . $products['title'] . ' chỉ còn số lượng' . $products["quality"] . "chiếc";
        } else if ($_POST[$product_id] <= 0) {
          unset($_SESSION['cart_admin'][$product_id]);
        } else if ($_POST[$product_id] > 10) {
          $_SESSION["error"] = " Không được mua quá 10 sản phẩm";
        } else {
          $_SESSION["cart_admin"][$product_id]["quality"] = $_POST[$product_id];
        }
      }
    }
    $this->content = $this->render('Mvc/Backend/views/carts/index.php');
    require_once "Mvc/Backend/views/layouts/main.php";
  }

  public function delete()
  {
    $product_id = $_GET['id'];
    unset($_SESSION["cart_admin"][$product_id]);
    if (empty($_SESSION["cart_admin"])) {
      unset($_SESSION["cart_admin"]);
    }
    $_SESSION["success"] = " Xóa sản phẩm khỏi giỏ hàng thành công";
    $url_redireact = "index.php?area=backend&controller=cart";
    header("location: $url_redireact ");
    exit();
  }

  public function destroy()
  {
    $_SESSION['cart_admin'] = array();
    $url_redireact ="index.php?area=backend&controller=cart";
    header("location: $url_redireact ");
  }
}
