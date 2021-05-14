<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang Quản Trị Admin</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="Assets/Backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Backend/css/font-awesome.min.css">
<!--    <link rel="stylesheet" href="Assets/Backend/css/ionicons.min.css">-->
    <link rel="stylesheet" href="Assets/Backend/css/AdminLTE.min.css">
    <link rel="stylesheet" href="Assets/Backend/css/_all-skins.min.css">
    <link rel="stylesheet" href="Assets/Backend/css/css.css">
    <link rel="stylesheet" href="Assets/Backend/css/style.css">
    <script src="Assets/Backend/js/jquery.min.js"></script>
    <script src="Assets/Backend/js/bootstrap.min.js"></script>
    <script src="Assets/Backend/js/adminlte.min.js"></script>
    <script src="Assets/Backend/js/jquery.validate.min.js"></script>
    <script src="Assets/Backend/js/additional-methods.min.js"></script>
  <script src="Assets/Backend/js/script.js"></script>
<!--  -->
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
<!--  -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
<!--  <script src="https://code.highcharts.com/modules/series-label.js"></script>-->
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body style="color: #fff;background: #152036 " class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php require_once 'Mvc/Backend/views/layouts/header.php'; ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="Assets/Uploads/staffs/<?php echo $_SESSION["user_admin"]["avatar"]; ?>" class="img-circle" alt="User Image" width="100%"; height="100px;">
                </div>
                <div class="pull-left info">
                    <p><?php echo isset($_SESSION["user_admin"]["name"]) ? $_SESSION["user_admin"]["name"] : ''; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
<!--            -->
            <ul class="sidebar-menu" data-widget="tree" style="border-top: 1px solid aqua;">
                <li class="header" style="text-align: center;border-bottom: 1px solid aqua">DANH SÁCH CHỨC NĂNG</li>
                <?php if(!isset($_GET["controller"]) || $_GET["controller"]=="home"):?>
                <li class="active">
                    <a href="index.php?area=Backend">
                        <i class="fa fa-home"></i> <span> Trang Chủ </span>
                    </a>
                </li>
              <?php else: ?>
                  <li>
                    <a href="index.php?area=Backend">
                      <i class="fa fa-home"></i> <span> Trang Chủ </span>
                    </a>
                  </li>
              <?php endif; ?>
<!--              -->
                <?php if(!$_SESSION["user_admin"]['quyen'] !=1): ?>
                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="category"): ?>
                  <li class="active">
                    <a href="index.php?area=Backend&controller=category">
                      <i class="fa fa-calendar-o"></i> <span> Quản lý danh mục</span>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="index.php?area=Backend&controller=category">
                      <i class="fa fa-calendar-o"></i> <span> Quản lý danh mục</span>
                    </a>
                  </li>
              <?php endif; ?>
                <?php endif; ?>
<!--              -->
              <?php if(!$_SESSION["user_admin"]['quyen'] !=1): ?>
                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="producer"): ?>
                  <li class="active">
                    <a href="index.php?area=Backend&controller=producer">
                      <i class="fa fa-product-hunt"></i> <span> Quản lý thương hiệu</span>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="index.php?area=Backend&controller=producer">
                      <i class="fa fa-product-hunt"></i> <span> Quản lý thương hiệu</span>
                    </a>
                  </li>
                  </li>
                <?php endif; ?>
              <?php endif; ?>

                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="product"): ?>
                  <li class="active">
                    <a href="index.php?area=Backend&controller=product">
                      <i class="fa fa-address-book"></i> <span> Quản lý sản phẩm</span>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="index.php?area=Backend&controller=product">
                      <i class="fa fa-address-book"></i> <span> Quản lý sản phẩm</span>
                    </a>
                  </li>
                  </li>
              <?php endif; ?>
              <?php if(!$_SESSION["user_admin"]['quyen'] !=1): ?>
                <?php if(isset($_GET["controller"]) && $_GET["controller"]=="news"): ?>
                  <li class="active">
                    <a href="index.php?area=Backend&controller=news">
                      <i class="fa fa-bullhorn"></i> <span> Quản lý tin tức</span>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="index.php?area=Backend&controller=news">
                      <i class="fa fa-bullhorn"></i> <span> Quản lý tin tức</span>
                    </a>
                  </li>
                  </li>
                <?php endif; ?>
              <?php endif; ?>
              <?php if(!$_SESSION["user_admin"]['quyen'] !=1): ?>
              <?php if(isset($_GET["controller"]) && $_GET["controller"]=="staff"): ?>
                <li class="active">
                  <a href="index.php?area=Backend&controller=staff">
                    <i class="fa fa-users"></i> <span> Quản lý nhân viên</span>
                  </a>
                </li>
              <?php else: ?>
                <li>
                  <a href="index.php?area=Backend&controller=staff">
                    <i class="fa fa-users"></i> <span> Quản lý nhân viên</span>
                  </a>
                </li>
                </li>
              <?php endif; ?>
              <?php endif; ?>
