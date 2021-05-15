<?php
require_once 'Mvc/Frontend/models/wishlist.php';
require_once 'Mvc/Frontend/models/product.php';
class  WishListController extends Controller{
  public function addWishList(){
    if(isset($_SESSION['user_account'])){
      $id=$_POST['id'];
      $product_model=new Product();
      $product=$product_model->detailProduct($id);
      $user_id=$_SESSION['user_account']['id'];
      $wishlist_model=new wishlist();
      $products=$wishlist_model->getAllProductUser($user_id);
      $arr=[];
      foreach ($products as $value){
        array_push($arr,$value['id']);
      }
      if(in_array($id,$arr)){
        echo $product['title']." đã có trong danh sách yêu thích ";
      }else{
        $wishlist_model->user_id=$user_id;
        $wishlist_model->product_id=$product['id'];
        $wishlist=$wishlist_model->wishlist();
        if($wishlist){
          echo  "Bạn đã sản phẩm ".$product['title']." vào danh sách yêu thích thành công";
        }
        else{
          echo "Thêm sản phẩm yêu thích thất bại";
        }
      }
    }
    else{
      echo "Bạn cần đăng nhập để sử dụng được chức năng này";
    }
  }
  public function index(){
    $wishList_model=new wishlist();
    $user_id=$_SESSION['user_account']['id'];;
    $products=$wishList_model->getAllProductUser($user_id);
    $this->content=$this->render("Mvc/Frontend/views/wishlist/index.php",['products' => $products]);
    require_once 'Mvc/Frontend/views/layouts/main.php';
  }
  public function deteleWishList(){
    $id = $_GET['id'];
    $wishList_model=new wishlist();
    $is_delete = $wishList_model->deleteWish($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Đã loại bỏ sản phẩm trong danh sách yêu thích thành công';
    } else {
      $_SESSION['error'] = 'Loại bỏ sản phẩm trong danh sách yêu thích thất bại';
    }
    $url_redirect=$_SERVER["SCRIPT_NAME"].'/danh-sach-yeu-thich';
    header("location:  $url_redirect");
    exit();
  }
}