
<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Thống kê doanh thu theo ngày tháng
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active">  <i class="fa fa-table"></i>  Thống kê - báo cáo</li>
  </ol>
</section>
<h3 style="text-align: center"></h3>
<div style="width: 500px;margin: 20px auto">
  <form action="" method="POST" id="report_money">
    <div class="col-sm-6 form-group">
      <lable for="ngayBatDau">Ngày bắt đầu :</lable>
      <input type="date" class="form-control" id="ngayBatDau" name="ngayBatDau">
    </div>
    <div class="col-sm-6 form-group">
      <lable for="ngayKetThuc">Ngày kết thúc :</lable>
      <input type="date" class="form-control" id="ngayKetThuc" name="ngayKetThuc">
    </div>
    <div class="col-sm-12 form-group">
      <input  type="submit" value="Tra cứu" name="submit" class="btn btn-success form-control">
    </div>
  </form>
  <br>
  <h4 style="text-align: center;margin-top: 20px;"> Doanh thu từ :
  <span  style="text-align: center;margin-top: 20px;"><?php  echo date($ngaybatdau); ?> <i class="fa fa-arrow-right"></i> ngày <?php echo $ngayketthuc; ?> là :</span>
  </h4>
  <h3 style="text-align: center"><?php echo number_format($sumprice); ?> VNĐ</h3>
</div>



<div class="row">
  <div class="col-xs-12">
    <div class="box" style="margin-top: 30px">
    <table class="table table-bordered">
      <thead>
      <tr class="table-active">
        <th scope="col">Mã ĐH</th>
        <th style="width: 10%;" scope="col">Tên người nhận</th>
        <th style="width: 17%;" scope="col">Địa chỉ</th>
        <th style="width: 15%;" scope="col">Email</th>
        <th style="width: 10%;" scope="col">Số điện thoai</th>
        <th style="width: 15%;" scope="col">Trạng thái đơn hàng</th>
        <th style="width: 15%;" scope="col">Tổng tiền</th>
        <th style="width:8%;" scope="col">Ngày tạo</th>
        <th style="text-align: center;width: 10%;">Chi tiết ĐH</th>
      </tr>
      </thead>
      <tbody>

      <?php if (!empty($ReportOrder)):?>

        <?php
        foreach ($ReportOrder as $cart):
          ?>
          <tr>
            <td><?php echo $cart["id"];?></td>
            <td><?php echo $cart["fullname"];?></td>
            <td><?php echo $cart["address"];?></td>
            <td><?php echo $cart["email"]; ?></td>
            <td><?php echo $cart["phone"];?></td>
            <td>
              <?php
              if($cart["status"] == 0)
              {
                echo "<i style='color: red' class='fa fa-retweet'></i> <span style='color:red'> Đang xử lý</span>";
              }
              elseif ($cart["status"] == 1)
              {
                echo "<i style='color: #0bb827' class='fa fa-check'></i> <span style='color: #0bb827'>Đã xác nhận thành công</span>";
              }
              elseif($cart["status"] == 3)
              {
                echo "<i style='color: red' class='fa fa-check'></i> <span style='color:red'> đơn hàng đã bị hủy</span>";
              }
              ?>
            </td>
            <td><?php echo number_format($cart["price_total"]);?> VNĐ</td>
            <td><?php echo date('d/m/Y',strtotime($cart["created_at"]));?></td>
            <td style="text-align: center">
              <a href="index.php?area=backend&controller=ShoppingCart&action=detail&id=<?php echo $cart["id"]; ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
            </td>

          </tr>
        <?php  endforeach;?>
      <?php  else: ?>
        <tr>
          <td colspan="9">Hôm nay không có đơn hàng nào !!!</td>
        </tr>
      <?php endif;?>
    </table>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-xs-6">
    <div class="box" style="margin-top: 30px">
      <div class="box-header">
        <h3 class="box-title">Danh sách sản phẩm bán chạy</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table ">
          <tbody><tr>
            <th  width="10%">Mã sản phẩm</th>
            <th width="30%">Tên sản phẩm</th>
            <th  width="20%">Tên danh mục</th>
            <th  width="20%">Ảnh sản phẩm</th>
            <th  width="20%">Số lượng</th>

          </tr>
          <?php foreach ($products as $product): ?>
            <tr>
              <td style="text-align: center"><?php echo $product['id']; ?></td>
              <td><a style="color: white !important;" href="index.php?area=backend&controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></td>
              <td><?php echo $product['category_name']; ?></td>
              <td><img width="50" height="50" src="Assets/Uploads/products/<?php echo $product['avatar']; ?>" alt=""></td>
              <td><span class="label label-success"><?php echo $product['TONG'] ?> chiếc</span></td>

            </tr>
          <?php endforeach; ?>
          </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-xs-6">
    <div class="box" style="margin-top: 30px">
      <div class="box-header">
        <h3 class="box-title">Danh sách sản phẩm không bán được</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table">
          <tbody><tr>
            <th  width="10%">Mã sản phẩm</th>
            <th width="30%">Tên sản phẩm</th>
            <th  width="20%">Tên danh mục</th>
            <th  width="20%">Ảnh sản phẩm</th>
            <th  width="20%">Số lượng</th>

          </tr>
          <?php foreach ($productsNoData as $product): ?>
            <tr>
              <td style="text-align: center"><?php echo $product['id']; ?></td>
              <td><a style="color: white !important;" href="index.php?area=backend&controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></td>
              <td><?php echo $product['category_name']; ?></td>
              <td><img width="50" height="50" src="Assets/Uploads/products/<?php echo $product['avatar']; ?>" alt=""></td>
              <td><span class="label label-success"><?php echo $product['quality'] ?> chiếc</span></td>

            </tr>
          <?php endforeach; ?>
          </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<script>
    $("#report_money").validate({
        rules:
            {
                ngayBatDau: {
                    required:true,
                },
                ngayKetThuc: {
                    required:true,
                },
            },
        messages :
            {
                ngayBatDau: {
                    required:"Chọn ngày bắt đầu",
                },
                ngayKetThuc: {
                    required:"Chọn ngày kết thúc",
                },
            }
    });
</script
