<?php
require_once 'Mvc/Frontend/models/Login.php';
require_once  "Mvc/Frontend/Models/Order.php";
require_once  "Mvc/Frontend/Models/OrderDetail.php";
class LoginController extends Controller{
    public function index(){
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($this->error)) {
                $user_model = new Login();
                $password = md5($password);
                $user = $user_model->getUserLogin($email, $password);
                if (empty($user)) {
                    $_SESSION['error'] = 'Tên tài khoản và mật khẩu không đúng';
                    $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
                    header("Location: $url_redirect");
                    exit();
                } else {
//                    $_SESSION['success'] = 'Đăng nhập thành công';
                    $_SESSION['user_account'] = $user;
                    header('Location: index.php');
                    exit();
                }
            }
        }
        $this->content=$this->render("Mvc/Frontend/views/login/index.php");
        require_once "Mvc/Frontend/views/layouts/main.php";
    }
    public function validateEmail()
    {
      $email =  $_POST["email"];
      $user_model = new Login();
      $user = $user_model->getUser($email);
      if(!empty($user))
      {
        echo "True";
      }
      else
      {
        echo "false";
      }
    }
  public function validatePhone()
  {
    $phone =$_POST["phone"];
    $user_model = new Login();
    $user = $user_model->getUserPhone($phone);
    if(!empty($user))
    {
      echo "True";
    }
    else
    {
      echo "false";
    }
  }
    public function register(){

        if(isset($_POST["submit"])) {
            $fullname=$_POST["fullname"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $address=$_POST["address"];
            $password=$_POST["password"];
            if(empty($this->error))
            {
                $user_model=new Login();
                $user=$user_model->getUser($email);
                $mobile_model=$user_model->getUserPhone($phone);
                if(!empty($mobile_model))
                {
                    $_SESSION["error"]=" Số điện thoại đã được đăng ký";
                } else if(!empty($user))
                {
                    $_SESSION["error"]="  Email đã được đăng ký";
                }
                else
                {
                    $user_model->fullname=$fullname;
                    $user_model->phone=$phone;
                    $user_model->address=$address;
                    $user_model->email=$email;
                    $user_model->password = md5($password);
                    $is_register = $user_model->register();
                    if($is_register) {
                        $_SESSION['success'] = 'Đăng ký tài khoản thành công';
                    } else {
                        $_SESSION['error'] = 'Đăng ký tài khoản thất bại';
                    }

                    $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
                    header("Location: $url_redirect");
                    exit();
                }
            }
        }
        $this->content=$this->render("Mvc/Frontend/views/login/register.php");
        require_once 'Mvc/Frontend/views/layouts/main.php';
    }
    public function logout() {
        unset($_SESSION['user_account']);
        $_SESSION['success'] = ' Đăng xuất tài khoản thành công';
        $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
        header("Location: $url_redirect");
        exit();
    }
  public function history()
  {
    $id=$_SESSION["user_account"]["id"];
    $order_model=new Order();
    $orders=$order_model->listOrder($id);
    $this->content=$this->render('Mvc/Frontend/views/login/shoppingcart.php',["orders" => $orders]);
    require_once 'Mvc/Frontend/views/layouts/main.php';
  }
  public function historyallproduct()
  {
    $id=$_GET["id"];
    $order_model=new OrderDetail();
    $products=$order_model->listProduct($id);
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die();
    $this->content=$this->render('Mvc/Frontend/views/login/HistoryAllProduct.php',["products" => $products]);
    require_once 'Mvc/Frontend/views/layouts/main.php';

  }
  public function delete_orders()
  {

    $id = $_GET['id'];
    $order_model=new Order();
    $is_delete = $order_model->delete_Oder($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Ban đã hủy đơn hàng thành công';
    } else {
      $_SESSION['error'] = 'Đơn hàng có vấn đề - Hãy liên hệ với Shop để được giải quyết';
    }
    $url_redireact=$_SERVER["SCRIPT_NAME"]."/lich-su-mua-hang";
    header("location: $url_redireact ");
    exit();
  }
  public function UpdateUser(){
    $id=$_SESSION['user_account']['id'];
    $login_model=new Login();
    $user=$login_model->getUser_Account($id);
    if(isset($_POST['submit'])){
      $fullname = $_POST["fullname"];
      $avatar_file = $_FILES["avatar"];
//      print_r($avatar_file);
//      die();
      $address=$_POST['address'];
      if(empty($this->error)){
        $avatar=$user['avatar'];
        if($avatar_file['error'] == 0){
          $login_model->images($id);
          $dir_upload=__DIR__."/../../../Assets/Uploads/users";
          if(!file_exists($dir_upload)){
            mkdir($dir_upload);
          }
          $avatar=time()."-". $avatar_file["name"];
          move_uploaded_file($avatar_file["tmp_name"],$dir_upload."/".$avatar);
        }
        $login_model->fullname=$fullname;
        $login_model->avatar=$avatar;
        $login_model->address=$address;
        $login_model->updated_at = date('Y-m-d H:i:s');
        $is_update = $login_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Cập nhật thông tin thành công';
          $user = $login_model->getUser_Account($id);
          $_SESSION["user_account"] = $user;

        } else {
          $_SESSION['error'] = 'Cập nhật thông tin thất bại';
        }
        $url_redireact=$_SERVER["SCRIPT_NAME"]."/thong-tin-ca-nhan";
        header("location: $url_redireact ");
        exit();
      }
    }
    $this->content=$this->render('Mvc/Frontend/views/login/UpdateUser.php');
    require_once 'Mvc/Frontend/views/layouts/main.php';
  }

}