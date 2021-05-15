<?php
require_once 'Mvc/Backend/models/Order.php';
require_once 'Mvc/Backend/models/OrderDetail.php';
require_once 'Mvc/Frontend/models/Product.php';
require_once 'nganhang/PHPMailer/src/PHPMailer.php';
require_once 'nganhang/PHPMailer/src/SMTP.php';
require_once 'nganhang/PHPMailer/src/Exception.php';
//từ khóa use tương tự vói require once
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class PaymentController extends Controller
{
  public  function index()
  {
    if(isset($_POST["submit"]))
    {
      $fullname=$_POST["fullname"];
      $address=$_POST["address"];
      $phone=$_POST["phone"];
      $note=$_POST["note"];
      $email=$_POST["email"];
      $method=$_POST["method"];
      $user_id=$_POST["user_id"];
      $status=$_POST["status"];
      if(empty($this->error))
      {
        $order_model=new Order();
        $order_model->fullname=$fullname;
        $order_model->address=$address;
        $order_model->phone=$phone;
        $order_model->note=$note;
        $order_model->user_id=$user_id;
        $order_model->email=$email;
        $order_model->status=$status;
        $total_cart=0;
        $total_discount=0;
        $total=0;
        $total_product=0;
        foreach ($_SESSION["cart_admin"] as $cart)
        {
          $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
          $total_item=($cart["price"] * $cart["quality"]);
          $total_product=$total_item-$total_item_discount;
          $total_cart += $total_item;
          $total_discount += $total_item_discount;
          $total +=$total_product;
        }
        $order_model->price_total=$total;
        $order_model->payment_status=$method;
        $order_id=$order_model->insert();
        $_SESSION["order"] =[
            "id" => $order_id,
            "price_total" => $total,
            "fullname" => $fullname,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
        ];

        if($order_id > 0)
        {
          $order_detail_model=new OrderDetail();
          $order_detail_model->order_id=$order_id;
          $product_model=new Product();

          foreach ($_SESSION["cart_admin"] as $key=>$cart)
//                        lưu thông tin vào bảng order_detail{
          {
            $order_detail_model->product_id=$key;
            $order_detail_model->quanlity=$cart["quality"];
            $is_insert=$order_detail_model->insert();
            $product=$product_model->detailProduct($key);
            if($product['id'] == $key){
              $total_quality=0;
              $total_quality=(int)+($product['quality']) - (int)+($cart["quality"]);
              $product_model->quality=$total_quality;
              $product_model->UpdateQuality($key);
            }
          }
            $this->sendMail($email);
            unset($_SESSION["cart_admin"]);
            $url_redirect='index.php?area=backend&controller=payment&action=thank';
            header("location: $url_redirect");
            exit();
          }
        }
      }
    $this->content=$this->render("Mvc/Backend/views/payments/index.php");
    require_once 'Mvc/Backend/views/layouts/main.php';
  }
  public function sendMail($email)
  {
    $this->content=$this->render('Mvc/Backend/views/payments/MailOrder.php');
    $mail = new PHPMailer(true);
    try {
      $mail->CharSet="UTF-8";
      $mail->SMTPDebug = SMTP::DEBUG_OFF;
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
//    sử dụng server gmail để gửi mail
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//    nhập tài khoản gmail cho username
      $mail->Username   = 'hoangmanhtu0809@gmail.com';                     // SMTP username
      ////password k phải là pasword gmail mà gmail có 1 cơ chế tạ password cho các ứng dụng
//    password này sẽ đọc lập với password của bạn
      $mail->Password   = 'sdywepqwzyatyzuk';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('binlun@gmail.com', 'Hoàng Mạnh Tú');
//    gửi tới ai
      $mail->addAddress($email);     // Add a recipient
      // Content
      $mail->isHTML(true);
      $mail->Subject = 'Cảm ơn bạn đã mua hàng tại Showroom Tú Hoàng';
      $mail->Body    =  $this->content;
      $mail->AltBody =  '';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
  public function thank()
  {
    $this->content=$this->render("Mvc/Backend/views/payments/thank.php");
    require_once 'Mvc/Backend/views/layouts/main.php';
  }
}

?>