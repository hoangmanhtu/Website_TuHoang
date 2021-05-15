<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Sản phẩm nổi bật</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <?php if(!empty($products)): ?>
  <div class="box-body" style="">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        <tr>
          <th width="20%">Mã SP</th>
          <th width="60%">Tên sản phẩm</th>
          <th width="20%" style="text-align: center">Số lượng</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
          <td><?php echo $product['id']; ?></td>
          <td><?php echo $product['title']; ?></td>
          <td style="text-align: center"><span class="label label-success"><?php echo $product['quality']; ?> chiếc</span></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <?php endif; ?>
  <!-- /.box-body -->
  <div class="box-footer clearfix" style="text-align: center">
    <a href="index.php?area=backend&controller=home&action=hotproductAll" class="btn btn-sm btn-info btn-flat pull-center">Xem tất cả sản phẩm nổi bật</a>

  </div>
  <!-- /.box-footer -->
</div>