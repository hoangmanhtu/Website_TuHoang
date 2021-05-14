<header class="main-header">
  <!-- Logo -->
  <a href="index.php?area=backend" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">TH</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Showroom<b> Tú Hoàng</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <a href="index.php?area=backend&controller=cart" >
            Giỏ hàng
             <i class="fa fa-shopping-cart"></i>
            <?php
            $total=0;
            if(isset($_SESSION["cart_admin"]) && !empty($_SESSION["cart_admin"])):
            {
              foreach ($_SESSION["cart_admin"] as $list) {
                $total +=$list["quality"];
              }

            }
            ?>
             <span class="label label-success">
               <?php  echo $total; ?>
             </span>
            <?php endif; ?>
          </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="Assets/Uploads/staffs/<?php echo $_SESSION['user_admin']['avatar'] ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['user_admin']['name'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="Assets/Uploads/staffs/<?php echo $_SESSION['user_admin']['avatar'] ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $_SESSION['user_admin']['name'] ?> -  <?php echo $_SESSION['user_admin']['phone'] ?>
                <small> <?php echo $_SESSION['user_admin']['email'] ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="index.php?area=Backend&controller=user&action=UpdateUser" class="btn btn-default btn-flat">Thông tin cá nhân</a>
              </div>
              <div class="pull-right">
                <a href="index.php?area=Backend&controller=user&action=logout"  onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không ?')" class="btn btn-default btn-flat">Đăng xuất</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>