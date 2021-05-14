<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Cấp tài khoản cho nhân viên
    <small><?php echo $staff["name"]; ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=staff"><i class="fa fa-users"></i> Danh sách nhân viên</a></li>
    <li class="active">Nhân viên mã : <?php echo $staff["id"]; ?></li>
  </ol>
</section>
<form role="form" method="POST" action="" id="staff_create">
  <div class="row">
    <div class="col-sm-6">
      <div class="box">
        <div class="box-body">
          <?php if(!empty($user)): ?>
          <div class="form-group">
            <label for="">Email :</label>
            <input type="text" value="<?php echo isset($user['email']) ? $user['email'] : '' ?>" readonly
                   class="form-control required" name="email" placeholder="Nhập email của nhân viên ..." >
            <p id="emailerror"></p>
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu :</label>
            <input type="password" value="<?php echo isset($user['password']) ? $user['password'] : '' ?> "  readonly
                   class="form-control required" name="password" placeholder="Nhập mật khẩu ..." >
          </div>
          <?php else: ?>
            <div class="form-group">
              <label for="">Email :</label>
              <input type="text" value="" id="user__email"
                     class="form-control required" name="email" placeholder="Nhập email của nhân viên ..." >
              <p id="emailerror"></p>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu :</label>
              <input type="password" value=""
                     class="form-control required" name="password" placeholder="Nhập mật khẩu ..." >
            </div>
          <?php endif; ?>
          <div class="form-group">
            <?php
            $selected_status_a="";
            $selected_status_d="";
            if(!empty($user)){
              if ($user['quyen'] == 0) {
                $selected_status_d = 'selected';
              } else if($user['quyen'] == 1) {
                $selected_status_a = 'selected';
              }
            }
            if(isset($_POST["quyen"])){
              switch ($_POST["quyen"]){
                case 0:
                  $selected_status_d="selected";
                  break;
                case 1:
                  $selected_status_a="selected";
                  break;
              }
            }
            ?>
            <label for="quyen">Quyền</label>
            <select name="quyen"  id="quyen" class="form-control">
              <option value=""> --- Quyền ---</option>
              <option value="1" <?php echo $selected_status_a;  ?>>Admin</option>
              <option value="0" <?php echo $selected_status_d; ?>>Nhân viên</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="box">
        <div class="box-body">
          <div class="form-group">
            <label for="c_name">Tên nhân viên :</label>
            <input type="text" readonly minlength="4" value="<?php echo isset($staff['name']) ? $staff['name'] : $_POST['name'] ?>" class="form-control required" name="name" placeholder="Nhập tên nhân viên mới ..." >
          </div>
          <div class="form-group">
            <label>Ngày sinh :</label>
            <input type="date" readonly class="form-control" name="date_birth" value="<?php echo isset($staff['date_birth']) ? $staff['date_birth'] : $_POST['date_birth'] ?>">
          </div>
          <div class="box-footer">
            <?php if(empty($user)): ?>
            <input type="submit" value="Cấp tài khoản" name="submit" class=" btn btn-success" id="submit_register">
            <?php endif; ?>
            <a href="index.php?area=backend&controller=staff" class="btn btn-danger">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
</form>


<script>
    $("#user__email").keyup(function () {
        let email = $(this).val();
        $.post("index.php?area=backend&controller=user&action=validateEmail",
            {email: email},
            function (data) {
                if (data == "True") {
                    $("#emailerror").text(" * Email này đã được đăng ký");
                    $("#emailerror").css("font-style","italic");
                    $("#emailerror").css("color","red");
                    $("#emailerror").css("font-size","11px;");
                    document.getElementById("submit_register").disabled = true;
                }
                else {
                    document.getElementById("submit_register").disabled = false;
                    $("#emailerror").text("");
                }
            });
    });
    $("#staff_create").validate({
        rules:
            {
                email :{
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
                quyen:{required:true},

            },
        messages :
            {
                email :{
                    required: " *Email không được để trống",
                    email: " * Phải đúng định dạng là emal"
                },

                password: {
                    required: " * Mật khẩu không được để trống",
                },
                quyen:{  required: " * Chọn quyền hạn cho nhân viên",}
            },
    });
</script>