<!--              -->
              <?php if(isset($_GET["controller"]) && $_GET["controller"]=="shoppingCart"): ?>
                <li class="active">
                  <a href="index.php?area=Backend&controller=shoppingCart">
                    <i class="fa fa-shopping-cart"></i> <span> Quản lý đơn hàng</span>
                  </a>
                </li>
              <?php else: ?>
                <li>
                  <a href="index.php?area=Backend&controller=shoppingCart">
                    <i class="fa fa-shopping-cart"></i> <span> Quản lý đơn hàng</span>
                  </a>
                </li>
                </li>
              <?php endif; ?>
<!--               -->
              <?php if(isset($_GET["controller"]) && $_GET["controller"]=="user"): ?>
                <li class="active">
                  <a href="index.php?area=Backend&controller=user&action=getAll">
                    <i class="fa fa-key"></i> <span> Quản lý tài khoản</span>
                  </a>
                </li>
              <?php else: ?>
                <li>
                  <a href="index.php?area=Backend&controller=user&action=getAll">
                    <i class="fa fa-key"></i> <span> Quản lý tài khoản</span>
                  </a>
                </li>
                </li>
              <?php endif; ?>
              <?php if(isset($_GET["controller"]) && $_GET["controller"]=="report"): ?>
                <li class="active">
                  <a href="index.php?area=Backend&controller=report">
                    <i class="fa fa-table"></i> <span> Thống kê - Báo cáo</span>
                  </a>
                </li>
              <?php else: ?>
                <li>
                  <a href="index.php?area=Backend&controller=report">
                    <i class="fa fa-table"></i> <span> Thống kê - Báo cáo</span>
                  </a>
                </li>
                </li>
              <?php endif; ?>
                <li><a href="index.php?area=Backend&controller=user&action=logout"  onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không ?')"><i class="fa fa-lock"></i> <span>Đăng xuất</span></a></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <?php if (!empty($this->error)): ?>
                    <div class="alert alert-danger error_check">
                        <?php echo "<i class='fa fa-times'></i>" .$this->error; ?>
                    </div>
                <?php endif ?>
                <!-- Content Header (Page header) -->
                <?php  if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade in"role="alert">
                      <p style="color: white" class="close" data-dismiss="alert" aria-label="close">&times;</p>
                        <?php echo "<i class='fa fa-check'></i>" . $_SESSION["success"];
                        unset($_SESSION["success"]); ?>
                    </div>
                <?php endif;?>
                <?php  if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade in"role="alert">
                      <p style="color: white"  class="close" data-dismiss="alert" aria-label="close">&times;</p>
                        <?php echo "<i class='fa fa-times'></i>" .$_SESSION["error"];
                        unset($_SESSION["error"]); ?>
                    </div>
                <?php endif;?>
                    <!--        content -->
                    <?php  echo $this->content; ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<?php require_once 'Mvc/Backend/views/layouts/footer.php'; ?>
<script src="assets/Backend/ckeditor/ckeditor.js"></script>
<script>
    function CartAddShopping(id) {
            $.ajax({
                url: "index.php?area=backend&controller=cart&action=add",
                type: "POST",
                data: {
                    'id' : id
                },
                success: function (data) {
                    location.reload(data);
                    alert(data);
                }
            });
    }
</script>
</body>
</html>