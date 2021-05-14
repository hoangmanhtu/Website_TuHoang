<div style="margin: 50px auto;width: 550px">
  <div class="col-md-12 col-md-offset-3">
    <div class="account_form">
      <h2 style="text-align: center">ĐĂNG KÝ THÀNH VIÊN</h2>
      <form action="" method="POST" id="register_form">
        <p>
          <label>Họ tên <span>*</span></label>
          <input type="text" name="fullname" placeholder="Nhập họ và tên ...">
        </p>
        <p>
          <label>Email <span>*</span></label>
          <input type="text" name="email" id="register_email" placeholder="Nhập email đăng ký...">
          <span id="emailerror"></span>
        </p>
        <p>
          <label>Số điện thoại <span>*</span></label>
          <input type="number" name="phone" id="register_phone" placeholder="Nhập số điện thoại đăng ký...">
          <span id="phoneerror"></span>
        </p>
        <p>
        <p>
          <label>Địa chỉ <span>*</span></label>
          <input type="text" name="address" placeholder="Nhập địa chỉ ...">
        </p>
          <label>Mật khẩu <span>*</span></label>
          <input type="password" name="password" placeholder="Nhập mật khẩu...">
        </p>
<!--        </p>-->
<!--        <label>Mật khẩu <span>*</span></label>-->
<!--        <input type="password" name="comfirm_password" placeholder="Nhập lại mật khẩu...">-->
<!--        </p>-->
        <div class="login_submit">
          <input type="submit" name="submit" value="Đăng ký tài khoản" id="submit_register">
        </div>
        <p class="mt-20">Bạn đã có tài khoản, <a style="color: red;font-weight: bold" href="dang-nhap">Đăng nhập </a> ngay</p>
        <p style="text-align: center;color: grey">- Showroom Tú Hoàng -</p>
      </form>
    </div>
  </div>
</div>
