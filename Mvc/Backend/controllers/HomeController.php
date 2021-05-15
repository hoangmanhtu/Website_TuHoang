<?php
require_once 'Mvc/backend/models/Home.php';
require_once 'Mvc/backend/models/Product.php';
 class HomeController extends Controller{
     public function index(){
       $listDay=Date::getListDayInMoth();

       $home_model=new Home();
       $moneyMothDay=$home_model->MoneyMothHave();
       $moneyMothDayNoHave=$home_model->MoneyMothNoHave();
       $countNoUser=$home_model->CountNoUser();
       $countOrder0=$home_model->countOrder0();
       $countUser=$home_model->countUser();
       $countProductOut=$home_model->countProductOut();
       $arrDoanhThuXacnhan=[];
       $arrChuaNhan=[];
       foreach ($listDay as $day){
         $total=0;
         foreach ($moneyMothDay as $key=>$money){
          if($money['day'] == $day){
            $total=$money['DOANHTHU'];
            break;
          }
         }
         $arrDoanhThuXacnhan[]=(int)$total;
       }
//
       foreach ($listDay as $day){
         $total=0;
         foreach ($moneyMothDayNoHave as $key=>$money){
           if($money['day'] == $day){
             $total=$money['DOANHTHU'];
             break;
           }
         }
         $arrChuaNhan[]=(int)$total;
       }
       $arrChuaNhan=json_encode($arrChuaNhan);
       $arrDoanhThuXacnhan=json_encode($arrDoanhThuXacnhan);
       $listDay = json_encode($listDay);
       $output=[
           'listDay'=>$listDay,
           'arrDoanhThuXacnhan'=>$arrDoanhThuXacnhan,
           'arrChuaNhan'=>$arrChuaNhan,
           'countNoUser' => $countNoUser,
           'countOrder0' => $countOrder0,
           'countUser' => $countUser,
           'countProductOut' => $countProductOut
       ];
         $this->content=$this->render('Mvc/Backend/views/home/home.php',$output);
         require_once 'Mvc/Backend/views/layouts/main.php';
     }
   public function ProductOut(){
       if(isset($_SESSION['user_admin']) && $_SESSION['user_admin']['quyen']==1){
         $product_model=new Product();
         $products=$product_model->ProductOut();
         $output=[
             "products" => $products,
         ];
         $this->content=$this->render('Mvc/Backend/views/products/productsOut.php',$output);
         require_once 'Mvc/Backend/views/layouts/main.php';
       }else{
          $_SESSION['error'] ="Bạn không có quyền vào trang này";
         header('location:index.php?area=backend');
         exit();
       }


   }
   public  function OrderNoUser(){
     if(isset($_SESSION['user_admin']) && $_SESSION['user_admin']['quyen']==1) {
       $user_model = new Home();
       $oders = $user_model->OrderNoUser();
       $output = [
           "oders" => $oders,
       ];
       $this->content = $this->render('Mvc/Backend/views/Shoppingcart/OrderNoUser.php', $output);
       require_once 'Mvc/Backend/views/layouts/main.php';
     } else{
       $_SESSION['error'] ="Bạn không có quyền vào trang này";
       header('location:index.php?area=backend');
       exit();
     }
   }
   public function hotproducts(){
     $home_model = new Home();
     $products = $home_model->hotProduct();
     $this->content = $this->render('Mvc/Backend/views/home/chart.php',['products' => $products]);
     echo $this->content;
   }
   public function hotproductAll(){
     $home_model = new Home();
     $products = $home_model->hotProductAll();
     $this->content = $this->render('Mvc/Backend/views/products/productHot.php',['products' => $products]);
     require_once 'Mvc/Backend/views/layouts/main.php';
   }
 }