<section class="content-header" style="margin-bottom: 15px;">
  <h1>
    Danh sách nhân viên
    <small>Tu Hoang Electronic</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?area=backend"><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="active"> <i class="fa fa-users"></i> Danh sách nhân viên</li>
  </ol>
</section>
<div style="margin: 10px auto;width: 60%">
  <input style="padding: 22px 12px; border-radius: 5px" type="text" id="search_staff" name="search_product" class="form-control" placeholder="Nhập nhân viên cần tìm kiếm .......">
</div>
<div style="text-align: right;margin-bottom: 15px;">
  <a href="index.php?area=backend&controller=staff&action=create" class="btn btn-success"><i class="fa fa-plus"></i> Thêm nhân viên mới</a>
</div>
<div id="table_staff">
  <div class="box">
    <div class="box-body table-responsive no-padding ">
      <table class="table table-bordered">
        <tr>
          <th  style="text-align: center;">Mã nhân viên</th>
          <th style="text-align: center;width: 15%">Tên nhân viên</th>
          <th style="text-align: center">Ảnh đại diện</th>
          <th style="text-align: center">Số điện thoại</th>
          <th style="text-align: center">Ngày sinh</th>
          <th style="text-align: center;">Chức năng</th>
        </tr >
        <?php if(!empty($staffs)): ?>
          <?php foreach ($staffs as $staff): ?>
            <tr style="text-align: center">
              <td><?php echo $staff["id"]  ?></td>
              <!--                -->
              <td><?php echo $staff["name"] ?></td>
              <td>
                <?php if(!empty($staff['avatar'])): ?>
                  <img style="margin: 10px 0px;border-radius: 3px;" src="Assets/Uploads/staffs/<?php echo $staff['avatar']; ?>" width="60" height="60"/>
                <?php endif; ?>
              </td>
              <td><?php echo $staff["phone"]; ?></td>
              <td><?php echo date('d/m/Y', strtotime($staff['date_birth'])); ?></td>
              <td style="text-align: center">
                <a style="margin-right: 10px;" href="index.php?area=backend&controller=staff&action=detail&id=<?php echo $staff['id']; ?>">
                  <i class="fa fa-eye "></i></a>
                <a style="margin-right: 10px;" href="index.php?area=backend&controller=staff&action=update&id=<?php echo $staff['id'] ?>">
                  <i class="fa fa-pencil"></i></a>
                <a  style="margin-right: 10px;"
                    href="index.php?area=backend&controller=staff&action=delete&id=<?php echo $staff['id']?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này')">
                  <i class="fa fa-trash"></i>
                </a>
                <?php if(empty($staff['email'])): ?>
                <a  style="margin-right: 10px;"
                    href="index.php?area=backend&controller=user&action=register&id=<?php echo $staff['id']?>"
                <i class="fa fa-user-plus"></i>
                </a>
                <?php endif; ?>

              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="9">Không có nhân viên nào</td>
          </tr>
        <?php endif; ?>
      </table>
      <div align="center">
        <ul class='pagination text-center' id="pagination">
          <?php if($numPage == 1){
            return '';
          }
          ?>
          <?php  if($page > 1):
            $prev_page=$page-1;
            ?>
            <li class="page-item" id="<?php echo $prev_page; ?>">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          <?php endif; ?>
          <?php for($i=1;$i<= $numPage;$i++):
            if($i == $page): ?>
              <li class="page-item active" id="<?php echo $i ?>">
                <a class="page-link active" href="#"><?php echo $i; ?></a>
              </li>
            <?php else: ?>
              <li class="page-item" id="<?php echo $i ?>">
                <a class="page-link " href="#"><?php echo $i ?></a>
              </li>
            <?php endif;
          endfor; ?>
          <?php   if($page < $numPage ):
            $next_page=$page + 1;
            ?>
            <li class="page-item" id="<?php echo $next_page; ?>">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          <?php endif;?>
      </div>
    </div>
  </div>
</div>

<script>
    function loadTable(page, query = "") {
        $.ajax({
            url: "index.php?area=backend&controller=staff&action=search",
            type: "POST",
            data: {
                page: page,
                query: query
            },
            success: function (data) {
                $("#table_staff").html(data);
            }
        });
    }
    $("#search_staff").keyup(function () {
        var query = $("#search_staff").val();
        var page_id=$(this).attr("id");
        loadTable(page_id,query);
    });
    $(document).on("click","#pagination li",function (e) {
        e.preventDefault();
        var page_id=$(this).attr("id");
        var query=$("#search_staff").val();
        loadTable(page_id,query);
    });
</script>
