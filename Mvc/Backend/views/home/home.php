<?php if($_SESSION['user_admin']['quyen']==1): ?>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3> <i class=""></i><?php echo $countOrder0; ?></h3><span></span>
        <p>Đơn hàng đang xử lý</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="index.php?area=backend&controller=ShoppingCart" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $countUser; ?></h3>

        <p>Tài khỏan thành viên</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="index.php?area=backend&controller=User&action=getAll" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $countProductOut ?></h3>

        <p>Sản phẩm hết hàng</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="index.php?area=backend&controller=home&action=ProductOut" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $countNoUser; ?></h3>
        <p>Đơn hàng KH không có tài khoản</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="index.php?area=backend&action=OrderNoUser" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="row">
  <div class="col-sm-8">
    <div class="box"  style="background-color: white !important;">
    <figure class="highcharts-figure" style="width: 100% !important;">
      <div id="container2" data_list_day='<?php echo $listDay; ?>'
           data_doanhthu='<?php echo $arrDoanhThuXacnhan; ?>'
           data_chuanhan='<?php echo $arrChuaNhan; ?>'>
      </div>
    </figure>
    </div>
  </div>

  <div class="col-sm-4">
   <?php require_once 'Mvc/backend/controllers/HomeController.php';
      $home_controller=new HomeController();
      $home_controller->hotproducts();
   ?>
  </div>
</div>
<?php else: ?>
<div class="col-sm-12">
    <?php require_once 'Mvc/backend/controllers/HomeController.php';
    $home_controller=new HomeController();
    $home_controller->hotproducts();
    ?>
</div>
<?php endif; ?>
<script>
    let listDay = $("#container2").attr('data_list_day');
    listDay = JSON.parse(listDay);

    let listMothMoney = $("#container2").attr('data_doanhthu');
    listMothMoney = JSON.parse(listMothMoney);

    let listChuaNhan = $("#container2").attr('data_chuanhan');
    listChuaNhan = JSON.parse(listChuaNhan);


    Highcharts.chart('container2', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Biểu đồ thống kê doanh thu theo ngày'
        },
        subtitle: {
            text: '- Tu Hoang Electronic -'
        },
        xAxis: {
            categories: listDay
        },
        yAxis: {
            title: {
                text: '- Tu Hoang Electronic -'
            },
            // labels: {
            //     formatter: function () {
            //         return this.value + '°';
            //     }
            // }
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Đã xác nhận',
            marker: {
                symbol: 'square'
            },
            data: listMothMoney
        }, {
            name: 'Chưa xác nhận',
            marker: {
                symbol: 'square'
            },
            data: listChuaNhan
        },
        ]
    });
</script>
