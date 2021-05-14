<div style="margin: 50px auto;width: 550px">
  <div class="col-md-12 col-md-offset-3">
    <div class="account_form">
      <h2 style="text-align: center">THỒNG TIN CÁ NHÂN</h2>
      <form action="" method="POST" id="register_form" enctype="multipart/form-data">
        <div style="text-align: center" align="center">
          <?php if(!empty($_SESSION['user_account']['avatar'])):  ?>
          <img style="width: 150px;height: 150px;border-radius: 75px;margin-bottom: 10px;" src="Assets/uploads/users/<?php echo $_SESSION['user_account']['avatar']; ?>" alt="">
          <?php else: ?>
          <img style="width: 150px;height: 150px;border-radius: 75px;margin-bottom: 10px;border: 1px solid #dadada" src="Assets/Frontend/images/user.jpg" alt="">
          <?php endif; ?>
        </div>
        <input style="margin:10px auto" type="file" class="" name="avatar">

        <p>
          <label>Email <span>*</span></label>
          <input type="text" name="email" id="register_email" placeholder="Nhập email đăng ký..." readonly
                 value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['email'])) {
                   echo $_SESSION['user_account']['email'];
                 } ?>">
        </p>
        <p>
          <label>Số điện thoại <span>*</span></label>
          <input type="number" name="phone" id="register_phone" placeholder="Nhập số điện thoại đăng ký..." readonly
          value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['phone'])) {
            echo $_SESSION['user_account']['phone'];
          } ?>">

        </p>
        <p>
          <label>Họ tên <span>*</span></label>
          <input type="text" name="fullname" placeholder="Nhập họ và tên ..."
          value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['fullname'])) {
            echo $_SESSION['user_account']['fullname'];
          } ?>"
          >
        </p>
        <p>
        <p>
          <label>Địa chỉ <span>*</span></label>
          <input type="text" name="address" placeholder="Nhập địa chỉ ..."
                 value="<?php if (isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"]['address'])) {
                   echo $_SESSION['user_account']['address'];
                 } ?>">
        </p>
        <p>
        <div class="login_submit">
          <input type="submit" name="submit" value="Cập nhật thông tin">
        </div>
        <p style="text-align: center;color: grey;margin-top: 20px">- Showroom Tú Hoàng -</p>
      </form>
    </div>
  </div>
</div>
