<!---->
<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Thông tin chi tiết của nhân viên 
    <small>Tu Hoang Electronic</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=staff"><i class="fa fa-users"></i> Danh sách nhân viên</a></li>
    <li class="active">Chi tiết nhân viên : <?php  echo $staff['name']; ?></li>
  </ol>
</section>
<!--    -->
<div class="box">
  <div class="">
    <table class="table table-bordered">
      <tr>
        <th>Mã nhân viên</th>
        <td><?php echo $staff['id']; ?></td>
      </tr>
      <tr>
        <th>Email nhân viên</th>
        <td><?php
          if(!empty($users['email'])){
            echo $users['email'];
          }
          else{
            echo "<p style='color: red'>Nhân viên này chưa có tài khoản</p>";
          }
          ?></td>
      </tr>
      <?php if(!empty($users['quyen'])):  ?>
      <tr>

        <th>Quyền</th>
        <td><?php if($users['quyen']==1){
          echo "<p style='color: red'>Admin</p>";
          }else{
          echo "<p style='color: yellow'>Nhân viên</p>";
          } ?>
        </td>
      </tr>
      <?php endif; ?>

      <tr>
        <th>Tên nhân viên</th>
        <td><?php echo $staff['name']; ?></td>
      </tr>
      <tr>
        <th>Avatar</th>
        <td>
          <?php if (!empty($staff['avatar'])): ?>
            <img style="border-radius: 3px;" src="assets/uploads/staffs/<?php echo $staff['avatar'] ?>" width="80" height="80"/>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>Số điện thoại</th>
        <td>
          <?php echo $staff['phone']; ?>
        </td>
      </tr>
      <th>Ngày sinh</th>
      <td>
        <?php echo date('d/m/Y', strtotime($staff['date_birth'])); ?>
      </td>
      <tr>
        <th>Địa chỉ</th>
        <td><?php echo $staff['address']; ?></td>
      </tr>

      <tr>
        <th>Ngày tạo </th>
        <td>
          <?php   echo date('d/m/Y H:i:s', strtotime($staff['created_at'])); ?>
        </td>
      </tr>
      <tr>
        <th>Ngày cập nhật cuối </th>
        <td>
          <?php
          if(isset($staff["updated_at"]))
          {
            echo date('d/m/Y H:i:s', strtotime($staff['updated_at']));
          }else{
            echo "---";
          }
          ?>

        </td>
      </tr>
    </table>
  </div>
</div>
<a class="btn btn-danger" href="index.php?area=backend&controller=staff">Back</a>


