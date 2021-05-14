<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Chỉnh sửa nhân viên
    <small><?php echo $staff["name"]; ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=staff"><i class="fa fa-users"></i> Danh sách nhân viên</a></li>
    <li class="active">Chỉnh sửa nhân viên có mã : <?php echo $staff["id"]; ?></li>
  </ol>
</section>
<form role="form" method="POST" action="" enctype="multipart/form-data" id="staff_create">
  <div class="row">
    <div class="col-sm-6">
      <div class="box">
        <div class="box-body">
          <div class="form-group">
            <label for="c_name">Tên nhân viên :</label>
            <input type="text" minlength="4" value="<?php echo isset($staff['name']) ? $staff['name'] : $_POST['name'] ?>" class="form-control required" name="name" placeholder="Nhập tên nhân viên mới ..." >
          </div>
          <div class="form-group">
            <label>Ảnh đại diện :</label>
            <input type="file" class="form-control" name="avatar">
            <?php if (!empty($staff['avatar'])): ?>
              <img style="margin: 10px 0px; border-radius: 3px" src="Assets/Uploads/staffs/<?php echo $staff['avatar']; ?>" height="100" width="100"/>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="box">
        <div class="box-body">
          <div class="form-group">
            <label>Ngày sinh :</label>
            <input type="date" class="form-control" name="date_birth" value="<?php echo isset($staff['date_birth']) ? $staff['date_birth'] : $_POST['date_birth'] ?>">
          </div>
          <div class="form-group">
            <label for="phone">Số điện thoại :</label>
            <input type="number" name="phone" value="<?php echo isset($staff['phone']) ? $staff['phone'] : $_POST["phone"] ?>" class="form-control" id="phone" placeholder="Nhập số điện thoại nhân viên...">
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ :</label>
            <input type="text" name="address" value="<?php echo isset($staff['address']) ? $staff['address'] :  $_POST['address']  ?>" class="form-control" id="address" placeholder="Nhập địa chỉ của nhân viên...">
          </div>
          <div class="box-footer">
            <input type="submit" value="Sửa Nhân viên" name="submit" class=" btn btn-success">
            <a href="index.php?area=backend&controller=staff" class="btn btn-danger">Back</a>
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
