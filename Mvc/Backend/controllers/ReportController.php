<?php
require_once 'Mvc/backend/models/report.php';
class ReportController extends Controller{
  public function ProductNoData(){
    $report_model=new report();
    $products=$report_model->ProductNoData();
    $this->content=$this->render("Mvc/backend/views/reports/ProductNoData.php",['products' => $products]);
    require_once 'Mvc/backend/views/layouts/main.php';
  }
  public function index()
  {

    $ngaybatdau = date('Y-m-01 00:00:00');
    $ngayketthuc = date("Y-m-d 23:59:59");
    $ngaybatdau1 = date('d-m-Y', strtotime($ngaybatdau));
    $ngayketthuc1 = date('d-m-Y', strtotime($ngayketthuc));
    $report_model = new report();
    $products = $report_model->sellingProducts();
    $productsNoData = $report_model->ProductNoData();

    if ($_SESSION['user_admin']['quyen'] == 0) {
      $id=$_SESSION['user_admin']['staff_id'];
      if (isset($_POST['submit'])) {
        $ngaybatdau = $_POST['ngayBatDau'];
        $ngayketthuc = $_POST['ngayKetThuc'];
        $ngaybatdau = date("$ngaybatdau 00:00:00");
        $ngayketthuc = date("$ngayketthuc 23:59:59");
        $report_model = new report();
        $sumprice = $report_model->moneyProductStaff($id,$ngaybatdau, $ngayketthuc);
        $ReportOrder = $report_model->ReportOrderStaff($id,$ngaybatdau, $ngayketthuc);
        $ngaybatdau1 = date('d-m-Y', strtotime($ngaybatdau));
        $ngayketthuc1 = date('d-m-Y', strtotime($ngayketthuc));
        $output = [
            "ngaybatdau" => $ngaybatdau1,
            "ngayketthuc" => $ngayketthuc1,
            'sumprice' => $sumprice,
            'products' => $products,
            'productsNoData' => $productsNoData,
            'ReportOrder' => $ReportOrder
        ];
        $this->content = $this->render("Mvc/backend/views/reports/index.php", $output);
        require_once 'Mvc/backend/views/layouts/main.php';
      } else {
        $report_model = new report();
        $sumprice = $report_model->moneyProductStaff($id,$ngaybatdau, $ngayketthuc);
        $ReportOrder = $report_model->ReportOrderStaff($id,$ngaybatdau, $ngayketthuc);
        $output = [
            "ngaybatdau" => $ngaybatdau1,
            "ngayketthuc" => $ngayketthuc1,
            'sumprice' => $sumprice,
            "products" => $products,
            'productsNoData' => $productsNoData,
            'ReportOrder' => $ReportOrder
        ];
        $this->content = $this->render("Mvc/backend/views/reports/index.php", $output);
        require_once 'Mvc/backend/views/layouts/main.php';
      }
    } else {
      if (isset($_POST['submit'])) {

        $ngaybatdau = $_POST['ngayBatDau'];
        $ngayketthuc = $_POST['ngayKetThuc'];
        $ngaybatdau = date("$ngaybatdau 00:00:00");
        $ngayketthuc = date("$ngayketthuc 23:59:59");
        $report_model = new report();
        $sumprice = $report_model->moneyProduct($ngaybatdau, $ngayketthuc);
        $ReportOrder = $report_model->ReportOrder($ngaybatdau, $ngayketthuc);
        $ngaybatdau1 = date('d-m-Y', strtotime($ngaybatdau));
        $ngayketthuc1 = date('d-m-Y', strtotime($ngayketthuc));

        $output = [
            "ngaybatdau" => $ngaybatdau1,
            "ngayketthuc" => $ngayketthuc1,
            'sumprice' => $sumprice,
            'products' => $products,
            'productsNoData' => $productsNoData,
            'ReportOrder' => $ReportOrder
        ];
        $this->content = $this->render("Mvc/backend/views/reports/index.php", $output);
        require_once 'Mvc/backend/views/layouts/main.php';
      } else {
        $report_model = new report();
        $sumprice = $report_model->moneyProduct($ngaybatdau, $ngayketthuc);
        $ReportOrder = $report_model->ReportOrder($ngaybatdau, $ngayketthuc);
        $output = [
            "ngaybatdau" => $ngaybatdau1,
            "ngayketthuc" => $ngayketthuc1,
            'sumprice' => $sumprice,
            "products" => $products,
            'productsNoData' => $productsNoData,
            'ReportOrder' => $ReportOrder
        ];
        $this->content = $this->render("Mvc/backend/views/reports/index.php", $output);
        require_once 'Mvc/backend/views/layouts/main.php';
      }
    }
  }
}