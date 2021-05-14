<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Danh sách tài khoản Admin
    <small>Tu Hoang Electronic</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active"> <i class="fa fa-users"></i> Danh sách tài khoản Admin</li>
</section>
<div style="text-align: right;margin-bottom: 15px;">
  <a href="index.php?area=backend&controller=user&action=getAll" class="btn btn-success"><i class="fa fa-users"></i> Danh sách tài khoản khách hàng</a>
</div>
<div >
  <div class="box">
    <div class="box-body table-responsive no-padding ">
      <table class="table table-bordered">
        <tr>
          <th  style="text-align: center;">Mã nhân viên</th>
          <th style="text-align: center;width: 15%">Tên nhân viên</th>
          <th  style="text-align: center;">Email</th>
          <th style="text-align: center">Quyền</th>
          <th style="text-align: center">Ngày tạo</th>
        </tr >
        <?php if(!empty($admin)): ?>
          <?php foreach ($admin as $staff): ?>
            <tr style="text-align: center">
              <td><?php echo $staff["staff_id"]  ?></td>
              <!--                -->
              <td><?php echo $staff["staff_name"] ?></td>
              <td><?php echo $staff["email"]; ?></td>
              <td>
                <?php if($staff['quyen']==0){
                echo "<p style='color: green'>Nhân viên</p>";
                }else{
                  echo "<p style='color: red'>Admin</p>";
                }
                ?>
              </td>
              <td><?php echo date('d/m/Y', strtotime($staff['created_at'])); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="9">Không có tài khoản admin nào</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
</div>
