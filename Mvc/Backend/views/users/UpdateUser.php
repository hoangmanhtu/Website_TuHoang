<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Thông tin cá nhân
    <small>Tu Hoang Electronic</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>

    <li class="active"><i class="fa fa-user"></i> Chỉnh sửa thông tin cá nhân</li>
  </ol>
</section>
<div style="width: 700px;margin: 20px auto">

  <form role="form" method="POST" action="" enctype="multipart/form-data" id="staff_create">
    <div class="row">
      <div class="col-sm-12">
        <div class="box">
          <div class="box-body">
            <?php if(!empty($_SESSION['user_admin']['avatar'])):  ?>
            <div style="text-align: center" align="center">
              <img style="width: 150px;height: 150px;border-radius: 75px" src="Assets/Uploads/staffs/<?php echo $_SESSION['user_admin']['avatar']; ?>" alt="">
            </div>
              <input style="margin:10px auto" type="file" class="" name="avatar">


            <?php endif; ?>
            <div class="form-group">
              <label for="c_name">Email :</label>
              <input type="text"readonly value="<?php if (isset($_SESSION["user_admin"]) && !empty($_SESSION["user_admin"]['email'])) {
                echo $_SESSION['user_admin']['email'];
              } ?>" class="form-control required" name="email" placeholder="Nhập email mới ..." >
            </div>
            <div class="form-group">
              <label for="c_name">Tên nhân viên :</label>
              <input type="text" minlength="4" value="<?php if (isset($_SESSION["user_admin"]) && !empty($_SESSION["user_admin"]['name'])) {
                echo $_SESSION['user_admin']['name'];
              } ?>" class="form-control required" name="name" placeholder="Nhập tên nhân viên mới ..." >
            </div>
            <div class="form-group">
              <label for="c_name">Ngày sinh :</label>
              <input type="date" minlength="4" value="<?php if (isset($_SESSION["user_admin"]) && !empty($_SESSION["user_admin"]['date_birth'])) {
                echo $_SESSION['user_admin']['date_birth'];
              } ?>" class="form-control required" name="date_birth" placeholder="Nhập ngày sinh mới ..." >
            </div>
            <div class="form-group">
              <label for="c_name">Số điện thoại :</label>
              <input type="text" minlength="4" value="<?php if (isset($_SESSION["user_admin"]) && !empty($_SESSION["user_admin"]['phone'])) {
                echo $_SESSION['user_admin']['phone'];
              } ?>" class="form-control required" name="phone" placeholder="Nhập số điện thoại mới ..." >
            </div>
            <div class="form-group">
              <label for="c_name">Địa chỉ :</label>
              <input type="text" minlength="4" value="<?php if (isset($_SESSION["user_admin"]) && !empty($_SESSION["user_admin"]['address'])) {
                echo $_SESSION['user_admin']['address'];
              } ?>" class="form-control required" name="address" placeholder="Nhập địa chỉ mới ..." >
            </div>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-success" value="Cập nhật thông tin" name="submit">
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
</form>


<script>
    $("#staff_create").validate({
        rules:
            {
                name: { required:true },
                avatar : { extension: "jpg|png|jpeg|gif" },
                phone:{required:true},
                address:{required:true},
                date_birth:{required:true},


            },
        messages :
            {
                name :{ required: " * Bạn chưa nhập tên nhân viên" },
                avatar : { extension: "Chỉ tải lên các file có định dạng  jpg , png , jpeq , gif "},
                phone:{required:" * Bạn phải nhập số điện thoại của nhân viên"},
                address:{required: " * Bạn phải nhập địa chỉ của nhân viên"},
                date_birth:{required: " * Bạn phải nhập ngày sinh của nhân viên"}
            },
    });
</script>

</div>