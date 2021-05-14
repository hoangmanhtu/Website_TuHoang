<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Danh sách tài khách hàng
    <small>Tu Hoang Electronic</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active"> <i class="fa fa-users"></i> Danh sách tài khoản khách hàng</li>
</section>
<div style="text-align: right;margin-bottom: 15px;">
  <a href="index.php?area=backend&controller=user&action=getAdmin" class="btn btn-success"><i class="fa fa-users"></i> Danh sách tài khoản Admin</a>
</div>
<div >
  <div class="box">
    <div class="box-body table-responsive no-padding ">
      <table class="table table-bordered">
        <tr>
          <th  style="text-align: center;">Mã khách hàng</th>
          <th style="text-align: center;width: 15%">Tên khách hàng</th>
          <th style="text-align: center">Số điện thoại</th>
          <th style="text-align: center">Đia chỉ</th>
          <th style="text-align: center">Ngày tạo</th>
        </tr >
        <?php if(!empty($users)): ?>
          <?php foreach ($users as $staff): ?>
            <tr style="text-align: center">
              <td><?php echo $staff["id"]  ?></td>
              <!--                -->
              <td><?php echo $staff["email"] ?></td>
              <td><?php echo $staff["phone"]; ?></td>
              <td><?php echo $staff["address"]; ?></td>
              <td><?php echo date('d/m/Y', strtotime($staff['created_at'])); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="9">Không có tài khoản khách hàng nào</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
</div>
